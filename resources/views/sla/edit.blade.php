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
                                <label for="id" class="form-control">SLA ID</label>
                                <p id="id">{{$sla->id}}</p>
                            </div>
                            <div class="form-group">
                                <label for="lama_kerja" class="form-control">Lama Kerja (hari)</label>
                                <input type="text" name="lama_kerja"  class="form-control" id="lama_kerja" style="border-bottom: solid #DADADA 1px" value="{{$sla->lama_kerja}}"/>
                            </div>
                            <div class="form-group">
                                <label for="tingkat_keberhasilan" class="form-control">Tingkat Keberhasilan (%)</label>
                                <input type="text" name="tingkat_keberhasilan"  class="form-control" id="tingkat_keberhasilan" style="border-bottom: solid #DADADA 1px" value="{{number_format((float)$sla->tingkat_keberhasilan, 2, '.', '')}}"/>
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
<script>
    $(document).ready(
        function(){
            $("#btnUpdate").click(function(e){
                e.preventDefault();
                var data = {};
                data['id'] = $("#id").html();
                data['lama_kerja'] = $("#lama_kerja").val();
                data['tingkat_keberhasilan'] = $("#tingkat_keberhasilan").val();
                if( isNaN(data['lama_kerja']) || isNaN(data['tingkat_keberhasilan']) ){
                    alert("Invalid Input");
                    return false;
                }
                $.ajax({
                    url: "./update",
                    type: 'post',
                    data: {data: JSON.stringify(data), _token: '{{csrf_token()}}'},
                    success: function(response){
                        if(response == "OK"){
                            alert("Data successfully updated.");
                            window.location = "{{URL::to('sla')}}";
                        }else{
                            alert(response);
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