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

                    <div class="card">
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
										<th>PIC</th>
										<th>Request Date</th>
										<th>Finish Date</th>
										<th>Work Time</th>
									</tr>
								</thead>
								<tbody>
									<?php if ( !isset ( $_SESSION['flash_message'] ) ): ?>
										<?php $i = 1; ?>
										<?php foreach ($serviceList as $row): ?>
											<tr>
												<td>{{$i++}}</td>
												<td>{{$row->requester_name}}</td>
												<td>{{$row->no_remedy}}</td>
												<td>{{$row->project_name}}</td>
												<td>{{$row->pic ? $row->pic : '-'}}</td>
												<td>{{$row->created_at}}</td>
												<td>{{$row->finish_date ? $row->finish_date : '-'}}</td>
												<td>{{$row->diff}}</td>
											</tr>										
										<?php endforeach ?>
									<?php endif ?>									
								</tbody>
							</table>							
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