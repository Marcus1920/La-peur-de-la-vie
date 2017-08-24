@extends('master')

@section('content')
    <!--Nav Tabs-->
    <div id="tabs" class="container-fluid">
        <ul class="nav nav-pills navbar-right" role="tablist">
            <li class="active"><a href="#global"  data-toggle="tab">Global Address Book</a></li>
            <li><a href="#private"  data-toggle="tab">Private Address Book</a></li>
            </ul>
        <h4 class="page-title">ADDRESS BOOK</h4>

        <div class="block-area" id="alternative-buttons">
            <h3 class="block-title">Look for People to Add to Your Private Address Book</h3>
        </div>

        <!--GLOBAL TAB CONTENT-->
        <div class="row">
        <div class="tab-content">
            <div class="tab-pane" id="global">
                <!-- Responsive Table -->
                    <!--LEFT SIDE DIV-->
                                <div class="col-xs-6 .col-sm-6 .col-md-6">
                                    <div class="listview narrow>
                                        <div class="form-group pull-right">

                                            <input type="text" id="myGlobalInput" class="search form-control" onkeyup="globalFunction()" placeholder="Search for names..">
                                        </div>
                                        <span class="counter pull-right"></span>
                                        <input type="button" value="Add to Private" id="add_button" class="btn btn-sm counter"/>
                                        <input type="button" value="Send Emails" onclick="deleteRow('dataTable')" class="btn btn-sm counter" />
                <table class="table table-hover table-bordered results">
                    <thead>
                    <tr>
                        <th width="6%">Select</th>
                        <th class="col-md- col-xs-5" width="100%">Full Name </th>
                    </tr>
                    </thead>
                </table>
                                        <div style="height:300px;overflow:auto;">
                                        <table class="table table-hover table-bordered results" id="myGlobalTable" >
                                            <tbody>
                                            @foreach($users as $user)
                                                <tr class="clickable-row">
                                                    <td>
                                                        <input type="checkbox" name="row" value="{{$user->id}}"  onclick="" class="get_value" ></td>
                                                    <td><a class="t-overflow" onclick="profileGlobal({{$user->id}});">{{$user->name . " " . $user->surname}}</a><br/>

                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    </div>
                                </div>



                                <!--RIGHT SIDE DIV-->
                                <div class="col-xs-6 .col-sm-6 .col-md-6">
                                    <div class="block-area" id="basic">
                                        <div class="tile p-15">

                                            <div class="row">
                                                @if(Session::has('success'))
                                                    <div class="alert alert-success alert-icon">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                        {{ Session::get('success') }}
                                                        <i class="icon">&#61845;</i>
                                                    </div>
                                                @endif

                                                <div class="col-md-6">

                                                    <h3 class="block-title">CONTACT PICTURE!</h3>

                                                    <span class="counter pull-right"></span>

                                                    <div class="card" style="width: 30rem;">
                                                        <img class="img-circle"  src="{{asset('images/trolltunga.jpg')}}"  width="150" height="200"  alt="Card image cap">
                                                        <div class="card-block">
                                                            <hr class="whiter m-t-20">
                                                            <h1 class="card-title">Card title</h1>
                                                            <p class="card-text"></p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">

                                                    {!! Form::open(['url' => 'addContact', 'method' => 'post', 'class' => 'form-horizontal', 'id'=>"profileForm" ,'files' => 'true']) !!}
                                                    {!! Form::hidden('created_by',Auth::user()->id) !!}
                                                    <h3 class="block-title">PERSONAL DETAILS!</h3>

                                                    <span class="counter pull-right"></span>

                                                    <div class="form-group">
                                                        {!! Form::label('NAME', 'NAME', array('class' => 'col-md-3 control-label')) !!}
                                                        <div class="col-md-8">
                                                            {!! Form::text('first_name',Auth::user()->name,['class' => 'form-control input-sm','id' => 'first_name','readonly']) !!}
                                                            <div id = "hse_error_cellphone"></div>

                                                        </div>
                                                    </div>


                                                    <div class="form-group">
                                                        {!! Form::label('SURNAME', 'SURNAME', array('class' => 'col-md-3 control-label')) !!}
                                                        <div class="col-md-8">
                                                            {!! Form::text('Surname',Auth::user()->surname,['class' => 'form-control input-sm','id' => 'Surname','readonly']) !!}
                                                            <div id = "hse_error_cellphone"></div>

                                                        </div>
                                                    </div>


                                                    <div class="form-group">
                                                        {!! Form::label('EMAIl', 'EMAIL', array('class' => 'col-md-3 control-label')) !!}
                                                        <div class="col-md-8">
                                                            {!! Form::text('email',Auth::user()->email,['class' => 'form-control input-sm','id' => 'email','readonly']) !!}
                                                            <div id = "hse_error_cellphone"></div>

                                                        </div>
                                                    </div>


                                                    <div class="form-group">
                                                        {!! Form::label('CELLPHONE ', 'CELLPHONE', array('class' => 'col-md-3 control-label')) !!}
                                                        <div class="col-md-8">
                                                            {!! Form::text('cellphone',Auth::user()->cellphone,['class' => 'form-control input-sm','id' => 'cellphone','readonly']) !!}
                                                            <div id = "hse_error_cellphone"></div>

                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-8">
                                                            {!! Form::hidden('user',null,['class' => 'form-control input-sm','id' => 'user']) !!}
                                                            <div id = "hse_error_cellphone"></div>

                                                        </div>
                                                    </div>

                                                    {{--<hr class="whiter m-t-20">--}}

                                                    <span class="counter pull-right"></span>
                                                    <span class="counter pull-right"></span>
                                                    <hr class="whiter m-t-20">
                                                    <br/>



                                                    <button id="" class="btn btn-sm counter pull-left">
                                                        ADD TO PRIVATE
                                                    </button>
                                                    <div class="form-group">

                                                    </div>


                                                    <hr class="whiter m-t-20">


                                                    <h3 class="block-title">COMMUNICATION</h3>
                                                    <span class="counter pull-right"></span>
                                                    <span class="counter pull-right"></span>
                                                    <br/>


                                                    <lu>
                                                        <a href="{{ url('') }}" ><i class="fa fa-envelope-o fa-2x" aria-hidden="true" title="EMAIL"></i>
                                                        </a>
                                                        <a  class="on change" >
                                                            <i class="fa fa-star fa-2x" aria-hidden="true" title="EMAIL" data-toggle="tooltip"></i>
                                                        </a>
                                                        {{--<a href="{{ url('') }}">--}}
                                                            {{--<i class="fa fa-message" aria-hidden="true" title="Add Your New Task Here" data-toggle="tooltip"></i>--}}
                                                        {{--</a>--}}
                                                    </lu>

                                                    {!! Form::close()!!}
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div> ​
                        </div>
                    </div>
                </div>
            </div>



        </div>
        </div>

        
       

       
    </div>
