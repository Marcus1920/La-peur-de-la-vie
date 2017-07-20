
@extends('master')

@section('content')

    <!-- Modal Default -->
    <style>


        /*  bhoechie tab */
        div.bhoechie-tab-container{
            z-index: 10;
            background-color: #0B628D;
            padding: 0 !important;
            border-radius: 4px;
            -moz-border-radius: 4px;
            /*border:1px solid #ddd;*/
            margin-top: 15px;
            margin-left: 20px;
            -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
            box-shadow: 0 6px 12px rgba(0,0,0,.175);
            -moz-box-shadow: 0 6px 12px rgba(0,0,0,.175);
            background-clip: padding-box;
            opacity: 0.97;
            filter: alpha(opacity=97);
            width: 98%;

        }
        div.bhoechie-tab-menu{
            padding-right: 0;
            padding-left: 0;
            padding-bottom: 0;
        }
        div.bhoechie-tab-menu div.list-group{
            margin-bottom: 0;
        }
        div.bhoechie-tab-menu div.list-group>a{
            margin-bottom: 0;
        }
        div.bhoechie-tab-menu div.list-group>a .glyphicon,
        div.bhoechie-tab-menu div.list-group>a .fa {
            /*color: #5A55A3;*/
        }
        div.bhoechie-tab-menu div.list-group>a:first-child{
            border-top-right-radius: 0;
            -moz-border-top-right-radius: 0;
        }
        div.bhoechie-tab-menu div.list-group>a:last-child{
            border-bottom-right-radius: 0;
            -moz-border-bottom-right-radius: 0;
        }
        div.bhoechie-tab-menu div.list-group>a.active,
        div.bhoechie-tab-menu div.list-group>a.active .glyphicon,
        div.bhoechie-tab-menu div.list-group>a.active .fa{
            /*background-color: #5A55A3;*/
            /*background-image: #5A55A3;*/
            /*color: #ffffff;*/
        }
        div.bhoechie-tab-menu div.list-group>a.active:after{
            content: '';
            position: absolute;
            left: 100%;
            top: 50%;
            margin-top: -13px;
            border-left: 0;
            border-bottom: 13px solid transparent;
            border-top: 13px solid transparent;
            border-left: 10px solid #0D3349;
        }

        div.bhoechie-tab-content{
            /*background-color: #0B628D;*/
            /* border: 1px solid #eeeeee; */
            padding-left: 10px;
            padding-top: 10px;
        }

        div.bhoechie-tab div.bhoechie-tab-content:not(.active){
            display: none;
        }


        .top li a{
            border: 1px solid white;
            border-radius: 15px;
        }

    </style>
    <div class="container">

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-9 bhoechie-tab-container">

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel with-nav-tabs panel-default">
                            <div class="panel-heading">
                                <ul  class="nav nav-pills nav-justified top">
                                    <li class="active">
                                        <a  href="#1a" data-toggle="tab"  onclick="shows()"><span class="fa fa-file-text"> Case Profile</span></a>
                                    </li>
                                    <li><a href="#2a" data-toggle="tab" onclick="hides()"><span class="fa fa-briefcase "> Related Cases</span></a>
                                    </li>
                                    <li><a href="#3a" data-toggle="tab" onclick="hides()"><span class="fa fa-users "> People Involved</span></a>
                                    </li>
                                    <li><a href="#4a" data-toggle="tab" onclick="hides()" ><span class="fa fa-user "> Person Of Interest</span></a>
                                    </li>
                      <!--------------------- -------->
                                    <li><a href="#5a" data-toggle="tab" onclick="hides()"><span class="fa fa-folder-open-o "> Case Activities</span></a>
                                    </li>

                                    <li><a href="#6a" data-toggle="tab" onclick="hides()"><span class="fa fa-file-text-o"> Case Notes</span> </a>
                                    </li>

                                    <li><a href="#7a" data-toggle="tab" onclick="hides()"><span class="fa fa-paste "> Case Attachments</span></a>
                                    </li>

                                </ul>

                                <hr class="whiter m-t-20">
                                <hr class="whiter m-b-20">

                            </div>

                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 bhoechie-tab-menu" id="side_navs">
                                <div class="list-group">
                                    <a id="case" disabled  style="border: none;cursor: hand" class="list-group-item text-center active">

                                    </a>
                                    <a href="#" class="list-group-item text-center">
                                        <h5 class="glyphicon glyphicon-folder-open"></h5><br/>Allocate Case
                                    </a>
                                    <a href="#" class="list-group-item text-center">
                                        <h5 class="glyphicon glyphicon-ok-sign"></h5><br/>Accept Case
                                    </a>
                                    <a href="#" class="list-group-item text-center">
                                        <h5 class="glyphicon glyphicon-log-out"></h5><br/>Refer Case
                                    </a>
                                    <a href="#" class="list-group-item text-center">
                                        <h5 class="glyphicon glyphicon-plus-sign"></h5><br/>Add Case Note
                                    </a>
                                    <a href="#" class="list-group-item text-center">
                                        <h4 class="glyphicon glyphicon-paperclip"></h4><br/>Attach File
                                    </a>
                                    <a href="#" class="list-group-item text-center">
                                        <h4 class="glyphicon glyphicon-off"></h4><br/>Close Case
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
                                <!-- flight section -->
                            {{--<div class="bhoechie-tab-content active">--}}
                            {{--<div class="tab-pane active" id="1a">--}}
                            {{--<div id="caseNotesNotification"></div>--}}
                            {{--{!! Form::open(['url' => '#', 'method' => 'post', 'class' => 'form-horizontal', 'id'=>"caseProfileForm" ]) !!}--}}
                            {{--{!! Form::hidden('caseID',NULL,['id' => 'caseID']) !!}--}}
                            {{--{!! Form::hidden('userID',NULL,['id' => 'userID']) !!}--}}
                            {{--<div class="form-group">--}}
                            {{--{!! Form::label('Case Number', 'Case Number', array('class' => 'col-md-3 control-label')) !!}--}}
                            {{--<div class="col-md-6">--}}
                            {{--{!! Form::text('id',NULL,['class' => 'form-control input-sm','id' => 'id','disabled' => 'disabled']) !!}--}}
                            {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="form-group">--}}
                            {{--{!! Form::label('Date received', 'Date received', array('class' => 'col-md-3 control-label')) !!}--}}
                            {{--<div class="col-md-6">--}}
                            {{--{!! Form::text('created_at',NULL,['class' => 'form-control input-sm','id' => 'created_at','disabled' => 'disabled']) !!}--}}
                            {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="form-group">--}}
                            {{--{!! Form::label('Date booked out', 'Date booked out', array('class' => 'col-md-3 control-label')) !!}--}}
                            {{--<div class="col-md-6">--}}
                            {{--{!! Form::text('created_at',NULL,['class' => 'form-control input-sm','id' => 'created_at','disabled' => 'disabled']) !!}--}}
                            {{--</div>--}}
                            {{--</div>--}}


                            {{--<div class="form-group">--}}
                            {{--{!! Form::label('Commencement date', 'Commencement date', array('class' => 'col-md-3 control-label')) !!}--}}
                            {{--<div class="col-md-6">--}}
                            {{--{!! Form::text('created_at',NULL,['class' => 'form-control input-sm','id' => 'created_at','disabled' => 'disabled']) !!}--}}
                            {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="form-group">--}}
                            {{--{!! Form::label('Last Activity Datetime', 'Last Activity Datetime', array('class' => 'col-md-3 control-label')) !!}--}}
                            {{--<div class="col-md-6">--}}
                            {{--{!! Form::text('last_at',NULL,['class' => 'form-control input-sm','id' => 'last_at','disabled' => 'disabled']) !!}--}}
                            {{--</div>--}}
                            {{--</div>--}}


                            {{--<div class="form-group">--}}
                            {{--{!! Form::label('Description', 'Description', array('class' => 'col-md-3 control-label','disabled' => 'disabled')) !!}--}}
                            {{--<div class="col-md-6">--}}

                            {{--{!! Form::textarea('description', null, ['class' => 'form-control input-sm','id' => 'description','size' => '30x5','disabled' => 'disabled']) !!}--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                            {{--{!! Form::label('Client Name', 'Client Name', array('class' => 'col-md-3 control-label')) !!}--}}
                            {{--<div class="col-md-6">--}}
                            {{--{!! Form::text('household',NULL,['class' => 'form-control input-sm','id' => 'household','disabled' => 'disabled']) !!}--}}
                            {{--<div  id="launchUpdateUserModalHouseID" class="hidden">--}}
                            {{--<a class="btn btn-xs btn-alt" id="launchUpdateUserModalHouse"  data-toggle="modal" data-id onClick="launchUpdateUserModal($(this).data('id'));" data-target=".modalEditUser">View More</a>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                            {{--{!! Form::label('Client Cellphone', 'Client Cellphone', array('class' => 'col-md-3 control-label')) !!}--}}
                            {{--<div class="col-md-6">--}}
                            {{--{!! Form::text('householdCell',NULL,['class' => 'form-control input-sm','id' => 'householdCell','disabled' => 'disabled']) !!}--}}

                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                            {{--{!! Form::label('Client reference number', 'Client reference number', array('class' => 'col-md-3 control-label')) !!}--}}
                            {{--<div class="col-md-6">--}}
                            {{--{!! Form::text('client_reference_number',NULL,['class' => 'form-control input-sm','id' => 'client_reference_number','disabled' => 'disabled']) !!}--}}

                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                            {{--{!! Form::label('SAPS Number', 'SAPS Number', array('class' => 'col-md-3 control-label')) !!}--}}
                            {{--<div class="col-md-6">--}}
                            {{--{!! Form::text('sapc_number',NULL,['class' => 'form-control input-sm','id' => 'sapc_number','disabled' => 'disabled']) !!}--}}

                            {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="form-group">--}}
                            {{--{!! Form::label('SAPS Station', 'SAPS Station', array('class' => 'col-md-3 control-label')) !!}--}}
                            {{--<div class="col-md-6">--}}
                            {{--{!! Form::text('saps_station',NULL,['class' => 'form-control input-sm','id' => 'saps_station','disabled' => 'disabled']) !!}--}}

                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                            {{--{!! Form::label('Investigation Officer', 'Investigation Officer', array('class' => 'col-md-3 control-label')) !!}--}}
                            {{--<div class="col-md-6">--}}
                            {{--{!! Form::text('investigation_officer',NULL,['class' => 'form-control input-sm','id' => 'investigation_officer','disabled' => 'disabled']) !!}--}}

                            {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="form-group">--}}
                            {{--{!! Form::label('Investigation Cellphone', 'Investigation Cellphone', array('class' => 'col-md-3 control-label')) !!}--}}
                            {{--<div class="col-md-6">--}}
                            {{--{!! Form::text('investigation_cell',NULL,['class' => 'form-control input-sm','id' => 'investigation_cell','disabled' => 'disabled']) !!}--}}
                            {{--<div id = "hse_error_saps_investigation_cellphone"></div>--}}
                            {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="form-group">--}}
                            {{--{!! Form::label('Investigation Email', 'Investigation Email', array('class' => 'col-md-3 control-label')) !!}--}}
                            {{--<div class="col-md-6">--}}
                            {{--{!! Form::text('investigation_email',NULL,['class' => 'form-control input-sm','id' => 'investigation_email','disabled' => 'disabled']) !!}--}}
                            {{--<div id = "hse_error_saps_investigation_email"></div>--}}
                            {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="form-group">--}}
                            {{--{!! Form::label('Investigation Note', 'Investigation Note', array('class' => 'col-md-3 control-label')) !!}--}}
                            {{--<div class="col-md-6">--}}
                            {{--{!! Form::text('investigation_note',NULL,['class' => 'form-control input-sm','id' => 'investigation_note','disabled' => 'disabled']) !!}--}}
                            {{--<div id = "hse_error_saps_investigation_note"></div>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                            {{--{!! Form::label('Case Type', 'Case Type', array('class' => 'col-md-3 control-label')) !!}--}}
                            {{--<div class="col-md-6">--}}
                            {{--{!! Form::text('case_type',NULL,['class' => 'form-control input-sm','id' => 'case_type','disabled' => 'disabled']) !!}--}}

                            {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="form-group">--}}
                            {{--{!! Form::label('Case Sub Type', 'Case Sub Type', array('class' => 'col-md-3 control-label')) !!}--}}
                            {{--<div class="col-md-6">--}}
                            {{--{!! Form::text('case_sub_type',NULL,['class' => 'form-control input-sm','id' => 'case_sub_type','disabled' => 'disabled']) !!}--}}

                            {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="form-group">--}}
                            {{--{!! Form::label('Street Number', 'Street Number', array('class' => 'col-md-3 control-label')) !!}--}}
                            {{--<div class="col-md-6">--}}
                            {{--{!! Form::text('street_number',NULL,['class' => 'form-control input-sm','id' => 'street_number','disabled' => 'disabled']) !!}--}}

                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                            {{--{!! Form::label('Route', 'Route', array('class' => 'col-md-3 control-label')) !!}--}}
                            {{--<div class="col-md-6">--}}
                            {{--{!! Form::text('route',NULL,['class' => 'form-control input-sm','id' => 'route','disabled' => 'disabled']) !!}--}}

                            {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="form-group">--}}
                            {{--{!! Form::label('Locality', 'Locality', array('class' => 'col-md-3 control-label')) !!}--}}
                            {{--<div class="col-md-6">--}}
                            {{--{!! Form::text('locality',NULL,['class' => 'form-control input-sm','id' => 'locality','disabled' => 'disabled']) !!}--}}

                            {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="form-group">--}}
                            {{--{!! Form::label('Area', 'Area', array('class' => 'col-md-3 control-label')) !!}--}}
                            {{--<div class="col-md-6">--}}
                            {{--{!! Form::text('administrative_area_level_1',NULL,['class' => 'form-control input-sm','id' => 'administrative_area_level_1','disabled' => 'disabled']) !!}--}}

                            {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="form-group">--}}
                            {{--{!! Form::label('Postal Code', 'Postal Code', array('class' => 'col-md-3 control-label')) !!}--}}
                            {{--<div class="col-md-6">--}}
                            {{--{!! Form::text('postal_code',NULL,['class' => 'form-control input-sm','id' => 'postal_code','disabled' => 'disabled']) !!}--}}

                            {{--</div>--}}
                            {{--</div>s--}}


                            {{--<div class="form-group">--}}
                            {{--{!! Form::label('Country', 'Country', array('class' => 'col-md-3 control-label')) !!}--}}
                            {{--<div class="col-md-6">--}}
                            {{--{!! Form::text('country',NULL,['class' => 'form-control input-sm','id' => 'country','disabled' => 'disabled']) !!}--}}

                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                            {{--{!! Form::label('Status', 'Status', array('class' => 'col-md-3 control-label')) !!}--}}
                            {{--<div class="col-md-6">--}}
                            {{--{!! Form::text('status',NULL,['class' => 'form-control input-sm','id' => 'status','disabled' => 'disabled']) !!}--}}

                            {{--</div>--}}
                            {{--</div>--}}


                            {{--<div class="form-group">--}}
                            {{--{!! Form::label('Captured by', 'Captured by', array('class' => 'col-md-3 control-label')) !!}--}}
                            {{--<div class="col-md-6">--}}
                            {{--{!! Form::text('reporter',NULL,['class' => 'form-control input-sm','id' => 'reporter','disabled' => 'disabled']) !!}--}}
                            {{--<a class="btn btn-xs btn-alt" data-toggle="modal" data-id  id="launchUpdateUserModalField" onClick="launchUpdateUserModal($(this).data('id'));" data-target=".modalEditUser">View More</a>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                            {{--{!! Form::label('Cellphone', 'Cellphone', array('class' => 'col-md-3 control-label')) !!}--}}
                            {{--<div class="col-md-6">--}}
                            {{--{!! Form::text('reporterCell',NULL,['class' => 'form-control input-sm','id' => 'reporterCell','disabled' => 'disabled']) !!}--}}

                            {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="form-group">--}}
                            {{--<div class="">--}}
                            {{--{!! Form::label('Report Image', 'Report Image', array('class' => 'col-md-3 control-label')) !!}--}}
                            {{--<div class="col-md-6">--}}
                            {{--<a data-rel="gallery" id="CaseImageA" class="pirobox_gall img-popup" title="">--}}
                            {{--<img src="#" alt="" class="superbox-img" id="CaseImage" width="220">--}}
                            {{--</a>--}}
                            {{--</div>--}}

                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            <!-- train section -->
                                <div class="bhoechie-tab-content active" id="top_navs_action" >

                                    <center>

                                        <div class="row">

                                            <div class="btn-group-vertical">
                                                <a id="editCaseDiv" data-toggle="modal" onclick data-target="modalCaseReport"></a>
                                                @if(isset($userAllocateCasesPermission) && $userAllocateCasesPermission->permission_id =='22')
                                                    <a class="btn btn-lg btn-alt" style="margin-top: 20%;" data-toggle="modal" onClick="launchReferModal('Allocate');" data-target=".modalReferCase">Allocate Case</a>
                                                @endif

                                                {{--@if(isset($userCreateCasesPermission) && $userCreateCasesPermission->permission_id =='21')--}}

                                                {{--<a id="createCaseDiv" class="btn btn-xs btn-alt hidden" style="margin-top: 20%;" data-toggle="modal" onclick="launchCreateCaseModal()" data-target=".modalCreateCase">Create Case</a>--}}

                                                {{--@endif--}}


                                                @if(isset($userAcceptCasesPermission) && $userAcceptCasesPermission->permission_id =='23')


                                                    <a id='acceptCaseClass' class="btn btn-xs btn-alt" style="margin-top: 20%;" onClick="acceptCase()">Accept Case</a>

                                                @endif


                                                @if(isset($userReferCasesPermission) && $userReferCasesPermission->permission_id =='24')


                                                    <a class="btn btn-lg btn-alt col-md-1" data-toggle="modal" style="margin-top: 20%;" onClick="launchReferModal('Refer');" data-target=".modalReferCase">Refer Case</a>

                                                @endif
                                                @if(isset($userAddCasesNotesPermission) && $userAddCasesNotesPermission->permission_id =='25')

                                                    <a class="btn btn-xs btn-alt col-md-1" style="margin-top: 20%;" onClick="launchCaseNotesModal();">Add Case Note</a>
                                                @endif
                                                @if(isset($userAddCasesFilesPermission) && $userAddCasesFilesPermission->permission_id =='26')

                                                    <a class="btn btn-xs btn-alt" style="margin-top: 20%;" onClick="launchCaseFilesModal();">Attach File</a>
                                                @endif
                                                @if(isset($userViewWorkFlowPermission) && $userViewWorkFlowPermission->permission_id =='27')


                                                    <a  id="viewWorkFlow" class="btn btn-xs btn-alt hidden" style="margin-top: 20%;" onClick="launchWorkFlow();">View WorkFlow</a>

                                                @endif

                                                @if(isset($userCloseCasePermission) && $userCloseCasePermission->permission_id =='28')

                                                    <a id='closeCaseClass' class="btn btn-xs btn-alt" style="margin-top: 20%;" onClick="closeCase()">Close Case</a>
                                                @endif
                                                @if(isset($userRequestCaseClosurePermission) && $userRequestCaseClosurePermission->permission_id =='29')

                                                    <a id='requestCaseClosureClass' class="btn btn-lg btn-alt" style="margin-top: 20%;" onClick="launchRequestCaseClosureModal();">Request Case Closure</a>

                                                @endif

                                                <img src="a.png" style="margin-bottom: 50%; visibility: hidden;">

                                            </div>

                                            {{--<div class="col-md-10" style="border-left: 1px solid white; margin-top: 2%; max-height: calc(100vh - 10px); overflow-y: auto;">--}}

                                            @foreach($case as $case)




                                                <div class="tab-content clearfix">

                                                    <div class="tab-pane active" id="1a">
                                                        <div id="caseNotesNotification"></div>
                                                        {!! Form::open(['url' => '#', 'method' => 'post', 'class' => 'form-horizontal', 'id'=>"caseProfileForm" ]) !!}
                                                        {!! Form::hidden('caseID',$case->id,['id' => 'caseID']) !!}
                                                        {!! Form::hidden('userID',Null,['id' => 'userID']) !!}


                                                        <div class="row">
                                                            <div class="col-md-6">

                                                                <div class="form-group">
                                                                    {!! Form::label('Case Number', 'Case Number', array('class' => 'col-md-6 control-label')) !!}
                                                                    <div class="col-md-6">
                                                                        {!! Form::text('id',$case->id,['class' => 'form-control input-sm','id' => 'id','disabled' => 'disabled']) !!}
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    {!! Form::label('Date received', 'Date received', array('class' => 'col-md-6 control-label')) !!}
                                                                    <div class="col-md-6">
                                                                        {!! Form::text('created_at',$case->created_at,['class' => 'form-control input-sm','id' => 'created_at','disabled' => 'disabled']) !!}
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    {!! Form::label('Date booked out', 'Date booked out', array('class' => 'col-md-6 control-label')) !!}
                                                                    <div class="col-md-6">
                                                                        {!! Form::text('created_at',$case->created_at,['class' => 'form-control input-sm','id' => 'created_at','disabled' => 'disabled']) !!}
                                                                    </div>
                                                                </div>


                                                                <div class="form-group">
                                                                    {!! Form::label('Commencement date', 'Commencement date', array('class' => 'col-md-6 control-label')) !!}
                                                                    <div class="col-md-6">
                                                                        {!! Form::text('created_at',$case->created_at,['class' => 'form-control input-sm','id' => 'created_at','disabled' => 'disabled']) !!}
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    {!! Form::label('Last Activity Datetime', 'Last Activity Datetime', array('class' => 'col-md-6 control-label')) !!}
                                                                    <div class="col-md-6">
                                                                        {!! Form::text('last_at',$case->last_at,['class' => 'form-control input-sm','id' => 'last_at','disabled' => 'disabled']) !!}
                                                                    </div>
                                                                </div>


                                                                <div class="form-group">
                                                                    {!! Form::label('Description', 'Description', array('class' => 'col-md-6 control-label','disabled' => 'disabled')) !!}
                                                                    <div class="col-md-6">

                                                                        {!! Form::textarea('description', $case->description, ['class' => 'form-control input-sm','id' => 'description','size' => '30x5','disabled' => 'disabled']) !!}
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    {!! Form::label('Client Name', 'Client Name', array('class' => 'col-md-6 control-label')) !!}
                                                                    <div class="col-md-6">
                                                                        {!! Form::text('household',$case->household,['class' => 'form-control input-sm','id' => 'household','disabled' => 'disabled']) !!}
                                                                        <div  id="launchUpdateUserModalHouseID" class="hidden">
                                                                            <a class="btn btn-xs btn-alt" id="launchUpdateUserModalHouse"  data-toggle="modal" data-id onClick="launchUpdateUserModal($(this).data('id'));" data-target=".modalEditUser">View More</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    {!! Form::label('Client Cellphone', 'Client Cellphone', array('class' => 'col-md-6 control-label')) !!}
                                                                    <div class="col-md-6">
                                                                        {!! Form::text('householdCell',$case->householdCell,['class' => 'form-control input-sm','id' => 'householdCell','disabled' => 'disabled']) !!}

                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    {!! Form::label('Client reference number', 'Client reference number', array('class' => 'col-md-6 control-label')) !!}
                                                                    <div class="col-md-6">
                                                                        {!! Form::text('client_reference_number',$case->client_reference_number,['class' => 'form-control input-sm','id' => 'client_reference_number','disabled' => 'disabled']) !!}

                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    {!! Form::label('SAPS Number', 'SAPS Number', array('class' => 'col-md-6 control-label')) !!}
                                                                    <div class="col-md-6">
                                                                        {!! Form::text('sapc_number',$case->saps_case_number,['class' => 'form-control input-sm','id' => 'sapc_number','disabled' => 'disabled']) !!}

                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    {!! Form::label('SAPS Station', 'SAPS Station', array('class' => 'col-md-6 control-label')) !!}
                                                                    <div class="col-md-6">
                                                                        {!! Form::text('saps_station',$case->saps_station,['class' => 'form-control input-sm','id' => 'saps_station','disabled' => 'disabled']) !!}

                                                                    </div>
                                                                </div>



                                                                <div class="form-group">
                                                                    {!! Form::label('Investigation Officer', 'Investigation Officer', array('class' => 'col-md-6 control-label')) !!}
                                                                    <div class="col-md-6">
                                                                        {!! Form::text('investigation_officer',$case->investigation_officer,['class' => 'form-control input-sm','id' => 'investigation_officer','disabled' => 'disabled']) !!}

                                                                    </div>
                                                                </div>




                                                            </div>




                                                            <div class="col-md-6">




                                                                <div class="form-group">
                                                                    {!! Form::label('Investigation Cellphone', 'Investigation Cellphone', array('class' => 'col-md-6 control-label')) !!}
                                                                    <div class="col-md-6">
                                                                        {!! Form::text('investigation_cell',$case->investigation_cell,['class' => 'form-control input-sm','id' => 'investigation_cell','disabled' => 'disabled']) !!}
                                                                        <div id = "hse_error_saps_investigation_cellphone"></div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    {!! Form::label('Investigation Email', 'Investigation Email', array('class' => 'col-md-6 control-label')) !!}
                                                                    <div class="col-md-6">
                                                                        {!! Form::text('investigation_email',$case->investigation_cell,['class' => 'form-control input-sm','id' => 'investigation_email','disabled' => 'disabled']) !!}
                                                                        <div id = "hse_error_saps_investigation_email"></div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    {!! Form::label('Investigation Note', 'Investigation Note', array('class' => 'col-md-6 control-label')) !!}
                                                                    <div class="col-md-6">
                                                                        {!! Form::text('investigation_note',$case->investigation_note,['class' => 'form-control input-sm','id' => 'investigation_note','disabled' => 'disabled']) !!}
                                                                        <div id = "hse_error_saps_investigation_note"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    {!! Form::label('Case Type', 'Case Type', array('class' => 'col-md-6 control-label')) !!}
                                                                    <div class="col-md-6">
                                                                        {!! Form::text('case_type',$case->case_type,['class' => 'form-control input-sm','id' => 'case_type','disabled' => 'disabled']) !!}

                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    {!! Form::label('Case Sub Type', 'Case Sub Type', array('class' => 'col-md-6 control-label')) !!}
                                                                    <div class="col-md-6">
                                                                        {!! Form::text('case_sub_type', $case->case_sub_type,['class' => 'form-control input-sm','id' => 'case_sub_type','disabled' => 'disabled']) !!}

                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    {!! Form::label('Street Number', 'Street Number', array('class' => 'col-md-6 control-label')) !!}
                                                                    <div class="col-md-6">
                                                                        {!! Form::text('street_number',$case->street_number,['class' => 'form-control input-sm','id' => 'street_number','disabled' => 'disabled']) !!}

                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    {!! Form::label('Route', 'Route', array('class' => 'col-md-6 control-label')) !!}
                                                                    <div class="col-md-6">
                                                                        {!! Form::text('route',$case->route,['class' => 'form-control input-sm','id' => 'route','disabled' => 'disabled']) !!}

                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    {!! Form::label('Locality', 'Locality', array('class' => 'col-md-6 control-label')) !!}
                                                                    <div class="col-md-6">
                                                                        {!! Form::text('locality',$case->locality,['class' => 'form-control input-sm','id' => 'locality','disabled' => 'disabled']) !!}

                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    {!! Form::label('Area', 'Area', array('class' => 'col-md-6 control-label')) !!}
                                                                    <div class="col-md-6">
                                                                        {!! Form::text('administrative_area_level_1',$case->administrative_area_level_1,['class' => 'form-control input-sm','id' => 'administrative_area_level_1','disabled' => 'disabled']) !!}

                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    {!! Form::label('Postal Code', 'Postal Code', array('class' => 'col-md-6 control-label')) !!}
                                                                    <div class="col-md-6">
                                                                        {!! Form::text('postal_code',$case->postal_code,['class' => 'form-control input-sm','id' => 'postal_code','disabled' => 'disabled']) !!}

                                                                    </div>
                                                                </div>


                                                                <div class="form-group">
                                                                    {!! Form::label('Country', 'Country', array('class' => 'col-md-6 control-label')) !!}
                                                                    <div class="col-md-6">
                                                                        {!! Form::text('country',$case->country,['class' => 'form-control input-sm','id' => 'country','disabled' => 'disabled']) !!}

                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    {!! Form::label('Status', 'Status', array('class' => 'col-md-6 control-label')) !!}
                                                                    <div class="col-md-6">
                                                                        {!! Form::text('status',$case->status,['class' => 'form-control input-sm','id' => 'status','disabled' => 'disabled']) !!}

                                                                    </div>
                                                                </div>


                                                                <div class="form-group">
                                                                    {!! Form::label('Captured by', 'Captured by', array('class' => 'col-md-6 control-label')) !!}
                                                                    <div class="col-md-6">
                                                                        {!! Form::text('reporter',$case->reporter,['class' => 'form-control input-sm','id' => 'reporter','disabled' => 'disabled']) !!}
                                                                        <a class="btn btn-xs btn-alt" data-toggle="modal" data-id  id="launchUpdateUserModalField" onClick="launchUpdateUserModal($(this).data('id'));" data-target=".modalEditUser">View More</a>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    {!! Form::label('Cellphone', 'Cellphone', array('class' => 'col-md-6 control-label')) !!}
                                                                    <div class="col-md-6">
                                                                        {!! Form::text('reporterCell',$case->reporterCell,['class' => 'form-control input-sm','id' => 'reporterCell','disabled' => 'disabled']) !!}

                                                                    </div>
                                                                </div>

                                                                <div class="form-group">

                                                                    {!! Form::label('Report Image', 'Report Image', array('class' => 'col-md-6 control-label')) !!}
                                                                    <div class="col-md-6">
                                                                        <a data-rel="gallery" id="CaseImageA" class="pirobox_gall img-popup" title="">
                                                                            <img src="{{$case->img_url}}" alt="" class="superbox-img" id="CaseImage" width="220">
                                                                        </a>
                                                                    </div>


                                                                </div>

                                                            </div>
                                                        </div>

                                                    </div>



                                                    <div class="tab-pane" id="0a">
                                                        <div class="block-area" id="responsiveTable">

                                                            @if(Session::has('successReferral1'))
                                                                <div class="alert alert-info alert-dismissable fade in">
                                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                                    {{ Session::get('successReferral1') }}
                                                                </div>
                                                            @endif
                                                            <div class="table-responsive overflow">
                                                                <table style="width:928px;" class="table tile table-striped" id="caseActivities">
                                                                    <thead>
                                                                    <tr>
                                                                        <th>Allocated</th>
                                                                        <th>activity</th>
                                                                    </tr>
                                                                    </thead>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    @endforeach

                                                    {{-- end  cases   from  compact --}}
                                                    <div class="tab-pane" id="2a">
                                                        <table style="width:928px;" class="table tile table-striped" id="relatedCasesTable">
                                                            <thead>
                                                            <tr>
                                                                <th>Case</th>
                                                                <th>Created at</th>
                                                                <th>Description</th>
                                                                <th>Relation</th>
                                                            </tr>
                                                            </thead>
                                                        </table>
                                                    </div>

                                                    <div class="tab-pane" id="3a">
                                                        <div class="block-area" id="responsiveTable">

                                                            @if(Session::has('successReferral2'))
                                                                <div class="alert alert-info alert-dismissable fade in">
                                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                                    {{ Session::get('successReferral2') }}
                                                                </div>
                                                            @endif
                                                            <div class="table-responsive">
                                                                <table style="width:928px;" class="table tile table-striped dataTable no-footer" id="caseResponders">
                                                                    <thead>
                                                                    <tr>
                                                                        <th>Type</th>
                                                                        <th>Name</th>
                                                                        <th>Accepted</th>
                                                                        <th>Actions</th>
                                                                    </tr>
                                                                    </thead>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="tab-pane" id="4a">
                                                        @if(isset($userAddPoiPermission) && $userAddPoiPermission->permission_id =='30')

                                                            <a class="btn btn-xs btn-alt" onClick="launchPersonOfInterestModal();">Add Person</a>

                                                    @endif
                                                    <!-- Responsive Table -->
                                                        <div class="block-area" id="responsiveTable">
                                                            <div class="table-responsive">
                                                                <table style="width:928px;" class="table tile table-striped dataTable no-footer" id="pointListTable">
                                                                    <thead>
                                                                    <tr>
                                                                        <th>First Name</th>
                                                                        <th>Surname</th>
                                                                        <th>Cellphone</th>
                                                                        <th>Actions</th>

                                                                    </tr>
                                                                    </thead>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="tab-pane" id="5a">
                                                        <div class="block-area" id="responsiveTable">

                                                            @if(Session::has('successReferral1'))
                                                                <div class="alert alert-info alert-dismissable fade in">
                                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                                    {{ Session::get('successReferral1') }}
                                                                </div>
                                                            @endif
                                                            <div class="table-responsive overflow">
                                                                <table style="width:928px;" class="table tile table-striped" id="caseActivities">
                                                                    <thead>
                                                                    <tr>
                                                                        <th>Created At</th>
                                                                        <th>activity</th>
                                                                    </tr>
                                                                    </thead>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="tab-pane" id="6a">
                                                        <div class="block-area" id="responsiveTable">


                                                            <div class="table-responsive overflow">
                                                                <table style="width:928px;" class="table tile table-striped" id="caseNotesTable">
                                                                    <thead>
                                                                    <tr>
                                                                        <th>Created at</th>
                                                                        <th>Author</th>
                                                                        <th>Note</th>
                                                                    </tr>
                                                                    </thead>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="tab-pane" id="7a">
                                                        <div class="form-group">
                                                            {!! Form::label('Attach File', 'Case Attachments', array('class' => 'col-md-3 control-label')) !!}


                                                        </div>

                                                        <div id="fileManager"></div>


                                                        {!! Form::close() !!}
                                                    </div>
                                                </div>







                                        </div>

                                    </center>

                                </div>

                                <!-- hotel search -->


                                <div class="bhoechie-tab-content"  >
                                    <div id="side_contents">
                                    <center>
                                        <h1 class="glyphicon glyphicon-home" style="font-size:12em;color:#55518a"></h1>
                                        <h2 style="margin-top: 0;color:#55518a">Cooming Soon</h2>
                                        <h3 style="margin-top: 0;color:#55518a">Hotel Directory</h3>
                                    </center>
                                    </div>
                                </div>
                                <div class="bhoechie-tab-content">
                                    <div id="side_contents2">
                                    <center>
                                        <h1 class="glyphicon glyphicon-cutlery" style="font-size:12em;color:#55518a"></h1>
                                        <h2 style="margin-top: 0;color:#55518a">Cooming Soon</h2>
                                        <h3 style="margin-top: 0;color:#55518a">Restaurant Diirectory</h3>
                                    </center>
                                    </div>
                                </div>
                                <div class="bhoechie-tab-content">
                                    <div id="side_contents3">
                                    <center>
                                        <h1 class="glyphicon glyphicon-credit-card" style="font-size:12em;color:#55518a"></h1>
                                        <h2 style="margin-top: 0;color:#55518a">Cooming Soon</h2>
                                        <h3 style="margin-top: 0;color:#55518a">Credit Card</h3>
                                    </center>
                                </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                {{--<div class="modal-body">--}}

                {{--<div id="exTab1" class="container">--}}
                {{--<ul  class="nav nav-pills nav-justified">--}}
                {{--<li class="active">--}}
                {{--<a  href="#1a" data-toggle="tab">Case Profile</a>--}}
                {{--</li>--}}
                {{--<li><a href="#2a" data-toggle="tab">Related Cases</a>--}}
                {{--</li>--}}
                {{--<li><a href="#3a" data-toggle="tab">People Involved</a>--}}
                {{--</li>--}}
                {{--<li><a href="#4a" data-toggle="tab">Person Of Interest</a>--}}
                {{--</li>--}}

                {{--<!--------------------- -------->--}}
                {{--<li><a href="#5a" data-toggle="tab">Case Activities</a>--}}
                {{--</li>--}}

                {{--<li><a href="#6a" data-toggle="tab">Case Notes</a>--}}
                {{--</li>--}}

                {{--<li><a href="#7a" data-toggle="tab">Case Attachments</a>--}}
                {{--</li>--}}
                {{--</ul>--}}

                {{--<hr class="whiter m-t-20">--}}
                {{--<hr class="whiter m-b-20">--}}




                {{--<div class="row">--}}
                {{--<div class="col-md-2">--}}
                {{--<div class="btn-group-vertical">--}}
                {{--<a id="editCaseDiv" data-toggle="modal" onclick data-target=".modalCaseReport"></a>--}}
                {{--@if(isset($userAllocateCasesPermission) && $userAllocateCasesPermission->permission_id =='22')--}}
                {{--<a class="btn btn-lg btn-alt" style="margin-top: 20%;" data-toggle="modal" onClick="launchReferModal('Allocate');" data-target=".modalReferCase">Allocate Case</a>--}}
                {{--@endif--}}


                {{--@if(isset($userCreateCasesPermission) && $userCreateCasesPermission->permission_id =='21')--}}

                {{--<a id="createCaseDiv" class="btn btn-xs btn-alt hidden" style="margin-top: 20%;" data-toggle="modal" onclick="launchCreateCaseModal()" data-target=".modalCreateCase">Create Case</a>--}}

                {{--@endif--}}


                {{--@if(isset($userAcceptCasesPermission) && $userAcceptCasesPermission->permission_id =='23')--}}


                {{--<a id='acceptCaseClass' class="btn btn-xs btn-alt" style="margin-top: 20%;" onClick="acceptCase()">Accept Case</a>--}}

                {{--@endif--}}


                {{--@if(isset($userReferCasesPermission) && $userReferCasesPermission->permission_id =='24')--}}


                {{--<a class="btn btn-lg btn-alt col-md-1" data-toggle="modal" style="margin-top: 20%;" onClick="launchReferModal('Refer');" data-target=".modalReferCase">Refer Case</a>--}}

                {{--@endif--}}
                {{--@if(isset($userAddCasesNotesPermission) && $userAddCasesNotesPermission->permission_id =='25')--}}

                {{--<a class="btn btn-xs btn-alt col-md-1" style="margin-top: 20%;" onClick="launchCaseNotesModal();">Add Case Note</a>--}}
                {{--@endif--}}
                {{--@if(isset($userAddCasesFilesPermission) && $userAddCasesFilesPermission->permission_id =='26')--}}

                {{--<a class="btn btn-xs btn-alt" style="margin-top: 20%;" onClick="launchCaseFilesModal();">Attach File</a>--}}
                {{--@endif--}}
                {{--@if(isset($userViewWorkFlowPermission) && $userViewWorkFlowPermission->permission_id =='27')--}}


                {{--<a  id="viewWorkFlow" class="btn btn-xs btn-alt hidden" style="margin-top: 20%;" onClick="launchWorkFlow();">View WorkFlow</a>--}}

                {{--@endif--}}

                {{--@if(isset($userCloseCasePermission) && $userCloseCasePermission->permission_id =='28')--}}

                {{--<a id='closeCaseClass' class="btn btn-xs btn-alt" style="margin-top: 20%;" onClick="closeCase()">Close Case</a>--}}
                {{--@endif--}}
                {{--@if(isset($userRequestCaseClosurePermission) && $userRequestCaseClosurePermission->permission_id =='29')--}}

                {{--<a id='requestCaseClosureClass' class="btn btn-lg btn-alt" style="margin-top: 20%;" onClick="launchRequestCaseClosureModal();">Request Case Closure</a>--}}

                {{--@endif--}}

                {{--<img src="a.png" style="margin-bottom: 50%; visibility: hidden;">--}}
                {{--</div>--}}
                {{--</div>--}}

                {{--<div class="col-md-10" style="border-left: 1px solid white; margin-top: 2%; max-height: calc(100vh - 10px); overflow-y: auto;">--}}

                {{--@foreach($case as $case)--}}

                {{--<h1> </h1>--}}



                {{--<div class="tab-content clearfix">--}}

                {{--<div class="tab-pane active" id="1a">--}}
                {{--<div id="caseNotesNotification"></div>--}}
                {{--{!! Form::open(['url' => '#', 'method' => 'post', 'class' => 'form-horizontal', 'id'=>"caseProfileForm" ]) !!}--}}
                {{--{!! Form::hidden('caseID',$case->id,['id' => 'caseID']) !!}--}}
                {{--{!! Form::hidden('userID',Null,['id' => 'userID']) !!}--}}
                {{--<div class="form-group">--}}
                {{--{!! Form::label('Case Number', 'Case Number', array('class' => 'col-md-3 control-label')) !!}--}}
                {{--<div class="col-md-6">--}}
                {{--{!! Form::text('id',$case->id,['class' => 'form-control input-sm','id' => 'id','disabled' => 'disabled']) !!}--}}
                {{--</div>--}}
                {{--</div>--}}

                {{--<div class="form-group">--}}
                {{--{!! Form::label('Date received', 'Date received', array('class' => 'col-md-3 control-label')) !!}--}}
                {{--<div class="col-md-6">--}}
                {{--{!! Form::text('created_at',$case->created_at,['class' => 'form-control input-sm','id' => 'created_at','disabled' => 'disabled']) !!}--}}
                {{--</div>--}}
                {{--</div>--}}

                {{--<div class="form-group">--}}
                {{--{!! Form::label('Date booked out', 'Date booked out', array('class' => 'col-md-3 control-label')) !!}--}}
                {{--<div class="col-md-6">--}}
                {{--{!! Form::text('created_at',$case->created_at,['class' => 'form-control input-sm','id' => 'created_at','disabled' => 'disabled']) !!}--}}
                {{--</div>--}}
                {{--</div>--}}


                {{--<div class="form-group">--}}
                {{--{!! Form::label('Commencement date', 'Commencement date', array('class' => 'col-md-3 control-label')) !!}--}}
                {{--<div class="col-md-6">--}}
                {{--{!! Form::text('created_at',$case->created_at,['class' => 'form-control input-sm','id' => 'created_at','disabled' => 'disabled']) !!}--}}
                {{--</div>--}}
                {{--</div>--}}

                {{--<div class="form-group">--}}
                {{--{!! Form::label('Last Activity Datetime', 'Last Activity Datetime', array('class' => 'col-md-3 control-label')) !!}--}}
                {{--<div class="col-md-6">--}}
                {{--{!! Form::text('last_at',$case->last_at,['class' => 'form-control input-sm','id' => 'last_at','disabled' => 'disabled']) !!}--}}
                {{--</div>--}}
                {{--</div>--}}


                {{--<div class="form-group">--}}
                {{--{!! Form::label('Description', 'Description', array('class' => 'col-md-3 control-label','disabled' => 'disabled')) !!}--}}
                {{--<div class="col-md-6">--}}

                {{--{!! Form::textarea('description', $case->description, ['class' => 'form-control input-sm','id' => 'description','size' => '30x5','disabled' => 'disabled']) !!}--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                {{--{!! Form::label('Client Name', 'Client Name', array('class' => 'col-md-3 control-label')) !!}--}}
                {{--<div class="col-md-6">--}}
                {{--{!! Form::text('household',$case->household,['class' => 'form-control input-sm','id' => 'household','disabled' => 'disabled']) !!}--}}
                {{--<div  id="launchUpdateUserModalHouseID" class="hidden">--}}
                {{--<a class="btn btn-xs btn-alt" id="launchUpdateUserModalHouse"  data-toggle="modal" data-id onClick="launchUpdateUserModal($(this).data('id'));" data-target=".modalEditUser">View More</a>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                {{--{!! Form::label('Client Cellphone', 'Client Cellphone', array('class' => 'col-md-3 control-label')) !!}--}}
                {{--<div class="col-md-6">--}}
                {{--{!! Form::text('householdCell',$case->householdCell,['class' => 'form-control input-sm','id' => 'householdCell','disabled' => 'disabled']) !!}--}}

                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                {{--{!! Form::label('Client reference number', 'Client reference number', array('class' => 'col-md-3 control-label')) !!}--}}
                {{--<div class="col-md-6">--}}
                {{--{!! Form::text('client_reference_number',$case->client_reference_number,['class' => 'form-control input-sm','id' => 'client_reference_number','disabled' => 'disabled']) !!}--}}

                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                {{--{!! Form::label('SAPS Number', 'SAPS Number', array('class' => 'col-md-3 control-label')) !!}--}}
                {{--<div class="col-md-6">--}}
                {{--{!! Form::text('sapc_number',$case->saps_case_number,['class' => 'form-control input-sm','id' => 'sapc_number','disabled' => 'disabled']) !!}--}}

                {{--</div>--}}
                {{--</div>--}}

                {{--<div class="form-group">--}}
                {{--{!! Form::label('SAPS Station', 'SAPS Station', array('class' => 'col-md-3 control-label')) !!}--}}
                {{--<div class="col-md-6">--}}
                {{--{!! Form::text('saps_station',$case->saps_station,['class' => 'form-control input-sm','id' => 'saps_station','disabled' => 'disabled']) !!}--}}

                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                {{--{!! Form::label('Investigation Officer', 'Investigation Officer', array('class' => 'col-md-3 control-label')) !!}--}}
                {{--<div class="col-md-6">--}}
                {{--{!! Form::text('investigation_officer',$case->investigation_officer,['class' => 'form-control input-sm','id' => 'investigation_officer','disabled' => 'disabled']) !!}--}}

                {{--</div>--}}
                {{--</div>--}}

                {{--<div class="form-group">--}}
                {{--{!! Form::label('Investigation Cellphone', 'Investigation Cellphone', array('class' => 'col-md-3 control-label')) !!}--}}
                {{--<div class="col-md-6">--}}
                {{--{!! Form::text('investigation_cell',$case->investigation_cell,['class' => 'form-control input-sm','id' => 'investigation_cell','disabled' => 'disabled']) !!}--}}
                {{--<div id = "hse_error_saps_investigation_cellphone"></div>--}}
                {{--</div>--}}
                {{--</div>--}}

                {{--<div class="form-group">--}}
                {{--{!! Form::label('Investigation Email', 'Investigation Email', array('class' => 'col-md-3 control-label')) !!}--}}
                {{--<div class="col-md-6">--}}
                {{--{!! Form::text('investigation_email',$case->investigation_cell,['class' => 'form-control input-sm','id' => 'investigation_email','disabled' => 'disabled']) !!}--}}
                {{--<div id = "hse_error_saps_investigation_email"></div>--}}
                {{--</div>--}}
                {{--</div>--}}

                {{--<div class="form-group">--}}
                {{--{!! Form::label('Investigation Note', 'Investigation Note', array('class' => 'col-md-3 control-label')) !!}--}}
                {{--<div class="col-md-6">--}}
                {{--{!! Form::text('investigation_note',$case->investigation_note,['class' => 'form-control input-sm','id' => 'investigation_note','disabled' => 'disabled']) !!}--}}
                {{--<div id = "hse_error_saps_investigation_note"></div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                {{--{!! Form::label('Case Type', 'Case Type', array('class' => 'col-md-3 control-label')) !!}--}}
                {{--<div class="col-md-6">--}}
                {{--{!! Form::text('case_type',$case->case_type,['class' => 'form-control input-sm','id' => 'case_type','disabled' => 'disabled']) !!}--}}

                {{--</div>--}}
                {{--</div>--}}

                {{--<div class="form-group">--}}
                {{--{!! Form::label('Case Sub Type', 'Case Sub Type', array('class' => 'col-md-3 control-label')) !!}--}}
                {{--<div class="col-md-6">--}}
                {{--{!! Form::text('case_sub_type', $case->case_sub_type,['class' => 'form-control input-sm','id' => 'case_sub_type','disabled' => 'disabled']) !!}--}}

                {{--</div>--}}
                {{--</div>--}}

                {{--<div class="form-group">--}}
                {{--{!! Form::label('Street Number', 'Street Number', array('class' => 'col-md-3 control-label')) !!}--}}
                {{--<div class="col-md-6">--}}
                {{--{!! Form::text('street_number',$case->street_number,['class' => 'form-control input-sm','id' => 'street_number','disabled' => 'disabled']) !!}--}}

                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                {{--{!! Form::label('Route', 'Route', array('class' => 'col-md-3 control-label')) !!}--}}
                {{--<div class="col-md-6">--}}
                {{--{!! Form::text('route',$case->route,['class' => 'form-control input-sm','id' => 'route','disabled' => 'disabled']) !!}--}}

                {{--</div>--}}
                {{--</div>--}}

                {{--<div class="form-group">--}}
                {{--{!! Form::label('Locality', 'Locality', array('class' => 'col-md-3 control-label')) !!}--}}
                {{--<div class="col-md-6">--}}
                {{--{!! Form::text('locality',$case->locality,['class' => 'form-control input-sm','id' => 'locality','disabled' => 'disabled']) !!}--}}

                {{--</div>--}}
                {{--</div>--}}

                {{--<div class="form-group">--}}
                {{--{!! Form::label('Area', 'Area', array('class' => 'col-md-3 control-label')) !!}--}}
                {{--<div class="col-md-6">--}}
                {{--{!! Form::text('administrative_area_level_1',$case->administrative_area_level_1,['class' => 'form-control input-sm','id' => 'administrative_area_level_1','disabled' => 'disabled']) !!}--}}

                {{--</div>--}}
                {{--</div>--}}

                {{--<div class="form-group">--}}
                {{--{!! Form::label('Postal Code', 'Postal Code', array('class' => 'col-md-3 control-label')) !!}--}}
                {{--<div class="col-md-6">--}}
                {{--{!! Form::text('postal_code',$case->postal_code,['class' => 'form-control input-sm','id' => 'postal_code','disabled' => 'disabled']) !!}--}}

                {{--</div>--}}
                {{--</div>s--}}


                {{--<div class="form-group">--}}
                {{--{!! Form::label('Country', 'Country', array('class' => 'col-md-3 control-label')) !!}--}}
                {{--<div class="col-md-6">--}}
                {{--{!! Form::text('country',$case->country,['class' => 'form-control input-sm','id' => 'country','disabled' => 'disabled']) !!}--}}

                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                {{--{!! Form::label('Status', 'Status', array('class' => 'col-md-3 control-label')) !!}--}}
                {{--<div class="col-md-6">--}}
                {{--{!! Form::text('status',$case->status,['class' => 'form-control input-sm','id' => 'status','disabled' => 'disabled']) !!}--}}

                {{--</div>--}}
                {{--</div>--}}


                {{--<div class="form-group">--}}
                {{--{!! Form::label('Captured by', 'Captured by', array('class' => 'col-md-3 control-label')) !!}--}}
                {{--<div class="col-md-6">--}}
                {{--{!! Form::text('reporter',$case->reporter,['class' => 'form-control input-sm','id' => 'reporter','disabled' => 'disabled']) !!}--}}
                {{--<a class="btn btn-xs btn-alt" data-toggle="modal" data-id  id="launchUpdateUserModalField" onClick="launchUpdateUserModal($(this).data('id'));" data-target=".modalEditUser">View More</a>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                {{--{!! Form::label('Cellphone', 'Cellphone', array('class' => 'col-md-3 control-label')) !!}--}}
                {{--<div class="col-md-6">--}}
                {{--{!! Form::text('reporterCell',$case->reporterCell,['class' => 'form-control input-sm','id' => 'reporterCell','disabled' => 'disabled']) !!}--}}

                {{--</div>--}}
                {{--</div>--}}

                {{--<div class="form-group">--}}
                {{--<div class="">--}}
                {{--{!! Form::label('Report Image', 'Report Image', array('class' => 'col-md-3 control-label')) !!}--}}
                {{--<div class="col-md-6">--}}
                {{--<a data-rel="gallery" id="CaseImageA" class="pirobox_gall img-popup" title="">--}}
                {{--<img src="{{$case->img_url}}" alt="" class="superbox-img" id="CaseImage" width="220">--}}
                {{--</a>--}}
                {{--</div>--}}

                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}


                {{--@endforeach--}}

                {{-- end  cases   from  compact --}}
                {{--<div class="tab-pane" id="2a">--}}
                {{--<table style="width:928px;" class="table tile table-striped" id="relatedCasesTable">--}}
                {{--<thead>--}}
                {{--<tr>--}}
                {{--<th>Case</th>--}}
                {{--<th>Created at</th>--}}
                {{--<th>Description</th>--}}
                {{--<th>Relation</th>--}}
                {{--</tr>--}}
                {{--</thead>--}}
                {{--</table>--}}
                {{--</div>--}}

                {{--<div class="tab-pane" id="3a">--}}
                {{--<div class="block-area" id="responsiveTable">--}}

                {{--@if(Session::has('successReferral2'))--}}
                {{--<div class="alert alert-info alert-dismissable fade in">--}}
                {{--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>--}}
                {{--{{ Session::get('successReferral2') }}--}}
                {{--</div>--}}
                {{--@endif--}}
                {{--<div class="table-responsive">--}}
                {{--<table style="width:928px;" class="table tile table-striped dataTable no-footer" id="caseResponders">--}}
                {{--<thead>--}}
                {{--<tr>--}}
                {{--<th>Type</th>--}}
                {{--<th>Name</th>--}}
                {{--<th>Accepted</th>--}}
                {{--<th>Actions</th>--}}
                {{--</tr>--}}
                {{--</thead>--}}
                {{--</table>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}

                {{--<div class="tab-pane" id="4a">--}}
                {{--@if(isset($userAddPoiPermission) && $userAddPoiPermission->permission_id =='30')--}}

                {{--<a class="btn btn-xs btn-alt" onClick="launchPersonOfInterestModal();">Add Person</a>--}}

                {{--@endif--}}
                {{--<!-- Responsive Table -->--}}
                {{--<div class="block-area" id="responsiveTable">--}}
                {{--<div class="table-responsive">--}}
                {{--<table style="width:928px;" class="table tile table-striped dataTable no-footer" id="pointListTable">--}}
                {{--<thead>--}}
                {{--<tr>--}}
                {{--<th>First Name</th>--}}
                {{--<th>Surname</th>--}}
                {{--<th>Cellphone</th>--}}
                {{--<th>Actions</th>--}}

                {{--</tr>--}}
                {{--</thead>--}}
                {{--</table>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}

                {{--<div class="tab-pane" id="5a">--}}
                {{--<div class="block-area" id="responsiveTable">--}}

                {{--@if(Session::has('successReferral1'))--}}
                {{--<div class="alert alert-info alert-dismissable fade in">--}}
                {{--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>--}}
                {{--{{ Session::get('successReferral1') }}--}}
                {{--</div>--}}
                {{--@endif--}}
                {{--<div class="table-responsive overflow">--}}
                {{--<table style="width:928px;" class="table tile table-striped" id="caseActivities">--}}
                {{--<thead>--}}
                {{--<tr>--}}
                {{--<th>Created At</th>--}}
                {{--<th>activity</th>--}}
                {{--</tr>--}}
                {{--</thead>--}}
                {{--</table>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}

                {{--<div class="tab-pane" id="6a">--}}
                {{--<div class="block-area" id="responsiveTable">--}}


                {{--<div class="table-responsive overflow">--}}
                {{--<table style="width:928px;" class="table tile table-striped" id="caseNotesTable">--}}
                {{--<thead>--}}
                {{--<tr>--}}
                {{--<th>Created at</th>--}}
                {{--<th>Author</th>--}}
                {{--<th>Note</th>--}}
                {{--</tr>--}}
                {{--</thead>--}}
                {{--</table>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}

                {{--<div class="tab-pane" id="7a">--}}
                {{--<div class="form-group">--}}
                {{--{!! Form::label('Attach File', 'Case Attachments', array('class' => 'col-md-3 control-label')) !!}--}}


                {{--</div>--}}

                {{--<div id="fileManager"></div>--}}


                {{--{!! Form::close() !!}--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}

                {{--</div>--}}

                {{--</div>--}}

                {{--</div>--}}


                <script>

                    $(document).ready(function(){

                        var  id  =   $("#id").val() ;


                        if ( $.fn.dataTable.isDataTable( '#relatedCasesTable' ) ) {
                            oTableRelatedCases.destroy();
                        }



                        oTableRelatedCases   = $('#relatedCasesTable').DataTable({
                            "processing": true,
                            "autoWidth": false,
                            "pageLength": 5,
                            "bLengthChange": false,
                            "order" :[[0,"desc"]],
                            "ajax": "{!! url('/relatedCases-list/id')!!}",
                            "columns": [
                                {data: function(d){

                                    return "<a href='#' class='btn' onclick=launchRelatedCaseModal(" + d.id + ",2)>" + d.id + "</a>";

                                },"name" : 'cases.id'},
                                {data: 'created_at', name: 'related_cases.created_at'},
                                {data: 'description', name: 'cases.description'},
                                {data: function(d){

                                    return 'Child';
                                }}
                            ],

                            "aoColumnDefs": [
                                { "bSearchable": false, "aTargets": [ 1] },
                                { "bSortable": false, "aTargets": [ 1 ] }
                            ]

                        });


// poi list



                        if ( $.fn.dataTable.isDataTable( '#pointListTable' ) ) {
                            oTablePoi.destroy();
                        }



                        oTablePoi     = $('#pointListTable').DataTable({
                            "processing": true,
                            "serverSide": true,
                            "autoWidth": false,
                            "pageLength": 5,
                            "bLengthChange": false,
                            "order" :[[0,"desc"]],
                            "ajax": "{!! url('/poi-list/id ')!!}",
                            "columns": [
                                {data: 'id', name: 'poi.id'},
                                {data: 'name', name: 'poi.name'},
                                {data: 'surname', name: 'poi.surname'},
                                {data: 'actions', name: 'actions'}

                            ],

                            "aoColumnDefs": [
                                { "bSearchable": false, "aTargets": [ 1] },
                                { "bSortable": false, "aTargets": [ 1 ] }
                            ]

                        });

// case Note




                        if ( $.fn.dataTable.isDataTable( '#caseNotesTable' ) ) {
                            oTableCaseNotes.destroy();
                        }

                        oTableCaseNotes     = $('#caseNotesTable').DataTable({
                            "processing": true,
                            "serverSide": true,
                            "autoWidth": false,
                            "pageLength": 5,
                            "bLengthChange": false,
                            "order" :[[0,"desc"]],
                            "ajax": "{!! url('/caseNotes-list/id')!!}",
                            "columns": [
                                {data: 'created_at', name: 'created_at'},
                                {data: 'user', name: 'user'},
                                {data: 'note', name: 'note'}
                            ],

                            "aoColumnDefs": [
                                { "bSearchable": false, "aTargets": [ 1] },
                                { "bSortable": false, "aTargets": [ 1 ] }
                            ]

                        });
// case  note


                        if ( $.fn.dataTable.isDataTable( '#caseActivities' ) ) {
                            oTableCaseActivities.destroy();
                        }



                        oTableCaseActivities     = $('#caseActivities').DataTable({
                            "processing": true,
                            "serverSide": true,
                            "autoWidth": false,
                            "pageLength": 8,
                            "dom": 'T<"clear">lfrtip',
                            "order" :[[0,"desc"]],
                            "ajax": "{!! url('/caseActivities-list/id ')!!}",
                            "columns": [
                                {data: 'created_at', name: 'created_at'},
                                {data: 'note', name: 'note'}
                            ],

                            "aoColumnDefs": [
                                { "bSearchable": false, "aTargets": [ 1] },
                                { "bSortable": false, "aTargets": [ 1 ] }
                            ]

                        });




                        if ( $.fn.dataTable.isDataTable( '#caseResponders' ) ) {
                            oTableCaseResponders.destroy();
                        }



                        oTableCaseResponders     = $('#caseResponders').DataTable({
                            "processing": true,
                            "serverSide": true,
                            "autoWidth": false,
                            "pageLength": 8,
                            "dom": 'T<"clear">lfrtip',
                            "order" :[[0,"asc"]],
                            "ajax": "{!! url('/caseResponders-list/id')!!}",
                            "columns": [


                                {data: function(d){

                                    if (d.type  == 1 )
                                    {
                                        return "First Responder";
                                    }

                                    if (d.type  == 0 )
                                    {
                                        return "Reporter";
                                    }

                                    if (d.type  == 2 )
                                    {
                                        return "Second Responder";
                                    }

                                    if (d.type  == 3 )
                                    {
                                        return "Third Responder";
                                    }

                                    if (d.type  == 4  )
                                    {
                                        return "Escalation";
                                    }

                                    if (d.type  == 5  )
                                    {
                                        return "Critical Team";
                                    }



                                },"name" : 'type'},

                                {data: function(d){

                                    return d.name + ' ' + d.surname;


                                },"name" : 'name'},

                                {data: function(d){

                                    if (d.accept  == 1 )
                                    {
                                        return "yes";
                                    }
                                    else {

                                        return "no";
                                    }

                                },"name" : 'accept'},

                                {data: 'actions', name: 'actions'},


                            ],

                            "aoColumnDefs": [
                                { "bSearchable": false, "aTargets": [ 1] },
                                { "bSortable": false, "aTargets": [ 1 ] }
                            ]

                        });


                        $("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
                            e.preventDefault();
                            $(this).siblings('a.active').removeClass("active");
                            $(this).addClass("active");
                            var index = $(this).index();
                            $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
                            $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
                        });

                    });

                    function shows() {
                        location.reload()
                     //   document.getElementById("side_navs").style.display="block";

                       // document.getElementById('case').className="list-group-item text-center active";

                      //  document.getElementById("top_navs_action").className="bhoechie-tab-content ";
                      //  document.getElementById('side_contents').style.display="block";
                      //  document.getElementById('side_contents2').style.display="block";
                     //   document.getElementById('side_contents3').style.display="block";

                    }
                    function hides() {
                        document.getElementById("side_navs").style.display="none";
                        document.getElementById('side_contents').style.display="none";
                        document.getElementById('side_contents2').style.display="none";
                        document.getElementById('side_contents3').style.display="none";
                        document.getElementById("top_navs_action").className="bhoechie-tab-content active";
                    }
                </script>


@endsection


