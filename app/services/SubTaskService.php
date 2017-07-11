<?php


namespace App\services;
use App\SubTask;
use Auth;


class SubTaskService

{


    public function getSubTasks()
    {
        return SubTask::all();
    }


    public function createSubTask($request,$subTaskId)

    public function createSubTask($request)

    public function createSubTask($request,$subTaskId)

    {

        $subTaskobj= new SubTask();
        $subTaskobj->task_id = $request['task_id'];

        $subTaskobj->sub_task_id = $subTaskId;

        $subTaskobj->date_received = $request['date_received'];
        $subTaskobj->date_booked_out = $request['date_booked_out'];
        $subTaskobj->commencement_date = $request['commencement_date'];
        $subTaskobj->last_activity_date_time = $request['last_activity_date_time'];
        $subTaskobj->description = $request['description'];

        $subTaskobj->sub_task_id = $subTaskId;

        $subTaskobj->created_by     = Auth::user()->id;
        $subTaskobj->save();
        return $subTaskobj;

    }

}