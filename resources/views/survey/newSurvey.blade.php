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
                                    <label for="rating">Rating</label>
                                    <input name="rating" type="number" min="1" max="10" style="border-bottom: solid #DADADA 1px;" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label for="description">Reviews & Feedback</label>
                                    <textarea name="description" rows="10" style="border: solid #DADADA 1px; resize: none; overflow: scroll" class="form-control"></textarea>
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

    <script>
        $(document).ready(function(){

            $("#btnSubmit").click(function(e){
                e.preventDefault();
                var rating = $('input[name=rating]').val();
                var description = $('textarea[name=description]').val();
                if(rating=='' || description=='')
                {
                    alert('All field must be filled');
                }
                else if(rating<1 || rating >10)
                {
                    alert('Rating must be between 1 to 10');
                }
                else{
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: '{{route('newSurvey')}}',
                        type: 'post',
                        data: {rating:rating, description:description,
                            _token: '{{csrf_token()}}'},
                        success: function(e){
                            if(e == "OK"){
                                alert('Successfully Added.');
                                window.location = '{{route('survey')}}';
                            }else{
                                alert('Error: ' + e);
                            }
                        },
                        error: function(e){
                            alert("Failed. " + e.status);
                        }
                    });

                }
            });
        });
    </script>
@stop