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
										<th>Created Date</th>
										<th>Image</th>
										<th>Title</th>
										<th>Content</th>
										<th>Action</th>
                                        <th>Priority</th>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1; ?>
									<?php foreach ($articleList as $row): ?>
									<tr>
										<td>{{$i++}}</td>
										<td>{{date("Y-m-d", strtotime($row->created_at))}}</td>
										<td>
											<?php if ( strlen($row->image) == 0 ): ?>
												<img style="max-width: 150px; max-height: 150px" src="{{URL::to('uploads/images/article/default.jpg')}}">
											<?php else: ?>
												<img style="max-width: 150px; max-height: 150px" src="{{URL::to('uploads/images/article/' . $row->image)}}">												
											<?php endif ?>
										</td>
										<td>{{$row->judul}}</td>
										<td>
											<?php
												if(strlen($row->isi) > 300){
													echo substr($row->isi, 0, 300) . "... <a href='". Request::url() . '/' . $row->id ."'>read more</a>";
												}else{
													echo $row->isi;
												}
											?>
										</td>
										<td align="center">
											<a href="{{Request::url() . '/' . $row->id}}" class="btn bg-green">
												<i class="material-icons" style="margin-right: 5px">remove_red_eye</i>View
											</a>
                                            <?php if (Auth::user()->name == "portaldcn"): ?>
											<a class="btn bg-red btn-lg" href="#" id="deleteArticle{{$row->id}}" data-id="{{$row->id}}" style="margin-top: 3%">
												<i class="material-icons" style="margin-right: 5px">cancel</i>Delete
											</a>
                                            <?php endif ?>
										</td>
                                        <td>{{$row->prioritas}}</td>


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

<script>
    <?php foreach($articleList as $row):?>
    $('#deleteArticle{{$row->id}}').click(function (e) {
        e.preventDefault();
        if(window.confirm("Are you sure? All data will be lost.")){
            var id = $(this).data('id');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url:'/article/delete/'+id,
                type:'delete',
                data: {'id': id,'_token': '{{csrf_token()}}'},
                success: function (e) {
                    if (e == "OK") {
                        alert("The article have been successfully deleted");
                        location.reload();
                    }
                },
                error: function (e) {
                    alert("Error " + e.status);
                }
            })
        }
    });
    <?php endforeach?>
</script>

@stop