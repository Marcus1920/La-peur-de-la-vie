
@extends('master')

@section('content')


    <div class="tab-pane" id="closure">
        <!-- Responsive Table -->
        <div class="block-area" id="responsiveTable">
            @if(Session::has('success'))
                <div class="alert alert-info alert-dismissable fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ Session::get('success') }}
                </div>
            @endif
            <div class="table-responsive overflow">
                <h3 class="block-title">Pending Closure Cases</h3>

                <button class="btn btn-sm m-r-5" data-toggle="modal" onclick="clearCreateCaseModal()" data-target=".modalCreateCaseAgent">Create Case</button>

                <table class="table tile table-striped" id="casesTable">
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
            </div>
        </div>
    </div>

    <script>



    </script>
=======
@extends('master')
@section('content')


    <!-- Breadcrumb -->
    <ol class="breadcrumb hidden-xs">
        <li><a href="#">Home</a></li>
        <li class="active">Console</li>
    </ol>

    <h4 class="page-title">Console</h4>



    @if(isset($userViewAllocatateReferredCasesPermission) && $userViewAllocatateReferredCasesPermission->permission_id =='17')
    <a href="#reported">
    <div class="col-md-3 col-xs-6">
    <div class="tile quick-stats">
    <div id="stats-line-2" class="pull-left"></div>
    <div class="data">
    <h2 data-value="{{ count($numberReferredCases,0)}}">0</h2>
    <small>Allocated/Referred Cases </small>
    </div>
    </div>
    </div>
    </a>
    @endif

<hr class="whiter" />

<div class="tab-content">
<div class="tab-pane active" id="reported">
<!-- Responsive Table -->
<div class="block-area" id="responsiveTable">
@if(Session::has('success'))
<div class="alert alert-info alert-dismissable fade in">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
{{ Session::get('success') }}
</div>
@endif

<div class="table-responsive overflow">
<h3 class="block-title">Allocated/Referred Cases</h3>
{{--@if(isset($userCreateCasesPermission) && $userCreateCasesPermission->permission_id =='21')--}}
<button class="btn btn-sm m-r-5" data-toggle="modal" onclick="clearCreateCaseModal()" data-target=".modalCreateCaseAgent">Create Case</button>


<table class="table tile table-striped" id="casesTable">
<thead>
<tr>
<th>Id</th>
<th>Created At</th>
<th>Description</th>
<th>Source</th>
<th>Status</th>
<th>Type</th>
<th>Actions</th>
</tr>
</thead>
</table>
{{--@endif--}}
</div>
</div>
</div>

</div>


<script>
    $(document).ready(function() {
                var user = {!! (Auth::check() ? Auth::user()->id : 0) !!};

        var oTable = $('#casesTable').DataTable({
                "autoWidth": false,
                "processing": true,
                "serverSide": true,
                "dom": 'T<"clear">lfrtip',
                "order": [[0, "desc"]],
                "sAjaxSource": "{!! url('/cases-list/" + user +"')!!}",
                "fnServerData": function (sSource, aoData, fnCallback, oSettings) {
                    oSettings.jqXHR = $.ajax({
                        "dataType": 'json',
                        "type": "GET",
                        "url": sSource,
                        "data": aoData,
                        "timeout": 0000,
                        "error": handleAjaxError,
                        "success": fnCallback
                    });
                },

                "columns": [
                    {data: 'id', name: 'cases.id'},
                    {data: 'created_at', name: 'cases.created_at'},
                    {
                        data: function (d) {

                            return d.description;

                        }, "name": 'cases.description', "width": "40%"
                    },
                    {data: 'source', name: 'cases_sources.name'},
                    {data: 'CaseStatus', name: 'cases_statutes.name'},
                    {data: 'case_type', name: 'cases_types.name'},
                    {data: 'actions', name: 'actions'},
                ],

                "aoColumnDefs": [
                    {"bSearchable": false, "aTargets": [4]},
                    {"bSortable": false, "aTargets": [4]}
                ]

            });
    });

</script>


@endsection