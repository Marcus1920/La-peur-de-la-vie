
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
                <h3 class="block-title">RESOLVE Cases</h3>

                <a href="{{ url('creatCase') }}" class="btn btn-info" role="button">Create Case</a>
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
            </div>
        </div>
    </div>

    <script>



    </script>
<!-- Breadcrumb -->


@endsection