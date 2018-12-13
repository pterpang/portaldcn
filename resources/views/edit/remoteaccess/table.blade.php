@extends('template')

@section('content-head')
<!-- Bootstrap Core Css -->
<link href="{{ asset('AdminBSB/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
<meta name="csrf-token" content="{{ csrf_token() }}">
<style type="text/css">
.tdDisabled{
	cursor: not-allowed;
	background: gray;
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
						</tr>
					</thead>
					<tbody class="form-content">
						<?php $i = 1; ?>
						<?php foreach ($serviceDetail->Form_Pendaftaran_Remote_Access as $row): ?>
							<tr>
								<td>{{$i++}}</td>
								<td contenteditable="true" class="nama_server">
									{!! $row->nama_server !!}
								</td>
								<td contenteditable="true" class="ip_address">
									{!! $row->ip_address !!}
								</td>
								<td contenteditable="true">
									<select class="form-control portType tdPortType spk op_protocol protocol">
										<option value="TCP" {{$row->protocol == 'TCP'? 'selected=selected':''}}>TCP</option>
										<option value="UDP" {{$row->protocol == 'UDP'? 'selected=selected':''}}>UDP</option>
										<option value="TCP-UDP" {{$row->protocol == 'TCP-UDP'? 'selected=selected':''}}>TCP-UDP</option>
										<option value="ICMP" {{$row->protocol == 'ICMP'? 'selected=selected':''}}>ICMP</option>
										<option value="IP" {{$row->protocol == 'IP'? 'selected=selected':''}}>IP</option>
									</select>
								</td>
								<td class="port {!! strlen($row->port)? "" : "tdDisabled disabled" !!}" {!! strlen($row->port)? "contenteditable='true'" : "" !!} >
									{!! $row->port !!}
								</td>	
								<td contenteditable="true" class="client">
									{!! $row->client !!}
								</td>
								<td contenteditable="true" class="deskripsi">
									{!! $row->deskripsi !!}
								</td>
								<td class="id" style="display: none">{{$row->id}}</td>
																
							</tr>
						<?php endforeach ?>						
					</tbody>
				</table>				
			</div>			
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
</div>
</section>
@stop

@section('content-script')
<script>

	function isValidPort(port){
		portList = port.split("<br>");
		for(i=0;i<portList.length;i++){
			portList[i] = portList[i].trim();
			if( isNaN(portList[i]) || Number(portList[i]) < 1 || Number(portList[i]) > 65535)			
				return false;
		}
		return true;
	}

	function isHostIp(str){
		chunk = str.split(".");
		if(chunk.length == 4){
			for(i=0;i<4;i++){
				if( Number(chunk[i]) < 0 || Number(chunk[i]) > 255 ){
					return false;
				}
			}
			return true;
		}else{
			return false;
		}
	}

	function blankArea(arr){
		errFlag = 0;

		$.each(arr, function( index, value ) {
			if( index == 'port' &&  (arr['protocol'] == 'IP' || arr['protocol'] == 'ICMP') ){
				//do nothing
			}else{
			  if(value.length == 0){
			  	errFlag = 1;
			  	return false;
			  }						
			}
		});
		if(errFlag == 1)
			return true;
		else
			return false;
	}

	function isPositiveNumber(inp){
		if(isNaN(inp) == false && inp >= 1){
			return true;
		}
		return false;
	}

	$("#mainTable").on('change', '.tdPortType', function(){
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

	$("#btnSubmit").click(function(e){
    	e.preventDefault();
    	opForm = [];
    	var arr = {};
		arr['no_remedy'] = $("#no_remedy").val();
		arr['project_name'] = $("#project_name").val();
		arr['category'] = $("#category").val();
		arr['requester_name'] = "Pang Peter Pangestu";
		opArr = [];
		
		$('#mainTable').find("tbody tr").each(function(){
			tmpArr = {}
			tmpArr['id'] = $(this).find(".id").first().html();
			tmpArr['nama_server'] = $(this).find(".nama_server").first().html();
			tmpArr['ip_address'] = $(this).find(".ip_address").first().html();
			tmpArr['protocol'] = $(this).find(".protocol").first().val();
			tmpArr['port'] = $(this).find(".port").first().html();
			tmpArr['client'] = $(this).find(".client").first().html();
			tmpArr['deskripsi'] = $(this).find(".deskripsi").first().html();

			//validation area
			var err = "";
			if( blankArea(tmpArr) == true ) err += "<br/>All column must be filled.";
			if( isHostIp(tmpArr["ip_address"]) != true ) err += "<br/>Invalid IP Address.";
			if( !isValidPort(tmpArr["port"])  && !( tmpArr['protocol'] === "ICMP" || tmpArr['protocol'] === "IP")) err += "<br/>Port number must be 1-65535.";
			
			if(err.length > 0){
				toastr.error(err.substring(5), "Form Remote Access");		    					
				errFlag = 1;		    					
				return false;
			}

			opArr.push(tmpArr);
		});	

		if(errFlag == 1){
			return false;
		}
		
    	$.ajax({
			url: "{{Request::URL()}}",
			type: 'post',
			data: {data: JSON.stringify(opArr), meta: JSON.stringify(arr), _token: '{{csrf_token()}}'},
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
