@extends('master')

@section('content')
    <!-- Breadcrumb -->
    <ol class="breadcrumb hidden-xs">
        <li class="active">Address Book</li>
    </ol>

    <h4 class="page-title">ADDRESS BOOK</h4>

    <div class="block-area" id="horizontal">

        @if(Session::has('success'))
            <div class="alert alert-success alert-icon">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ Session::get('success') }}
                <i class="icon">&#61845;</i>
            </div>
        @endif

    </div>

        <!-- Alternative -->
        <div class="block-area" id="alternative-buttons">
            <h3 class="block-title">Manage Address Book</h3>
            <a href="{{ url('CreateContact') }}" class="btn btn-sm">
                <i class="fa fa-plus" aria-hidden="true" title="Add Your New Contact" data-toggle="tooltip"></i>
            </a>
        </div>

        <!-- Responsive Table -->
        <div class="block-area" id="responsiveTable">
            <div id="MeetingNotification"></div>
            <div class="table-responsive overflow">
                <table class="table tile table-striped" id="addressBookTable">
                    <thead>
                    <tr>
                        <th>Created At</th>
                        <th>First Name</th>
                        <th>Surname</th>
                        <th>Cellphone</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>

@endsection

@section('footer')
    <script>
        $(document).ready(function() {
            $('#modalReferCase').modal('toggle');
            if ( $.fn.dataTable.isDataTable( '#addressBookTable' ) ) {
                oTableAddressBook.destroy();
            }


            var user = {!! (Auth::check() ? Auth::user()->id : 0) !!};
            oTableAddressBook     = $('#addressBookTable').DataTable({
                "processing": true,
                "serverSide": true,
                "dom": 'T<"clear">lfrtip',
                "order" :[[0,"desc"]],
                "ajax": "{!! url('/addressbook-list/" + user +"')!!}",
                "columns": [
                    {data: 'created_at', name: 'created_at'},
                    {data: 'first_name', name: 'first_name'},
                    {data: 'surname', name: 'surname'},
                    {data: 'cellphone', name: 'cellphone'},
                    {data: 'email', name: 'email'},
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


