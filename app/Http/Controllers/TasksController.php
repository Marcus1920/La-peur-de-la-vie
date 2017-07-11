<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\AuthController;
use App\table;
use App\TaskCategoryType;
use App\TaskOwner;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\TaskRequest;
use App\Http\Requests\TaskEditRequest;
use App\Http\Controllers\Controller;
use App\Task;
use App\services\TaskService;
use App\services\TaskNoteService;
use App\services\TaskFileService;
use App\services\TaskOwnerService;
use App\services\SubTaskService;
use App\services\TaskActivityService;
use App\services\TaskReminderService;
use App\User;
use Auth;
use Session;
use Redirect;
use Input;



class TasksController extends Controller
{

    protected $tasks;
    protected $taskNotes;
    protected $subTask;
    protected $taskFiles;
    protected $subTasks;
    protected $taskActivity;
    protected $current_logged_in_user;
    protected $taskOwners;
    protected $taskReminders;


    public function __construct(TaskService $taskService,TaskNoteService $taskNoteService,TaskFileService $taskFileService,SubTaskService $taskSubTaskService,TaskOwnerService $taskOwnerService,TaskActivityService $taskActivityService,TaskReminderService $taskReminderService)
    {

        $this->tasks                    = $taskService;
        $this->taskNotes                = $taskNoteService;
        $this->taskFiles                = $taskFileService;
        $this->subTasks                 = $taskSubTaskService;
        $this->current_logged_in_user   = Auth::user();
        $this->taskOwners               = $taskOwnerService;
        $this->taskActivity             = $taskActivityService;
        $this->taskReminders            = $taskReminderService;
    }

    public function index()
    {
        return view('tasks.index');
    }

    public function getTasks()
    {

        $tasks = $this->tasks->getTasksPerUser($this->current_logged_in_user->id,2);
        return \Datatables::of($tasks)
            ->addColumn('actions','
            
                <div class="col-md-2 m-b-15">
                   <a class="btn btn-xs btn-alt" data-toggle="modal" href="tasks/{{ $task->id }}" target="">View</a>
                  
                   
                </div>
                                  '
                                                                                                         )
                ->make(true);
    }



    public function getAssignedByMeTasks()
    {


        $tasks = $this->tasks->getAssignedByMeTasksPerUser($this->current_logged_in_user->id);

        return \Datatables::of($tasks)
            ->addColumn('actions','
            
                <div class="col-md-2 m-b-15">
                 
                   <a class="btn btn-xs btn-alt" data-toggle="modal" href="tasks/{{ $task->id }}" target="">View</a>
                   
              
                  
                </div>       '
            )
            ->make(true);


    }


    public function create($parent_id = 0)
    {
        return view('tasks.create',compact('parent_id'));

    }


    public function linkExistingTask($task_id)
    {
        return view('tasks.existingtasks',compact('task_id'));

    }

    public function store(TaskRequest $request)
    {

        $task = $this->tasks->storeTask($request);

        if(isset($request['case_id'])){

            $this->storeTaskCategoryType($task,$request['case_id']);

        }

        $assignee = User::find($request['task_user_id']);

        $this->storeTaskOwner($task,$assignee->id);
        $this->tasks->sendTaskCreationCommToTaskOwner($task->id,$assignee->id);

        return redirect('tasks')->withStatus('Form submitted!');

    }


    public function storeTaskCategoryType($task,$type_id){

        $taskCategoryType = new TaskCategoryType;
        $taskCategoryType->store($task,$type_id);

    }

    public function storeTaskOwner($task,$users){

        $task_owner = new TaskOwner;
        $task_owner->store($task,$users);
    }


