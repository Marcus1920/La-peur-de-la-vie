
@extends('master')

@section('content')


    <script>

        $(document).ready(function() {
           // jQuery.migrateMute = true;
            $.fn.dataTableExt.sErrMode = 'throw';
        })
    </script>
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
            </div>
        </div>
    </div>

    <script>



    </script>


    <div class="table-responsive overflow">
        <h3 class="block-title">Pending Allocation Cases</h3>

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

    </div>



    <script>

        $document.ready(function () {


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


        });

    </script>

@endsection