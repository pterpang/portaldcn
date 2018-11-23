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
            <div class="row clearfix">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="card" id="mainTable">
			<div class="header">
				<div class="row clearfix">
					<div class="col-xs-12 col-sm-6">
						<h2 class="content-submenu"></h2>
					</div>
					<div class="col-xs-12 col-sm-6" align="right">
						<button class="btn bg-teal btn-lg" onclick="window.history.back();">Back</button>
					</div>
				</div>
			</div>
			<div class="body" id="metaTable">
				<div class="row">
					<div class="col-md-9" style="padding-left: 0px">
						<table>

							<tr>
								<td style="width:100px">Requester</td>
								<td style="width:20px">:</td>
								<td>{{$serviceDetail->requester_name}}</td>									
							</tr>
							<tr>
								<td style="width:100px">Remedy</td>
								<td style="width:20px">:</td>
								<td>{{$serviceDetail->no_remedy}}</td>									
							
							</tr>
							<tr>
								<td style="width:100px">Description</td>
								<td style="width:20px">:</td>
								<td>{{$serviceDetail->project_name}}</td>									
								
							</tr>
						</table>							
					</div>
					<div class="col-md-3">
						<table>
							<tr>
								<td style="width:100px">Received</td>
								<td style="width:20px">:</td>
								<td>{{date_format($serviceDetail->created_at, 'd F Y')}}</td>									
							</tr>
							<tr>
								<td style="width:100px">Done</td>
								<td style="width:20px">:</td>
								<td>

									<?php
										$doneDate = $serviceDetail->created_at;
										$flag = 0;
										if( sizeof($serviceDetail->Form_Application_Service_Delivery[0]->Form_Load_Balancer) > 0){
											if(!isset($serviceDetail->Form_Application_Service_Delivery[0]->Form_Load_Balancer[0]->finish_date)){
												echo "-";
												$flag = 1;
											}else{
												$doneDate = $serviceDetail->Form_Application_Service_Delivery[0]->Form_Load_Balancer[0]->finish_date;
											}
										}
										if( sizeof($serviceDetail->Form_Application_Service_Delivery[0]->Form_Web_Application_Firewall) > 0){
											if(!isset($serviceDetail->Form_Application_Service_Delivery[0]->Form_Web_Application_Firewall[0]->finish_date)){
												echo "-";
												$flag = 1;
											}else{
												$doneDate = $serviceDetail->Form_Application_Service_Delivery[0]->Form_Web_Application_Firewall[0]->finish_date;
											}
										}
										if( sizeof($serviceDetail->Form_Application_Service_Delivery[0]->Form_Application_Acceleration) > 0){
											if(!isset($serviceDetail->Form_Application_Service_Delivery[0]->Form_Application_Acceleration[0]->finish_date)){
												echo "-";
												$flag = 1;
											}else{
												$doneDate = $serviceDetail->Form_Application_Service_Delivery[0]->Form_Application_Acceleration[0]->finish_date;
											}
										}
										if( sizeof($serviceDetail->Form_Application_Service_Delivery[0]->Form_Multiple_Active_Data_Center) > 0){
											if(!isset($serviceDetail->Form_Application_Service_Delivery[0]->Form_Multiple_Active_Data_Center[0]->finish_date)){
												echo "-";
												$flag = 1;
											}else{
												$doneDate = $serviceDetail->Form_Application_Service_Delivery[0]->Form_Multiple_Active_Data_Center[0]->finish_date;
											}
										}
										if($flag == 0){
											$date = new DateTime($doneDate);
											$result = $date->format('d F Y');
											echo $result;
										}
									?>
								</td>									
							
							</tr>
							<tr>
								<td style="width:100px">PIC</td>
								<td style="width:20px">:</td>
								<td>{{$serviceDetail->Form_Application_Service_Delivery[0]->pic}}</td>									
								
							</tr>
						</table>
					</div>
					
				</div>
				<hr/>
				<div class="row form-content">
					<?php if (sizeof($serviceDetail->Form_Application_Service_Delivery[0]->Form_Load_Balancer) > 0): ?>
						<?php $temp = $serviceDetail->Form_Application_Service_Delivery[0]->Form_Load_Balancer[0]; ?>
						<div class="col-md-6 panel-group">
							<div class="panel panel-col-pink">
															<div class="panel-heading" role="tab" id="headingOne_19">
																<h4 class="panel-title">
																	<input id="tcb1" name="sub-check" class="filled-in pull-left chk-col-green" type="checkbox" style="display:inline;"><label for="tcb1" style="display:inline;margin-left: 5px; width: 10px;"></label>                                                    
																	<a role="button" data-toggle="collapse" href="#collapseOne_19" aria-expanded="false" aria-controls="collapseOne_19">
																		<i class="material-icons pull-right">expand_more</i>1. Load Balancing Server
																	</a>
																</h4>
															</div>
															<div id="collapseOne_19" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_19" aria-expanded="false" style="height: 0px;">
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
						</div>				
					<?php endif ?>
					<?php if (sizeof($serviceDetail->Form_Application_Service_Delivery[0]->Form_Web_Application_Firewall) > 0): ?>
						<?php $temp = $serviceDetail->Form_Application_Service_Delivery[0]->Form_Web_Application_Firewall[0]; ?>
						<div class="col-md-6 panel-group">
							<div class="panel panel-col-cyan">
								<div class="panel-heading" role="tab" id="headingTwo_19">
									<h4 class="panel-title">
										<a class="" role="button" data-toggle="collapse" href="#collapseTwo_19" aria-expanded="true" aria-controls="collapseTwo_19">
											<i class="material-icons pull-right">expand_more</i>2.  Web Application Firewall
										</a>
									</h4>
								</div>
								<div id="collapseTwo_19" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo_19" aria-expanded="true" style="">
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
						</div>				
					<?php endif ?>

					<?php if (sizeof($serviceDetail->Form_Application_Service_Delivery[0]->Form_Application_Acceleration) > 0): ?>
						<?php $temp = $serviceDetail->Form_Application_Service_Delivery[0]->Form_Application_Acceleration[0]; ?>
						<div class="col-md-6 panel-group">
							<div class="panel panel-col-teal">
															<div class="panel-heading" role="tab" id="headingThree_19">
																<h4 class="panel-title">
																	<a class="collapsed" role="button" data-toggle="collapse" href="#collapseThree_19" aria-expanded="false" aria-controls="collapseThree_19">
																		<i class="material-icons pull-right">expand_more</i> 3. Application Acceleration
																	</a>
																</h4>
															</div>
															<div id="collapseThree_19" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree_19">
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
						</div>												
					<?php endif ?>

					<?php if (sizeof($serviceDetail->Form_Application_Service_Delivery[0]->Form_Multiple_Active_Data_Center) > 0): ?>
						<?php $temp = $serviceDetail->Form_Application_Service_Delivery[0]->Form_Multiple_Active_Data_Center[0]; ?>
						<div class="panel-group col-md-6">
							<div class="panel panel-col-orange">
															<div class="panel-heading" role="tab" id="headingFour_19">
																<h4 class="panel-title">
																	<a class="collapsed" role="button" data-toggle="collapse" href="#collapseFour_19" aria-expanded="false" aria-controls="collapseFour_19">
																		<i class="material-icons pull-right">expand_more</i>4. Multiple Active Data Center
																	</a>
																</h4>
															</div>
															<div id="collapseFour_19" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingFour_19">
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
					<?php endif ?>
				</div>
			</div>			
		</div>
	</div>
</div>
        </div>
</section>
@stop
