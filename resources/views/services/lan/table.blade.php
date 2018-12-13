@extends('services.serviceDetail')

@section('serviceForm')
<!-- Page Content -->
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="mainTable">
                    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-6">
                                    <h2 class="content-submenu"></h2>
                                </div>
								<div class="col-xs-12 col-sm-6" align="right">
									<?php if ($serviceDetail->Form_Permohonan_Koneksi_Lan[0]->pic == "none"): ?>
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
                        <div class="body form-content" style="overflow: hidden">
							<div class="col-md-9 form-content" style="padding-left: 0px">
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
							<P>
								Status: 
								<?php if ($serviceDetail->Form_Permohonan_Koneksi_Lan[0]->pic == "none"): ?>
									<span class="col-red status">Pending</span>
								<?php else: ?>
									<?php if (isset($serviceDetail->Form_Permohonan_Koneksi_Lan[0]->finish_date)): ?>
										<span class="col-teal status status-complete">Complete</span>			
									<?php else: ?>
										<td align="center">
											<button url="lan/finishTask/{{$serviceDetail->Form_Permohonan_Koneksi_Lan[0]->id}}" class="btn bg-teal status btnFinishTask">
												<i class="material-icons" style="margin-right: 5px">done</i>Finish
											</button>
										</td>	
									<?php endif ?>
								<?php endif ?>	
							</P>
							<!--lokasi-->
							<div class="col-md-6">
								<div class="form-group col-md-12">
									<P>
										<label for="lokasi">Lokasi</label>
									</P>
									
									<input class="with-gap" name="lokasi" type="radio" value="MenaraBCA" id="lokasi_1"
											{{$serviceDetail->Form_Permohonan_Koneksi_Lan[0]->lokasi == 'MBCA'? 'checked' : 'disabled="true"'}} />
										<label for="lokasi_1">Menara BCA</label><br/>
									<input class="with-gap" name="lokasi" type="radio" value="WismaAsia2" id="lokasi_2" 
											{{$serviceDetail->Form_Permohonan_Koneksi_Lan[0]->lokasi == 'WSA2'? 'checked' : 'disabled="true"'}} />
										<label for="lokasi_2">Wisma Asia 2</label><br/>
									<input class="with-gap" name="lokasi" type="radio" value="GrhaAsia" id="lokasi_3" 
											{{$serviceDetail->Form_Permohonan_Koneksi_Lan[0]->lokasi == 'WSBY'? 'checked' : 'disabled="true"'}} />
										<label for="lokasi_3">Grha Asia</label><br/>
									<input class="with-gap" name="lokasi" type="radio" value="Lainnya" id="lokasi_4" 
											{{$serviceDetail->Form_Permohonan_Koneksi_Lan[0]->lokasi != 'MBCA' && $serviceDetail->Form_Permohonan_Koneksi_Lan[0]->lokasi != 'WSA2' && $serviceDetail->Form_Permohonan_Koneksi_Lan[0]->lokasi != 'WSBY'? 'checked' : 'disabled="true"'}} />
										<label for="lokasi_4">Lainnya</label>  
								</div>		
								<!--Antivirus-->
								<div class="form-group col-md-12">
									<P>
										<label for="antivirus">Antivirus</label>
									</P>
									<input class="with-gap" name="antivirus" type="radio" value="Ya" id="antivirus_1" 
											{{$serviceDetail->Form_Permohonan_Koneksi_Lan[0]->antivirus == 'Ya'? 'checked' : 'disabled="true"'}} />
										<label for="antivirus_1">Ya</label><br/>
									<input class="with-gap" name="antivirus" type="radio" value="Tidak" id="antivirus_2" 
											{{$serviceDetail->Form_Permohonan_Koneksi_Lan[0]->antivirus == 'Tidak'? 'checked' : 'disabled="true"'}} />
										<label for="antivirus_2">Tidak</label><br/>								
								</div>		
								<!--Total User/Device-->
								<div class="form-group col-md-12 clearfix">
									<p>
										<label>Total User/Device</label>
									</p>
									<div class="form-group">
										{{$serviceDetail->Form_Permohonan_Koneksi_Lan[0]->total_user_per_device}} User
									</div>
								</div>
								<!--Koneksi ke Switch-->
								<div class="form-group col-md-12 clearfix">
									<p>
										<label>Koneksi ke Switch</label>
									</p>
									<div class="form-group">
										{{$serviceDetail->Form_Permohonan_Koneksi_Lan[0]->koneksi_ke_switch}}
									</div>
								</div>
								<!--Port Switch-->
								<div class="form-group col-md-12 clearfix">
									<p>
										<label>Port Switch</label>
									</p>
									<div class="form-group">
										{{$serviceDetail->Form_Permohonan_Koneksi_Lan[0]->port_switch}}
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
										{{$serviceDetail->Form_Permohonan_Koneksi_Lan[0]->segment_ip_address}}
									</div>
								</div>
								<!--IP Phone-->
								<div class="form-group col-md-12">
									<P>
										<label for="ipphone">IP Phone</label>
									</P>
									<input class="with-gap" name="ipphone" type="radio" value="Cisco" id="ipphone_1"
											{{$serviceDetail->Form_Permohonan_Koneksi_Lan[0]->ip_phone == 'Cisco'? 'checked' : 'disabled="true"'}} />
										<label for="ipphone_1">Cisco</label><br/>
									<input class="with-gap" name="ipphone" type="radio" value="Avaya" id="ipphone_2" 
											{{$serviceDetail->Form_Permohonan_Koneksi_Lan[0]->ip_phone == 'Avaya'? 'checked' : 'disabled="true"'}} />
										<label for="ipphone_2">Avaya</label><br/>
									<input class="with-gap" name="ipphone" type="radio" value="Tidak Ada" id="ipphone_3"  
											{{$serviceDetail->Form_Permohonan_Koneksi_Lan[0]->ip_phone == 'Tidak ada'? 'checked' : 'disabled="true"'}} />
									<label for="ipphone_3">Tidak ada</label><br/>								
								</div>	
								<!--Lama Pemakaian-->
								<div class="form-group col-md-12 clearfix">
									<p>
										<label for="lamapemakaian">Lama Pemakaian</label>
									</p>
									<div class="form-group">
										{{$serviceDetail->Form_Permohonan_Koneksi_Lan[0]->lama_pemakaian}}
									</div>
								</div>							
								<!--Bypass NAC/ISE-->
								<div class="form-group col-md-12">
									<P>
										<label for="bypass">Bypass NAC/ISE</label>
									</P>
									<input class="with-gap" name="bypass" type="radio" value="Ya" id="bypass_1" 
											{{$serviceDetail->Form_Permohonan_Koneksi_Lan[0]->bypass_nas_ise == 'Ya'? 'checked' : 'disabled="true"'}} />
										<label for="bypass_1">Ya</label><br/>
									<input class="with-gap" name="bypass" type="radio" value="Tidak" id="bypass_2" 
											{{$serviceDetail->Form_Permohonan_Koneksi_Lan[0]->bypass_nas_ise == 'Tidak'? 'checked' : 'disabled="true"'}} />
									<label for="bypass_2">Tidak</label><br/>								
								</div>		
								<!--MAC Address-->
								<div class="form-group col-md-12 clearfix" id="macAddressDiv" style="display:none">
									<p>
										<label>IP/MAC Address</label>
									</p>
									<div class="form-group">
										<div style="border: solid #DADADA 1px">
											<textarea class="form-control" style="resize:none" rows="5" name="macAddress" disabled="true">aa:bb:cc:dd</textarea>
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
                    <?php if ($serviceDetail->Form_Permohonan_Koneksi_Lan[0]->pic == "none"): ?>
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
                    <?php if ($serviceDetail->Form_Permohonan_Koneksi_Lan[0]->pic == "none"): ?>
					<div class="progress-bar bg-red progress-bar" role="progressbar" aria-valuenow="0"
						 aria-valuemin="0" aria-valuemax="100" style="width: 100%">Request Belum Diambil</div>
                    <?php elseif($serviceDetail->Form_Permohonan_Koneksi_Lan[0]->finish_date == null): ?>
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
    var startDate = new Date("{{$serviceDetail->Form_Permohonan_Koneksi_Lan[0]->start_date}}");
    var expectedFinishDate = new Date("{{$serviceDetail->Form_Permohonan_Koneksi_Lan[0]->expected_finish_date}}");
    var finishDate = new Date("{{$serviceDetail->Form_Permohonan_Koneksi_Lan[0]->finish_date}}");
    var pic = "{{$serviceDetail->Form_Permohonan_Koneksi_Lan[0]->pic}}";
    //var expectedFinishDate = new Date(2018,11,10,15,33,00);
    //var startDate = new Date(2018,11,10,15,30,00);

</script>
@stop
