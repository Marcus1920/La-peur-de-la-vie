
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

                    <table class="table tile table-striped" id="deletedCasesTable">
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
@endsection