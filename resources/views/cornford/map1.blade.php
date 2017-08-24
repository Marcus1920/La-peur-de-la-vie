@extends('master')

@section('content')
<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAtqWsq5Ai3GYv6dSa6311tZiYKlbYT4mw&libraries=geometry,places"></script>

    <script src="{{ asset('bower_components/jquery/dist/jquery.min.js')}}" ></script>

    <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.js')}}"></script>

    <script src="{{ asset('/js/jquery.min.js') }}"></script>

    <style>
        body{
            background-color: #0d6aad;
        }
    </style>

</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="row">
        <div class="col-lg-12">
            <div class="col-md-3">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="{{url('maps')}}">All Cases</a></li>
                    <li><a href="{{url('map2')}}">Create Case</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <form  method="post" action="search" class="navbar-form navbar-left">

                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <div class="input-group">

                        <input type="text" class="form-control" name="search" id="pick" placeholder="Search address">

                        <div class="input-group-btn">

                            <button class="btn btn-default" type="submit">
                                <i class="glyphicon glyphicon-search"></i>
                            </button>
                        </div>

                    </div>

                </form>
            </div>
            <div class="col-md-3">
                <form   method="post" action="searchCase"  class="navbar-form ">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <div class="input-group">

                        <input type="text" class="form-control" id="caseID" placeholder="Search Case Number" name="caseID">
                        <div class="input-group-btn">

                            <button class="btn btn-default" type="submit">
                                <i class="glyphicon glyphicon-search"></i>
                            </button>
                        </div>

                    </div>

                </form>
            </div>
            <div class="col-md-2">
                {{--<label class="label-infor">Cases Displayed</label> &nbsp;&nbsp;<span class="n-count animated">{{count($numberOfCases,0) }}</span>--}}

                <ul class="nav navbar-nav ">
                {{--<li><button type="button" class="btn btn-primary">Cases Displayed <span class="badge">{{count($numberOfCases,0) }}</span></button></li>--}}
                    <li class="active">

                        <a href="#" style="font-size: 15px;" class="glyphicon glyphicon-folder-open">  {{count($numberOfCases,0)}}</a>

                    </li>
                </ul>

            </div>
        </div>
        </div>

    </div>
</nav>



<div class="container" style="margin-top:-18px;">

        <div class="row">
                <div class="col-md-12">
                <div class="col-md-10">
                    <div style=" height:600px ;">
                        @if(Session::has('success'))
                            <div class="alert alert-success alert-icon">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                {{ Session::get('success') }}
                                <i class="icon">&#61845;</i>
                            </div>
                        @endif


                        <div id="maps2">
                            {!! Mapper::render(0) !!}
                        </div>

                    </div>
                </div>
                <div class="col-md-2">

                        <h2 class="tile-title"><i class="glyphicon glyphicon-map-marker"></i> Marker Labels
                            <div class="pull-right">
                                <a href="{{ url('tasks') }}" >
                                    {{--Total.....<i class="n-count animated">{{ count($allTasks,0) }}</i>--}}
                                </a>
                            </div>
                        </h2>
                       <br/>
                       <br/>

                            @foreach($case_types as $case_type)
                            <div class="row">
                                <form  class="form-horizontal"  method="post" action="searchByCaseType">

                                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                    <input type="hidden" name="caseTypeId" value="{{$case_type->id}}">

                                <div class="col-sm-4"><button type="submit" title="Search for {{$case_type->name}} cases" class="btn"><img src="{{$case_type->marker_url}}" alt=""></button></div>

                                <div class="col-sm-8">{{$case_type->name}}</div>
                                </form>
                            </div>
                                &nbsp;
                            @endforeach


                </div>
            </div>
        </div>
</div>


@endsection

<script src="{{ asset('bower_components/jquery/dist/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.js')}}" type="text/javascript" ></script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBwXS96_uM6y-6ZJZhSJGE87pO-qxpDp-Q&libraries=places"></script>


<script  language="javascript">

google.maps.event.addDomListener(window,'load',function()
{

var search=new google.maps.places.Autocomplete(document.getElementById('pick'));
google.maps.event.addListener(search,'place_changed',function(){

 var place=search.getPlace();
 var address= place.formatted_address;

 {{--alert(address);--}}

    {{--$.ajax({--}}
        {{--url     :"{!! url('/search')!!}",--}}
        {{--type    :"POST",--}}
        {{----}}
        {{--dataType : "text",--}}
        {{--contentType: "application/json",--}}
        {{--data : dataAttribute--}}
    {{--});--}}

});

});

    //default map destination
    var eightMileOverlayBounds = new google.maps.LatLngBounds(
        new google.maps.LatLng(-30.008609, 30.931000),
        new google.maps.LatLng(-29.759365, 31.234000));

    var input     = document.getElementById('pick');
    var searchBox = new google.maps.places.SearchBox(input);

    $('#search').val(searchBox);

    map.addListener('bounds_changed', function() {
        searchBox.setBounds(map.getBounds());
    });

</script>
</body>
</html>
