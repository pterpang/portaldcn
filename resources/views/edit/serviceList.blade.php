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
									<?php
										$i = 1 ;
									?>

									<?php foreach ($serviceList as $row): ?>
										<?php
										if($category == "openPort") $subService = $row->Form_Open_Port;
										else if($category == "H2H") $subService = $row->Form_Host_to_Host;
										else if($category == "LAN") $subService = $row->Form_Permohonan_Koneksi_LAN;
										else if($category == "ASDelivery") $subService = $row->Form_Application_Service_Delivery;
										else if($category == "deviceConnection") $subService = $row->Form_Koneksi_Device_ke_Jaringan;
										else if($category == "remoteAccess") $subService = $row->Form_Pendaftaran_Remote_Access;
										?>
										<?php if (sizeof($subService)): ?>
										<tr>
											<td>{{$i++}}</td>
											<td>{{$row->requester_name}}</td>
											<td>{{$row->no_remedy}}</td>
											<td>{{$row->project_name}}</td>
											<td>{{$row->created_at}}</td>	
											<td align="center">
												<a href="{{Request::url() . '/' . $row->no_remedy}}" class="btn bg-green">
													<i class="material-icons" style="margin-right: 5px">remove_red_eye</i>View
												</a>											
											</td>
										</tr>
										<?php endif ?>
									<?php endforeach ?>
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