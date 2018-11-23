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
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-6">
                                    <h2 class="content-submenu">SLA Report for {{$category}} This Month</h2>
                                </div>
                            </div>
                        </div>
                        <div class="body">     
                        	<div class="row" style="padding-bottom: 0px !important">
	                        	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				                    <div class="info-box bg-teal hover-expand-effect">
				                        <div class="icon">
				                            <i class="material-icons">playlist_add_check</i>
				                        </div>
				                        <div class="content">
				                            <div class="text">Total Request</div>
				                            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20">{{$metaData['count']}}</div>
				                        </div>
				                    </div>
				                </div>                                               		
				               <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				                    <div class="info-box bg-teal hover-expand-effect">
				                        <div class="icon">
				                            <i class="material-icons">playlist_add_check</i>
				                        </div>
				                        <div class="content">
				                            <div class="text">Request Per Day</div>
				                            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20">{{$metaData['average']}}</div>
				                        </div>
				                    </div>
				                </div> 
				                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				                    <div class="info-box bg-teal hover-expand-effect">
				                        <div class="icon">
				                            <i class="material-icons">playlist_add_check</i>
				                        </div>
				                        <div class="content">
				                            <div class="text">Unfinished Task</div>
				                            <div class="number count-to ufTask" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20">125</div>
				                        </div>
				                    </div>
				                </div>                                               		
				                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				                    <div class="info-box bg-blue hover-expand-effect">
				                        <div class="icon">
				                            <i class="material-icons">playlist_add_check</i>
				                        </div>
				                        <div class="content">
				                            <div class="text">Finish Percentage</div>
				                            <div class="number count-to pcTask" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20">80%</div>
				                        </div>
				                    </div>
				                </div>                                    		
                        	</div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="body" style="padding-top: 50px">
							<table class="table table-bordered table-hover table-striped js-exportable" id="mainTable">
								<thead>
									<tr>
										<th>No</th>
										<th>Requester</th>
										<th>Remedy</th>
										<th>Description</th>
										<th>Request Date</th>	
										<th>Status</th>	
									</tr>
								</thead>
								<tbody>
									<?php
										$i = 1 ;
									?>

									<?php foreach ($serviceList as $row): ?>										
										<tr>
											<td>{{$i++}}</td>
											<td>{{$row->requester_name}}</td>
											<td>{{$row->no_remedy}}</td>
											<td>{{$row->project_name}}</td>
											<td>{{$row->created_at}}</td>	
											<td class="svcStatus {{$row->status == 'DONE'? 'svcDone' : ''}}">{{$row->status}}</td>
										</tr>												
									<?php endforeach ?>
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

<!-- Custom Js -->
<script src="{{asset('AdminBSB/js/pages/tables/jquery-datatable.js')}}"></script>
<script>
	$(document).ready(function(){
		$(".ufTask").html( $(".svcStatus").length - $(".svcDone").length );
		$(".pcTask").html( ($(".svcDone").length / $(".svcStatus").length * 100).toFixed(1) + "%" );
		
	});
</script>
@stop