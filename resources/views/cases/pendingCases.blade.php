
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
            <div class="table-responsive overflow">
                <h3 class="block-title">Pending Closure  mmm Cases</h3>

                <a href="{{ url('creatCase') }}" class="btn btn-info" role="button">Create Case</a>

                @if(Session::has('success'))
                    <div class="alert alert-success alert-icon">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ Session::get('success') }}
                        <i class="icon">&#61845;</i>
                    </div>
                @endif
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-2">

                                <div >

                                    <input type="text" class="form-control input-focused" placeholder="Filter From">


                                </div>

                        </div>
                        <div class="col-md-2">
                            <div >

                                <input type="text" class="form-control input-focused" placeholder="To">


                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">

                                <div >
                                    <select class="form-control input-focused">
                                        <option> Select Busines unit </option>
                                        <option> Select Busines unit </option>
                                        <option> Select Busines unit </option>
                                        <option> Select Busines unit </option>
                                    </select>


                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div >
                                <select class="form-control input-focused">
                                    <option> Select Category  </option>

                                    <option> Select Busines unit </option>
                                    <option> Select Busines unit </option>
                                    <option> Select Busines unit </option>
                                    <option> Select Busines unit </option>
                                </select>


                            </div>
                        </div>
                        <div class="col-md-2">
                            <div >
                                <select class="form-control input-focused">
                                    <option> Select Category  </option>
                                    <option> Select Busines unit </option>
                                    <option> Select Busines unit </option>
                                    <option> Select Busines unit </option>
                                    <option> Select Busines unit </option>
                                </select>


                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="">
                                <div class="input-group">
                                    <input type="text" class="form-control input-focused" placeholder="Search for...">
                                    <span class="input-group-btn">
        <button class="btn btn-default" type="button">Search</button>
      </span>
                                </div><!-- /input-group -->
                            </div><!-- /.col-lg-6 -->
                        </div>
                    </div>
                </div>
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