@extends('services.serviceDetail')

@section('serviceForm')
<div class="row clearfix">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="card">
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
				<div class="col-md-9" style="padding-left: 0px">
					<table>
						<tr>
							<td style="width:100px">Requester</td>
							<td style="width:20px">:</td>
							<td>
								{{$serviceDetail->requester_name}}</td>									
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
							<td>5 August 2018</td>									
						</tr>
						<tr>
							<td style="width:100px">Done</td>
							<td style="width:20px">:</td>
							<td>
								<?php
									$doneDate = $serviceDetail->created_at;
									$flag = 0;
									foreach ($serviceDetail->Form_Host_to_Host as $row) {
										if(isset($row->finish_date)){
											if($row->finish_date > $doneDate){
												$doneDate = $row->finish_date;
											}
										}else{
											echo "-";
											$flag = 1;
											break;
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
							<td>{{$serviceDetail->Form_Host_to_Host[0]->pic}}</td>									
							
						</tr>
					</table>
				</div>
				<table class="table table-bordered table-hover table-striped" id="mainTable">
					<thead>
						<tr>
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
							<th>Status</th>										
						</tr>
					</thead>
					<tbody class="form-content">
						<?php $i = 1; ?>
						<?php foreach ($serviceDetail->Form_Host_to_Host as $row): ?>
							<tr>
								<td>{{$i++}}</td>
								<td>{{$row->nama_partner}}</td>
								<td>{{$row->link_komunikasi}}</td>
								<td>{{$row->site}}</td>
								<td>{{$row->ip_server_bca}}</td>
								<td>{{$row->ip_server_partner}}</td>	
								<td>{{$row->ip_p2p_bca}}</td>
								<td>{{$row->ip_p2p_partner}}</td>
								<td>{{$row->port_aplikasi}}</td>
								<td>{{$row->nama_aplikasi}}</td>
								<?php if (isset($row->finish_date)): ?>
									<td align="center" class="col-teal status status-complete">Complete</td>			
								<?php else: ?>
									<td align="center" class="col-orange status">On progress</td>
								<?php endif ?>													
							</tr>							
						<?php endforeach ?>
																								
					</tbody>
				</table>
				
			</div>
			
		</div>
	
		
	</div>
</div>
@stop
