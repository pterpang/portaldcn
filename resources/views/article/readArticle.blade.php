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
                            <div class="col-xs-12 col-sm-6" align="right">
                                <button class="btn bg-teal btn-lg" onclick="window.history.back()"><< BACK</button>
                                <?php if (Auth::user()->name === "portaldcn"): ?>
                                    <a class="btn bg-teal btn-lg" href="{{Request::URL()}}/edit">EDIT</a>
                                <?php endif ?>
                            </div>                              
                        </div>
                    </div>
                    <div class="body" style="padding-bottom: 50px; padding-left: 50px; padding-right: 50px; overflow: hidden">
                    	<article class="col-md-12">
                            <center>
                                #{{$article->id}}
                                <h3 style="margin-bottom: 40px">{{$article->judul}}</h3>        
                                <img src="{{URL::to('')}}/uploads/images/article/{{$article->image}}" style="max-width: 500px; max-height: 500px"/>                        
                            </center>
                            <div style="text-indent: 30px; margin-top: 50px; text-align: justify; text-justify: inter-word;"><?php echo $article->isi;?></div>
                        </article>
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