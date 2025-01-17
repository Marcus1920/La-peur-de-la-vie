@extends('master')

@section('content')
<!-- Breadcrumb -->
<ol class="breadcrumb hidden-xs">
    <li><a href="#">Administration</a></li>
    <li><a href="{{ url('list-affiliations') }}">Association</a></li>
    <li class="active">Association Listing</li>
</ol>

<h4 class="page-title">Association</h4>
<!-- Alternative -->
<div class="block-area" id="alternative-buttons">
    <h3 class="block-title">Association Listing</h3>
    <a class="btn btn-sm" data-toggle="modal" data-target=".modalAddAffiliation">
     Add Association
    </a>
</div>

<!-- Responsive Table -->
<div class="block-area" id="responsiveTable">
    @if(Session::has('success'))
      <div class="alert alert-success alert-icon">
           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          {{ Session::get('success') }}
          <i class="icon">&#61845;</i>
      </div>
    @endif

    <div class="table-responsive overflow">
        <table class="table tile table-striped" id="affiliationsTable">
            <thead>
              <tr>
                    <th>Id</th>
                    <th>Created At</th>
                    <th>Name</th>
                    <th>Actions</th>
              </tr>
            </thead>
        </table>
    </div>
</div>
@include('affiliations.edit')
@include('affiliations.add')
@endsection

@section('footer')

 <script>
  $(document).ready(function() {


  var oTable     = $('#affiliationsTable').DataTable({
                "processing": true,
                "serverSide": true,
                "dom": 'T<"clear">lfrtip',
                "order" :[[0,"desc"]],
                "ajax": "{!! url('/affiliations-list/')!!}",
                 "columns": [
                {data: 'id', name: 'id'},
                {data: 'created_at', name: 'created_at'},
                {data: function(d)
                {
                 return "<a href='{!! url('list-affiliation-positions/" + d.id + "') !!}' class='btn btn-sm'>" + d.name + "</a>";

                },"name" : 'name'},

              {data: 'actions',  name: 'actions'},
               ],

            "aoColumnDefs": [
                { "bSearchable": false, "aTargets": [ 1] },
                { "bSortable": false, "aTargets": [ 1 ] }
            ]

         });

  });

   function launchUpdateAffiliationModal(id)
    {

       $(".modal-body #affiliationId").val(id);
       $.ajax({
        type    :"GET",
        dataType:"json",
        url     :"{!! url('/affiliations/"+ id + "')!!}",
        success :function(data) {

            if(data[0] !== null)
            {

               $("#modalEditAffiliation #name").val(data[0].name);

            }
            else {
               $("#modalEditAffiliation #name").val('');
            }

        }
    });

    }

    @if (count($errors) > 0)

      $('#modalAddAffiliation').modal('show');

    @endif


</script>
@endsection
