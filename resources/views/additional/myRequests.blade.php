@extends('template')

@section('content-head')
<!-- Bootstrap Core Css -->
<link href="{{ asset('AdminBSB/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
<meta name="csrf-token" content="{{ csrf_token() }}">
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
										<th>Category</th>
										<th>Task</th>
										<th>Request Date</th>
										<!--th>Action</th-->
									</tr>
								</thead>
								<tbody>
									<?php $i = 1; ?>
									<?php foreach ($requestList as $row): ?>
									<tr>
										<td>{{$i++}}</td>
										<td>{{$row->requester_name}}</td>
										<td>{{$row->no_remedy}}</td>
										<td>{{$row->project_name}}</td>
										<td>
											<?php
											if($row->category == 1){
												echo "Internet banking & E-Channel";
											}else if($row->category == 2){
												echo "Server Farm Internal & Intranet";
											}else if($row->category == 3){
												echo "H2H & WAN";
											}else if($row->category == 4){
												echo "Remote Office & LAN HQ";
											}
											else if($row->category == 5){
												echo "Network Security & Monitoring";
											}
											?>
										<td>
											<?php if (sizeof($row->Form_Open_Port) > 0): ?>
												<a href="{{Request::URL() . '/openport/' . $row->id}}" class="row"><i class="material-icons" style="margin-right: 10px">keyboard_tab</i>Open Port</a>
											<?php endif ?>
											<?php if (sizeof($row->Form_Koneksi_Device_ke_Jaringan) > 0): ?>
												<a href="{{Request::URL() . '/deviceConnection/' . $row->id}}" class="row"><i class="material-icons" style="margin-right: 10px">device_hub</i>Device Connection</a>
											<?php endif ?>
											<?php if (sizeof($row->Form_Host_to_Host) > 0): ?>
												<a href="{{Request::URL() . '/H2H/' . $row->id}}" class="row"><i class="material-icons" style="margin-right: 10px">import_export</i>H2H Connection</a>
											<?php endif ?>
											<?php if (sizeof($row->Form_Permohonan_Koneksi_Lan) > 0): ?>
												<a href="{{Request::URL() . '/LAN/' . $row->id}}" class="row"><i class="material-icons" style="margin-right: 10px">computer</i>LAN Connection</a>
											<?php endif ?>
											<?php if (sizeof($row->Form_Pendaftaran_Remote_Access) > 0): ?>
												<a href="{{Request::URL() . '/remoteAccess/' . $row->id}}" class="row"><i class="material-icons" style="margin-right: 10px">phonelink</i>Remote Access</a>
											<?php endif ?>
											<?php
											$asdFlag = 0;
											if(isset($row->Form_Application_Service_Delivery)){
									            foreach ($row->Form_Application_Service_Delivery as $row2) {
									                if(sizeof($row2->Form_Load_Balancer) > 0)
									                    $asdFlag = 1;
									                else if (sizeof($row2->Form_Web_Application_Firewall) > 0)
									                    $asdFlag = 1;
									                else if (sizeof($row2->Form_Application_Acceleration) > 0)
									                    $asdFlag = 1;
									                else if (sizeof($row2->Form_Multiple_Active_Data_Center) > 0)
									                    $asdFlag = 1;                   
									            }
									        }
											?>
											<?php if ($asdFlag == 1): ?>
												<a href="{{Request::URL() . '/ASDelivery/' . $row->id}}" class="row"><i class="material-icons" style="margin-right: 10px">group</i>Application Service Delivery</a>
											<?php endif ?>
										</td>
                                        <?php if($row->parentProgress ==0):?>
										<td>
											{{$row->created_at? date_format($row->created_at, 'd F Y') : "-"}}<br/>
											<span class="col-red">({{$row->parentProgress}}% complete)</span>
										</td>
                                        <?php elseif($row->parentProgress ==100):?>
										<td>
											{{$row->created_at? date_format($row->created_at, 'd F Y') : "-"}}<br/>
											<span class="col-green">({{$row->parentProgress}}% complete)</span>
										</td>
                                        <?php else:?>
										<td>
											{{$row->created_at? date_format($row->created_at, 'd F Y') : "-"}}<br/>
											<span class="col-orange">({{$row->parentProgress}}% complete)</span>
										</td>
                                    <?php endif ?>
										<!--td align="center">
											<a href="#" class="btn bg-red delete" id="deleteRequest{{$row->id}}" data-id="{{$row->id}}" data-token="{{ csrf_token() }}">
												<i class="material-icons" style="margin-right: 5px">cancel</i>Cancel
											</a>
										</td-->
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

<script>
	<?php foreach($requestList as $row):?>
	$('#deleteRequest{{$row->id}}').click(function (e) {
	    e.preventDefault();
		if(window.confirm("Are you sure? All data will be lost.")){
		 	var id = $(this).data('id');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url:'/myRequests/delete/'+id,
				type:'delete',
				data: {'id': id,'_token': '{{csrf_token()}}'},
				success: function (e) {
                    if (e == "OK") {
                        alert("Your Requests have been successfully cancelled");
                        window.location = "../myRequests";
                    }
                }
 			})
		}
    });
	<?php endforeach?>
</script>

@stop