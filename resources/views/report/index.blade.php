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
                <h2>Report</h2>
            </div>
            <!-- Widgets -->
            <div class="row clearfix">
                
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                    <div class="panel panel-default" data-panel-fullscreen="false" data-panel-close="false">
                        <div class="panel-heading bg-teal col-white">
                            <i class="fa fa-calendar m-r-5"></i>OPEN PORT
                            <div class="panel-controls"><a href="javascript:void(0);" class="panel-collapsable" data-toggle="tooltip" data-title="Collapse/Expand" data-placement="bottom" data-original-title="" title=""><i class="fa fa-chevron-up"></i></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="align-justify">
                                <table class="table  table-bordered">
                                    <thead>
                                        <th>Description</th>
                                        <th>Value</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Average</td>
                                            <td>123</td>
                                        </tr>
                                        <tr>
                                            <td>Mean</td>
                                            <td>123</td>
                                        </tr>
                                        <tr>
                                            <td>Modus</td>
                                            <td>55</td>
                                        </tr>
                                        <tr>
                                            <td>Max</td>
                                            <td>123</td>
                                        </tr>
                                        <tr>
                                            <td>Total Request</td>
                                            <td>1056</td>
                                        </tr>                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                    <div class="panel panel-default" data-panel-fullscreen="false" data-panel-close="false">
                        <div class="panel-heading bg-teal col-white">
                            <i class="fa fa-calendar m-r-5"></i>DEVICE CONNECTION
                            <div class="panel-controls"><a href="javascript:void(0);" class="panel-collapsable" data-toggle="tooltip" data-title="Collapse/Expand" data-placement="bottom" data-original-title="" title=""><i class="fa fa-chevron-up"></i></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="align-justify">
                                <table class="table  table-bordered">   
                                    <thead>
                                        <th>Description</th>
                                        <th>Value</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Average</td>
                                            <td>123</td>
                                        </tr>
                                        <tr>
                                            <td>Mean</td>
                                            <td>123</td>
                                        </tr>
                                        <tr>
                                            <td>Modus</td>
                                            <td>55</td>
                                        </tr>
                                        <tr>
                                            <td>Max</td>
                                            <td>123</td>
                                        </tr>
                                        <tr>
                                            <td>Total Request</td>
                                            <td>1056</td>
                                        </tr>                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                    <div class="panel panel-default" data-panel-fullscreen="false" data-panel-close="false">
                        <div class="panel-heading bg-teal col-white">
                            <i class="fa fa-calendar m-r-5"></i>H2H CONNECTION
                            <div class="panel-controls"><a href="javascript:void(0);" class="panel-collapsable" data-toggle="tooltip" data-title="Collapse/Expand" data-placement="bottom" data-original-title="" title=""><i class="fa fa-chevron-up"></i></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="align-justify">
                                <table class="table  table-bordered">
                                    <thead>
                                        <th>Description</th>
                                        <th>Value</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Average</td>
                                            <td>123</td>
                                        </tr>
                                        <tr>
                                            <td>Mean</td>
                                            <td>123</td>
                                        </tr>
                                        <tr>
                                            <td>Modus</td>
                                            <td>55</td>
                                        </tr>
                                        <tr>
                                            <td>Max</td>
                                            <td>123</td>
                                        </tr>
                                        <tr>
                                            <td>Total Request</td>
                                            <td>1056</td>
                                        </tr>                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                    <div class="panel panel-default" data-panel-fullscreen="false" data-panel-close="false">
                        <div class="panel-heading bg-teal col-white">
                            <i class="fa fa-calendar m-r-5"></i>LAN CONNECTION
                            <div class="panel-controls"><a href="javascript:void(0);" class="panel-collapsable" data-toggle="tooltip" data-title="Collapse/Expand" data-placement="bottom" data-original-title="" title=""><i class="fa fa-chevron-up"></i></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="align-justify">
                                <table class="table  table-bordered">
                                    <thead>
                                        <th>Description</th>
                                        <th>Value</th>
                                    </thead>                                    
                                    <tbody>
                                        <tr>
                                            <td>Average</td>
                                            <td>123</td>
                                        </tr>
                                        <tr>
                                            <td>Mean</td>
                                            <td>123</td>
                                        </tr>
                                        <tr>
                                            <td>Modus</td>
                                            <td>55</td>
                                        </tr>
                                        <tr>
                                            <td>Max</td>
                                            <td>123</td>
                                        </tr>
                                        <tr>
                                            <td>Total Request</td>
                                            <td>1056</td>
                                        </tr>                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                    <div class="panel panel-default" data-panel-fullscreen="false" data-panel-close="false">
                        <div class="panel-heading bg-teal col-white">
                            <i class="fa fa-calendar m-r-5"></i>REMOTE ACCESS
                            <div class="panel-controls"><a href="javascript:void(0);" class="panel-collapsable" data-toggle="tooltip" data-title="Collapse/Expand" data-placement="bottom" data-original-title="" title=""><i class="fa fa-chevron-up"></i></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="align-justify">
                                <table class="table  table-bordered">
                                    <thead>
                                        <th>Description</th>
                                        <th>Value</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Average</td>
                                            <td>123</td>
                                        </tr>
                                        <tr>
                                            <td>Mean</td>
                                            <td>123</td>
                                        </tr>
                                        <tr>
                                            <td>Modus</td>
                                            <td>55</td>
                                        </tr>
                                        <tr>
                                            <td>Max</td>
                                            <td>123</td>
                                        </tr>
                                        <tr>
                                            <td>Total Request</td>
                                            <td>1056</td>
                                        </tr>                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                    <div class="panel panel-default" data-panel-fullscreen="false" data-panel-close="false">
                        <div class="panel-heading bg-teal col-white">
                            <i class="fa fa-calendar m-r-5"></i>APPLICATION SERVICE DELIVERY
                            <div class="panel-controls"><a href="javascript:void(0);" class="panel-collapsable" data-toggle="tooltip" data-title="Collapse/Expand" data-placement="bottom" data-original-title="" title=""><i class="fa fa-chevron-up"></i></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="align-justify">
                                <table class="table  table-bordered">
                                    <thead>
                                        <th>Description</th>
                                        <th>Value</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Average</td>
                                            <td>123</td>
                                        </tr>
                                        <tr>
                                            <td>Mean</td>
                                            <td>123</td>
                                        </tr>
                                        <tr>
                                            <td>Modus</td>
                                            <td>55</td>
                                        </tr>
                                        <tr>
                                            <td>Max</td>
                                            <td>123</td>
                                        </tr>
                                        <tr>
                                            <td>Total Request</td>
                                            <td>1056</td>
                                        </tr>                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>     

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                    <div class="panel panel-default" data-panel-fullscreen="false" data-panel-close="false">
                        <div class="panel-heading bg-blue col-white">
                            <i class="fa fa-calendar m-r-5"></i>INTERNET BANKING & E-CHANNEL
                            <div class="panel-controls"><a href="javascript:void(0);" class="panel-collapsable" data-toggle="tooltip" data-title="Collapse/Expand" data-placement="bottom" data-original-title="" title=""><i class="fa fa-chevron-up"></i></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="align-justify">
                                <table class="table  table-bordered">
                                    <thead>
                                        <th>Description</th>
                                        <th>Value</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Average</td>
                                            <td>123</td>
                                        </tr>
                                        <tr>
                                            <td>Mean</td>
                                            <td>123</td>
                                        </tr>
                                        <tr>
                                            <td>Modus</td>
                                            <td>55</td>
                                        </tr>
                                        <tr>
                                            <td>Max</td>
                                            <td>123</td>
                                        </tr>
                                        <tr>
                                            <td>Total Request</td>
                                            <td>1056</td>
                                        </tr>                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                    <div class="panel panel-default" data-panel-fullscreen="false" data-panel-close="false">
                        <div class="panel-heading bg-blue col-white">
                            <i class="fa fa-calendar m-r-5"></i>SERVER FARM INTERNAL & INTRANET
                            <div class="panel-controls"><a href="javascript:void(0);" class="panel-collapsable" data-toggle="tooltip" data-title="Collapse/Expand" data-placement="bottom" data-original-title="" title=""><i class="fa fa-chevron-up"></i></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="align-justify">
                                <table class="table  table-bordered">
                                    <thead>
                                        <th>Description</th>
                                        <th>Value</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Average</td>
                                            <td>123</td>
                                        </tr>
                                        <tr>
                                            <td>Mean</td>
                                            <td>123</td>
                                        </tr>
                                        <tr>
                                            <td>Modus</td>
                                            <td>55</td>
                                        </tr>
                                        <tr>
                                            <td>Max</td>
                                            <td>123</td>
                                        </tr>
                                        <tr>
                                            <td>Total Request</td>
                                            <td>1056</td>
                                        </tr>                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                    <div class="panel panel-default" data-panel-fullscreen="false" data-panel-close="false">
                        <div class="panel-heading bg-blue col-white">
                            <i class="fa fa-calendar m-r-5"></i>H2H & WAN
                            <div class="panel-controls"><a href="javascript:void(0);" class="panel-collapsable" data-toggle="tooltip" data-title="Collapse/Expand" data-placement="bottom" data-original-title="" title=""><i class="fa fa-chevron-up"></i></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="align-justify">
                                <table class="table  table-bordered">   
                                    <thead>
                                        <th>Description</th>
                                        <th>Value</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Average</td>
                                            <td>123</td>
                                        </tr>
                                        <tr>
                                            <td>Mean</td>
                                            <td>123</td>
                                        </tr>
                                        <tr>
                                            <td>Modus</td>
                                            <td>55</td>
                                        </tr>
                                        <tr>
                                            <td>Max</td>
                                            <td>123</td>
                                        </tr>
                                        <tr>
                                            <td>Total Request</td>
                                            <td>1056</td>
                                        </tr>                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                    <div class="panel panel-default" data-panel-fullscreen="false" data-panel-close="false">
                        <div class="panel-heading bg-blue col-white">
                            <i class="fa fa-calendar m-r-5"></i>REMOTE OFFICE & LAN HQ
                            <div class="panel-controls"><a href="javascript:void(0);" class="panel-collapsable" data-toggle="tooltip" data-title="Collapse/Expand" data-placement="bottom" data-original-title="" title=""><i class="fa fa-chevron-up"></i></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="align-justify">
                                <table class="table  table-bordered">
                                    <thead>
                                        <th>Description</th>
                                        <th>Value</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Average</td>
                                            <td>123</td>
                                        </tr>
                                        <tr>
                                            <td>Mean</td>
                                            <td>123</td>
                                        </tr>
                                        <tr>
                                            <td>Modus</td>
                                            <td>55</td>
                                        </tr>
                                        <tr>
                                            <td>Max</td>
                                            <td>123</td>
                                        </tr>
                                        <tr>
                                            <td>Total Request</td>
                                            <td>1056</td>
                                        </tr>                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                    <div class="panel panel-default" data-panel-fullscreen="false" data-panel-close="false">
                        <div class="panel-heading bg-blue col-white">
                            <i class="fa fa-calendar m-r-5"></i>NETWORK SECURITY & MONITORING
                            <div class="panel-controls"><a href="javascript:void(0);" class="panel-collapsable" data-toggle="tooltip" data-title="Collapse/Expand" data-placement="bottom" data-original-title="" title=""><i class="fa fa-chevron-up"></i></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="align-justify">
                                <table class="table  table-bordered">
                                    <thead>
                                        <th>Description</th>
                                        <th>Value</th>
                                    </thead>                                    
                                    <tbody>
                                        <tr>
                                            <td>Average</td>
                                            <td>123</td>
                                        </tr>
                                        <tr>
                                            <td>Mean</td>
                                            <td>123</td>
                                        </tr>
                                        <tr>
                                            <td>Modus</td>
                                            <td>55</td>
                                        </tr>
                                        <tr>
                                            <td>Max</td>
                                            <td>123</td>
                                        </tr>
                                        <tr>
                                            <td>Total Request</td>
                                            <td>1056</td>
                                        </tr>                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
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
@stop