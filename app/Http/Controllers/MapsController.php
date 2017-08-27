<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cornford\Googlmapper\Facades\MapperFacade as Mapper;
use Illuminate\Support\Facades\Input;
use App\CaseReport;
use Session;
use App\UserRole;
use App\User;
use Auth;
use App\Language;
use App\InvestigationOfficer;
use App\CaseNote;
use App\CaseFile;
use App\services\CaseOwnerService;
use App\services\CaseResponderService;
use App\services\CaseActivityService;
use Redirect;
use File;

class MapsController extends Controller
{



    protected $case_responders;
    protected $case_owners;
    protected $case_activities;

    public function __construct(CaseResponderService $responder_service,CaseOwnerService $case_owner_service,CaseActivityService $case_activity_service) {

        $this->case_responders   = $responder_service;
        $this->case_owners       = $case_owner_service;
        $this->case_activities   = $case_activity_service;

    }

    public  function   Getmaps  ()

    {
        $latitude=-29;
        $longitude=24;
        $address=Mapper::map($latitude, $longitude,['zoom'=>6,'marker' => false]);

        $cases=CaseReport::all();

        foreach ($cases as $case) {

            $content="<div style='color: black;'>
                      <tr><td>Case ID&nbsp;          : </td><td>$case->id</td></tr>
                      <br/>
                      <tr><td>Case Description : </td><td>$case->description</td></tr>
                      </div>";

            $address->informationWindow($case->gps_lat, $case->gps_lng, $content, ['animation' => 'DROP','label'=>$case->id,'draggable'=>'true']);
        }

        return   view  ('cornford.map',compact('latitude','longitude','address'));
    }


    public function search(Request $request)
    {
        $destination= $request['search'];
        $places=Mapper::location($destination);

        $latitude=$places->latitude;
        $longitude=$places->longitude;
        $address=$places->address;

        $address= Mapper::map($latitude,$longitude,['zoom'=>19,'center' => true,'type' => 'HYBRID','animation' => 'DROP','draggable' => true,['draggable' => true, 'eventDragStart' => 'console.log("drag start");'], 'clusters' => ['size' => 20, 'center' => true, 'zoom' => 20],'markers' => ['title' => $destination, 'animation' => 'BOUNCE']])
            ->circle([['latitude' => $latitude, 'longitude' => $longitude]], ['strokeColor' => '#000000', 'strokeOpacity' => 0, 'strokeWeight' => 4, 'fillColor' => '#FFFFFF', 'radius' => 40]);

        $cases=CaseReport::all();

        foreach ($cases as $case) {

            $content="<div style='color:black'>
                      <tr>
                      <td><b>Case ID</b>&nbsp; : </td><td>$case->id</td>
                      </tr>
                      <br/>
                      <tr>
                      <td><b>Case Description : </b></td><td>$case->description</td>
                      </tr>
                      </div>";

            $address->informationWindow($case->gps_lat, $case->gps_lng,$content, ['animation' => 'DROP','label'=>$case->id,'draggable'=>'true']);
        }

        return   view  ('cornford.map',compact('places','latitude','longitude','address'));
//      dd($places->address);

    }

    public function searchCase(Request $request)
    {


        $case = CaseReport::find($request['caseID']);

        $content="<div style='color:black'>
                      <tr>
                      <td><b>Case ID</b>&nbsp; : </td><td>$case->id</td>
                      </tr>
                      <br/>
                      <tr>
                      <td><b>Case Description : </b></td><td>$case->description</td>
                      </tr>
                      </div>";

        Mapper::map($case->gps_lat,$case->gps_lng,['zoom'=>19,'center' => true,'type' => 'HYBRID','marker' => false,'draggable' => true, 'clusters' => ['size' => 20, 'center' => true, 'zoom' => 20]])
            ->informationWindow($case->gps_lat,$case->gps_lng,$content,['title' => $case->id,'animation' => 'DROP']);

        $latitude=$case->gps_lat;
        $longitude=$case->gps_lng;
        $address=$case->description;

        return   view  ('cornford.map',compact('places','latitude','longitude','address'));
    }

