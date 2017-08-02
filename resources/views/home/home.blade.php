
@extends('master')

@section('content')

    

    
<!-- Breadcrumb -->
<ol class="breadcrumb hidden-xs">
    <li><a href="#">Home</a></li>
    <li class="active">Console</li>
</ol>

<h4 class="page-title">Console</h4>



<!-- Quick Stats -->
{{--<div class="block-area" id="tabs">--}}
    {{--<div class="tab-container">--}}

        {{--<div class="row nav tab">--}}


            {{--@if(isset($userViewAllocatateReferredCasesPermission) && $userViewAllocatateReferredCasesPermission->permission_id =='17')--}}
            {{--<a href="#reported">--}}
                {{--<div class="col-md-3 col-xs-6">--}}
                    {{--<div class="tile quick-stats">--}}
                        {{--<div id="stats-line-2" class="pull-left"></div>--}}
                        {{--<div class="data">--}}
                            {{--<h2 data-value="{{ count($numberReferredCases,0)}}">0</h2>--}}
                            {{--<small>Allocated/Referred Cases </small>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
             {{--</a>--}}
            {{--@endif--}}


            {{--@if(isset($userViewPendingAllocationCasesPermission) && $userViewPendingAllocationCasesPermission->permission_id =='18')--}}

                {{--<a href="#pendingreferral">--}}
                    {{--<div class="col-md-3 col-xs-6">--}}
                        {{--<div class="tile quick-stats">--}}
                            {{--<div id="stats-line" class="pull-left"></div>--}}
                            {{--<div class="data">--}}
                                {{--<h2 data-value="{{ count($numberPendingCases,0)}}">0</h2>--}}
                                {{--<small>Pending Allocation Cases </small>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</a>--}}
            {{--@endif--}}

            {{--@if(isset($userViewPendingClosureCasesPermission) && $userViewPendingClosureCasesPermission->permission_id =='19')--}}


            {{--<a href="#closure">--}}
                {{--<div class="col-md-3 col-xs-6">--}}
                    {{--<div class="tile quick-stats media">--}}
                        {{--<div id="stats-line-3" class="pull-left"></div>--}}
                        {{--<div class="media-body">--}}
                            {{--<h2 data-value="{{ count($numberPendingClosureCases,0)}}">0</h2>--}}
                            {{--<small>Pending Closure Cases</small>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</a>--}}

            {{--@endif--}}

            {{--@if(isset($userViewResolvedCasesPermission) && $userViewResolvedCasesPermission->permission_id =='20')--}}

            {{--<a href="#resolved">--}}
                {{--<div class="col-md-3 col-xs-6">--}}
                    {{--<div class="tile quick-stats media">--}}
                        {{--<div id="stats-line-4" class="pull-left"></div>--}}
                        {{--<div class="media-body">--}}
                            {{--<h2 data-value="{{ count($numberResolvedCases,0)}}">0</h2>--}}
                            {{--<small>Resolved Cases</small>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</a>--}}
            {{--@endif--}}

        {{--</div>--}}

       {{--<hr class="whiter" />--}}

       {{--<div class="tab-content">--}}
            {{--<div class="tab-pane active" id="reported">--}}
                {{--<!-- Responsive Table -->--}}
                {{--<div class="block-area" id="responsiveTable">--}}
                    {{--@if(Session::has('success'))--}}
                    {{--<div class="alert alert-info alert-dismissable fade in">--}}
                        {{--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>--}}
                        {{--{{ Session::get('success') }}--}}
                    {{--</div>--}}
                    {{--@endif--}}
                    {{--<div class="table-responsive overflow">--}}
                        {{--<h3 class="block-title">Allocated/Referred Cases</h3>--}}
                       {{--@if(isset($userCreateCasesPermission) && $userCreateCasesPermission->permission_id =='21')--}}
                        {{--<button class="btn btn-sm m-r-5" data-toggle="modal" onclick="clearCreateCaseModal()" data-target=".modalCreateCaseAgent">Create Case</button>--}}


                        {{--<table class="table tile table-striped" id="casesTable">--}}
                            {{--<thead>--}}
                              {{--<tr>--}}
                                    {{--<th>Id</th>--}}
                                    {{--<th>Created At</th>--}}
                                    {{--<th>Description</th>--}}
                                    {{--<th>Source</th>--}}
                                    {{--<th>Status</th>--}}
                                    {{--<th>Type</th>--}}
                                    {{--<th>Actions</th>--}}
                              {{--</tr>--}}
                            {{--</thead>--}}
                        {{--</table>--}}
                        {{--@endif--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="tab-pane" id="closure">--}}
             {{--<!-- Responsive Table -->--}}
                {{--<div class="block-area" id="responsiveTable">--}}
                    {{--@if(Session::has('success'))--}}
                    {{--<div class="alert alert-info alert-dismissable fade in">--}}
                        {{--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>--}}
                        {{--{{ Session::get('success') }}--}}
                    {{--</div>--}}
                    {{--@endif--}}
                    {{--<div class="table-responsive overflow">--}}
                        {{--<h3 class="block-title">Pending Closure Cases</h3>--}}
                         {{--@if(isset($userCreateCasesPermission) && $userCreateCasesPermission->permission_id =='21')--}}
                        {{--<button class="btn btn-sm m-r-5" data-toggle="modal" onclick="clearCreateCaseModal()" data-target=".modalCreateCaseAgent">Create Case</button>--}}

                        {{--<table class="table tile table-striped" id="deletedCasesTable">--}}
                            {{--<thead>--}}
                              {{--<tr>--}}
                                    {{--<th>Id</th>--}}
                                    {{--<th>Created At</th>--}}
                                    {{--<th>Description</th>--}}
                                    {{--<th>Source</th>--}}
                                    {{--<th>Status</th>--}}
                                    {{--<th>Actions</th>--}}
                              {{--</tr>--}}
                            {{--</thead>--}}
                        {{--</table>--}}
                         {{--@endif--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

            {{--<div class="tab-pane" id="pendingreferral">--}}
             {{--<!-- Responsive Table -->--}}
                {{--<div class="block-area" id="responsiveTable">--}}
                    {{--@if(Session::has('success'))--}}
                    {{--<div class="alert alert-info alert-dismissable fade in">--}}
                        {{--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>--}}
                        {{--{{ Session::get('success') }}--}}
                    {{--</div>--}}
                    {{--@endif--}}
                    {{--<div class="table-responsive overflow">--}}
                        {{--<h3 class="block-title">Pending Allocation Cases</h3>--}}
                         {{--@if(isset($userCreateCasesPermission) && $userCreateCasesPermission->permission_id =='21')--}}
                        {{--<button class="btn btn-sm m-r-5" data-toggle="modal" onclick="clearCreateCaseModal()" data-target=".modalCreateCaseAgent">Create Case</button>--}}

                        {{--<table class="table tile table-striped" id="pendingreferralCasesTable">--}}
                            {{--<thead>--}}
                              {{--<tr>--}}
                                    {{--<th>Id</th>--}}
                                    {{--<th>Created At</th>--}}
                                    {{--<th>Description</th>--}}
                                    {{--<th>Source</th>--}}
                                    {{--<th>Status</th>--}}
                                    {{--<th>Actions</th>--}}
                              {{--</tr>--}}
                            {{--</thead>--}}
                        {{--</table>--}}
                        {{--@endif--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

            {{--<div class="tab-pane" id="resolved">--}}
             {{--<!-- Responsive Table -->--}}
                {{--<div class="block-area" id="responsiveTable">--}}
                    {{--@if(Session::has('success'))--}}
                    {{--<div class="alert alert-info alert-dismissable fade in">--}}
                        {{--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>--}}
                        {{--{{ Session::get('success') }}--}}
                    {{--</div>--}}
                    {{--@endif--}}
                    {{--<div class="table-responsive overflow">--}}
                        {{--<h3 class="block-title">Resolved Cases</h3>--}}
                         {{--@if(isset($userCreateCasesPermission) && $userCreateCasesPermission->permission_id =='21')--}}
                        {{--<button class="btn btn-sm m-r-5" data-toggle="modal" onclick="clearCreateCaseModal()" data-target=".modalCreateCaseAgent">Create Case</button>--}}

                        {{--<table class="table tile table-striped" id="resolvedCasesTable">--}}
                            {{--<thead>--}}
                              {{--<tr>--}}
                                    {{--<th>Id</th>--}}
                                    {{--<th>Created At</th>--}}
                                    {{--<th>Description</th>--}}
                                    {{--<th>Source</th>--}}
                                    {{--<th>Status</th>--}}
                                    {{--<th>Actions</th>--}}
                              {{--</tr>--}}
                            {{--</thead>--}}
                        {{--</table>--}}
                        {{--@endif--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}


        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}



<section class="content">
    <div class="row">
        <div class="col-md-6">
            <!-- AREA CHART -->
            <a href="{{url('allocatedCases')}}">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title" align="center">ALLOCATED / REFFERED CASES</h3>

                    </div>
                    <div class="box-body">
                        <div class="chart">
                            <canvas id="lineChart" style="height:250px"></canvas>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </a>
            <a href="{{url('pendingCases')}}">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 align="center">PENDING / ALLOCATION CASES</h3>

                   
                </div>


                <div class="">
                    <div>
                        <canvas id="areaChart" style="height:250px;"></canvas>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            </a>
            <!-- /.box -->

            <!-- DONUT CHART -->

            <!-- /.box -->

        </div>
        <!-- /.col (LEFT) -->



        <div class="col-md-6">
            <!-- LINE CHART -->
            <a href="{{url('pendingClosureCases')}}">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 align="center">PENDING CLOSURE</h3>


       <div class="tab-content">
            <div class="tab-pane active" id="reported">
                <!-- Responsive Table -->
                <div class="block-area" id="responsiveTable">
                    @if(Session::has('success'))
                    <div class="alert alert-info alert-dismissable fade in">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ Session::get('success') }}
                    </div>
                    @endif
                    <div id="caseNotesNotification"></div>
                    <div class="table-responsive overflow">
                        <h3 class="block-title">Allocated/Referred Cases</h3>
                       @if(isset($userCreateCasesPermission) && $userCreateCasesPermission->permission_id =='21')
                        <button class="btn btn-sm m-r-5" data-toggle="modal" onclick="clearCreateCaseModal()" data-target=".modalCreateCaseAgent">Create Case</button>


                        <table class="table tile table-striped" id="casesTable">
                            <thead>
                              <tr>
                                    <th>Id</th>
                                    <th>Created At</th>
                                    <th>Description</th>
                                    <th>Source</th>
                                    <th>Status</th>
                                    <th>Type</th>
                                    <th>Actions</th>
                              </tr>
                            </thead>
                        </table>
                        @endif
                    </div>
                </div>
            </div>
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
                         @if(isset($userCreateCasesPermission) && $userCreateCasesPermission->permission_id =='21')
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
                         @endif
                    </div>
                </div>
            </div>


                    </div>
                    <div class="box-body">
                        <canvas id="pieChart" style="height:250px"></canvas>
                    </div>
                    <!-- /.box-body -->
                </div>
            </a>
            <!-- /.box -->

            <!-- BAR CHART -->
            <a href="{{url('closedCases')}}">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title" align="center">RESOLVED CASES</h3>

                
                </div>
                <div class="box-body">
                    <div class="chart">
                        <canvas id="barChart" style="height:230px;"></canvas>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            </a>
            <!-- /.box -->

        </div>
        </a>
        <!-- /.col (RIGHT) -->
    </div>
    <!-- /.row -->

</section>









<a id="anchorID" target="newwindow" class="hidden"></a>

<hr class="whiter" />
@include('cases.profile')
@include('cases.report')
@include('cases.allocation')
@include('cases.create')
@include('cases.createCase')
@include('cases.closeRequest')
@include('users.edit')
@include('cases.workflow')
@include('cases.poi')
@endsection



@section('footer')

<script type="javascript"  src="{{ asset('js/jquery.min.js') }}"></script>
<script  src="{{ asset('js/chartjs/Chart.min.js') }}"></script>
<script  src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 


<script>

    $(function () {

      //  alert('kldk');
       // localStorage.setItem('nqoh','mxo');

       // alert(datatchart);

        /* ChartJS
         * -------
         * Here we will create a few charts using ChartJS
         */
        //--------------
        //- AREA CHART -
        //--------------
        // Get context with jQuery - using jQuery's .get() method.
        var areaChartCanvas = $("#areaChart").get(0).getContext("2d");
        // This will get the first returned node in the jQuery collection.
        var areaChart = new Chart(areaChartCanvas);




                {{--$.ajax({--}}
                        {{--type: "GET",--}}
                        {{--url: "{{url("/generatecharts")}}",--}}
                        {{--data: {},--}}
                        {{--success: function(data) {--}}
                       {{--alert(data);--}}

                        {{--}--}}
                    {{--}--}}

                {{--)--}}


//                datasets :[{
//                    label: "Pending Cases",
//                    fillColor: "rgba(210, 214, 222, 1)",
//                    strokeColor: "rgba(210, 214, 222, 1)",
//                    pointColor: "rgba(210, 214, 222, 1)",
//                    pointStrokeColor: "#c1c7d1",
//                    pointHighlightFill: "#fff",
//                    pointHighlightStroke: "rgba(220,220,220,1)",
//                    data: [65, 59, 80, 81, 56, 55, 40, 81, 56, 55, 40, 32]
//             } ]
//                        label: "Allocated Cases",
//                        fillColor: "rgba(60,141,188,0.9)",
//                        strokeColor: "rgba(60,141,188,0.8)",
//                        pointColor: "#3b8bba",
//                        pointStrokeColor: "rgba(60,141,188,1)",
//                        pointHighlightFill: "#fff",
//                        pointHighlightStroke: "rgba(60,141,188,1)",
//                        data: [65, 59, 80, 81, 56, 55, 40, 81, 56, 55, 40, 32]
//                    },
//                    {
//                        label: "Pending Closure",
//                        fillColor: "rgba(60,141,188,0.9)",
//                        strokeColor: "rgba(60,141,188,0.8)",
//                        pointColor: "red",
//                        pointStrokeColor: "rgba(60,141,188,1)",
//                        pointHighlightFill: "#fff",
//                        pointHighlightStroke: "rgba(60,141,188,1)",
//                        data: [65, 59, 80, 81, 56, 55, 40, 81, 56, 55, 40, 32]
//                    },
//                    {
//                        label: "Closed Case",
//                        fillColor: "green",
//                        strokeColor: "rgba(60,141,188,0.8)",
//                        pointColor: "red",
//                        pointStrokeColor: "rgba(60,141,188,1)",
//                        pointHighlightFill: "#fff",
//                        pointHighlightStroke: "rgba(60,141,188,1)",
//                        data: [30, 5, 30, 60, 56, 54, 40, 10, 6, 15, 0, 2]
//                    }]
//


//                ]
     //   }
     //   alert(areaChartData);

//        var   datatchart= [];
    
        $.ajax({

                type: "GET",
                url: "{{url("/generatecharts")}}",
                data: {},
                success: function(data) {

					var areaChartData;
                    areaChartData = {
                        labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                        datasets:
                        data

                    }

            var areaChartOptions = {
                //Boolean - If we should show the scale at all
                showScale: true,
                //Boolean - Whether grid lines are shown across the chart
                scaleShowGridLines: false,
                //String - Colour of the grid lines
                scaleGridLineColor: "rgba(0,0,0,.05)",
                //Number - Width of the grid lines
                scaleGridLineWidth: 1,
                //Boolean - Whether to show horizontal lines (except X axis)
                scaleShowHorizontalLines: true,
                //Boolean - Whether to show vertical lines (except Y axis)
                scaleShowVerticalLines: true,
                //Boolean - Whether the line is curved between points
                bezierCurve: true,
                //Number - Tension of the bezier curve between points
                bezierCurveTension: 0.3,
                //Boolean - Whether to show a dot for each point
                pointDot: false,
                //Number - Radius of each point dot in pixels
                pointDotRadius: 4,
                //Number - Pixel width of point dot stroke
                pointDotStrokeWidth: 1,
                //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
                pointHitDetectionRadius: 20,
                //Boolean - Whether to show a stroke for datasets
                datasetStroke: true,
                //Number - Pixel width of dataset stroke
                datasetStrokeWidth: 2,
                //Boolean - Whether to fill the dataset with a color
                datasetFill: true,
                //String - A legend template
                legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
				//Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
				maintainAspectRatio: true,
				//Boolean - whether to make the chart responsive to window resizing
				responsive: true

    };
    //Create the line chart
    areaChart.Line(areaChartData, areaChartOptions);
    //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas = $("#lineChart").get(0).getContext("2d");
    var lineChart = new Chart(lineChartCanvas);
    var lineChartOptions = areaChartOptions;
    lineChartOptions.datasetFill = false;
    lineChart.Line(areaChartData, lineChartOptions);
    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
    var pieChart = new Chart(pieChartCanvas);
    var PieData = [
      /*{
        value: 550,
        color: "#f56954",
        highlight: "#f56954",
        label: ""
      },
      {
        value: 500,
        color: "#00a65a",
        highlight: "#00a65a",
        label: "IE"
      },*/
      {
        value: 4,
        color: "#f39c12",
        highlight: "#f39c12",
        label: "Port Engineer"
      },
      {
        value: 6,
        color: "#00c0ef",
        highlight: "#00c0ef",
        label: "Security"
      },
      {
        value: 3,
        color: "#3c8dbc",
        highlight: "#3c8dbc",
        label: "Real Estate"
      },
      {
        value: 1,
        color: "#d2d6de",
        highlight: "#d2d6de",
        label: "Gate Track"
      }
    ];

    var pieOptions = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke: true,
      //String - The colour of each segment stroke
      segmentStrokeColor: "#fff",
      //Number - The width of each segment stroke
      segmentStrokeWidth: 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps: 100,
      //String - Animation easing effect
      animationEasing: "easeOutBounce",
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate: true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale: false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive: true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: true,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
    };
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions);
    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $("#barChart").get(0).getContext("2d");
    
    var barChart = new Chart(barChartCanvas);
    var barChartData = areaChartData;
    barChartData.datasets[1].fillColor = "#fff";
    barChartData.datasets[1].strokeColor = "#00a65a";
    barChartData.datasets[1].pointColor = "#00a65a";
    var barChartOptions = {
	
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero: true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines: true,
      //String - Colour of the grid lines
      scaleGridLineColor: "rgba(0,0,0,.05)",
      //Number - Width of the grid lines
      scaleGridLineWidth: 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines: true,
      //Boolean - If there is a stroke on each bar
      barShowStroke: true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth: 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing: 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing: 1,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
      //Boolean - whether to make the chart responsive
      responsive: true,
      maintainAspectRatio: true
    };
    barChartOptions.datasetFill = false;
    barChart.Bar(barChartData, barChartOptions);

         }
            
			
			});
  });
</script>


  {{--@if (count($errors) > 0)--}}

    {{--$('#modalAddContactModal').modal('show');--}}
     {{--@endif--}}


 {{----}}
    {{--</script>--}}

        {{----}}
 {{--<script>--}}

 {{--@include('functions.caseModal')--}}



  {{--@if (count($errors) > 0)--}}

    {{--$('#modalAddContactModal').modal('show');--}}


  {{--@endif--}}


{{--</script>--}}
@endsection

