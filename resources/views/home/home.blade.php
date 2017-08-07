@extends('master')

@section('content')


{!! Charts::assets() !!}


<!-- Main content -->
<section class="content">
    <div class="row" >
        <div class="col-md-1" >
        </div>
        <div class="col-md-5" >
            <!-- AREA CHART -->
            <a href="{{url('allocatedCases')}}">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Allocated/Referred Cases</h3>
                    <hr class="whiter m-b-20">
                </div>
                <div class="box-body chart-responsive">
                    {!! $chart->render() !!}


                </div><!-- /.box-body -->
            </div><!-- /.box -->
            </a>
            <!-- DONUT CHART -->


        </div><!-- /.col (LEFT) -->
        <div class="col-md-5">
            <!-- LINE CHART -->
            <a href="{{url('pendingCases')}}">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Pending /Allocation Cases</h3>
                    <hr class="whiter m-b-20">
                </div>
                <div class="box-body chart-responsive ">
                    {!! $charts->render() !!}

                </div><!-- /.box-body -->
            </div>

            </a><!-- /.box -->
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
            <a href="{{url('pendingClosureCases')}}">

            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Pending  Closure</h3>
                    <hr class="whiter m-b-20">
                </div>
                <div class="box-body chart-responsive">
                    {!! $chartssz->render() !!}

                </div><!-- /.box-body -->
            </div><!-- /.box -->
            <!-- DONUT CHART -->
            </a>

        </div><!-- /.col (LEFT) -->

        <div class="col-md-5">
            <a href="{{url('closedCases')}}">
            <!-- LINE CHART -->
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Resolve  Cases</h3>
                    <hr class="whiter m-b-20">
                </div>
                <div class="box-body chart-responsive">
                    {!! $chartss->render() !!}

                </div><!-- /.box-body -->
            </div><!-- /.box -->
            </a>
            <!-- BAR CHART -->


        </div><!-- /.col (RIGHT) -->
        <div class="col-md-1" >
        </div>
    </div><!-- /.row -->


</section><!-- /.content -->


<script src="bower_components/bootstrap/dist/js/bootstrap.min.js" charset="utf-8"></script>
</body>





@endsection
