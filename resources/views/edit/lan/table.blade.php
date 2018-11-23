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
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="mainTable">
        <div class="card">
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
            <form>
            	@csrf
	            <div class="body form-content" style="overflow: hidden">
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
					<?php if (!isset($serviceDetail->Form_Permohonan_Koneksi_Lan[0]->finish_date)): ?>
					<?php $i = 2; ?>
					<input type="text" name="id" style="display:none" value="{{$serviceDetail->Form_Permohonan_Koneksi_Lan[0]->id}}">
					<!--lokasi-->
					<div class="col-md-6">
						<div class="form-group col-md-12">
							<P>
								<label for="lokasi">Lokasi</label>
							</P>
							<input class="with-gap" name="lokasi" type="radio" value="MBCA" id="lokasi_1" {{$serviceDetail->Form_Permohonan_Koneksi_Lan[0]->lokasi == 'MBCA'? 'checked' : ''}}/>
							<label for="lokasi_1">Menara BCA</label><br/>
							<input class="with-gap" name="lokasi" type="radio" value="WSA2" id="lokasi_2" {{$serviceDetail->Form_Permohonan_Koneksi_Lan[0]->lokasi == 'WSA2'? 'checked' : ''}}/>
							<label for="lokasi_2">Wisma Asia 2</label><br/>
							<input class="with-gap" name="lokasi" type="radio" value="WSBY" class="with-gap" id="lokasi_3" {{$serviceDetail->Form_Permohonan_Koneksi_Lan[0]->lokasi == 'WSBY'? 'checked' : ''}}/>
							<label for="lokasi_3">Grha Asia</label><br/>
							<input class="with-gap" name="lokasi" type="radio" value="Others" id="lokasi_4" class="with-gap" {{$serviceDetail->Form_Permohonan_Koneksi_Lan[0]->lokasi != 'MBCA' && $serviceDetail->Form_Permohonan_Koneksi_Lan[0]->lokasi != 'WSA2' && $serviceDetail->Form_Permohonan_Koneksi_Lan[0]->lokasi != 'WSBY'? 'checked' : ''}}/>
							<label for="lokasi_4">Lainnya</label>  
						</div>		
						<!--Antivirus-->
						<div class="form-group col-md-12">
							<P>
								<label for="antivirus">Antivirus</label>
							</P>
							<input class="with-gap" name="antivirus" type="radio" value="Ya" id="antivirus_1" {{$serviceDetail->Form_Permohonan_Koneksi_Lan[0]->antivirus == 'Ya'? 'checked' : ''}} />
							<label for="antivirus_1">Ya</label><br/>
							<input class="with-gap" name="antivirus" type="radio" value="Tidak" id="antivirus_2" {{$serviceDetail->Form_Permohonan_Koneksi_Lan[0]->antivirus == 'Tidak'? 'checked' : ''}}/>
							<label for="antivirus_2" >Tidak</label><br/>								
						</div>		
						<!--Total User/Device-->
						<div class="form-group col-md-12 clearfix">
							<p>
								<label>Total User/Device</label>
							</p>
							<div class="form-group">
								<input type="text" name="total_user_per_device" class="total_user_per_device form-control" style="border-bottom: solid #DADADA 1px" value="{{$serviceDetail->Form_Permohonan_Koneksi_Lan[0]->total_user_per_device}}">							
							</div>
						</div>
						<!--Koneksi ke Switch-->
						<div class="form-group col-md-12 clearfix">
							<p>
								<label>Koneksi ke Switch</label>
							</p>
							<div class="form-group">
								<input type="text" name="koneksi_ke_switch" class="koneksi_ke_switch form-control" style="border-bottom: solid #DADADA 1px" value="{{$serviceDetail->Form_Permohonan_Koneksi_Lan[0]->koneksi_ke_switch}}">							
							</div>
						</div>
						<!--Port Switch-->
						<div class="form-group col-md-12 clearfix">
							<p>
								<label>Port Switch</label>
							</p>
							<div class="form-group">
								<input type="text" name="port_switch" class="port_switch form-control" style="border-bottom: solid #DADADA 1px" value="{{$serviceDetail->Form_Permohonan_Koneksi_Lan[0]->port_switch}}">							
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
								<input type="text" name="segment_ip_address" class="segment_ip_address form-control" style="border-bottom: solid #DADADA 1px" value="{{$serviceDetail->Form_Permohonan_Koneksi_Lan[0]->segment_ip_address}}">							
							</div>
						</div>
						<!--IP Phone-->
						<div class="form-group col-md-12">
							<P>
								<label for="ip_phone">IP Phone</label>
							</P>
							<input class="with-gap" name="ip_phone" type="radio" value="Cisco" id="ipphone_1" {{$serviceDetail->Form_Permohonan_Koneksi_Lan[0]->ip_phone == 'Cisco'? 'checked' : ''}} />
							<label for="ipphone_1">Cisco</label><br/>
							<input class="with-gap" name="ip_phone" type="radio" value="Avaya" id="ipphone_2" {{$serviceDetail->Form_Permohonan_Koneksi_Lan[0]->ip_phone == 'Avaya'? 'checked' : ''}}/>
							<label for="ipphone_2">Avaya</label><br/>
							<input class="with-gap" name="ip_phone" type="radio" value="Tidak Ada" id="ipphone_3" {{$serviceDetail->Form_Permohonan_Koneksi_Lan[0]->ip_phone == 'Tidak ada'? 'checked' : ''}}/>
							<label for="ipphone_3">Tidak ada</label><br/>								
						</div>	
						<!--Lama Pemakaian-->
						<div class="form-group col-md-12 clearfix">
							<p>
								<label for="lama_pemakaian">Lama Pemakaian</label>
							</p>
							<div class="form-group">
								<input type="text" name="lama_pemakaian" class="lama_pemakaian form-control" style="border-bottom: solid #DADADA 1px" value="{{$serviceDetail->Form_Permohonan_Koneksi_Lan[0]->lama_pemakaian}}">							
							</div>
						</div>							
						<!--Bypass NAC/ISE-->
						<div class="form-group col-md-12">
							<P>
								<label for="bypass">Bypass NAC/ISE</label>
							</P>
							<input class="with-gap" name="bypass_nas_ise" type="radio" value="Ya" id="bypass_1" {{$serviceDetail->Form_Permohonan_Koneksi_Lan[0]->bypass_nas_ise == 'Ya'? 'checked' : ''}} />
							<label for="bypass_1">Ya</label><br/>
							<input class="with-gap" name="bypass_nas_ise" type="radio" value="Tidak" id="bypass_2" {{$serviceDetail->Form_Permohonan_Koneksi_Lan[0]->bypass_nas_ise == 'Tidak'? 'checked' : ''}}/>
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
					<?php else: ?>
						<p>No form to be editable.</p>
						<?php $i = 1; ?>							
					<?php endif ?>
	            </div>						
			</form>
        </div>
       	<?php if ($i > 1): ?>
			<div class="card" id="submitCard">
				<div class="body">                            
					<button class="form-control bg-teal" id="btnSubmit">UPDATE</button>
				</div>
			</div>			
		<?php endif ?>
    </div>
