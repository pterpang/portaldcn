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
                                    <h2>Parent Information</h2>
                                </div>
                            </div>
                        </div>
                        <div class="body" id="metaTable">                            
							<table>
								<tr>
									<td style="width:100px">Remedy </td>
									<td style="width:20px">:</td>
									<td>Pembuatan Aplikasi XXX</td>									
								</tr>
								<tr>
									<td style="width:100px">Description</td>
									<td style="width:20px">:</td>
									<td>Pembuatan Application XXX</td>																		
								</tr>
								<tr>
									<td style="width:100px">Initiator</td>
									<td style="width:20px">:</td>
									<td>Ronny</td>																		
								</tr>
								<tr>
									<td colspan="3"></td>
								</tr>
								<tr class="bld">
									<td style="width:100px">Request Date</td>
									<td style="width:20px">:</td>
									<td>5 August 2018</td>																		
								</tr>
								<tr class="bld">
									<td style="width:100px">Target Done</td>
									<td style="width:20px">:</td>
									<td>8 August 2018</td>																		
								</tr>
								<tr class="bld">
									<td style="width:100px">Remaining</td>
									<td style="width:20px">:</td>
									<td>3 Days</td>																		
								</tr>
								<tr class="bld">
									<td style="width:100px">Last Update</td>
									<td style="width:20px">:</td>
									<td>6 August 2018</td>																		
								</tr>
								
							</table>
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
                                    <h2>Service Progress</h2>
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
	$(function() {
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
		
		@yield('subcontent-script')
	});

    var dateDiff = expectedFinishDate-startDate;

    function updateProgress(percentage){
        $("#progressBar").css("width",percentage+"%");
    }

    if(pic != "-"){

        document.getElementById("startDate").innerHTML="<b>Taken at:</b> "+ startDate;
        document.getElementById("expectedFinishDate").innerHTML= "<b>Expected to be finished at:</b> " + expectedFinishDate.toString();

        if(finishDate!="Invalid Date"){
            document.getElementById("finishedDate").innerHTML="<b>Finished at:</b> "+ finishDate;
        }

        var x = setInterval(function(){
            var today = new Date();
            var currentDateDiff = expectedFinishDate - today;
            var days = Math.floor(currentDateDiff/(1000*60*60*24))
            var hours = Math.floor((currentDateDiff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((currentDateDiff % (1000 * 60 * 60)) / (1000 * 60));
            var seconds =  Math.floor((currentDateDiff % (1000 * 60)) / (1000));

            document.getElementById("text").innerHTML = days + "d " + hours + "h " + minutes + "m " + seconds + "s left";
            if (currentDateDiff<0){
                clearInterval(x);
                //document.getElementById("text").innerHTML = "Waktu Telah Habis!";
            }
            else if(currentDateDiff>0 && finishDate!=""){
                clearInterval(x);
                document.getElementById("text").innerHTML = "Service Telah Selesai";
            }
        },1000);

        function progressBar(){
            var today = new Date();
            var interval = dateDiff/1000;
            var currentDateDiff = expectedFinishDate - today;
            var p = currentDateDiff/dateDiff*100;
            if(p>=0 && finishDate ==""){
                updateProgress(p);
                setTimeout(progressBar, interval);
            }
        }
        progressBar();
    }
	
</script>
@stop