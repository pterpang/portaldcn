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
									<a class="btn bg-teal" href="{{Request::URL()}}/edit">
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
								<!-- <div class="form-group col-md-12 clearfix" id="macAddressDiv">
									<p>
										<label>IP/MAC Address:</label>
									</p>
									<div class="form-group">
										<div style="border: solid #DADADA 1px">
											<textarea class="form-control" style="resize:none" rows="5" name="macAddress" disabled="true">aa:bb:cc:dd</textarea>
										</div>
									</div>
								</div> -->								
							</div>		  
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Page Content -->
@stop
