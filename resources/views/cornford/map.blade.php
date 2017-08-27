{{--@extends('master')--}}

{{--@section('content')--}}
<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAtqWsq5Ai3GYv6dSa6311tZiYKlbYT4mw&libraries=geometry,places"></script>

    {{--<script src="{{ asset('bower_components/jquery/dist/jquery.min.js')}}" ></script>--}}

    {{--<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.js')}}"></script>--}}

    <!-- Fonts -->
    {{--<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">--}}
    <!-- Styles -->

    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/form.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/calendar.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/generics.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/token-input.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/icons.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/lightbox.css') }}" rel="stylesheet">
<!-- <link href="{{ asset('/css/media-player.css') }}" rel="stylesheet"> -->
    <link href="{{ asset('/css/file-manager.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/buttons.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/HoldOn.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/bootstrap-switch.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/incl/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/Treant.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/collapsable.css') }}" rel="stylesheet">
<!-- <link href="{{ asset('/css/perfect-scrollbar.css') }}" rel="stylesheet"> -->
    <link href="{{ asset('/css/form-builder.css') }}" rel="stylesheet">

    <link href="{{ asset('/css/toggles.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/toggle-themes/toggles-all.css') }}" rel="stylesheet">
    <link href="{{ asset('/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
{{--<link href="{{ asset('/bower_components/datatables-responsive/css/responsive.dataTables.scss') }}" rel="stylesheet">--}}
<!-- jQuery Library -->
    <script src="{{ asset('/js/jquery.min.js') }}"></script>

    <style>
        body{
            background-color: #0d6aad;
        }
    </style>

</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="row">
        <div class="col-md-12">
            <div class="col-md-3">
                <ul class="nav navbar-nav">
                    <li {{ (Request::is('home') ? "class=active" : '') }}>
                        <a class="sa-side-homepage" href="{{ url('home') }}">
                        </a>
                    </li>
                    <li class="active"><a href="{{url('maps')}}">All Cases</a></li>
                    <li><a href="{{url('map2')}}">Create Case</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <form  method="post" action="search"  class="navbar-form navbar-left">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <div class="input-group">

                        <input type="text" class="form-control" name="search" id="pick" placeholder="Search Address">

                        <div class="input-group-btn">

                            <button class="btn btn-default" type="submit">
                                <i class="glyphicon glyphicon-search"></i>
                            </button>
                        </div>

                    </div>

                </form>
            </div>
            <div class="col-md-4">
                <form   method="post" action="searchCase"  class="navbar-form navbar-left">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <div class="input-group">

                        <input type="text" class="form-control" placeholder="Search Case Number" name="caseID">
                        <div class="input-group-btn">

                            <button class="btn btn-default" type="submit">
                                <i class="glyphicon glyphicon-search"></i>
                            </button>
                        </div>

                    </div>

                </form>
            </div>
        </div>
        </div>
        <div class="row">
            <div style="width: 100% ; height:600px ;">
                @if(Session::has('success'))
                    <div class="alert alert-success alert-icon">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ Session::get('success') }}
                        <i class="icon">&#61845;</i>
                    </div>
                @endif

                {!! Mapper::render(0) !!}
                <div id="maps2"></div>

            </div>
        </div>
    </div>
</nav>

{{--<div class="container">--}}




{{--</div>--}}
{{--@endsection--}}

{{--<script src="{{ asset('bower_components/jquery/dist/jquery.min.js')}}" type="text/javascript"></script>--}}
{{--<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.js')}}" type="text/javascript" ></script>--}}

<script src="bower_components/jquery/dist/js/jquery.min.js"></script>

<!--Toggles-->
<script src="{{ asset('/js/toggles.js') }}"></script>

<script src="{{ asset('/js/jquery-ui.min.js') }}"></script> <!-- jQuery UI -->
<script src="{{ asset('/js/jquery.easing.1.3.js') }}"></script> <!-- jQuery Easing - Requirred for Lightbox + Pie Charts-->

<!-- Bootstrap -->
<script src="{{ asset('/js/bootstrap.min.js') }}"></script>




<!--  Form Related -->
<script src="{{ asset('/js/icheck.js') }}"></script> <!-- Custom Checkbox + Radio -->

<!-- UX -->
<script src="{{ asset('/js/scroll.min.js') }}"></script> <!-- Custom Scrollbar -->

<!-- Other -->
<script src="{{ asset('/js/calendar.min.js') }}"></script> <!-- Calendar -->
<script src="{{ asset('/js/feeds.min.js') }}"></script> <!-- News Feeds -->


<!--  Form Related -->
<script src="{{ asset('/js/validation/validate.min.js') }}"></script> <!-- jQuery Form Validation Library -->
<script src="{{ asset('/js/validation/validationEngine.min.js') }}"></script> <!-- jQuery Form Validation Library - requirred with above js -->


<!-- All JS functions -->
<script src="{{ asset('/js/functions.js') }}"></script>


<!-- Token Input -->
<script src="{{ asset('/js/jquery.tokeninput.js') }}"></script> <!-- Token Input -->


<!-- Noty JavaScript -->
<script src="{{ asset('/bower_components/noty/js/noty/packaged/jquery.noty.packaged.js') }}"></script>

<!-- DataTables JavaScript -->


<script src="{{ asset('/bower_components/datatables/media/js/datatables-plugins/pagination/scrolling.js') }}"></script>
<script src="{{ asset('/bower_components/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') }}"></script>



<!-- Jquery Bootstrap Maxlength -->
<script src="{{ asset('/bower_components/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>


<!-- Media -->
<script src="{{ asset('/js/media-player.min.js') }}"></script> <!-- Video Player -->
<script src="{{ asset('/js/pirobox.min.js') }}"></script> <!-- Lightbox -->
<script src="{{ asset('js/file-manager/elfinder.js') }}"></script> <!-- File Manager -->


<script type="text/javascript" src="{{ asset('/incl/oms.min.js') }}"></script>



<!-- File Upload -->
<script src="{{ asset('/js/fileupload.min.js') }}"></script> <!-- File Upload -->

<!-- Spinner -->
<script src="{{ asset('/js/HoldOn.min.js') }}"></script> <!-- Spinner -->

<!-- bootstrap-switch. -->
<script src="{{ asset('/js/bootstrap-switch.js') }}"></script> <!-- bootstrap-switch. -->

<!-- Date & Time Picker -->
<script src="{{ asset('/js/datetimepicker.min.js') }}"></script> <!-- Date & Time Picker -->

<!-- Buttons HTML5 -->
<script src="{{ asset('/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('/js/jszip.min.js') }}"></script>
<script src="{{ asset('/js/pdfmake.min.js') }}"></script>
<script src="{{ asset('/js/vfs_fonts.js') }}"></script>
<!--  Buttons HTML5 -->

<script src="{{ asset('js/socket.io.js') }}"></script>

<script src="{{ asset('js/calendar.min.js') }}"></script> <!-- Calendar -->

<script src="{{ asset('js/raphael.js') }}"> </script>





<!-- D3.js
        <script src="{{ asset('js/d3/plugins.js') }}"></script>
        <script src="{{ asset('js/d3/script.js') }}"></script>
        <script src="{{ asset('js/d3/libs/coffee-script.js') }}"></script>
        <script src="{{ asset('js/d3/libs/d3.v2.js') }}"></script>
        <script src="{{ asset('js/d3/Tooltip.js') }}"></script>
        <script src="{{ asset('js/d3/Tooltip.js') }}"></script>
    -->


{{--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBwXS96_uM6y-6ZJZhSJGE87pO-qxpDp-Q&libraries=places"></script>--}}

<script type="text/javascript">
    var ZoomChartsLicense = "ZCS-bc96u7g34: ZoomCharts 30 day free trial development licence eli..@..l.com (valid for evaluation only); upgrades until: 2016-11-18";
    var ZoomChartsLicenseKey = "bb73530f3272579c914f3828e818a7956bc9a2361fe31fd609"+
        "bda486c2f2b069e414aef7f6bf51355f82b43ace777b9621e7858acaebc7f3c6fb70c5722ed38"+
        "82153935b365406d020ba9a80e45cff204ca43ce64f67c983827de0a7f0752a40401ad318c1bf"+
        "354009e851044a21bc2b73503448e9648ae4aeac2ad277d9f0972c6f2063b49fc7a19c7e4fcd3"+
        "8edb07040e7c65a0df13554a276cd9c576f3f515b252185483e79efff5ed71201d6cbef58a127"+
        "4ddb695c8c89887c9a9322ac8514fe87ccc88da0ed42aabb64b569389ad79f7eeb0f0be40d780"+
        "b487a324116c7da20f45f1e2f90ee01b277a2c56b52e04b13e6e567ae4c5c42cffb71a0ec7b58";
</script>

@include('functions.caseModal')



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
