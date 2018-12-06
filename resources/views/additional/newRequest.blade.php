@extends('template')

@section('content-head')
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Bootstrap Core Css -->
<link href="{{ asset('AdminBSB/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">

<style>
.w500{
	width: 500px;
}

.panel-title{
	padding: 15px;
}

.panel-group .panel .panel-heading a{
	display: inline;
}

.tdDisabled{
	cursor: not-allowed;
	background: gray;
}

[type="checkbox"].filled-in:not(:checked) + label::after{
	background: white;
}

.panel-group{
	margin-bottom: 0px;
}

label.error{
	color: red;
	font-weight: normal;
}

textarea:disabled, select:disabled{
	background: #DADADA !important;
}

#toas-container{
	position: relative;
}

.panel a{
	cursor:default;
}

</style>
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
					<div class="body" id="autoDisabled">   
						<form id="metaForm">
							<table id="metaTable">
								<tr>
									<td>Remedy<span style="color: red">*</span></td>
									<td style="padding-left: 20px">
										<table>
											<tr>
												<td><input type="text" style="width: 421px" class="form-control" name="no_remedy" id="no_remedy" placeholder="Last 6 digits"/>
												</td>
												<td>&nbsp;</td>
												<td>
													<button class="btn bg-teal" id="btnCheck" style="width: 76px">CHECK</button>
													<!-- <label id="no_remedy-error" class="error" for="no_remedy"></label> -->
												</td>
											</tr>
										</table>
										
									</td>
								</tr>
								<tr>
									<td>Description<span style="color: red">*</span></td>
									<td style="padding-left: 20px; padding-top: 10px">
										<textarea class="w500 form-control" style="resize: none" rows="3" name="project_name" id="project_name" disabled="disabled" placeholder="Project Name"></textarea>
									</td>
								</tr>
								<tr>
									<td>Categories<span style="color: red">*</span></td>
									<td style="padding-left: 20px; padding-top: 10px">
										<select required="true" id="category" class="w500 form-control" name="metaCategories" disabled="disabled">
											<option value="">-- Select Category --</option>	
											<?php foreach ($categories as $row): ?>
												<option value="{{$row->id}}">{{$row->description}}</option>	
											<?php endforeach ?>
										</select>
									</td>
								</tr>

								<tr style="display:none" id="services">
									<td>Services<span style="color: red">*</span></td>
										<td style="padding-left: 20px; padding-top: 10px">
											<input class="services ops" name="cbservices" type="checkbox" value="OpenPort" id="OpenPort" />
											<label class="services ops" for="OpenPort">Open Port</label><br class="services ops"/>
											<input class="services dcs" name="cbservices" type="checkbox" value="DeviceConnection" id="DeviceConnection" />
											<label class="services dcs" for="DeviceConnection">Device Connection</label><br class="services dcs"/>
											<input class="services h2hs" name="cbservices" type="checkbox" value="H2HConnection" id="H2HConnection" />
											<label class="services h2hs" for="H2HConnection">H2H Connection</label><br class="services h2hs">
											<input class="services lans" name="cbservices" type="checkbox" value="LANConnection" id="LANConnection" />
											<label class="services lans" for="LANConnection">LAN Connection</label><br class="services lans"/>
											<input class="services asds" name="cbservices" type="checkbox" value="ApplicationServiceDelivery" id="ApplicationServiceDelivery" />
											<label class="services asds" for="ApplicationServiceDelivery">Application Service Delivery</label><br class="services asds"/>
											<input class="services ras" name="cbservices" type="checkbox" value="RemoteAccess" id="RemoteAccess" />
											<label class="services ras" for="RemoteAccess">Remote Access</label><br class="services ras"/>
									</td>
								</tr>
								<tr><td colspan="2" style="color: red; font-style: italic; padding-top: 10px">*) Required</td></tr>
								

								<tr>
									<td colspan="2" style="padding-top: 20px">
										<button class="btn bg-teal form-control" id="btnCreate" style="display: none">CREATE</button>
										<button class="btn bg-orange form-control" id="btnResetAll" style="display:none">RESET ALL</button>
									</td>
								</tr>
							</table>
						</form>                         
					</div>
				</div>

				<!-- Service Section -->
				<div class="row" id="serviceBar" style="display: none">
					<div class="col-xs-12 ol-sm-12 col-md-12 col-lg-12">
						<h5>Choose your services:</h5>
						<div class="panel-group" id="accordion_1921" role="tablist" aria-multiselectable="true">
							<form id="mainForm">
								@csrf
								
								<div class="panel panel-openport mainPanel" sign="dtcb1" id="panel-op" style="display: none">
									<div class="panel-heading bg-blue-grey" role="tab" id="headingOne_192">
										<h4 class="panel-title">
											<a role="button" data-toggle="collapse" data-parent="#accordion_1921" href="#collapseOne_192" aria-expanded="false" aria-controls="collapseOne_192">
												<i class="material-icons pull-right">expand_more</i>Open Port
											</a>
										</h4>
									</div>
									<div id="collapseOne_192" class="panel-collapse collapse" data-parent="accordion_1921" role="tabpanel" aria-labelledby="headingOne_192" aria-expanded="false" style="height: 0px;">
										<div class="panel-body table-responsive">						
											<i style="font-size: 90%; color: gray">*) Simply click the table cell to edit the value, separated with newline (enter)</i>
											<table class="mainTable table table-bordered" style="overflow: scroll; width: 100%">
												<thead>
													<th>No.</th>
													<th>Source</th>
													<th>Destination</th>
													<th>Port Number</th>                
													<th>Port Type</th>                
													<th>Direction</th>              
													<th>Action</th>              
													<th>Description</th>
													<th>Remove</th>
												</thead>
												<tbody>
													<tr id="cloneRow" style="display:none">
														<td class="tdNo op_no"></td>
														<td class="editable tdSource op_source_ip"></td>
														<td class="editable tdDestination op_destination_ip"></td>
														<td class="form-group tdPortNumber" style="width: 200px">
															<select class="form-control portType tdPortType spk op_protocol">
																<option value="TCP">TCP</option>
																<option value="UDP">UDP</option>                      
																<option value="TCP-UDP">TCP-UDP</option>                      
																<option value="ICMP">ICMP</option>
																<option value="IP">IP</option>                      
															</select>
														</td>
														<td class="editable tdPortNumber op_port"></td>
														<td class="form-group tdDirection" style="width: 200px">
															<select class="form-control op_arah">
																<option value="1">1 Direction</option>
																<option value="2">2 Direction</option>                      
															</select>
														</td>
														<td class="form-group tdAction" style="width: 200px">
															<select class="form-control op_action">
																<option value="Open">Open</option>
																<option value="Close">Close</option>                      
															</select>
														</td>
														<td class="editable tdDescription op_fungsi"></td>       
														<td align="center"><button class="btn btn-danger btn-sm"><i class="material-icons">close</i></button></td>                     
													</tr>               
													<tr class="uneditable">
														<td id="newRow" colspan="9" align="center" style="background: #EEEEEE; cursor: pointer"><span style="font-weight: bold; font-size: 20px">+</span>&nbsp;Add New Row</td>                
													</tr> 
												</tbody>
											</table>
										</div>
									</div>
								</div>


								<div class="panel mainPanel" id="panel-dc"  sign="dtcb2"  style="display: none">
									<div class="panel-heading bg-blue-grey" role="tab" id="headingTwo_192">
										<h4 class="panel-title">
											<!-- <input name="checked-panel" id="dtcb2" class="filled-in pull-left chk-col-green check-panel" type="checkbox" style="display:inline;"><label for="dtcb2" style="display:inline;margin-left: 5px; width: 10px;"></label>                                                     -->
											<a role="button" data-toggle="collapse" data-parent="#accordion_1921" href="#collapseTwo_192" aria-expanded="false" aria-controls="collapseTwo_192">
												<i class="material-icons pull-right">expand_more</i>Device Connection
											</a>
										</h4>
									</div>
									<div id="collapseTwo_192" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo_192" aria-expanded="false" style="height: 0px;">
										<div class="panel-body table-responsive">
											<i style="font-size: 90%; color: gray">*) Simply click the table cell to edit the value, separated with newline (enter)</i>
											<table class="mainTable table table-bordered">
												<thead>
													<th>No</th>
													<th>Server Name</th>
													<th>IP Address</th>
													<th>Network Device</th>
													<th>Interface</th>		
													<th>Description</th>
													<th>Action</th>
												</thead>
												<tbody>
													<tr id="cloneRow" style="display:none">
														<td class="tdNo"></td>
														<td class="editable tdServerName dc_nama_server"></td>
														<td class="editable tdIPAddress dc_ip_address"></td>
														<td class="editable tdNetworkDevice dc_perangkat"></td>
														<td class="editable tdInterface dc_interface"></td>
														<td class="editable tdDescription dc_description"></td>
														<td align="center"><button class="btn btn-danger btn-sm"><i class="material-icons">close</i></button></td>                     
													</tr>               
													<tr class="uneditable">
														<td id="newRow" colspan="8" align="center" style="background: #EEEEEE; cursor: pointer"><span style="font-weight: bold; font-size: 20px">+</span>&nbsp;Add New Row</td>                
													</tr> 
												</tbody>
											</table>
										</div>
									</div>
								</div>

								<div class="panel mainPanel" id="panel-h2h"   sign="dtcb3"  style="display: none">
									<div class="panel-heading bg-blue-grey" role="tab" id="headingThree_192">
										<h4 class="panel-title">
											<!-- <input name="checked-panel" id="dtcb3" class="filled-in pull-left chk-col-green check-panel" data-parent="#accordion_1921" type="checkbox" style="display:inline;"><label for="dtcb3" style="display:inline;margin-left: 5px; width: 10px;"></label>                                                     -->
											<a role="button" data-toggle="collapse" href="#collapseThree_192" data-parent="#accordion_1921" aria-expanded="false" aria-controls="collapseThree_192">
												<i class="material-icons pull-right">expand_more</i>H2H Connection
											</a>
										</h4>
									</div>
									<div id="collapseThree_192" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree_192" aria-expanded="false" style="height: 0px;">
										<div class="panel-body table-responsive">
											<i style="font-size: 90%; color: gray">*) Simply click the table cell to edit the value, separated with newline (enter)</i>
											<table class="mainTable table table-bordered">
												<thead>
													<th>No</th>
													<th>Partner</th>
													<th>Link</th>
													<th>Site</th>
													<th>BCA Server IP</th>
													<th>Partner Server IP</th>		
													<th>IP P2P BCA</th>		
													<th>IP P2P Partner</th>
													<th>App. Port</th>		
													<th>App. Name</th>
													<th>Direction</th>
													<th>Action</th>
												</thead>
												<tbody>
													<tr id="cloneRow" style="display:none">
														<td class="tdNo"></td>
														<td class="editable tdPartner h2h_nama_partner"></td>
														<td class="editable tdLink h2h_link_komunikasi"></td>
														<td class="editable tdSite h2h_site"></td>
														<td class="editable tdBCAServerIP h2h_ip_server_bca"></td>
														<td class="editable tdPartnerServerIP h2h_ip_server_partner"></td>
														<td class="editable tdIPP2PBCA h2h_ip_p2p_bca"></td>
														<td class="editable tdIPP2PPartner h2h_ip_p2p_partner"></td>
														<td class="editable tdAppPort h2h_port_aplikasi"></td>
														<td class="editable tdAppName h2h_nama_aplikasi"></td>
														<td class="tdDirection">
															<select class="form-group h2h_arah_akses">
																<option value="Inbound">Inbound</option>
																<option value="Outbound">Outbound</option>                      
															</select>
														</td>
														<td align="center"><button class="btn btn-danger btn-sm"><i class="material-icons">close</i></button></td>                     
													</tr>               
													<tr class="uneditable">
														<td id="newRow" colspan="12" align="center" style="background: #EEEEEE; cursor: pointer"><span style="font-weight: bold; font-size: 20px">+</span>&nbsp;Add New Row</td>                
													</tr> 
												</tbody>
											</table>
										</div>
									</div>
								</div>

								<div class="panel mainPanel" id="panel-lan"  sign="dtcb4"  style="display: none">
									<div class="panel-heading bg-blue-grey" role="tab" id="headingFive_192">
										<h4 class="panel-title">
											<!-- <input name="checked-panel" id="dtcb5" class="filled-in pull-left chk-col-green check-panel" data-parent="#accordion_1921" type="checkbox" style="display:inline;"><label for="dtcb5" style="display:inline;margin-left: 5px; width: 10px;"></label>                                                     -->
											<a role="button" data-toggle="collapse" href="#collapseFive_192" data-parent="#accordion_1921" aria-expanded="false" aria-controls="collapseFive_192">
												<i class="material-icons pull-right">expand_more</i>LAN Connection
											</a>
										</h4>
									</div>
									<div id="collapseFive_192" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive_192" aria-expanded="false" style="height: 0px;">
										<div class="panel-body">
											<!--lokasi-->
											<div class="col-md-6">
												<div class="form-group col-md-12">
													<P>
														<label for="lokasi">Lokasi</label>
													</P>
													<input class="with-gap" name="lokasi" type="radio" value="MenaraBCA" id="lokasi_1" checked />
													<label for="lokasi_1">Menara BCA</label><br/>
													<input class="with-gap" name="lokasi" type="radio" value="WismaAsia2" id="lokasi_2" />
													<label for="lokasi_2">Wisma Asia 2</label><br/>
													<input class="with-gap" name="lokasi" type="radio" value="GrhaAsia" class="with-gap" id="lokasi_3" />
													<label for="lokasi_3">Grha Asia</label><br/>
													<input class="with-gap" name="lokasi" type="radio" value="Lainnya" id="lokasi_4" class="with-gap" />
													<label for="lokasi_4">Lainnya</label>  
												</div>
												<!--Lantai-->
												<div class="form-group col-md-12 clearfix">
													<p>
														<label>Lantai</label>
													</p>
													<div class="form-group">
														<div class="form-line">
															<input class="form-control lan_lantai" type="text" placeholder="Lantai" name="lantai">
														</div>
													</div>
												</div>
												<!--Tanggal Pemakaian-->
												<div class="form-group col-md-12 clearfix">
													<p>
														<label>Tanggal Pemakaian</label>
													</p>
													<div class="form-group">
														<div class="form-line">
															<input class="form-control lan_tanggal_pemakaian" type="date" placeholder="Tanggal Pemakaian" name="tanggal_pemakaian">
														</div>
													</div>
												</div>
												<!--lama Pemakaian-->
												<div class="form-group col-md-12 clearfix">
													<p>
														<label>Lama Pemakaian</label>
													</p>
													<div class="form-group">
														<div class="form-line">
															<input class="form-control lan_lama_pemakaian" type="text" placeholder="Lama Pemakaian" name="lama_pemakaian">
														</div>
													</div>
												</div>
												<!--Antivirus-->
												<div class="form-group col-md-12">
													<P>
														<label for="antivirus">Antivirus</label>
													</P>
													<input class="with-gap" name="antivirus" type="radio" value="Ya" id="antivirus_1" checked />
													<label for="antivirus_1">Ya</label><br/>
													<input class="with-gap" name="antivirus" type="radio" value="Tidak" id="antivirus_2" />
													<label for="antivirus_2">Tidak</label><br/>								
												</div>		
												<!--Total User/Device-->
												<div class="form-group col-md-12 clearfix">
													<p>
														<label>Total User/Device</label>
													</p>
													<div class="form-group">
														<div class="form-line">
															<input class="form-control lan_total_user" type="text" placeholder="Total User/Device" name="total_User">
														</div>
													</div>
												</div>
												<!--Koneksi ke Switch-->
												<div class="form-group col-md-12 clearfix">
													<p>
														<label>Koneksi ke Switch</label>
													</p>
													<div class="form-group">
														<div class="form-line" >
															<input class="form-control lan_switch" type="text" placeholder="Koneksi ke Switch" name="koneksiSwitch">
														</div>
													</div>
												</div>
												<!--Port Switch-->
												<div class="form-group col-md-12 clearfix">
													<p>
														<label>Port Switch</label>
													</p>
													<div class="form-group">
														<div class="form-line" >
															<input class="form-control lan_port" type="text" placeholder="Port Switch" name="portSwitch">
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<!--Segment IP Address-->
												<div class="form-group col-md-12 clearfix">
													<p>
														<label for="ipadress">Segment IP Address</label>
													</p>
													<div class="form-group">
														<div class="form-line" >
															<input class="form-control lan_ip" type="text" placeholder="Segment IP Address" name="segmentIPAddress">
														</div>
													</div>
												</div>
												<!--IP Phone-->
												<div class="form-group col-md-12">
													<P>
														<label for="ipphone">IP Phone</label>
													</P>
													<input class="with-gap" name="ipphone" type="radio" value="Cisco" id="ipphone_1" checked />
													<label for="ipphone_1">Cisco</label><br/>
													<input class="with-gap" name="ipphone" type="radio" value="Avaya" id="ipphone_2"/>
													<label for="ipphone_2">Avaya</label><br/>
													<input class="with-gap" name="ipphone" type="radio" value="Tidak Ada" id="ipphone_3" />
													<label for="ipphone_3">Tidak ada</label><br/>								
												</div>	
												<!--Lama Pemakaian-->
												<div class="form-group col-md-12 clearfix">
													<p>
														<label for="lamapemakaian">Lama Pemakaian</label>
													</p>
													<div class="form-group">
														<div class="form-line" >
															<input class="form-control lan_berlaku" type="text" placeholder="Lama Pemakaian" name="lamapemakaian">
														</div>
													</div>
												</div>							
												<!--Bypass NAC/ISE-->
												<div class="form-group col-md-12">
													<P>
														<label for="bypass">Bypass NAC/ISE</label>
													</P>
													<input class="with-gap" name="bypass" type="radio" value="Ya" id="bypass_1" checked />
													<label for="bypass_1">Ya</label><br/>
													<input class="with-gap" name="bypass" type="radio" value="Tidak" id="bypass_2" />
													<label for="bypass_2">Tidak</label><br/>								
												</div>		
												<!--MAC Address-->
												<div class="form-group col-md-12 clearfix" id="macAddressDiv">
													<p>
														<label>MAC Address</label>
													</p>
													<div class="form-group">
														<div style="border: solid #DADADA 1px">
															<textarea class="form-control lan_mac" style="resize:none" rows="5" placeholder="MAC Address" name="macAddress"></textarea>
														</div>
													</div>
												</div>
												
											</div>
										</div>
									</div>
								</div>

								<div class="panel mainPanel" id="panel-asd" sign="dtcb5"  style="display: none">
									<div class="panel-heading bg-blue-grey" role="tab" id="headingFour_192">
										<h4 class="panel-title">
											<!-- <input name="checked-panel" id="dtcb4" class="filled-in pull-left chk-col-green check-panel" data-parent="#accordion_1921" type="checkbox" style="display:inline;"><label for="dtcb4" style="display:inline;margin-left: 5px; width: 10px;"></label>                                                     -->
											<a role="button" data-toggle="collapse" href="#collapseFour_192" data-parent="#accordion_1921" aria-expanded="false" aria-controls="collapseFour_192">
												<i class="material-icons pull-right">expand_more</i>Application Service Delivery
											</a>
										</h4>
									</div>
									<div id="collapseFour_192" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour_192" aria-expanded="false" style="height: 0px;">
										<div class="panel-body">
											<div class="row clearfix">
												<!--lokasi-->
												<div class="form-group col-md-12" style="border-bottom: solid #DDDDDD 1px; padding-bottom: 10px">
													<P>
														<label for="lokasi">Lokasi<span style="color: red">*</span></label>
													</P>
													<input id="basic_checkbox_1" class="filled-in" type="checkbox" name="asdLokasi" value="WSA2">
													<label for="basic_checkbox_1">Wisma Asia 2</label><br/>
													<input id="basic_checkbox_2" class="filled-in" type="checkbox" name="asdLokasi" value="MBCA">
													<label for="basic_checkbox_2">Menara BCA</label><br/>
													<input id="basic_checkbox_3" class="filled-in" type="checkbox" name="asdLokasi" value="GRHA">
													<label for="basic_checkbox_3">Grha Asia Surabaya</label>	<br/>
													<input id="basic_checkbox_4" class="filled-in" type="checkbox" name="asdLokasi" value="Other">
													<label for="basic_checkbox_4">Other</label>													
												</div>

												<!-- test aja-->
												<div class="form-group col-md-12" style="border-bottom: solid #DDDDDD 1px; padding-bottom: 10px">
													<tr>
														<P>
															<label>Application Service Delivery<span style="color: red">*</span></label>
														</P>
															<td style="padding-left: 20px; padding-top: 10px">
																<input class="asdService load_balancer" name="asdservices" type="checkbox" value="LoadBalancer" id="LoadBalancer" />
																<label class="asdService load_balancer" for="LoadBalancer">Load Balancer</label><br class="asdService load_balancer"/>
																<input class="asdService web_application_firewall" name="asdservices" type="checkbox" value="webApplicationFirewall" id="webApplicationFirewall" />
																<label class="asdService web_application_firewall" for="webApplicationFirewall">Web Application Firewall</label><br class="asdService web_application_firewall"/>
																<input class="asdService application_acceleration" name="asdservices" type="checkbox" value="applicationAcceleration" id="applicationAcceleration" />
																<label class="asdService application_acceleration" for="applicationAcceleration">Application Acceleration</label><br class="asdService application_acceleration">
																<input class="asdService multiple_active_data_center" name="asdservices" type="checkbox" value="multipleActiveDataCenter" id="multipleActiveDataCenter" />
																<label class="asdService multiple_active_data_center" for="multipleActiveDataCenter">Multiple Active Data Center</label><br class="asdService multiple_active_data_center"/>

																<!-- <input class="services asds" name="cbservices" type="checkbox" value="ApplicationServiceDelivery" id="ApplicationServiceDelivery" />
																<label class="services asds" for="ApplicationServiceDelivery">Application Service Delivery</label><br class="services asds"/>
																<input class="services ras" name="cbservices" type="checkbox" value="RemoteAccess" id="RemoteAccess" />
																<label class="services ras" for="RemoteAccess">Remote Access</label><br class="services ras"/> -->
														</td>
													</tr>
													<tr><td colspan="2" style="color: red; font-style: italic; padding-top: 10px">*) Required</td></tr>

													<tr>
														<td colspan="1" style="padding-top: 20px">
															<button class="btn bg-teal form-control" id="btnChoose">Choose This</button>
														</td>
													</tr>
												</div>

												<tr style="display:none" id="asdService">
												<!--Col Kiri-->
												<div class="col-xs-6 ol-sm-6 col-md-6 col-lg-6">
													
													<div class="panel-group" id="accordion_19" role="tablist" aria-multiselectable="true">
														<td>
														<div class="panel panel-col-pink" style="display: none" id="panel-pink">
															<div class="panel-heading" role="tab" id="headingOne_19" >
																<h4 class="panel-title">
																	<input id="tcb1" name="sub-check" class="filled-in pull-left chk-col-green" type="checkbox" style="display:inline;">
																	<label for="tcb1" style="display:inline;margin-left: 5px; width: 10px;"></label>                                                    
																	<a role="button" data-toggle="collapse" href="#collapseOne_19" aria-expanded="false" aria-controls="collapseOne_19">
																		<i class="material-icons pull-right">expand_more</i>1. Load Balancing Server
																	</a>
																</h4>
															</div>
															<div id="collapseOne_19" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne_19" aria-expanded="false" style="height: 0px;">
																<div class="panel-body">
																	<!--IP Server-->
																	<div class="form-group col-md-12 clearfix">
																		<p>
																			<label>IP Server</label>
																		</p>
																		<div class="form-group">
																			<div style="border: solid #DADADA 1px">
																				<textarea class="form-control lb_ip_server" style="resize:none" rows="5" name="IPServer"></textarea>
																			</div>
																		</div>
																	</div>		
																	<!--IP Load Balancer-->
																	<div class="form-group col-md-12 clearfix">
																		<p>
																			<label>IP Load Balancer</label>
																		</p>
																		<div class="form-group">
																			<div style="border: solid #DADADA 1px">
																				<textarea class="form-control lb_ip_lb" style="resize:none" rows="5" name="IPLoadBalancer"></textarea>
																			</div>
																		</div>
																	</div>	
																	<!--Port-->
																	<div class="form-group col-md-12 clearfix">
																		<p>
																			<label>Port</label>
																		</p>
																		<div class="form-group">
																			<div class="form-line">
																				<input class="form-control lb_port" type="text" placeholder="Port" name="port">
																			</div>
																		</div>
																	</div>
																	<!--URL-->
																	<div class="form-group col-md-12 clearfix">
																		<p>
																			<label>URL</label>
																		</p>
																		<div class="form-group">
																			<div class="form-line">
																				<input class="form-control lb_url" type="text" placeholder="URL" name="URL">
																			</div>
																		</div>
																	</div>
																	<!--SSL-->
																	<div class="form-group col-md-12">
																		<P>
																			<label for="SSL">SSL</label>
																		</P>
																		<input class="with-gap" name="lb_SSL" type="radio" value="Ya" id="SSL_1" checked />
																		<label for="SSL_1">Ya</label><br/>
																		<input class="with-gap" name="lb_SSL" type="radio" value="Tidak" id="SSL_2" />
																		<label for="SSL_2">Tidak</label><br/>								
																	</div>		
																	<!--Persistence-->
																	<div class="form-group col-md-12">
																		<P>
																			<label for="persistence">Persistence</label>
																		</P>
																		<input class="with-gap" name="lb_persistence" type="radio" value="Ya" id="persistence_1" checked />
																		<label for="persistence_1">Ya</label><br/>
																		<input class="with-gap" name="lb_persistence" type="radio" value="Tidak" id="persistence_2" />
																		<label for="persistence_2">Tidak</label><br/>								
																	</div>		
																	<!--Metode-->
																	<div class="form-group col-md-12">
																		<p>
																			<label for="metode">Metode</label>
																		</p>
																		<select class="form-control lb_metode" style="border: solid #DADADA 1px">
																			<option value="" disabled selected>-- Method --</option>
																			<option value="Least Connection">Least Connection</option>
																			<option value="Round Robin">Round Robin</option>
																			<option value="Weighted balance">Weighted Balance</option>
																			<option value="Priority">Priority</option>
																			<option value="Other">Other</option>	
																		</select>
																	</div>
																	<!--Keterangan-->
																	<div class="form-group col-md-12 clearfix">
																		<p>
																			<label>Keterangan</label>
																		</p>
																		<div class="form-group">
																			<div style="border: solid #DADADA 1px">
																				<textarea class="form-control lb_keterangan" style="resize:none" rows="5" name="keterangan"></textarea>
																			</div>
																		</div>
																	</div>	
																</div>
															</div>

														</div>
													</td>
													<td>
														<div class="panel panel-col-cyan" style="display: none" id="panel-cyan">
															<div class="panel-heading" role="tab" id="headingTwo_19">
																<h4 class="panel-title">
																	<input id="tcb2" name="sub-check" class="filled-in pull-left chk-col-green" type="checkbox" style="display:inline;"><label for="tcb2" style="display:inline;margin-left: 5px; width: 10px;"></label>
																	<a class="" role="button" data-toggle="collapse" href="#collapseTwo_19" aria-expanded="true" aria-controls="collapseTwo_19">
																		<i class="material-icons pull-right">expand_more</i>2.  Web Application Firewall
																	</a>
																</h4>
															</div>
															<div id="collapseTwo_19" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo_19" aria-expanded="true" style="">
																<div class="panel-body">
																	<!--IP Server-->
																	<div class="form-group col-md-12 clearfix">
																		<p>
																			<label>IP Server/LB</label>
																		</p>
																		<div class="form-group">
																			<div style="border: solid #DADADA 1px">
																				<textarea class="form-control waf_ip_server" style="resize:none" rows="5" name="IPServer3"></textarea>
																			</div>
																		</div>
																	</div>		
																	<!--Source IP-->
																	<div class="form-group col-md-12 clearfix">
																		<p>
																			<label>Source IP</label>
																		</p>
																		<div class="form-group">
																			<div style="border: solid #DADADA 1px">
																				<textarea class="form-control waf_source" style="resize:none" rows="5" name="SourceIP"></textarea>
																			</div>
																		</div>
																	</div>		

																	<!--Port-->
																	<div class="form-group col-md-12 clearfix">
																		<p>
																			<label>Port</label>
																		</p>
																		<div class="form-group">
																			<div class="form-line">
																				<input class="form-control waf_port" type="text" placeholder="Port" name="port3">
																			</div>
																		</div>
																	</div>
																	<!--URL-->
																	<div class="form-group col-md-12 clearfix">
																		<p>
																			<label for="URL3">URL</label>
																		</p>
																		<div class="form-group">
																			<div class="form-line">
																				<input class="form-control waf_url" type="text" placeholder="URL" name="URL3">
																			</div>
																		</div>
																	</div>
																	<!--SSL-->
																	<div class="form-group col-md-12">
																		<P>
																			<label for="SSL3">SSL</label>
																		</P>
																		<input class="with-gap" name="waf_ssl" type="radio" value="Ya" id="waf_ssl_1" checked />
																		<label for="waf_ssl_1">Ya</label><br/>
																		<input class="with-gap" name="waf_ssl" type="radio" value="Tidak" id="waf_ssl_2" />
																		<label for="waf_ssl_2">Tidak</label><br/>								
																	</div>	
																</div>
															</div>
														</div>
													</td>
													</div>

												</div>

												<!--Col Kanan-->
												<div class="col-xs-6 ol-sm-6 col-md-6 col-lg-6">
													<div class="panel-group" id="accordion_19" role="tablist" aria-multiselectable="true">
														<div class="panel panel-col-teal" style="display: none" id="panel-teal">
															<div class="panel-heading" role="tab" id="headingThree_19" >
																<h4 class="panel-title">
																	<input id="tcb3" name="sub-check" class="filled-in pull-left chk-col-green" type="checkbox" style="display:inline;"><label for="tcb3" style="display:inline;margin-left: 5px; width: 10px;"></label>
																	<a class="collapsed" role="button" data-toggle="collapse" href="#collapseThree_19" aria-expanded="false" aria-controls="collapseThree_19">
																		<i class="material-icons pull-right">expand_more</i> 3. Application Acceleration
																	</a>
																</h4>
															</div>
															<div id="collapseThree_19" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree_19">
																<div class="panel-body">
																	<!--IP Server-->
																	<div class="form-group col-md-12 clearfix">
																		<p>
																			<label>IP Server</label>
																		</p>
																		<div class="form-group">
																			<div style="border: solid #DADADA 1px">
																				<textarea class="form-control aa_ip_server" style="resize:none" rows="5" name="IPServer3"></textarea>
																			</div>
																		</div>
																	</div>		
																	<!--Port-->
																	<div class="form-group col-md-12 clearfix">
																		<p>
																			<label>Port</label>
																		</p>
																		<div class="form-group">
																			<div class="form-line">
																				<input class="form-control aa_port" type="text" placeholder="Port" name="port3">
																			</div>
																		</div>
																	</div>
																	<!--URL-->
																	<div class="form-group col-md-12 clearfix">
																		<p>
																			<label for="URL3">URL</label>
																		</p>
																		<div class="form-group">
																			<div class="form-line">
																				<input class="form-control aa_url" type="text" placeholder="URL" name="URL3">
																			</div>
																		</div>
																	</div>
																	<!--SSL-->
																	<div class="form-group col-md-12">
																		<P>
																			<label for="aa_ssl">SSL</label>
																		</P>
																		<input class="with-gap" name="aa_ssl" type="radio" value="Ya" id="aa_ssl2" checked />
																		<label for="aa_ssl2">Ya</label><br/>
																		<input class="with-gap" name="aa_ssl" type="radio" value="Tidak" id="aa_ssl1" />
																		<label for="aa_ssl1">Tidak</label><br/>								
																	</div>		

																</div>
															</div>
														</div>
														<div class="panel panel-col-orange"  style="display: none" id="panel-orange">
															<div class="panel-heading" role="tab" id="headingFour_19">
																<h4 class="panel-title">
																	<input id="tcb4" name="sub-check" class="filled-in pull-left chk-col-green" type="checkbox" style="display:inline;"/><label for="tcb4" style="display:inline;margin-left: 5px; width: 10px;"></label>
																	<a class="collapsed" role="button" data-toggle="collapse" href="#collapseFour_19" aria-expanded="false" aria-controls="collapseFour_19">
																		<i class="material-icons pull-right">expand_more</i>4. Multiple Active Data Center
																	</a>
																</h4>
															</div>
															<div id="collapseFour_19" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour_19">
																<div class="panel-body">

																	<!--lokasi-->
																	<div class="form-group col-md-12">
																		<P>
																			<label for="SSL3">lokasi/Sticky</label>
																		</P>
																		<input class="with-gap" name="madc_lokasi" type="radio" value="Internal" id="lokasi_13" checked />
																		<label for="lokasi_13">Internal</label><br/>
																		
																		<input class="with-gap" name="madc_lokasi" type="radio" value="Eksternal" id="lokasi_23" />
																		<label for="lokasi_23">Eksternal</label><br/>

																		<input class="with-gap" name="madc_lokasi" type="radio" value="3rd Party" id="lokasi_33" />
																		<label for="lokasi_33">3rd Party</label><br/>				
																	</div>	
																	<div class="form-group col-md-12 clearfix">
																		<p>
																			<label>IP Server/LB</label>
																		</p>
																		<div class="form-group">
																			<div style="border: solid #DADADA 1px">
																				<textarea class="form-control madc_ip_server" style="resize:none" rows="5" name="IPServer3"></textarea>
																			</div>
																		</div>
																	</div>		
																	<!--Port-->
																	<div class="form-group col-md-12 clearfix">
																		<p>
																			<label>Port</label>
																		</p>
																		<div class="form-group">
																			<div class="form-line">
																				<input class="form-control madc_port" type="text" placeholder="Port" name="port3">
																			</div>
																		</div>
																	</div>
																	<!--URL-->
																	<div class="form-group col-md-12 clearfix">
																		<p>
																			<label for="URL3">URL</label>
																		</p>
																		<div class="form-group">
																			<div class="form-line">
																				<input class="form-control madc_url" type="text" placeholder="URL" name="URL3">
																			</div>
																		</div>
																	</div>
																	<!--Persistence-->
																	<div class="form-group col-md-12">
																		<P>
																			<label for="SSL3">Persistence/Sticky</label>
																		</P>
																		<input class="with-gap" name="madc_persistence" type="radio" value="Ya" id="madc_p1" checked />
																		<label for="madc_p1">Ya</label><br/>
																		<input class="with-gap" name="madc_persistence" type="radio" value="Tidak" id="madc_p2" />
																		<label for="madc_p2">Tidak</label><br/>								
																	</div>	
																	<!--Metode-->
																	<div class="form-group col-md-12">
																		<p>
																			<label for="metode">Metode</label>
																		</p>
																		<select class="form-control madc_metode" style="border: solid #DADADA 1px">
																			<option value="" disabled selected>-- Method --</option>
																			<option value="Least Connection">Least Connection</option>
																			<option value="Round Robin">Round Robin</option>
																			<option value="Weighted balance">Weighted Balance</option>
																			<option value="Priority">Priority</option>
																			<option value="Other">Other</option>					
																		</select>
																	</div>
																	<!--Keterangan-->
																	<div class="form-group col-md-12 clearfix">
																		<p>
																			<label>Keterangan</label>
																		</p>
																		<div class="form-group">
																			<div style="border: solid #DADADA 1px">
																				<textarea class="form-control madc_keterangan" style="resize:none" rows="5" name="madc_keterangans"></textarea>
																			</div>
																		</div>
																	</div>
																	
																</div>
															</div>
														</div>
													</div>
													<!--End of Col Kanan-->
												</div>
											</tr>

											</div>
										</div>
									</div>
								</div>

								<div class="panel mainPanel" id="panel-ra" sign="dtcb6"  style="display: none">
									<div class="panel-heading bg-blue-grey" role="tab" id="headingSix_192">
										<h4 class="panel-title">
											<!-- <input name="checked-panel" id="dtcb6" class="filled-in pull-left chk-col-green check-panel" type="checkbox" style="display:inline;"><label for="dtcb6" style="display:inline;margin-left: 5px; width: 10px;"></label>                                                     -->
											<a role="button" data-toggle="collapse" data-parent="#accordion_1921" href="#collapseSix_192" aria-expanded="false" aria-controls="collapseSix_192">
												<i class="material-icons pull-right">expand_more</i>Remote Access
											</a>
										</h4>
									</div>
									<div id="collapseSix_192" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix_1922" aria-expanded="false" style="height: 0px;">
										<div class="panel-body">
											<i style="font-size: 90%; color: gray">*) Simply click the table cell to edit the value, separated with newline (enter)</i>
											<table class="mainTable table table-bordered">
												<thead>
													<th>No</th>
													<th>Jenis Remote</th>
													<th>User Remote</th>
													<th>Environment</th>
													<th>Unit Kerja</th>
													<th>Berlaku s.d.</th>
													<th>Server Name</th>
													<th>IP Address</th>
													<th>Protocol</th>
													<th>Port Number</th>		
													<th>Client</th>
													<th>PIC Remote</th>
													<th>Description</th>
													<th>Action</th>
												</thead>
												<tbody>
													<tr id="cloneRow" style="display:none">
														<td class="tdNo"></td>
														<td class="editable tdJenisRemoteAccess ra_jenis_remote_access"></td>
														<td class="tdJenisUserRemote">
															<select class="form-group ra_jenis_user_remote">
																<option value="Staff GSIT">Staff GSIT</option>
																<option value="Staff Non-GSIT">Staff Non-GSIT</option>                      
															</select>
														</td>
														<td class="editable tdEnvironment ra_environment"></td>
														<td class="editable tdUnitKerja ra_unit_kerja"></td>
														<td class="editable tdBerlaku ra_berlaku_sampai_dengan"></td>
														<td class="editable tdServerName ra_nama_server"></td>
														<td class="editable tdIPAddress ra_ip_address"></td>
														<td class="editable tdProtocol ra_protocol"></td>
														<td class="editable tdPortNumber ra_port"></td>
														<td class="editable tdClient ra_client"></td>
														<td class="editable tdNamaPIC ra_nama_pic"></td>
														<td class="editable tdDescription ra_deskripsi"></td>
														<td align="center"><button class="btn btn-danger btn-sm"><i class="material-icons">close</i></button></td>                     
													</tr>               
													<tr class="uneditable">
														<td id="newRow" colspan="14" align="center" style="background: #EEEEEE; cursor: pointer"><span style="font-weight: bold; font-size: 20px">+</span>&nbsp;Add New Row</td>                
													</tr> 
												</tbody>
											</table>
										</div>
									</div>
								</div>

							</form>							
						</div>
					</div>
				</div>


				<div class="card" style="display: none; margin-top: 20px" id="submitCard">
					<div class="body">                            
						<button class="form-control bg-teal" id="btnSubmit">SUBMIT</button>
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

	<!-- Jquery Validation -->
	<script src="{{asset('AdminBSB/plugins/jquery-validation/jquery.validate.js')}}"></script>

	<!-- Custom Js -->
	<script src="{{asset('AdminBSB/js/pages/tables/jquery-datatable.js')}}"></script>
	<script>
		$(document).ready(function(){
			$("#no_remedy").val("");
			$(this).html("CHECK");
			$(this).removeClass("bg-orange");
			$(this).addClass("bg-teal");
			$("#project_name").val("");
			$("#category").val("");
			$("#no_remedy").removeAttr("readonly");
			$("#no_remedy").css("background", "none");
			$("#btnCreate").css("display", "none");
			$("textarea, select").attr("disabled", "disabled");


			$(".panel-openport").on('change', '.tdPortType', function(){
				if( $(this).val() == "IP" || $(this).val() == "ICMP")	{
					tdDis = $(this).parent().next();
					tdDis.html("");
					tdDis.attr("contenteditable", "false");
					tdDis.addClass("tdDisabled");
				}else{
					tdDis = $(this).parent().next();
					tdDis.attr("contenteditable", "true");
					tdDis.removeClass("tdDisabled");
				}
			});

			$("#category").change(function(e){
				$("#services").show();				
				var category = $("#category").val();
				$(".services").hide();
				$("input[type='checkbox']:checked").trigger('click');
				if(category == "1"){
					$(".ops").show();
					$(".dcs").show();
					$(".asds").show();
				}else if(category == "2"){
					$(".ops").show();
					$(".dcs").show();
					$(".asds").show();
					$(".ras").show();
					$(".h2hs").show();												
				}else if(category == "3"){
					$(".ops").show();
					$(".dcs").show();
					$(".h2hs").show();												
				}else if(category == "4"){
					$(".ops").show();
					$(".dcs").show();
					$(".lans").show();												
				}else if(category == "5"){
					$(".ras").show();
					$(".lans").show();												
				}
			});	


			$("#").change(function(e){
				$("#services").show();				
				var category = $("#category").val();
				$(".services").hide();
				$("input[type='checkbox']:checked").trigger('click');
				if(category == "1"){
					$(".ops").show();
					$(".dcs").show();
					$(".asds").show();
				}else if(category == "2"){
					$(".ops").show();
					$(".dcs").show();
					$(".asds").show();
					$(".ras").show();
					$(".h2hs").show();												
				}else if(category == "3"){
					$(".ops").show();
					$(".dcs").show();
					$(".h2hs").show();												
				}else if(category == "4"){
					$(".ops").show();
					$(".dcs").show();
					$(".lans").show();												
				}else if(category == "5"){
					$(".ras").show();
					$(".lans").show();												
				}
			});	


			// $(window).keydown(function(event){
			//     if(event.keyCode == 13) {
			//       event.preventDefault();
			//       return false;
			//     }
			//   });

			Number.prototype.pad = function(size) {
			  var s = String(this);
			  while (s.length < (size || 2)) {s = "0" + s;}
			  return s;
			}

			function reSequence(elm){
				var i = 1;
				elm.find("tr").not('.uneditable').each(function(){
					$(this).find("td").first().html(i++);
				});
			}

			$(".editable").attr("contenteditable", "true");

			$(".mainTable").on("click", ".btn-danger", function(e){
				e.preventDefault();
				if(window.confirm("Are you sure want to delete row?")){
					elm = $(this).parent().parent().parent();
					$(this).parent().parent().remove();
					reSequence(elm);				
				}
			});

			$(".mainTable").on("click", "#newRow", function(e){
				var uncloneRow = $(this).parent().parent().find("#cloneRow");
				var cloneRow = $(this).parent().parent().find("#cloneRow").clone();
				var numSeq = parseInt(uncloneRow.prev().children().first().html()) + 1;
				cloneRow.removeAttr("id");
				cloneRow.children().first().html(numSeq);
				cloneRow.insertBefore(uncloneRow);
				reSequence($(this).parent().parent());
				cloneRow.show();
			});

			$("#btnCreate").click(function(e){
				e.preventDefault();

				if($("input.services:checkbox:checked").length == 0){
					toastr.warning("Please Choose the Services");
					return false;
				}

				$("a[data-toggle='collapse']").trigger('click');

				vForm = $("#metaForm");
				vForm.validate();
				if(vForm.valid()){
					$("#serviceBar, #submitCard").show();
					$("#autoDisabled").find("input, textarea, select").each(function(){
						$(this).prop("disabled", "true");					
					});
					
					$("#btnCreate").hide();
					$("#btnResetAll").show();
					$("#btnCheck").hide();

					if( $("#OpenPort:checked").length > 0 ){
						$("#panel-op").show();
						$("#panel-op").find("a").prop("href", "#");						
					}
					if( $("#DeviceConnection:checked").length > 0 ){
						$("#panel-dc").show();
						$("#panel-dc").find("a").prop("href", "#");
					}
					if( $("#H2HConnection:checked").length > 0 ){
						$("#panel-h2h").show();
						$("#panel-h2h").find("a").prop("href", "#");
					}
					if( $("#LANConnection:checked").length > 0 ){
						$("#panel-lan").show();
						$("#panel-lan").find("a").prop("href", "#");						
					}
					if( $("#ApplicationServiceDelivery:checked").length > 0 ){
						$("#panel-asd").show();
						$("#panel-asd").find("a").prop("href", "#");
					}
					if( $("#RemoteAccess:checked").length > 0 ){
						$("#panel-ra").show();
						$("#panel-ra").find("a").prop("href", "#");						
					}
					
					// if($("#category").val() == 1){
					// 	$("#panel-op").show();
					// 	$("#panel-dc").show();
					// 	$("#panel-asd").show();					
					// }else if($("#category").val() == 2){
					// 	$("#panel-op").show();
					// 	$("#panel-dc").show();
					// 	$("#panel-asd").show();					
					// 	$("#panel-h2h").show();
					// 	$("#panel-ra").show();										
					// }
					// else if($("#category").val() == 3){
					// 	$("#panel-op").show();
					// 	$("#panel-dc").show();
					// 	$("#panel-h2h").show();
					// }
					// else if($("#category").val() == 4){
					// 	$("#panel-op").show();
					// 	$("#panel-dc").show();
					// 	$("#panel-lan").show();	
					// }
					// else if($("#category").val() == 5){
					// 	$("#panel-lan").show();
					// }
				}				
			});

			$("#btnResetAll").click(function(e){
				e.preventDefault();
				if(window.confirm("Are you sure? All data will be lost.")){
					window.location = "newRequest"
				}
			});

			$("#btnChoose").click(function(e){
				e.preventDefault();

				if($("input.asdService:checkbox:checked").length == 0){
					toastr.warning("Please Choose the Services");
					return false;
				}

				$("a[data-toggle='collapse']").trigger('click');

				vForm = $("#metaForm");
				vForm.validate();
				if(vForm.valid()){
					//$("#serviceBar, #submitCard").show();
					
					$("#btnChoose").hide();

					if( $("#LoadBalancer:checked").length > 0 ){
						$("#panel-pink").show();
						$("#panel-pink").find("a").prop("href", "#");						
					}
					if( $("#webApplicationFirewall:checked").length > 0 ){
						$("#panel-cyan").show();
						$("#panel-cyan").find("a").prop("href", "#");
					}
					if( $("#applicationAcceleration:checked").length > 0 ){
						$("#panel-teal").show();
						$("#panel-teal").find("a").prop("href", "#");
					}
					if( $("#multipleActiveDataCenter:checked").length > 0 ){
						$("#panel-orange").show();
						$("#panel-orange").find("a").prop("href", "#");						
					}
				}				
			});

			$('#metaForm').validate({ // initialize the plugin
		        rules: {
		            // no_remedy: {
		            //     required: true,
		            //     maxlength: 6,
		            //     number: true,
		            // },
		            project_name: {
		                required: true,
		            },
		         	category: {
		                required: true,
		            },		              
		        }
		    });

			$("h4[class=panel-title] label").click(function(e){
				aHref = $(this).next();
				if(aHref.attr('class') == undefined ||  aHref.hasClass("collapsed")){
					aHref.trigger("click");
					aHref.removeAttr("class");
				}				
			});

			$("#btnCheck").click(function(e){
				e.preventDefault(e);
				if($("#btnCheck").html() === "CHECK"){
					var no_remedy = $("#no_remedy").val();
					if(no_remedy.length < 1 || no_remedy.length > 6 || isNaN(no_remedy) == true){
						toastr.error("Invalid Remedy Format", "Input Error");
					}else{
						no_remedy = "CRQ000000" + parseInt($("#no_remedy").val()).pad(6);
						$("#no_remedy").val(no_remedy);
						$(this).html("CHANGE");
						$(this).removeClass("bg-teal");
						$(this).addClass("bg-orange");
						$("#no_remedy").prop("readonly", "true");
						$("#no_remedy").css("background", "#DADADA");
						$("#btnCreate").css("display", "inline");
						$("textarea, select").removeAttr("disabled");
					}
				}else{
					if(window.confirm("Are you sure want to change the Remedy number? (Description and Category data will be lost)")){
						var no_remedy = $("#no_remedy").val().slice(-6);
						$("#no_remedy").val(no_remedy);
						$(this).html("CHECK");
						$(this).removeClass("bg-orange");
						$(this).addClass("bg-teal");
						$("#project_name").val("");
						$("#category").val("");
						$("#no_remedy").removeAttr("readonly");
						$("#no_remedy").css("background", "none");
						$("#btnCreate").css("display", "none");
						$("textarea, select").attr("disabled", "disabled");
					}
				}
			});

		    $("#btnSubmit").click(function(e){
		    	e.preventDefault();
		    	opForm = [];
		    	var arr = {};
    			arr['no_remedy'] = $("#no_remedy").val();
    			arr['project_name'] = $("#project_name").val();
    			arr['category'] = $("#category").val();
    			arr['requester_name'] = "{{Auth::user()->name}}";
				dcArr = [];
				opArr = [];
				h2hArr = [];
		    	raArr = [];
		    	lanArr = [];
		    	asdArr = {};
		    	lbArr = {};
		    	wafArr = {};
		    	aaArr = {};
		    	madcArr = {};

		    	// $("input[name=checked-panel]:visible").each(function(){
		    	$(".mainPanel:visible").each(function(){		    		
		    		// open port
	    			if($(this).attr('sign') == 'dtcb1'){
			    		i = 0;
			    		$('#panel-op').find("tbody tr:not(#cloneRow):not(.uneditable)").each(function(){
		    				tmpArr = {}
		    				tmpArr['source_ip'] = $(this).find(".op_source_ip").first().html();
		    				tmpArr['destination_ip'] = $(this).find(".op_destination_ip").first().html();
							tmpArr['fungsi'] = $(this).find(".op_fungsi").first().html();
							tmpArr['protocol'] = $(this).find(".op_protocol").first().val();
							tmpArr['arah'] = $(this).find(".op_arah").first().val();
							tmpArr['port'] = $(this).find(".op_port").first().html();
		    				tmpArr['action'] = $(this).find(".op_action").first().val();
		    				opArr.push(tmpArr);
		    			});		    			
		    		} 
		    		//device connection
					if($(this).attr('sign') == 'dtcb2'){
			    		i = 0;
			    		$('#panel-dc').find("tbody tr:not(#cloneRow):not(.uneditable)").each(function(){
		    				tmpArr = {}
		    				tmpArr['nama_server'] = $(this).find(".dc_nama_server").first().html();
		    				tmpArr['ip_address'] = $(this).find(".dc_ip_address").first().html();
							tmpArr['koneksi_perangkat_network'] = $(this).find(".dc_perangkat").first().html();
							tmpArr['interface'] = $(this).find(".dc_interface").first().html();
							tmpArr['deskripsi'] = $(this).find(".dc_description").first().html();
							dcArr.push(tmpArr);
		    			});
		    		} 


		    		//h2h
					if($(this).attr('sign') == 'dtcb3'){
			    		i = 0;
			    		$('#panel-h2h').find("tbody tr:not(#cloneRow):not(.uneditable)").each(function(){
		    				tmpArr = {}
		    				tmpArr['nama_partner'] = $(this).find(".h2h_nama_partner").first().html();
							tmpArr['link_komunikasi'] = $(this).find(".h2h_link_komunikasi").first().html();
							tmpArr['site'] = $(this).find(".h2h_site").first().html();
							tmpArr['ip_server_partner'] = $(this).find(".h2h_ip_server_partner").first().html();
							tmpArr['ip_server_bca'] = $(this).find(".h2h_ip_server_bca").first().html();
							tmpArr['ip_p2p_bca'] = $(this).find(".h2h_ip_p2p_bca").first().html();
							tmpArr['ip_p2p_partner'] = $(this).find(".h2h_ip_p2p_partner").first().html();
							tmpArr['port_aplikasi'] = $(this).find(".h2h_port_aplikasi").first().html();
							tmpArr['nama_aplikasi'] = $(this).find(".h2h_nama_aplikasi").first().html();
							tmpArr['arah_akses'] = $(this).find(".h2h_arah_akses").first().val();
							h2hArr.push(tmpArr);
		    			});
		    		} 
		    		//remote access
		    		if($(this).attr('sign') == 'dtcb6'){
			    		i = 0;
			    		$('#panel-ra').find("tbody tr:not(#cloneRow):not(.uneditable)").each(function(){
		    				tmpArr = {}
		    				tmpArr['jenis_remote_access'] = $(this).find(".ra_jenis_remote_access").first().html();
		    				tmpArr['jenis_user_remote'] = $(this).find(".ra_jenis_user_remote").first().val();
							tmpArr['environment'] = $(this).find(".ra_environment").first().html();
							tmpArr['unit_kerja'] = $(this).find(".ra_unit_kerja").first().html();
							tmpArr['berlaku_sampai_dengan'] = $(this).find(".ra_berlaku_sampai_dengan").first().html();
							tmpArr['nama_pic'] = $(this).find(".ra_nama_pic").first().html();
							tmpArr['nama_server'] = $(this).find(".ra_nama_server").first().html();
							tmpArr['ip_address'] = $(this).find(".ra_ip_address").first().html();
							tmpArr['protocol'] = $(this).find(".ra_protocol").first().html();
							tmpArr['port'] = $(this).find(".ra_port").first().html();
							tmpArr['client'] = $(this).find(".ra_client").first().html();
							tmpArr['nama_pic'] = $(this).find(".ra_nama_pic").first().html();
							tmpArr['deskripsi'] = $(this).find(".ra_deskripsi").first().html();
							raArr.push(tmpArr);
		    			});
		    		} 

		    		//LAN
		    		if($(this).attr('sign') == 'dtcb5'){
			    		i = 0;
						panel_lan = $("#panel-lan");
		    			tmpArr = {}
						tmpArr['koneksi_ke_switch'] = panel_lan.find(".lan_switch").first().val();
						tmpArr['port_switch'] = panel_lan.find(".lan_port").first().val();
						tmpArr['segment_ip_address'] = panel_lan.find(".lan_ip").first().val();
						tmpArr['lantai'] = panel_lan.find(".lan_lantai").first().val();
	    				tmpArr['tanggal_pemakaian'] = panel_lan.find(".lan_tanggal_pemakaian").first().val();
	    				tmpArr['lama_pemakaian'] = panel_lan.find(".lan_lama_pemakaian").first().val();
						tmpArr['total_user_per_device'] = panel_lan.find(".lan_total_user").first().val();

						panel_lan.find('input[name="ipphone"]').each(function(){
							if( $(this).is(':checked') ){
								tmpArr['ip_phone'] = $(this).val();
								return false;
							}
						});
						panel_lan.find('input[name="antivirus"]').each(function(){
							if( $(this).is(':checked') ){
								tmpArr['antivirus'] = $(this).val();
								return false;
							}
						});
						panel_lan.find('input[name="lokasi"]').each(function(){
							if( $(this).is(':checked') ){
								tmpArr['lokasi'] = $(this).val();
								return false;
							}
						});
						panel_lan.find('input[name="bypass"]').each(function(){
							if( $(this).is(':checked') ){
								tmpArr['bypass_nas_ise'] = $(this).val();
								return false;
							}
						});
						
						lanArr.push(tmpArr);
		    			
		    		} 

		    		//ASD
		    		if($(this).attr('sign') == 'dtcb4'){
		    			asdArr['lokasi'] = "";
		    			asdArr['service_aplikasi'] = "";
		    			$("input[name=asdLokasi]:checked").each(function(){
		    				asdArr['lokasi'] += $(this).val() + ",";
		    			});

			    		$("input[name=sub-check]:checked").each(function(){
		    				panelASD = $("#panel-asd");
			    			if($(this).attr('id') == 'tcb1'){
			    				asdArr['service_aplikasi'] += "LB,";
			    				lbArr['ip_server'] = panelASD.find(".lb_ip_server").first().val();
			    				lbArr['ip_load_balancer'] = panelASD.find(".lb_ip_lb").first().val();				
			    				lbArr['port'] = panelASD.find(".lb_port").first().val();							
			    				lbArr['url'] = panelASD.find(".lb_url").first().val();				
			    				lbArr['ssl'] = panelASD.find(".lb_ssl").first().val();				
			    				lbArr['persistence'] = panelASD.find(".lb_persistence").first().val();	
			    				lbArr['metode'] = panelASD.find(".lb_metode").first().val();				
			    				lbArr['keterangan'] = panelASD.find(".lb_keterangan").first().val();
			    				panelASD.find('input[name="lb_SSL"]').each(function(){
									if( $(this).is(':checked') ){
										lbArr['ssl'] = $(this).val();
										return false;
									}
								});
								panelASD.find('input[name="lb_persistence"]').each(function(){
									if( $(this).is(':checked') ){
										lbArr['persistence'] = $(this).val();
										return false;
									}
								});
			    			}

			    			if($(this).attr('id') == 'tcb2'){
			    				asdArr['service_aplikasi'] += "WAF,";
			    				wafArr['ip_server_lb'] = panelASD.find(".waf_ip_server").first().val();
			    				wafArr['port'] = panelASD.find(".waf_port").first().val();					
			    				wafArr['source_ip'] = panelASD.find(".waf_source").first().val();	
			    				wafArr['url'] = panelASD.find(".waf_url").first().val();	
			    				panelASD.find('input[name="waf_ssl"]').each(function(){
									if( $(this).is(':checked') ){
										wafArr['ssl'] = $(this).val();
										return false;
									}
								});
			    			}
			    			if($(this).attr('id') == 'tcb3'){
			    				asdArr['service_aplikasi'] += "AA,";
			    				aaArr['ip_server_lb'] = panelASD.find(".aa_ip_server").first().val();
			    				aaArr['port'] = panelASD.find(".aa_port").first().val();					
			    				aaArr['url'] = panelASD.find(".aa_url").first().val();	
			    				// aaArr['ssl'] = panelASD.find(".aa_ssl").first().val();	
			    				
			    				panelASD.find('input[name="aa_ssl"]').each(function(){
									if( $(this).is(':checked') ){
										aaArr['ssl'] = $(this).val();
										return false;
									}
								});
			    			}
			    			if($(this).attr('id') == 'tcb4'){
			    				asdArr['service_aplikasi'] += "MADC";
			    				madcArr['ip_server_lb'] = panelASD.find(".madc_ip_server").first().val();
			    				madcArr['port'] = panelASD.find(".madc_port").first().val();							
			    				madcArr['url'] = panelASD.find(".madc_url").first().val();				
			    				madcArr['metode'] = panelASD.find(".madc_metode").first().val();				
			    				madcArr['keterangan'] = panelASD.find(".madc_keterangan").first().val();
			    				panelASD.find('input[name="madc_lokasi"]').each(function(){
									if( $(this).is(':checked') ){
										madcArr['lokasi'] = $(this).val();
										return false;
									}
								});
								panelASD.find('input[name="madc_persistence"]').each(function(){
									if( $(this).is(':checked') ){
										madcArr['persistence'] = $(this).val();
										return false;
									}
								});
			    			}
			    		});
		    		} 
		    	});
		    	$.ajax({
					url: "{{Request::URL()}}",
    				type: 'post',
    				data: {op: JSON.stringify(opArr), meta: JSON.stringify(arr), dc: JSON.stringify(dcArr), h2h: JSON.stringify(h2hArr), ra: JSON.stringify(raArr), lan: JSON.stringify(lanArr), asd: JSON.stringify(asdArr), lb: JSON.stringify(lbArr), waf: JSON.stringify(wafArr), aa: JSON.stringify(aaArr), madc: JSON.stringify(madcArr), _token: '{{csrf_token()}}'},
    				success: function(response){
    					if(response == "OK"){
    						alert("Data successfully inserted.");
    						window.location = "../myRequests";
    					}else if(response == "EMPTY"){
    						alert("Form has not been filled.");
    					}
    				},
    				error: function(response){
    					alert("Error when contacting the server");
    				}
    			});
		    });
		});
	</script>

	@stop