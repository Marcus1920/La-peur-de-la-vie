@extends('master')
@section('content')


    <ol class="breadcrumb hidden-xs">
        <li><a href="#">Home</a></li>
        <li class="active">Console</li>
    </ol>

    <h4 class="page-title">Console</h4>


    @if(isset($userViewPendingClosureCasesPermission) && $userViewPendingClosureCasesPermission->permission_id =='19')


<a href="#closure">
<div class="col-md-3 col-xs-6">
<div class="tile quick-stats media">
<div id="stats-line-3" class="pull-left"></div>
<div class="media-body">
<h2 data-value="{{ count($numberPendingClosureCases,0)}}">0</h2>
<small>Pending Closure Cases</small>
</div>
</div>
</div>
</a>

@endif



    @if(isset($userViewPendingClosureCasesPermission) && $userViewPendingClosureCasesPermission->permission_id =='19')


        <a href="#closure">
            <div class="col-md-3 col-xs-6">
                <div class="tile quick-stats media">
                    <div id="stats-line-3" class="pull-left"></div>
                    <div class="media-body">
                        <h2 data-value="{{ count($numberPendingClosureCases,0)}}">0</h2>
                        <small>Pending Closure Cases</small>
                    </div>
                </div>
            </div>
        </a>

    @endif



<div class="table-responsive overflow">

    <h3 class="block-title">Pending Closure Cases</h3>
{{--@if(isset($userCreateCasesPermission) && $userCreateCasesPermission->permission_id =='21')--}}
<button class="btn btn-sm m-r-5" data-toggle="modal" onclick="clearCreateCaseModal()" data-target=".modalCreateCaseAgent">Create Case</button>

<table class="table tile table-striped" id="pendingreferralCasesTable">
<thead>
<tr>
<th>Id</th>
<th>Created At</th>
<th>Description</th>
<th>Source</th>
<th>Status</th>
<th>Actions</th>
</tr>
</thead>
</table>
{{--@endif--}}
</div>


    <script>

        var pendingreferralCasesTable     = $('#pendingreferralCasesTable').DataTable({
            "autoWidth": false,

            "processing": true,
            speed: 500,
            "dom": 'T<"clear">lfrtip',
            "order" :[[0,"desc"]],
            "ajax": "{!! url('/pending-referral-cases-list/')!!}","processing": true,
            "serverSide": true,
            "dom": 'T<"clear">lfrtip',
            "order" :[[0,"desc"]],



            "columns": [
                {data: 'id', name: 'cases.id'},
                {data: 'created_at', name: 'cases.created_at'},
                {data: function(d){

                    return d.description;

                },"name" : 'cases.description',"width" :"40%"},
                {data: 'source', name: 'cases_sources.name'},
                {data: 'CaseStatus', name: 'cases_statutes.name'},
                {data: 'actions',  name: 'actions'},
            ],

            "aoColumnDefs": [
                { "bSearchable": false, "aTargets": [ 1] },
                { "bSortable": false, "aTargets": [ 1 ] }
            ]

        });

    </script>

@endsection

