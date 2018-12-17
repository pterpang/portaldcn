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
            <!--page content -->
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
                                        <th>Name</th>
                                        <th>Rating</th>
                                        <th>Reviews & Feedback</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1;?>
                                    <?php foreach($data as $row):?>
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$row->name}}</td>
                                        <td>{{$row->rating}}</td>
                                        <td><?php echo $row->description?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
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