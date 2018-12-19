@extends('template')

@section('content-head')
<!-- Bootstrap Core Css -->
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link href="{{ asset('AdminBSB/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
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
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                    <div class="card" style="overflow: hidden">
                    	<div class="col-md-12" id="divSearch">
                    		<h3>Date Range:</h3>
	                    	<form action="" method="post">
								@csrf	                    	
		                    	<input type="date" name="start" id="min" value="{{isset($_POST['start']) ? $_POST['start'] : ''}}">
		                    	&nbsp;-&nbsp;
		                    	<input type="date" name="end" id="max" value="{{isset($_POST['start']) ? $_POST['end'] : ''}}">
		                    	<input type="text" name="isSearch" id="isSearch" value="1" style="display: none">
		                    	<span id="urlAjax" style="display: none">{{URL::to('getOpenPortByDate')}}</span>	                    		
								<button id="btnSearch" class=" btn bg-teal" type="submit" style="margin-left: 5px">FILTER</button>
	                    	</form>
                    	</div>

                        <div class="body" style="padding-top: 120px">
							<table class="table table-bordered table-hover table-striped dataTable js-exportable" id="mainTable">
								<thead>
									<tr>
										<th>No</th>
										<th>Requester</th>
										<th>Remedy</th>
										<th>Description</th>
										<th>Request Date</th>
										<th>Finish Date</th>
										<th>Work Time</th>
										<th>SLA Status</th>										
										<th>PIC</th>
									</tr>
								</thead>
								<tbody>
									<?php if ( !isset ( $_SESSION['flash_message'] ) ): ?>
										<?php
											$i = 1; 
											$onTimeCount = 0;
										?>
										<?php foreach ($serviceList as $row): ?>
											<tr>
												<td>{{$i++}}</td>
												<td>{{$row->requester_name}}</td>
												<td>{{$row->no_remedy}}</td>
												<td>{{$row->project_name}}</td>
												<td>{{$row->created_at}}</td>
												<td>{{$row->finish_date ? $row->finish_date : '-'}}</td>
												<td>{{$row->diff  != "-" ? $row->diff . ' day(s)' : '-'}}</td>
												<td>
													<?php
													if ( $row->finish_date == null ) {
														echo '-';
													} else {
														if( $row->diff  <=  $sla->lama_kerja ){
															echo '<span class="col-green">On Time</span>';
															$onTimeCount++;	
														} else{
															echo '<span class="col-red">Extended</span>';
														}
													}
													
													?>
												</td>
												<td>{{$row->pic ? $row->pic : '-'}}</td>
											</tr>										
										<?php endforeach ?>
									<?php endif ?>									
								</tbody>
							</table>

							<?php if ( sizeof($serviceList) > 0 ): ?>
								<div class="row" style="margin-top: 30px;">
									<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					                    <div class="info-box bg-pink hover-expand-effect">
					                        <div class="icon">
					                            <i class="material-icons">import_export</i>
					                        </div>
					                        <div class="content">
					                            <div class="text">Total Request</div>
					                            <div class="number count-to">{{$metaData['count']}} Requests</div>
					                        </div>
					                    </div>
					                </div>		
									<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					                    <div class="info-box bg-teal hover-expand-effect">
					                        <div class="icon">
					                            <i class="material-icons">import_export</i>
					                        </div>
					                        <div class="content">
					                            <div class="text">Total Workdays</div>
					                            <div class="number count-to">{{$metaData['dayDiff']}} Days</div>
					                        </div>
					                    </div>
					                </div>						
									<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					                    <div class="info-box bg-orange hover-expand-effect">
					                        <div class="icon">
					                            <i class="material-icons">import_export</i>
					                        </div>
					                        <div class="content">
					                            <div class="text">Average Request per Day</div>
					                            <div class="number count-to">{{number_format((float)$metaData['count']/$metaData['dayDiff'], 2, '.', '')}} Request</div>
					                        </div>
					                    </div>
					                </div>				
									<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					                    <div class="info-box bg-green hover-expand-effect">
					                        <div class="icon">
					                            <i class="material-icons">import_export</i>
					                        </div>
					                        <div class="content">
					                            <div class="text">SLA Level</div>
					                            <div class="number count-to">{{number_format((float)$onTimeCount/$metaData['count']*100, 2, '.', '')}}% {{number_format((float)$onTimeCount/$metaData['count']*100, 2, '.', '') >= $sla->tingkat_keberhasilan? '(Passed)' : '(Failed)'}}</div>
					                        </div>
					                    </div>
					                </div>				
									
								</div>


							<?php endif ?>
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

<script src="{{asset('AdminBSB/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('AdminBSB/plugins/jquery-datatable/extensions/export/buttons.flash.min.js')}}"></script>
<script src="{{asset('AdminBSB/plugins/jquery-datatable/extensions/export/jszip.min.js')}}"></script>
<script src="{{asset('AdminBSB/plugins/jquery-datatable/extensions/export/pdfmake.min.js')}}"></script>
<script src="{{asset('AdminBSB/plugins/jquery-datatable/extensions/export/vfs_fonts.js')}}"></script>
<script src="{{asset('AdminBSB/plugins/jquery-datatable/extensions/export/buttons.html5.min.js')}}"></script>
<script src="{{asset('AdminBSB/plugins/jquery-datatable/extensions/export/buttons.print.min.js')}}"></script>
<script src="{{asset('AdminBSB/plugins/jquery-datatable/extensions/ranged_dates.js')}}"></script>

<!-- Custom Js -->
<script src="{{asset('AdminBSB/js/pages/tables/jquery-datatable.js')}}"></script>
<script>
	$(document).ready(function(){
		<?php
			if( isset($_SESSION['flash_message'] )) {
				echo "alert('" . $_SESSION['flash_message'] . "');";
			}
		?>
		$(".ufTask").html( $(".svcStatus").length - $(".svcDone").length );
		$(".pcTask").html( ($(".svcDone").length / $(".svcStatus").length * 100).toFixed(1) + "%" );
		// Add event listeners to the two range filtering inputs
     	

     	var min = $("#min").val();
     	var max = $("#max").val();
     	$("title").html("Portal DCN | {{$category}} Report \nFrom 	" + min + " to " + max);

     	$(".content-mainmenu").html("{{$category}} Reporting");
	});
</script>
@stop