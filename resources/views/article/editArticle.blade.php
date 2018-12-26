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
                                <button class="btn bg-teal btn-lg" href="#" onclick="window.history.back();">BACK</button>
                            </div>  
                        </div>
                    </div>
                    <form>
                        <div class="body" style="padding-bottom: 50px; padding-left: 50px; padding-right: 50px; overflow: hidden">
                        	<div class="form-group">
                                <label for="id" class="form-control">Article ID</label>
                                <p id="id">{{$article->id}}</p>
                            </div>
                            <div class="form-group">
                                <label for="judul" class="form-control">Title</label>
                                <input type="text" name="judul"  class="form-control" id="judul" style="border-bottom: solid #DADADA 1px" value="{{$article->judul}}"/>
                            </div>
                            <div class="form-group">
                                <label for="isi" class="form-control">Content</label>
                                <textarea class="form-control" id="summernote" style="border: solid #DADADA 1px; padding: 10px; height: 300px; y-overflow: scroll; resize: none">{{$article->isi}}</textarea>
                            </div>
                        </div>
                        
                    </form>
                </div>
                <div class="card" id="submitCard">
                    <div class="body">                            
                        <button class="form-control bg-teal" id="btnUpdate">UPDATE</button>
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

<!-- Summernote plugin-->
<link href="{{asset('Summernote/summernote-lite.css')}}" rel="stylesheet">
<script src="{{asset('Summernote/summernote-lite.js')}}"></script>
<script>
    $(document).ready(
        function(){
            $('#summernote').summernote({
                placeholder:"Type here...",
                height:300
            });

            $("#btnUpdate").click(function(e){
                e.preventDefault();
                var data = {};
                data['id'] = $("#id").html();
                data['judul'] = $("#judul").val();
                data['isi'] = $("#summernote").val();
                $.ajax({
                    url: "./update",
                    type: 'post',
                    data: {data: JSON.stringify(data), _token: '{{csrf_token()}}'},
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
            })
        });
</script>
@stop