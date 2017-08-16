@extends('master')
@section('content')
    <style type="text/css">

        .table-fixed thead {
            width: 100%;
        }
        .table-fixed tbody {
            height: 230px;
            overflow-y: auto;
            width: 50%;
        }
        .table-fixed thead, .table-fixed tbody, .table-fixed tr, .table-fixed td, .table-fixed th {
            display: block;
        }
        .table-fixed tbody td, .table-fixed thead > tr> th {
            float: left;
            border-bottom-width: 0;
        }
    </style>

    <div class="container">
        <h4 class="page-title">address book</h4>
        <ul class="nav nav-pills navbar-right" role="tablist">
            <li class="active"><a data-toggle="tab" href="#home">Global Address Book</a></li>
            <li><a data-toggle="tab" href="#menu1">Menu 1</a></li>
            <li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
            <li><a data-toggle="tab" href="#menu3">Menu 3</a></li>
        </ul>

        <div class="tab-content">

            <div id="home" class="tab-pane fade in active">

                <br/>
                <br/>

                <div class="block-area">
                    <div class="col-md-1"></div>
                    <div class="col-md-4" id="left">
                    <div class="table-responsive overflow">
                        <table class="table table-striped table-fixed">
                            <thead>
                            <tr>
                                <th>Make</th>
                                <th>Model</th>
                                <th>Color</th>
                                <th>Year</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="filterable-cell">Ford</td>
                                <td class="filterable-cell">Escort</td>
                                <td class="filterable-cell">Blue</td>
                                <td class="filterable-cell">2000</td>
                            </tr>
                            <tr>
                                <td class="filterable-cell">Ford</td>
                                <td class="filterable-cell">Escort</td>
                                <td class="filterable-cell">Blue</td>
                                <td class="filterable-cell">2000</td>
                            </tr>
                            <tr>
                                <td class="filterable-cell">Ford</td>
                                <td class="filterable-cell">Escort</td>
                                <td class="filterable-cell">Blue</td>
                                <td class="filterable-cell">2000</td>
                            </tr>
                            <tr>
                                <td class="filterable-cell">Ford</td>
                                <td class="filterable-cell">Escort</td>
                                <td class="filterable-cell">Blue</td>
                                <td class="filterable-cell">2000</td>
                            </tr>
                            <tr>
                                <td class="filterable-cell">Ford</td>
                                <td class="filterable-cell">Escort</td>
                                <td class="filterable-cell">Blue</td>
                                <td class="filterable-cell">2000</td>
                            </tr>
                            <tr>
                                <td class="filterable-cell">Ford</td>
                                <td class="filterable-cell">Escort</td>
                                <td class="filterable-cell">Blue</td>
                                <td class="filterable-cell">2000</td>
                            </tr>
                            <tr>
                                <td class="filterable-cell">Ford</td>
                                <td class="filterable-cell">Escort</td>
                                <td class="filterable-cell">Blue</td>
                                <td class="filterable-cell">2000</td>
                            </tr>
                            <tr>
                                <td class="filterable-cell">Ford</td>
                                <td class="filterable-cell">Escort</td>
                                <td class="filterable-cell">Blue</td>
                                <td class="filterable-cell">2000</td>
                            </tr>
                            <tr>
                                <td class="filterable-cell">Ford</td>
                                <td class="filterable-cell">Escort</td>
                                <td class="filterable-cell">Blue</td>
                                <td class="filterable-cell">2000</td>
                            </tr>
                            <tr>
                                <td class="filterable-cell">Ford</td>
                                <td class="filterable-cell">Escort</td>
                                <td class="filterable-cell">Blue</td>
                                <td class="filterable-cell">2000</td>
                            </tr>
                            <tr>
                                <td class="filterable-cell">Ford</td>
                                <td class="filterable-cell">Escort</td>
                                <td class="filterable-cell">Blue</td>
                                <td class="filterable-cell">2000</td>
                            </tr>
                            <tr>
                                <td class="filterable-cell">Ford</td>
                                <td class="filterable-cell">Escort</td>
                                <td class="filterable-cell">Blue</td>
                                <td class="filterable-cell">2000</td>
                            </tr>
                            <tr>
                                <td class="filterable-cell">Ford</td>
                                <td class="filterable-cell">Escort</td>
                                <td class="filterable-cell">Blue</td>
                                <td class="filterable-cell">2000</td>
                            </tr>
                            <tr>
                                <td class="filterable-cell">Ford</td>
                                <td class="filterable-cell">Escort</td>
                                <td class="filterable-cell">Blue</td>
                                <td class="filterable-cell">2000</td>
                            </tr>
                            <tr>
                                <td class="filterable-cell">Ford</td>
                                <td class="filterable-cell">Escort</td>
                                <td class="filterable-cell">Blue</td>
                                <td class="filterable-cell">2000</td>
                            </tr>
                            <tr>
                                <td class="filterable-cell">Ford</td>
                                <td class="filterable-cell">Escort</td>
                                <td class="filterable-cell">Blue</td>
                                <td class="filterable-cell">2000</td>
                            </tr>
                            <tr>
                                <td class="filterable-cell">Ford</td>
                                <td class="filterable-cell">Escort</td>
                                <td class="filterable-cell">Blue</td>
                                <td class="filterable-cell">2000</td>
                            </tr>
                            <tr>
                                <td class="filterable-cell">Ford</td>
                                <td class="filterable-cell">Escort</td>
                                <td class="filterable-cell">Blue</td>
                                <td class="filterable-cell">2000</td>
                            </tr>
                            <tr>
                                <td class="filterable-cell">Ford</td>
                                <td class="filterable-cell">Escort</td>
                                <td class="filterable-cell">Blue</td>
                                <td class="filterable-cell">2000</td>
                            </tr>
                            <tr>
                                <td class="filterable-cell">Ford</td>
                                <td class="filterable-cell">Escort</td>
                                <td class="filterable-cell">Blue</td>
                                <td class="filterable-cell">2000</td>
                            </tr>
                            </tbody>
                        </table>




                        <p>
                        </p>

                    </div>
                    </div>
                    <div class="col-md-6" id="right">

                        <table class="table tile table-striped" id="tasksTable">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Start Date</th>
                                <th>Due Date</th>
                                <th>Assigned To</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                        </table>


                    </div>
                    <div class="col-md-1"></div>
                </div>


            </div>

            <div id="menu1" class="tab-pane fade">
                <h3>Menu 1</h3>
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
            <div id="menu2" class="tab-pane fade">
                <h3>Menu 2</h3>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
            </div>
            <div id="menu3" class="tab-pane fade">
                <h3>Menu 3</h3>
                <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
            </div>
        </div>
    </div>
    @endsection