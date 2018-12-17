@extends('template')

@section('content-head')
<!-- Bootstrap Core Css -->
<link href="{{ asset('AdminBSB/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
<meta name="csrf-token" content="{{ csrf_token() }}">
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
                        	<form id="mainForm" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="judul">Image</label>
                                    <input name="image" type="file" class="form-control" accept="image/*"/>
                                </div>
                                <div class="form-group">
                        			<label for="judul">Judul</label>
                        			<input name="judul" type="text" style="border-bottom: solid #DADADA 1px;" class="form-control"/>
                        		</div>
                        		<div class="form-group">
                        			<label for="judul">Konten</label>
                        			<textarea id = "summernote" name="isi" rows="15" style="border: solid #DADADA 1px; resize: none; overflow: scroll" class="form-control"></textarea>
                        		</div>                        		
                        	</form>                     
                        </div>
                    </div>
                    <div class="card" style="margin-top: 20px" id="submitCard">
						<div class="body">                            
							<button class="form-control bg-teal" id="btnSubmit">SUBMIT</button>
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
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.js"></script>

<script>
    $(document).ready(function(){


        $('#summernote').summernote({
            placeholder:"Type here...",
            height:300
        });

        $("#btnSubmit").click(function(e){
            e.preventDefault();
            var form = $('#mainForm').get(0); 
            var formData = new FormData(form);
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            $.ajax({
                url: './insert',
                type: 'post',                
                processData: false,
                contentType: false,
                cache: false,
                enctype: 'multipart/form-data',
                data: formData,
                success: function(e){
                    if(e == "OK"){
                        alert('Successfully Added.');
                        window.location = "./";
                    }else{
                        alert('Error: ' + e);
                    }
                },
                error: function(e){
                    alert("Failed.");
                }
            });
        });
    });
</script>
@stop