@endsection
@section('footer')
    <script>

        $(document).ready(function () {



        });

        function profileGlobal(id) {
            $.ajax({
                url:"{!! url('/userprofileGlobal/"+ id + "')!!}",
                type: "GET",
                dataType: "json",
                success: function(data) {

                    $('#first_name').val(data.name);
                    $('#user').val(data.id);
                    $('#email').val(data.email);
                    $('#Surname').val(data.surname);
                    $('#cellphone').val(data.cellphone);
                },
                error: function (xhr, status) {
                    alert("Sorry, there was a problem!");
                },
                complete: function (xhr, status) {
                }
            });

        }

        function profilePrivate(id) {
            $.ajax({
                url:"{!! url('/userprofilePrivate/"+ id + "')!!}",
                type: "GET",
                dataType: "json",
                success: function(data) {

                    $('#profileForm #name').val(data.first_name);
                    $('#profileForm #surname').val(data.surname);
                    $('#profileForm #email_address').val(data.email);
                    $('#profileForm #id_user').val(data.user);

                },
                error: function (xhr, status) {
                    alert("Sorry, there was a problem!");
                },
                complete: function (xhr, status) {
                }
            });
        }




        function deleteuser() {

            var deleteUserId = document.getElementById("id_user").value;

            $.ajax({
                url: "{!! url('/deleteuserprofilePrivate/"+deleteUserId+"')!!}",
                type: "GET",
                dataType: "json",
                success: function (data) {

              location.reload();

                },
                error: function (xhr, status) {
                    alert("Sorry, there was a problem!");
                },
                complete: function (xhr, status) {
                }
            });
        }
    </script>
    <!--Star js-->
    <script>
        $('.star').click(function(){
            $(this).toggleClass('clicked');
        });
    </script>

    <!--Show active tr-->
    <script>
        $(document).ready( function(){
            $("#myGlobalTable").on('click','.clickable-row',function(event){
                if($(this).hasClass('active'))
                {
                    $(this).removeClass('active');

                } else{
                    $(this).addClass('active').siblings().removeClass('active');
                }
            });
        });

    </script>

    <!-- TABS SCRIPT-->
    <script>
        $( function() {
            $( "#tabs" ).tabs();
        } );
    </script>

    <!--GLOBAL SEARCH  JS-->
    <script>
        function globalFunction() {
            var input, filter, table, tr, td, i;
            input = document.getElementById("myGlobalInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myGlobalTable");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>

    <!--PRIVATE SEARCH JS-->
    <script>
        function myFunction() {
            var input, filter, table, tr, td, i;
            input = document.getElementById("myPrivateInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myPrivateTable");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>

@endsection

