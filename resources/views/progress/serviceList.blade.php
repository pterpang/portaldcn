@extends('template')

@section('content-head')
<!-- Bootstrap Core Css -->
<link href="{{ asset('AdminBSB/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
@stop

@foreach ($activeClasses as $class)
	@section($class)
		active
	@stop
@endforeach

@section('content')
 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
               <h2 class="content-mainmenu"></h2>
            </div>
            <!-- Page Content -->
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-6">
                                    <h2 class="content-submenu"></h2>
                                </div>
                            </div>
                        </div>
                        <div class="body">                            
							<table class="table table-bordered table-hover table-striped js-basic-example" id="mainTable">
								<thead>
									<tr>
										<th>No</th>
										<th>Requester</th>
										<th>Remedy</th>
										<th>Description</th>
										<th>Request Date</th>		
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td>Fredy Sitorus</td>
										<td>CRQ00000017693</td>
										<td>Open Port Aplikasi XXX</td>
										<td>27 July 2018</td>	
										<td align="center">
											<a href="{{Request::url() . '/1'}}" class="btn bg-green">
												<i class="material-icons" style="margin-right: 5px">remove_red_eye</i>View
											</a>											
										</td>
									</tr>
									<tr>
										<td>2</td>
										<td>Felix Angkasa</td>
										<td>CRQ00000017695</td>
										<td>Open Port Aplikasi YYY</td>
										<td>28 July 2018</td>					
										<td align="center">
											<a href="{{Request::url() . '/1'}}" class="btn bg-green">
												<i class="material-icons" style="margin-right: 5px">remove_red_eye</i>View
											</a>											
										</td>										
									</tr>
									<tr>
										<td>3</td>
										<td>Hans Christianto</td>
										<td>CRQ00000017697</td>
										<td>Open Port Aplikasi AAA</td>
										<td>29 July 2018</td>		
										<td align="center">
											<a href="{{Request::url() . '/1'}}" class="btn bg-green">
												<i class="material-icons" style="margin-right: 5px">remove_red_eye</i>View
											</a>											
										</td>								
									</tr>									
								</tbody>
							</table>
							
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Page Content -->
        </div>
    </section>

@stop

@section('content-script')
<!-- Jquery DataTable Plugin Js -->
<script src="{{asset('AdminBSB/plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
<script src="{{asset('AdminBSB/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
<!-- Custom Js -->
<script src="{{asset('AdminBSB/js/pages/tables/jquery-datatable.js')}}"></script>
@stop