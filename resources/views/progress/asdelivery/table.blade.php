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
						<a class="btn bg-teal" href="{{Request::URL()}}/edit">
							<i class="material-icons" style="margin-right: 5px">edit</i>Edit
						</a>
					</div>
				</div>
			</div>
			<div class="body" id="metaTable">
				<div class="row">
					<div class="col-md-9">
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
								<td>{{$serviceDetail->created_at}}</td>									
							</tr>
							<tr>
								<td style="width:100px">Done</td>
								<td style="width:20px">:</td>
								<td><?php
										$doneDate = $serviceDetail->created_at;
										$flag = 0;
										if( isset($serviceDetail->Form_Application_Service_Delivery[0]->Form_Load_Balancer)){
											if(!isset($serviceDetail->Form_Application_Service_Delivery[0]->Form_Load_Balancer[0]->finish_date)){
												echo "-";
												$flag = 1;
											}else{
												$doneDate = $serviceDetail->Form_Application_Service_Delivery[0]->Form_Load_Balancer[0]->finish_date;
											}
										}
										if( isset($serviceDetail->Form_Application_Service_Delivery[0]->Form_Web_Application_Firewall)){
											if(!isset($serviceDetail->Form_Application_Service_Delivery[0]->Form_Web_Application_Firewall[0]->finish_date)){
												echo "-";
												$flag = 1;
											}else{
												$doneDate = $serviceDetail->Form_Application_Service_Delivery[0]->Form_Web_Application_Firewall[0]->finish_date;
											}
										}
										if( isset($serviceDetail->Form_Application_Service_Delivery[0]->Form_Application_Acceleration)){
											if(!isset($serviceDetail->Form_Application_Service_Delivery[0]->Form_Application_Acceleration[0]->finish_date)){
												echo "-";
												$flag = 1;
											}else{
												$doneDate = $serviceDetail->Form_Application_Service_Delivery[0]->Form_Application_Acceleration[0]->finish_date;
											}
										}
										if( isset($serviceDetail->Form_Application_Service_Delivery[0]->Form_Multiple_Active_Data_Center)){
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
									?></td>									
							
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
							<?php if (isset($temp->finish_date)): ?>
								<span class="col-teal status status-complete">(Complete)</span>	
							<?php else: ?>
								<span class="col-orange status">(On Progress)</span>	
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
							<?php if (isset($temp->finish_date)): ?>
								<span class="col-teal status status-complete">(Complete)</span>	
							<?php else: ?>
								<span class="col-orange status">(On Progress)</span>	
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
							<?php if (isset($temp->finish_date)): ?>
								<span class="col-teal status status-complete">(Complete)</span>	
							<?php else: ?>
								<span class="col-orange status">(On Progress)</span>	
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
							<?php if (isset($temp->finish_date)): ?>
								<span class="col-teal status status-complete">(Complete)</span>	
							<?php else: ?>
								<span class="col-orange status">(On Progress)</span>	
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
<div class="row clearfix" id="progressSection">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<!--div class="card">
			<div class="header">
				<div class="row clearfix">
					<div class="col-xs-12 col-sm-6">
						<h2 >Progress Status</h2>
					</div>
				</div>
			</div>
			<div class="body">
				<div class="progress">
                    <?php if ($serviceDetail->Form_Application_Service_Delivery[0]->pic == "none"): ?>
			<div class="progress-bar progress-bar" role="progressbar" aria-valuenow="0"
                 aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
            <?php elseif ($parentProgress == 100):?>
			<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100"
                 aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
        <?php else: ?>
			<div class="progress-bar progress-bar" role="progressbar" aria-valuenow="100"
                 aria-valuemin="" aria-valuemax="100" style="width: 50%"></div>
        <?php endif ?>
			</div>
        </div>
    </div-->
		<div class="card">
			<div class="header">
				<div class="row clearfix">
					<div class="col-xs-12 col-sm-6">
						<h2>SLA BAR</h2>
					</div>
				</div>
			</div>
			<div class="body">
				<p id="title"></p>
				<div class="progress" style="position: relative">
					<div id="text" class="center" style="position: absolute;left: 40%">
					</div>
					<div class="progress-bar bg-orange progress-bar-striped active" role="progressbar"
						 aria-valuemin="0" aria-valuemax="100" id="progressBar" style="width:0%;">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
    var startDate = new Date("{{$serviceDetail->Form_Application_Service_Delivery[0]->start_date}}");
    var expectedFinishDate = new Date("{{$serviceDetail->Form_Application_Service_Delivery[0]->expected_finish_date}}");
    var finishDate = "{{$serviceDetail->Form_Application_Service_Delivery[0]->finish_date}}";
    var pic = "{{$serviceDetail->Form_Application_Service_Delivery[0]->pic}}";
    //var expectedFinishDate = new Date(2018,11,10,15,33,00);
    //var startDate = new Date(2018,11,10,15,30,00);

</script>
@stop
