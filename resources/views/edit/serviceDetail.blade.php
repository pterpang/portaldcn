@extends('template')

@section('content-head')
<style>
#metaTable td{
	padding: 7px;
}

.bld{
	font-weight: bold;
}

@yield('subcontent-head')

</style>
@stop

@foreach ($activeClasses as $class)
	@section($class)
		active
	@stop
@endforeach

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2 class="content-mainmenu"></h2>
            </div>
            <!-- Page Content -->
            @yield('serviceForm')
			
			<div class="row clearfix">
               <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-6">
                                    <h2>Other Services</h2>
                                </div>
                            </div>
                        </div>
                        <div class="body" style="padding-left: 35px" id="metaTable">    
                        	<?php $serviceFlag = 0; ?> 
                        	<?php
                        	if(in_array("op", $otherService) && strpos(Request::url(), 'openport') == false ){?>
                        		<a href="{{'../openport/' . $serviceDetail->no_remedy}}" class="row"><i class="material-icons" style="margin-right: 10px">keyboard_tab</i>Open Port</a>                    		
                        	<?php 
                        		$serviceFlag = 1;
                        	}
                        	if(in_array("dc", $otherService) && strpos(Request::url(), 'deviceConnection') == false ){?>
                        		<a href="{{'../deviceConnection/' . $serviceDetail->no_remedy}}" class="row"><i class="material-icons" style="margin-right: 10px">device_hub</i>Device Connection</a>                       		
                        	<?php 
                        		$serviceFlag = 1;
                        	}
                        	if(in_array("lan", $otherService) && strpos(Request::url(), 'LAN') == false ){?>
                        		<a href="{{'../LAN/' . $serviceDetail->no_remedy}}" class="row"><i class="material-icons" style="margin-right: 10px">computer</i>LAN Connection</a>                       		
                        	<?php 
                        		$serviceFlag = 1;
                        	}
                        	if(in_array("h2h", $otherService) && strpos(Request::url(), 'H2H') == false ){?>
                        		<a href="{{'../H2H/' . $serviceDetail->no_remedy}}" class="row"><i class="material-icons" style="margin-right: 10px">import_export</i>H2H Connection</a>                      		
                        	<?php 
                        		$serviceFlag = 1;
                        	}
                        	if(in_array("asd", $otherService) && strpos(Request::url(), 'ASDelivery') == false ){?>
                        		<a href="{{'../ASDelivery/' . $serviceDetail->no_remedy}}" class="row"><i class="material-icons" style="margin-right: 10px">group</i>Application Service Delivery</a>                      		
                        	<?php 
                        		$serviceFlag = 1;
                        	}
                        	if(in_array("ra", $otherService) && strpos(Request::url(), 'remoteAccess') == false ){?>
                        		<a href="{{'../remoteAccess/' . $serviceDetail->no_remedy}}" class="row"><i class="material-icons" style="margin-right: 10px">phonelink</i>Remote Access</a>                      		
                        	<?php 
                        		$serviceFlag = 1;
                        	}

                        	if($serviceFlag == 0){
                        		echo "-";
                        	}
                        	?>
                        </div>
						
                    </div>
                
					
				</div>
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-6">
                                    <h2>Service Progress</h2>
                                </div>
                            </div>
                        </div>
                        <div class="body" style="padding-bottom:26px" align="center">                            
							<div class="body">                            
								<input type="text" value="50" class="openportprogress">
							</div>
						</div>
			        </div>
            	</div>     
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-6">
                                    <h2>Parent Progress</h2>
                                </div>
                            </div>
                        </div>
                        <div class="body"  style="padding-bottom:26px" align="center">                            
							<div class="body" id="metaTable">                            
								<input type="text" value="50" class="parentprogress">
							</div>
						</div>
			        </div>
            	</div>   				
			</div>
            <!-- #END# Page Content -->
			
        </div>
    </section>

@stop

@section('content-script')
<!-- Jquery DataTable Plugin Js -->
<script src="{{asset('AdminBSB/plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
<script src="{{asset('AdminBSB/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
<script src="{{asset('AdminBSB/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- Custom Js -->
<script src="{{asset('AdminBSB/js/pages/tables/jquery-datatable.js')}}"></script>

<script>
	$(document).ready(function() {
		var completeRow = $("#mainTable .form-content .status-complete").length;
		var allRow = $("#mainTable .form-content .status").length;
		var percentage = allRow == 0? 0 : Math.floor(completeRow * 100 / allRow);
		
		$(".openportprogress").val(percentage);
		$(".parentprogress").val("{{$parentProgress}}");

		$(".openportprogress").knob({
			'readOnly': true,
			"fgColor":"#03A9F4",
			'format' : function (value) {
				 return value + '%';
			  }
		});
		
		$(".parentprogress").knob({
			'readOnly': true,
			"fgColor":"#8BC34A",
			'format' : function (value) {
				 return value + '%';
			  }
		});

		$(".btnFinishTask").click(function(e){
			var url = $(this).attr("url");
			if(window.confirm("Are you sure?")){
				$.ajax({
					url: "{{URL::to('') . '/'}}" + url,
					method: 'post',
					headers: {
				    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				  	},
				  	success: function(response){
						if(response.length == 0){
							alert("Success");
							location.reload();						
						}else{
							alert(response);
						}
					},
					error: function(response){
						alert("Error occured.");
					}
				});
			}
		});

		@yield('subcontent-script')
	});
	
	
</script>
@stop