@extends('template')

@foreach ($activeClasses as $class)
	@section($class)
		active
	@stop
@endforeach

@section('content')
 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>
            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">import_export</i>
                        </div>
                        <div class="content">
                            <div class="text">Internet Banking & E-Channel Requests</div>
                            <div class="number count-to" data-from="0" data-to="{{$totalRequest[0]->count}}" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">phonelink</i>
                        </div>
                        <div class="content">
                            <div class="text">Server Farm Internal & Intranet Requests</div>
                            <div class="number count-to" data-from="0" data-to="{{$totalRequest[1]->count}}" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">people</i>
                        </div>
                        <div class="content">
                            <div class="text">H2H & WAN Requests</div>
                            <div class="number count-to" data-from="0" data-to="{{$totalRequest[2]->count}}" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>           
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">computer</i>
                        </div>
                        <div class="content">
                            <div class="text">Remote Office & LAN HQ Requests</div>
                            <div class="number count-to" data-from="0" data-to="{{$totalRequest[3]->count}}" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->
            <!-- CPU Usage -->
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-6">
                                    <h2>USER REQUEST (LAST 7 DAYS)</h2>
                                </div>                                
                            </div>
                        </div>
                        <div class="body">
                            <div id="real_time_chart" class="dashboard-flot-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# CPU Usage -->
            <div class="row clearfix">
               <!-- Latest Social Trends -->
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="body bg-cyan">
                            <div class="m-b--35 font-bold">TOP 5 WORKER</div>
                            <ul class="dashboard-stat-list">
                                <?php foreach ($tempArr as $key => $value): ?>
                                    <li>
                                        {{$key}}
                                         <span class="pull-right"><b>{{$value}}</b> <small>Requests</small></span>
                                    </li>                                    
                                <?php endforeach ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- #END# Latest Social Trends -->
                <!-- Answered Tickets -->
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="body bg-teal">
                            <div class="font-bold m-b--35">TOP 5 REQUESTER</div>
                            <ul class="dashboard-stat-list">
                                <?php foreach ($topRequester as $row): ?>
                                    <li>
                                        {{$row->requester_name}}
                                        <span class="pull-right"><b>{{$row->count}}</b> <small>Requests</small></span>
                                    </li>                                    
                                <?php endforeach ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- #END# Answered Tickets -->
            </div>

            <div class="row clearfix">
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="card">
                        <div class="header">
                            <h2>LATEST ARTICLE</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover dashboard-task-infos">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Article</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($articleList as $row): ?>
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$row->judul}}</td>
                                                <td align="right"><a href="{{URL::to('article') . '/' . $row->id}}" class="btn bg-green">Read</a></td>
                                            </tr>                                                
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->
                <!-- Browser Usage -->
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="header">
                            <h2>SERVICE COMPARISON</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div id="donut_chart" class="dashboard-donut-chart"></div>
                        </div>
                    </div>
                </div>
                <!-- #END# Browser Usage -->
            </div>
        </div>
    </section>

@stop

