@extends('services.serviceDetail')

@section('serviceForm')
<!-- Page Content -->
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card" id="mainTable">
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
                        <div class="body form-content" style="overflow: hidden">   
							<div class="col-md-9" style="padding-left: 0px">
								<table id="metaTable">
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
								<table id="metaTable">
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
												foreach ($serviceDetail->Form_Permohonan_Koneksi_Lan as $row) {
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
										<td>{{$serviceDetail->Form_Permohonan_Koneksi_Lan[0]->pic}}</td>																			
									</tr>
								</table>
							</div>
							<?php
								$temp = $serviceDetail->Form_Permohonan_Koneksi_Lan[0];
							?>
							<div class="col-md-12">
								<P style="font-weight: bold">
									Status: <span class="status {{isset($serviceDetail->Form_Permohonan_Koneksi_Lan[0]->finish_date)? 'status-complete col-teal' : 'col-orange'}}">{{isset($serviceDetail->Form_Permohonan_Koneksi_Lan[0]->finish_date)? 'Complete' : 'On Progress'}}</span>
								</P>								
							</div>
							<!--lokasi-->
							<div class="col-md-6">
								<div class="form-group col-md-12">
									<P>
										<label for="lokasi">Lokasi:</label>
									</P>
									<p>{{$temp->lokasi}}</p>
								</div>		
								<!--Antivirus-->
								<div class="form-group col-md-12">
									<P>
										<label for="antivirus">Antivirus:</label>
									</P>
									<p>{{$temp->antivirus}}</p>							
								</div>		
								<!--Lantai-->
								<div class="form-group col-md-12 clearfix">
									<p>
										<label>Lantai:</label>
									</p>
									<div class="form-group">
										<p>{{$temp->lantai}} User</p>
									</div>
								</div>
								<!--Total User/Device-->
								<div class="form-group col-md-12 clearfix">
									<p>
										<label>Total User/Device:</label>
									</p>
									<div class="form-group">
										<p>{{$temp->total_user_per_device}} User</p>
									</div>
								</div>
								<!--Koneksi ke Switch-->
								<div class="form-group col-md-12 clearfix">
									<p>
										<label>Koneksi ke Switch:</label>
									</p>
									<p>{{$temp->koneksi_ke_switch}}</p>
								</div>
								<!--Port Switch-->
								<div class="form-group col-md-12 clearfix">
									<p>
										<label>Port Switch:</label>
									</p>
									<p>{{$temp->port_switch}}</p>
								</div>
							</div>
							<div class="col-md-6">
								<!--Segment IP Address-->
								<div class="form-group col-md-12 clearfix">
									<p>
										<label for="ipadress">Segment IP Address:</label>
									</p>
									<p>{{$temp->segment_ip_address}}</p>
								</div>
								<!--IP Phone-->
								<div class="form-group col-md-12">
									<P>
										<label for="ipphone">IP Phone:</label>
									</P>
									<p>{{$temp->ip_phone}}</p>							
								</div>	
								<!--Lama Pemakaian-->
								<div class="form-group col-md-12 clearfix">
									<p>
										<label for="lamapemakaian">Lama Pemakaian:</label>
									</p>
									<p>{{$temp->lama_pemakaian}}</p>
								</div>							
								<!--Bypass NAC/ISE-->
								<div class="form-group col-md-12">
									<P>
										<label for="bypass">Bypass NAC/ISE:</label>
									</P>
									<p>{{$temp->bypass_nas_ise}}</p>							
								</div>		
								<!--MAC Address-->
								<div class="form-group col-md-12 clearfix" id="macAddressDiv">
									<p>
										<label>IP/MAC Address:</label>
									</p>
									<div class="form-group">
										<div style="border: solid #DADADA 1px">
											<textarea class="form-control" style="resize:none" rows="5" name="macAddress" disabled="true">{{$temp->mac_address}}</textarea>
										</div>
									</div>
								</div>								
							</div>		  
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Page Content -->
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
                    <?php if ($serviceDetail->Form_Permohonan_Koneksi_Lan[0]->pic == "-"): ?>
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
                    <?php if ($serviceDetail->Form_Permohonan_Koneksi_Lan[0]->pic == "-"): ?>
					<div class="progress-bar bg-grey progress-bar" role="progressbar" aria-valuenow="0"
						 aria-valuemin="0" aria-valuemax="100" style="width: 100%">Request Belum Diambil</div>
                    <?php elseif($serviceDetail->Form_Permohonan_Koneksi_Lan[0]->finish_date == null): ?>
					<div class="progress-bar bg-orange progress-bar-striped active" role="progressbar"
						 aria-valuemin="0" aria-valuemax="100" id="progressBar" style="width:0%;">
                        <?php elseif($serviceDetail->Form_Permohonan_Koneksi_Lan[0]->finish_date > $serviceDetail->Form_Permohonan_Koneksi_Lan[0]->
                        expected_finish_date):?>
						<div class="progress-bar bg-red progress-bar" role="progressbar" aria-valuenow="0"
							 aria-valuemin="0" aria-valuemax="100" style="width: 100%">Request Telah Melewati Waktu Yang Ditentukan</div>
					</div>
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
    var startDate = new Date("{{$serviceDetail->Form_Permohonan_Koneksi_Lan[0]->start_date}}");
    var expectedFinishDate = new Date("{{$serviceDetail->Form_Permohonan_Koneksi_Lan[0]->expected_finish_date}}");
    var finishDate = new Date("{{$serviceDetail->Form_Permohonan_Koneksi_Lan[0]->finish_date}}");
    var pic = "{{$serviceDetail->Form_Permohonan_Koneksi_Lan[0]->pic}}";
    //var expectedFinishDate = new Date(2018,11,10,15,33,00);
    //var startDate = new Date(2018,11,10,15,30,00);

</script>
@stop
