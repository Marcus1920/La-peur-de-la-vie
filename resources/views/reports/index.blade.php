<!DOCTYPE html>
<html lang="en">
    <head>


        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/x-icon" sizes="16x16" href="{{ asset('/img/favicon.ico?v1') }}">

  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap-grid.min.css">
        <link rel="stylesheet" href="css/report.css">
        <!-- CSS -->
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
        <link href="{{ asset('/css/media-player.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/file-manager.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/buttons.dataTables.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/HoldOn.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/bootstrap-switch.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/incl/animate.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/Treant.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/collapsable.css') }}" rel="stylesheet">
    <!-- <link href="{{ asset('/css/perfect-scrollbar.css') }}" rel="stylesheet"> -->

<style media="screen">
body{


}

</style>

        <title>Siyaleader Aims</title>

        {!! Charts::assets() !!}

    </head>
    {{--<header>--}}
        {{--<a class="logo pull-left" href="#">--}}
            {{--<img class="" src="{{ asset('/images/dashboard_logo.png') }}" width="60%" alt="">--}}
        {{--</a>--}}
    {{--</header>--}}
    <body id="skin-blur-blue">
    <header id="header" class="media">
        <a class="logo pull-left" href="{{ url('/home') }}">
            <img class=""  src="{{ asset('/images/dashboard_logo.png') }}" width="60%" alt="">
        </a>

        <div class="media-body">
            <div class="media" id="top-menu">


                <div id="time" class="pull-right">
                    <span id="hours"></span>
                    :
                    <span id="min"></span>
                    :
                    <span id="sec"></span>
                </div>


            </div>
        </div>
    </header>


    {{--<div class="topnav" id="myTopnav">--}}
        {{--<a href="#home">Home</a>--}}
        {{--<a href="#news">News</a>--}}
        {{--<a href="#contact">Contact</a>--}}
        {{--<a href="#about">About</a>--}}
    {{--</div>--}}





    <!-- Main content -->
    <section class="content">
        <div class="row" >
            <div class="col-md-1" >
            </div>
            <div class="col-md-5" >
                <!-- AREA CHART -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Bar Chart</h3>
                        <hr class="whiter m-b-20">
                    </div>
                    <div class="box-body chart-responsive">
                      {!! $chart->render() !!}
                        {{--<div class="chart" id="revenue-chart" style="height: 300px;"></div>--}}

                    </div><!-- /.box-body -->
                </div><!-- /.box -->
                <!-- DONUT CHART -->


            </div><!-- /.col (LEFT) -->
            <div class="col-md-5">
                <!-- LINE CHART -->
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Pie Chart</h3>
                        <hr class="whiter m-b-20">
                    </div>
                    <div class="box-body chart-responsive">
                       {!! $charts->render() !!}
                        {{--<div class="chart" id="line-chart" style="height: 300px;"></div>--}}
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
                <!-- BAR CHART -->


            </div><!-- /.col (RIGHT) -->
            <div class="col-md-1" >
            </div>
        </div><!-- /.row -->
        <div class="row" >
            <div class="col-md-1" >
            </div>
            <div class="col-md-5" >
                <!-- AREA CHART -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Bar Chart</h3>
                        <hr class="whiter m-b-20">
                    </div>
                    <div class="box-body chart-responsive">
                        {!! $chartssz->render() !!}
                        {{--<div class="chart" id="revenue-chart" style="height: 300px;"></div>--}}
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
                <!-- DONUT CHART -->


            </div><!-- /.col (LEFT) -->
            <div class="col-md-5">
                <!-- LINE CHART -->
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Line Chart</h3>
                        <hr class="whiter m-b-20">
                    </div>
                    <div class="box-body chart-responsive">
                        {!! $chartss->render() !!}
                        {{--<div class="chart" id="line-chart" style="height: 300px;"></div>--}}
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
                <!-- BAR CHART -->


            </div><!-- /.col (RIGHT) -->
            <div class="col-md-1" >
            </div>
        </div><!-- /.row -->


    </section><!-- /.content -->



        <center>

        </center>

        <center>

        </center>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js" charset="utf-8"></script>
    </body>+-