</div>
<!-- #END# Page Content -->
	</div>
</section>

@stop



@section('content-script')
<script>
	$("#btnSubmit").click(function(e){
    	e.preventDefault();
    	var arr = {};
		arr['no_remedy'] = $("#no_remedy").val();
		arr['project_name'] = $("#project_name").val();
		arr['category'] = $("#category").val();
		arr['requester_name'] = "Pang Peter Pangestu";
		lanArr = [];
		
		$('.form-content').each(function(){
			tmpArr = {}
			tmpArr['id'] = $("input[name=id]").val();
			tmpArr['lokasi'] = $("input[name=lokasi]:checked").val();
			tmpArr['antivirus'] = $("input[name=antivirus]:checked").val();
			tmpArr['total_user_per_device'] = $("input[name=total_user_per_device]").val();
			tmpArr['koneksi_ke_switch'] = $("input[name=koneksi_ke_switch]").val();
			tmpArr['port_switch'] = $("input[name=port_switch]").val();
			tmpArr['segment_ip_address'] = $("input[name=segment_ip_address]").val();
			tmpArr['ip_phone'] = $("input[name=ip_phone]:checked").val();
			tmpArr['lama_pemakaian'] = $("input[name=lama_pemakaian]").val();
			tmpArr['bypass_nas_ise'] = $("input[name=bypass_nas_ise]:checked").val();
			lanArr.push(tmpArr);
		});	
    	$.ajax({
			url: "{{Request::URL()}}",
			type: 'post',
			data: {data: JSON.stringify(lanArr), meta: JSON.stringify(arr), _token: '{{csrf_token()}}'},
			success: function(response){
				if(response == "OK"){
					alert("Data successfully updated.");
					window.location = "./";
				}else if(response == "EMPTY"){
					alert("Form has not been filled.");
				}
			},
			error: function(response){
				alert("Error when contacting the server");
			}
		});
    });
</script>
@stop