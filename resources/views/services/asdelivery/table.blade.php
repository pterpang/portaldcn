@extends('services.serviceDetail')

@section('subcontent-head')
td{
	border: solid white 1px !important;
}
@stop

@section('serviceForm')
<div class="row clearfix">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="card" id="mainTable">
			<div class="header">
				<div class="row clearfix">
					<div class="col-xs-12 col-sm-6">
						<h2 class="content-submenu"></h2>
					</div>
					<div class="col-xs-12 col-sm-6" align="right">
						<?php if ($serviceDetail->Form_Application_Service_Delivery[0]->pic == "none"): ?>
							<a class="btn bg-blue takejob" href="#" url="{{Request::URL()}}/take">
								<i class="material-icons" style="margin-right: 5px">assignment</i>Take
							</a>
							<?php elseif ($parentProgress == 100):?>
							<a class="btn bg-blue" href="#" url="#" disabled="disabled">
								<i class="material-icons" style="margin-right: 5px">check</i>Complete
							</a>
						<?php else: ?>
							<a class="btn bg-blue" href="#" url="#" disabled="disabled">
								<i class="material-icons" style="margin-right: 5px">hourglass_full</i>On progress
							</a>
						<?php endif ?>	
						<a class="btn bg-teal" href="{{Request::URL()}}/edit" id="atoedit">
							<i class="material-icons" style="margin-right: 5px">edit</i>Edit
						</a>
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
						<div class="col-md-6 subservice" style="overflow:hidden">
							<span style="font-weight: bold;">Load Balancing Server</span>
							<?php if (isset($serviceDetail->Form_Application_Service_Delivery[0]->Form_Load_Balancer[0]->finish_date)): ?>
								<span class="col-teal status status-complete">(Complete)</span>			
							<?php else: ?>
								<td align="center">
									<button url="asdelivery/loadbalancer/finishTask/{{$serviceDetail->Form_Application_Service_Delivery[0]->Form_Load_Balancer[0]->id}}" class="btn bg-teal status btnFinishTask">
										<i class="material-icons" style="margin-right: 5px">done</i>Finish
									</button>
								</td>	
							<?php endif ?>
							<table id="loadBalancingServer" class="table" style="margin-bottom: 30px">
								<tr>
									<td>a. IP Server</td>
									<td>:</td>
									<td>
										{{ $temp->ip_server }}
									</td>									
								</tr>
								<tr>
									<td>b. IP Load Balancer</td>
									<td>:</td>
									<td>
										{{ $temp->ip_load_balancer }}
									</td>																				
								</tr>
								<tr>
									<td>c. Port</td>
									<td>:</td>
									<td>{{ $temp->port }}</td>																
								</tr>
								<tr>
									<td>d. URL</td>
									<td>:</td>
									<td>	{{ $temp->url }}</td>
								</tr>
								<tr>
									<td>e. SSL</td>
									<td>:</td>
									<td>{{ $temp->ssl }}</td>																				
								</tr>
								<tr>
									<td>f. Persistence/Sticky</td>
									<td>:</td>
									<td>{{ $temp->persistence }}</td>																				
								</tr>
								<tr>
									<td>g. Metode</td>
									<td>:</td>
									<td>
										{{ $temp->metode }}
									</td>																				
								</tr>
								<tr>
									<td>h. Keterangan</td>
									<td>:</td>
									<td>{{ $temp->keterangan }}</td>																				
								</tr>
							</table>								
						</div>					
					<?php endif ?>

					<?php if (sizeof($serviceDetail->Form_Application_Service_Delivery[0]->Form_Web_Application_Firewall) > 0): ?>
						<?php $temp = $serviceDetail->Form_Application_Service_Delivery[0]->Form_Web_Application_Firewall[0]; ?>
						<div class="col-md-6 subservice" style="overflow:hidden">
							<span style="font-weight:bold">Web Application Firewall</span>
							<span>
							<?php if (isset($serviceDetail->Form_Application_Service_Delivery[0]->Form_Web_Application_Firewall[0]->finish_date)): ?>
								<span class="col-teal status status-complete">(Complete)</span>			
							<?php else: ?>
								<td align="center">
									<button url="asdelivery/waf/finishTask/{{$serviceDetail->Form_Application_Service_Delivery[0]->Form_Web_Application_Firewall[0]->id}}" class="btn bg-teal status btnFinishTask">
										<i class="material-icons" style="margin-right: 5px">done</i>Finish
									</button>
								</td>	
							<?php endif ?>
							
							</span>
							<table id="webApplicationFirewall" class="table">
								<tr>
									<td>a. IP Server/LB</td>
									<td>:</td>
									<td>
										{{$temp->ip_server_lb}}
									</td>									
								</tr>
								<tr>
									<td>b. Port</td>
									<td>:</td>
									<td>
										{{$temp->port}}
									</td>																				
								</tr>
								<tr>
									<td>c. SSL</td>
									<td>:</td>
									<td>{{$temp->ssl}}</td>																				
								</tr>
								<tr>
									<td>d. Source IP</td>
									<td>:</td>
									<td>{{$temp->source_ip}}</td>																				
								</tr>
								<tr>
									<td>e. URL</td>
									<td>:</td>
									<td>{{$temp->url}}</td>																				
								</tr>
							</table>	
						</div>					
					<?php endif ?>

					<?php if (sizeof($serviceDetail->Form_Application_Service_Delivery[0]->Form_Application_Acceleration) > 0): ?>
						<?php $temp = $serviceDetail->Form_Application_Service_Delivery[0]->Form_Application_Acceleration[0]; ?>
						<div class="col-md-6 subservice" style="overflow:hidden">
							<span style="font-weight: bold">Application Acceleration</span>
							<?php if (isset($serviceDetail->Form_Application_Service_Delivery[0]->Form_Application_Acceleration[0]->finish_date)): ?>
								<span class="col-teal status status-complete">(Complete)</span>			
							<?php else: ?>
								<td align="center">
									<button url="asdelivery/aa/finishTask/{{$serviceDetail->Form_Application_Service_Delivery[0]->Form_Application_Acceleration[0]->id}}" class="btn bg-teal status btnFinishTask">
										<i class="material-icons" style="margin-right: 5px">done</i>Finish
									</button>
								</td>	
							<?php endif ?>
							
							<table id="applicationAcceleration" class="table" style="margin-bottom: 30px">
								<tr>
									<td>a. IP Server/LB</td>
									<td>:</td>
									<td>
										{{$temp->ip_server_lb}}
									</td>									
								</tr>
								<tr>
									<td>b. Port</td>
									<td>:</td>
									<td>
										{{$temp->port}}
									</td>																				
								</tr>
								<tr>
									<td>c. SSL</td>
									<td>:</td>
									<td>{{$temp->ssl}}</td>																				
								</tr>
								<tr>
									<td>d. URL</td>
									<td>:</td>
									<td>{{$temp->url}}</td>																				
								</tr>
							</table>							
						</div>													
					<?php endif ?>

					<?php if (sizeof($serviceDetail->Form_Application_Service_Delivery[0]->Form_Multiple_Active_Data_Center) > 0): ?>
						<?php $temp = $serviceDetail->Form_Application_Service_Delivery[0]->Form_Multiple_Active_Data_Center[0]; ?>
						<div class="col-md-6 subservice" style="overflow:hidden">
							<span style="font-weight: bold">Multiple Active Data Center</span>	
							<span>
							<?php if ($serviceDetail->Form_Application_Service_Delivery[0]->pic == "none"): ?>
									<span class="col-red status">Pending</span>
							<?php else: ?>	
								<?php if (isset($serviceDetail->Form_Application_Service_Delivery[0]->Form_Multiple_Active_Data_Center[0]->finish_date)): ?>
									<span class="col-teal status status-complete">(Complete)</span>			
								<?php else: ?>
									<td align="center">
										<button url="asdelivery/madc/finishTask/{{$serviceDetail->Form_Application_Service_Delivery[0]->Form_Multiple_Active_Data_Center[0]->id}}" class="btn bg-teal status btnFinishTask">
											<i class="material-icons" style="margin-right: 5px">done</i>Finish
										</button>
									</td>	
								<?php endif ?>

							<?php endif ?>
							</span>									
							<table id="loadBalancingServer" class="table" style="margin-bottom: 30px">
								<tr>
									<td>a. Lokasi</td>
									<td>:</td>
									<td>
										{{$temp->lokasi}}
									</td>									
								</tr>
								<tr>
									<td>b. IP Server/LB</td>
									<td>:</td>
									<td>
										{{$temp->ip_server_lb}}
									</td>																				
								</tr>
								<tr>
									<td>c. Port</td>
									<td>:</td>
									<td>{{$temp->port}}</td>																				
								</tr>
								<tr>
									<td>d. URL</td>
									<td>:</td>
									<td>{{$temp->url}}</td>																				
								</tr>
								<tr>
									<td>e. Persistence/Sticky</td>
									<td>:</td>
									<td>{{$temp->persistence}}</td>																				
								</tr>
								<tr>
									<td>f. Metode</td>
									<td>:</td>
									<td>
										{{$temp->metode}}
									</td>																				
								</tr>
								<tr>
									<td>g. Keterangan</td>
									<td>:</td>
									<td>
										{{$temp->keterangan}}
									</td>																				
								</tr>
							</table>
						</div>													
					<?php endif ?>
				</div>
			</div>			
		</div>
	</div>
</div>
@stop
