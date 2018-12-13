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
						<button class="btn bg-primary" onclick="window.history.back();"><i class="material-icons" style="margin-right: 5px">arrow_back</i>Back</button>
						<a class="btn bg-teal" href="{{Request::URL()}}/edit" id="atoedit">
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
									foreach ($serviceDetail->Form_Pendaftaran_Remote_Access as $row) {
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
							<td>{{$serviceDetail->Form_Pendaftaran_Remote_Access[0]->pic}}</td>									
							
						</tr>
					</table>
				</div>
				<table class="table table-bordered table-hover table-striped" id="mainTable">
					<thead>
						<tr>
							<th>No</th>
							<th>Server Name</th>
							<th>IP Address</th>
							<th>Protocol</th>
							<th>Port Number</th>		
							<th>Client (IE, SSH, PC3270, dll)</th>
							<th>Description</th>
							<th>Status</th>										
						</tr>
					</thead>
					<tbody class="form-content">
						<?php $i = 1; ?>
						<?php foreach ($serviceDetail->Form_Pendaftaran_Remote_Access as $row): ?>
							<tr>
								<td>{{$i++}}</td>
								<td>
								<?php
								foreach (explode("<br>", $row->nama_server) as $row2) {
									echo "<p>". $row2 ."</p>";
								}
								?>
								</td>
								<td>
									<?php
									foreach (explode("<br>", $row->ip_address) as $row2) {
										echo "<p>". $row2 ."</p>";
									}
									?>
								</td>
								<td>{{$row->protocol}}</td>
								<td>
									<?php
									foreach (explode("<br>", $row->port) as $row2) {
										echo "<p>". $row2 ."</p>";
									}
									?>
								</td>	
								<td>
									<?php
									foreach (explode("<br>", $row->client) as $row2) {
										echo "<p>". $row2 ."</p>";
									}
									?>
								</td>
								<td>
									<?php
									foreach (explode("<br>", $row->deskripsi) as $row2) {
										echo "<p>". $row2 ."</p>";
									}
									?>
								</td>
								<?php if (isset($row->finish_date)): ?>
									<td align="center" class="col-teal status status-complete">Complete</td>		
								<?php else: ?>
									<td align="center" class="col-orange status">On Progress</td>		
								<?php endif ?>										
							</tr>
						<?php endforeach ?>			
					</tbody>
				</table>				
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
                    <?php if ($serviceDetail->Form_Pendaftaran_Remote_Access[0]->pic == "none"): ?>
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
						<h2>SLA Bar</h2>
					</div>
				</div>
			</div>
			<div class="body">
				<p id="startDate"></p>
				<p id="expectedFinishDate"></p>
				<p id="finishedDate"></p>
				<div class="progress" style="position: relative">
					<div id="text" class="center" style="position: absolute;left: 40%">
					</div>
                    <?php if ($serviceDetail->Form_Pendaftaran_Remote_Access[0]->pic == "none"): ?>
					<div class="progress-bar bg-red progress-bar" role="progressbar" aria-valuenow="0"
						 aria-valuemin="0" aria-valuemax="100" style="width: 100%">Request Belum Diambil</div>
                    <?php elseif($serviceDetail->Form_Pendaftaran_Remote_Access[0]->finish_date == null): ?>
					<div class="progress-bar bg-orange progress-bar-striped active" role="progressbar"
						 aria-valuemin="0" aria-valuemax="100" id="progressBar" style="width:0%;">
                        <?php else:?>
						<div class="progress-bar bg-light-green progress-bar" role="progressbar" aria-valuenow="0"
							 aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
					</div>
                    <?php endif ?>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
    var startDate = new Date("{{$serviceDetail->Form_Pendaftaran_Remote_Access[0]->start_date}}");
    var expectedFinishDate = new Date("{{$serviceDetail->Form_Pendaftaran_Remote_Access[0]->expected_finish_date}}");
    var finishDate = new Date("{{$serviceDetail->Form_Pendaftaran_Remote_Access[0]->finish_date}}");
    var pic = "{{$serviceDetail->Form_Pendaftaran_Remote_Access[0]->pic}}";
    //var expectedFinishDate = new Date(2018,11,10,15,33,00);
    //var startDate = new Date(2018,11,10,15,30,00);

</script>
@stop