       public function storeCase(Request $request)
       {
           $txtDebug = __CLASS__ . "." . __FUNCTION__ . "(CreateCaseAgentRequest \$request) \$request - " . print_r($request->all(), 1);

           $house_holder_id = 0;
           if ($request['hseHolderId']) $house_holder_id = $request['hseHolderId'];
           else if ($request['hseHolderId']) $house_holder_id = $request['hseHolderId'];
           $txtDebug .= PHP_EOL . "  \$house_holder_id - {$house_holder_id}";
           //die("<pre>{$txtDebug}</pre>");

           if (empty($house_holder_id)) {

               $userRole = UserRole::where('name', '=', 'Client')->first();
               $user = New User();
               $user->role = $userRole ? $userRole->id : 0;
               $user->name = $request['name'];
               $user->surname = $request['surname'];
               $user->cellphone = $request['cellphone'];
               $user->title = 1;
               $user->client_reference_number = $request['client_reference_number'];
               $user->email = $request['cellphone'] . "@siyaleader.net";
               $user->created_by = \Auth::user()->id;
               $language = Language::where('slug', '=', $request['language'])->first();
               $user->language = $language->id;
               $user->company = $request['company'];
               $user->position = 1;
               $user->gender = 1;
               $user->affiliation = 1;
               $user->save();

               $house_holder_id = $user->id;

           }

           $house_holder_id = ($house_holder_id == 0) ? $request['hseHolderId'] : $house_holder_id;

           $case_type = ($request['case_type'] == 0) ? 5 : $request['case_type'];
           $case_sub_type = ($request['case_sub_type'] == 0) ? 7 : $request['case_sub_type'];
           $house_holder_obj = User::find($house_holder_id);



           if ($request['officers'] == 0) {
               $investigationOfficer = new InvestigationOfficer();
               $investigationOfficer->name = $request['investigation_officer'];
               $investigationOfficer->email = $request['investigation_email'];
               $investigationOfficer->cellphone = $request['investigation_cell'];
               $investigationOfficer->save();

               $officer = $request['investigation_officer'];
           } else {
               $officerObj = InvestigationOfficer::find($request['officers']);
               $officer = $officerObj->name;
           }

           $newCase = New CaseReport();
           $newCase->created_at = \Carbon\Carbon::now('Africa/Johannesburg')->toDateTimeString();
           $newCase->user = \Auth::user()->id;
           $newCase->reporter = \Auth::user()->id;
           $newCase->house_holder_id = $house_holder_id;
           $newCase->description = $request['description'];
           $newCase->case_type = is_array($case_type) ? $case_type[0] : $case_type;
           $newCase->case_sub_type = is_array($case_sub_type) ? $case_sub_type[0] : $case_sub_type;
           $newCase->saps_case_number = $request['saps_case_number'];
           $newCase->saps_station = $request['saps_station'];
           $newCase->investigation_officer = $officer;
           $newCase->investigation_cell = $request['investigation_cell'];
           $newCase->investigation_email = $request['investigation_email'];
           $newCase->investigation_note = $request['investigation_note'];
           $newCase->client_reference_number = $request['client_reference_number'];
           $newCase->rate_value = $request['rate_value'];
           $newCase->status = 1;
           $newCase->addressbook = 0;
           $newCase->source = 3;
           $newCase->active = 1;
           $newCase->street_number = $request['street_number'];
           $newCase->route = $request['route'];
           $newCase->locality = $request['locality'];
           $newCase->administrative_area_level_1 = $request['administrative_area_level_1'];
           $newCase->postal_code = $request['postal_code'];
           $newCase->country = $request['country'];
           $newCase->gps_lat = $request['lat'];
           $newCase->gps_lng = $request['lng'];
           $newCase->save();


           $create_case_owner_data = array(
               "case_id" => $newCase->id,
               "user" => $newCase->user,
               "type" => 1,
               "addressbook" => 0
           );

           $user = User::find(\Auth::user()->id);
           $this->case_owners->create_case_owner($create_case_owner_data);
           $this->case_responders->send_com($user, $newCase);

           $first_responders = $this->case_responders->get_responders_by_sub_case_type($newCase->case_sub_type, 1);

           if (empty($first_responders)) {

               $first_responders = $this->case_responders->get_responders_by_case_type($newCase->case_type, 1);

           }

           foreach ($first_responders as $first_responder) {

               $create_case_owner_data = array(
                   "case_id" => $newCase->id,
                   "user" => $first_responder->responder,
                   "type" => 1,
                   "addressbook" => 0
               );

               $this->case_owners->create_case_owner($create_case_owner_data);

           }

           $this->case_responders->send_comms_to_first_responders($newCase, $first_responders);


           $caseNote = new CaseNote();
           $caseNote->note = $request['investigation_note'];
           $caseNote->user = \Auth::user()->id;
           $caseNote->case_id = $newCase->id;
           $caseNote->save();

           if($request->file('caseFile')==NULL)
           {
               $destinationFolder = 'files/case_'. $newCase->id;

               if(!File::exists($destinationFolder)) {
                   $createDir         = \File::makeDirectory($destinationFolder,0777,true);
               }
           }
           else {

               $destinationFolder = 'files/case_' . $newCase->id;

               if (!File::exists($destinationFolder)) {
                   $createDir = \File::makeDirectory($destinationFolder, 0777, true);
               }

               $fileName = $request->file('caseFile')->getClientOriginalName();

               $fileFullPath = $destinationFolder . '/' . $fileName;

               if (!File::exists($fileFullPath)) {

                   $request->file('caseFile')->move($destinationFolder, $fileName);


                   $caseFile = new CaseFile();
                   $caseFile->file = $fileName;
                   $caseFile->img_url = $fileFullPath;
                   $caseFile->user = \Auth::user()->id;
                   $caseFile->case_id = $newCase->id;

                   $caseFile->save();


               }
           }


           $response["message"] = "Case created successfully";
           $response["error"] = FALSE;
           $response["caseID"] = $newCase->id;

           $content="<div style='color:black'>
                      <tr>
                      <td><b>Case ID</b>&nbsp; : </td><td>$newCase->id</td>
                      </tr>
                      <br/>
                      <tr>
                      <td><b>Case Description : </b></td><td>$newCase->description</td>
                      </tr>
                      </div>";

           Mapper::map($newCase->gps_lat,$newCase->gps_lng,['zoom'=>19,'center' => true,'type' => 'HYBRID','marker' => false,'draggable' => true, 'clusters' => ['size' => 20, 'center' => true, 'zoom' => 20,'label'=>$newCase->id]])
            ->informationWindow($newCase->gps_lat,$newCase->gps_lng,$content,['animation' => 'DROP']);

        $latitude=$newCase->gps_lat;
        $longitude=$newCase->gps_lng;
        $address=$newCase->description;

        \Session::flash('success', 'Well done! Case '.$newCase->id.' has been successfully added!');
        return   view  ('cornford.map',compact('places','latitude','longitude','address'));
       }

}
