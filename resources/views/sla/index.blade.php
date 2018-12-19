@extends('template')

@section('content-head')
<!-- Bootstrap Core Css -->
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
                                    <h2 class="content-submenu"></h2>
								</div>
                            </div>
                        </div>
                        <div class="body">                            
							<table class="table table-bordered table-hover table-striped js-basic-example" id="mainTable">
								<thead>
									<tr>
										<th>No</th>	
										<th>Layanan</th>	
										<th>Lama Kerja</th>	
										<th>Tingkat Keberhasilam</th>			
										<th>Action</th>								
									</tr>
								</thead>
								<tbody>
									<?php $i = 1; ?>
									<?php foreach ($slaList as $row): ?>
									<tr>
										<td>{{$i++}}</td>
										<td>{{$row->description}}</td>
										<td>{{$row->lama_kerja}}</td>
										<td>{{number_format((float)$row->tingkat_keberhasilan, 2, '.', '')}}%</td>													
										<td align="center">
											<a href="{{Request::url() . '/' . $row->id . '/edit'}}" class="btn bg-green">
												<i class="material-icons" style="margin-right: 5px">edit</i>Edit
											</a>
										</td>
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
<!-- Custom Js -->
<script src="{{asset('AdminBSB/js/pages/tables/jquery-datatable.js')}}"></script>

@stop