    public function show($id)
    {

        $task           = $this->tasks->getTask($id);
        $taskNotes      = $this->taskNotes->getNotes()->where('task_id',$task->id);
        $taskFiles      = $this->taskFiles->getFiles()->where('task_id',$task->id);
        $taskAssignee   = $this->taskOwners->getTaskAssigneeOwner($id);
        $subTasks       = $this->tasks->getSubTasks()->where('parent_id',$task->id);
        $parentTasks    = $this->tasks->getSubTasks()->where('id',$task->parent_id);
        $taskActivities = $this->taskActivity->getTaskActivities()->where('task_id',$task->id);
        $taskReminders  = $this->taskReminders->getReminders()->where('task_id',$task->id)->where('user_id',Auth::user()->id);

        return view('tasks.show',compact('task','taskNotes','taskFiles','parentTasks','subTasks','taskAssignee','taskActivities','taskReminders'));


    }


    public function edit($id)
    {

        $data=$this->tasks->editTask($id);
        \Session::flash('success', 'You accepted the Task '.$data['id'].' has been successfully added!');
        return Redirect::to('tasks/'.$data['id']);
    }



    public function update( $id)
    {

        $data=$this->tasks->updateTask($id);
        \Session::flash('success', 'You Closed the Task '.$data['id'].' has been successfully added!');
        return Redirect::to('tasks/'.$data['id']);


    }

    public function updateTask(TaskEditRequest $request){


        $form   = Input::all();
        $task   = $this->tasks->getTask($form['task_id']);
        $this->tasks->updateTask($form);
        return Redirect::to('tasks/'.$form['task_id']);

        //TODO: ELie Once you save to redirect you their tab of choice

    }


    public function addTaskRelationship(Request $request){

        if($request['relationship'] == 'child') {

            $child_task_id  = $request['search_task'];
            $parent_task_id = $request['task_id'];

            if($child_task_id <> $parent_task_id ){

                $this->tasks->addTaskParent($child_task_id,$parent_task_id);
            }

            return Redirect::to('tasks/'.$request['parent_id']);
        }

        if($request['relationship'] == 'parent') {

            $child_task_id  = $request['task_id'];
            $parent_task_id = $request['search_task'];
            if($child_task_id <> $parent_task_id ){
                $this->tasks->addTaskParent($parent_task_id,$child_task_id);
            }
            return Redirect::to('tasks/'.$request['parent_id']);

        }

    }



    public function reject($id)
    {

        $data = $this->tasks->rejectTask($id);
        \Session::flash('success', 'You Rejected the Task ' . $data['id'] . '!');
        return Redirect::to('tasks/' . $data['id']);

    }


    public function acceptTask($taskId){

        $this->taskOwners->acceptTask($taskId);
        $creator  = $this->taskOwners->getTaskCreatorOwner($taskId);
        $assignee = Auth::user()->id;
        $this->tasks->sendTaskAcceptanceCommToTaskOwner($taskId,$creator->id,$assignee);

        $data = array(

            'task_id'        =>  $taskId,
            'activity_note'  =>  'accepted task',
        );
        
        $this->taskActivity->createTaskActivity($data);
        return Redirect::to('tasks/' .$taskId);

    }

    public function rejectTask($taskId){


        $this->taskOwners->rejectTask($taskId);
        $creator  = $this->taskOwners->getTaskCreatorOwner($taskId);
        $assignee = Auth::user()->id;
        $this->tasks->sendTaskRejectionCommToTaskOwner($taskId,$creator->id,$assignee);

        $data = array(

            'task_id'        =>  $taskId,
            'activity_note'  =>  'rejected task',
        );

        $this->taskActivity->createTaskActivity($data);
        return Redirect::to('tasks');

    }

    public function getSearchTasks()
    {
        $searchString   = \Input::get('q');
        $tasks          = \DB::table('tasks')
            ->whereRaw(
                "CONCAT(`tasks`.`id`, ' ', `tasks`.`description`) LIKE '%{$searchString}%'")
            ->select(
                array

                (
                    'tasks.id as id',
                    'tasks.description as description',
                )
            )

            ->get();

        $data = array();

        foreach ($tasks as $task) {

            $data[] = array(

                "id"     => "{$task->id}",
                "name"   => "Task ID: {$task->id} >  Description: {$task->description}",
            );
        }

        return $data;
    }



}
