@extends('master')

@section('content')

<!-- Breadcrumb -->
<ol class="breadcrumb hidden-xs">
    <li><a href="#">Home</a></li>
    <li class="active">Console</li>
</ol>

<h4 class="page-title">Console</h4>

<!-- Quick Stats -->

<div class="block-area" id="tabs">
<div class="tab-container">

        <div class="row nav tab">

            @if(isset($userViewResolvedCasesPermission) && $userViewResolvedCasesPermission->permission_id =='20')

            <a href="#resolved">
                <div class="col-md-3 col-xs-6">
                    <div class="tile quick-stats media">
                        <div id="stats-line-4" class="pull-left"></div>
                        <div class="media-body">
                            <h2 data-value="{{ count($numberResolvedCases,0)}}">0</h2>
                            <small>Resolved Cases</small>
                        </div>
                        </div>
                    </div>
            </a>
            @endif


            <div class="tab-pane" id="resolved">
                <!-- Responsive Table -->
                <div class="block-area" id="responsiveTable">
                    @if(Session::has('success'))

                    <div class="alert alert-info alert-dismissable fade in">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ Session::get('success') }}

                    </div>

                    @endif

                    <div class="table-responsive overflow">
                        <h3 class="block-title">Resolved Cases</h3>
                        {{--@if(isset($userCreateCasesPermission) && $userCreateCasesPermission->permission_id =='21')--}}
                        <button class="btn btn-sm m-r-5" data-toggle="modal" onclick="clearCreateCaseModal()" data-target=".modalCreateCaseAgent">Create Case</button>

                        <table class="table tile table-striped" id="resolvedCasesTable">
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
                    </div>
                </div>

        </div>
</div>
    </div>

<script>

    var resolvedCasesTable     = $('#resolvedCasesTable').DataTable({
        "autoWidth": false,
        "processing": true,
        "serverSide": true,
        "dom": 'T<"clear">lfrtip',
        "order" :[[0,"desc"]],
        "sAjaxSource": "{!! url('/resolved-cases-list/')!!}",
        "fnServerData": function ( sSource, aoData, fnCallback, oSettings ) {
            oSettings.jqXHR = $.ajax( {
                "dataType": 'json',
                "type": "GET",
                "url": sSource,
                "data": aoData,
                "timeout": 40000,
                "error": handleAjaxError,
                "success": fnCallback
            } );
        },

        "columns": [
            {data: 'id', name: 'cases.id'},
            {data: 'created_at', name: 'cases.created_at'},
            {data: function(d){

                return d.description;

            },"name" : 'cases.description',"width" :"40%"},
            {data: 'status', name: 'cases.status'},
            {data: 'actions',  name: 'actions'},
        ],

        "aoColumnDefs": [
            { "bSearchable": false, "aTargets": [ 4] },
            { "bSortable": false, "aTargets": [ 4 ] }
        ]

    });

</script>

@endsection