@section('content-script')
<!-- Morris Plugin Js -->
    <script src="{{ asset('AdminBSB/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('AdminBSB/plugins/morrisjs/morris.js') }}"></script>

    <!-- ChartJs -->
    <script src="{{ asset('AdminBSB/plugins/chartjs/Chart.bundle.js') }}"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="{{ asset('AdminBSB/plugins/flot-charts/jquery.flot.js') }}"></script>
    <script src="{{ asset('AdminBSB/plugins/flot-charts/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('AdminBSB/plugins/flot-charts/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('AdminBSB/plugins/flot-charts/jquery.flot.categories.js') }}"></script>
    <script src="{{ asset('AdminBSB/plugins/flot-charts/jquery.flot.time.js') }}"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="{{ asset('AdminBSB/plugins/jquery-sparkline/jquery.sparkline.js') }}"></script>
	<!--Index JS-->
	<script src="{{ asset('AdminBSB/js/pages/index.js') }}"></script>
    <script>
        <?php
            $ibt = (int)$totalRequest[0]->count;
            $sft = (int)$totalRequest[1]->count;
            $tpt = (int)$totalRequest[2]->count;
            $lant = (int)$totalRequest[3]->count;
            $totalRequests = $ibt + $sft + $tpt + $lant;
            
            $asd = floor($ibt*100/$totalRequests);
            $sft = floor($sft*100/$totalRequests);
            $tpt = floor($tpt*100/$totalRequests);
            $lant = floor($lant*100/$totalRequests);

        ?>
        Morris.Donut({
            element: 'donut_chart',
            data: [{
                label: 'IB',
                value: {{$ibt}}
            }, {
                label: 'SF',
                value: {{$sft}}
            }, {
                label: 'TP',
                value: {{$tpt}}
            }, {
                label: 'LAN',
                value: {{$lant}}
            }],
            colors: ['rgb(233, 30, 99)', 'rgb(0, 188, 212)', 'rgb(255, 152, 0)', 'rgb(0, 150, 136)'],
            formatter: function (y) {
                return y + '%'
            }
        });

        function initRealTimeChart() {
            var date = new Date();
            var min = [];
            date.setDate(date.getDate() + 1);
                
            for(i=0;i<7;i++){
                date.setDate(date.getDate() - 1);
                min[i] = date.getDate()+'/'+ (date.getMonth()+1) +'/'+date.getFullYear();
            }
            var plot = $.plot('#real_time_chart', [getData()], {
                series: {
                    shadowSize: 0,
                    color: 'rgb(0, 200, 83)',
                    // color: 'rgb(0, 188, 212)'
                },
                grid: {
                    borderColor: '#f3f3f3',
                    borderWidth: 1,
                    tickColor: '#f3f3f3',
                    hoverable: true,
                    autoHighlight: true,
                },
                lines: {
                    fill: true
                },
                yaxis: {
                    min: 0,
                    max: 80
                },
                xaxis: {
                    ticks: [[0,min[6]],[1,min[5]],[2,min[4]],[3,min[3]],[4,min[2]],[5,min[1]],[6, min[0]]]
                },
            });

            $("#real_time_chart").UseTooltip();

        }   


        function getData() {
            var res = [];
            res[0] = [0, <?php echo $flotData[0] ?>];
            res[1] = [1, <?php echo $flotData[1] ?>];
            res[2] = [2, <?php echo $flotData[2] ?>];
            res[3] = [3, <?php echo $flotData[3] ?>];
            res[4] = [4, <?php echo $flotData[4] ?>];
            res[5] = [5, <?php echo $flotData[5] ?>];
            res[6] = [6, <?php echo $flotData[6] ?>];
            return res;
        }

        var previousPoint = null, previousLabel = null;
 
        $.fn.UseTooltip = function () {
            $(this).bind("plothover", function (event, pos, item) {
                if (item) {
                    if ((previousLabel != item.series.label) || (previousPoint != item.dataIndex)) {
                        previousPoint = item.dataIndex;
                        previousLabel = item.series.label;
                        $("#tooltip").remove();
         
                        var x = item.datapoint[0];
                        var y = item.datapoint[1];
         
                        var color = item.series.color;
         
                        showTooltip(item.pageX, item.pageY, color,"<strong>" + y + " Requests</strong>");
                    }
                } else {
                    $("#tooltip").remove();
                    previousPoint = null;
                }
            });
        };


        function showTooltip(x, y, color, contents) {
            $('<div id="tooltip">' + contents + '</div>').css({
                position: 'absolute',
                display: 'none',
                top: y - 40,
                left: x - 120,
                border: '2px solid ' + color,
                padding: '3px',
                'font-size': '9px',
                'border-radius': '5px',
                'background-color': '#fff',
                'font-family': 'Verdana, Arial, Helvetica, Tahoma, sans-serif',
                opacity: 0.9
            }).appendTo("body").fadeIn(200);
        }


        initRealTimeChart();

        
    </script>
@stop