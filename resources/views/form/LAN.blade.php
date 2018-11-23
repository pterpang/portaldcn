@extends('template')

@section('flan_active')
	active
@stop

@section('content-head')
	<style>
		.tdField{
			width: 200px;
		}
		
		#mainTable td{
			border: solid white 1px;
		}
		
		#mainTable{
			width: 700px;
		}

	</style>
@stop

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
							<table id="metaTable">
								<tr>
									<td>Remedy</td>
									<td style="padding-left: 20px"><input type="text" style="width: 200px"/></td>
								</tr>
								<tr>
									<td>Description</td>
									<td style="padding-left: 20px; padding-top: 10px"><input type="text" style="width: 500px"/></td>
								</tr>
							</table>
							<hr/>
							<!--lokasi-->
							<div class="col-md-6">
								<div class="form-group col-md-12">
									<P>
										<label for="lokasi">Lokasi</label>
									</P>
									<input class="with-gap" name="lokasi" type="radio" value="MenaraBCA" id="lokasi_1" checked />
									<label for="lokasi_1">Menara BCA</label><br/>
									<input class="with-gap" name="lokasi" type="radio" value="WismaAsia2" id="lokasi_2" />
									<label for="lokasi_2">Wisma Asia 2</label><br/>
									<input class="with-gap" name="lokasi" type="radio" value="GrhaAsia" class="with-gap" id="lokasi_3" />
									<label for="lokasi_3">Grha Asia</label><br/>
									<input class="with-gap" name="lokasi" type="radio" value="Lainnya" id="lokasi_4" class="with-gap" />
									<label for="lokasi_4">Lainnya</label>  
								</div>		
								<!--Antivirus-->
								<div class="form-group col-md-12">
									<P>
										<label for="antivirus">Antivirus</label>
									</P>
									<input class="with-gap" name="antivirus" type="radio" value="Ya" id="antivirus_1" checked />
									<label for="antivirus_1">Ya</label><br/>
									<input class="with-gap" name="antivirus" type="radio" value="Tidak" id="antivirus_2" />
									<label for="antivirus_2">Tidak</label><br/>								
								</div>		
								<!--Total User/Device-->
								<div class="form-group col-md-12 clearfix">
									<p>
										<label>Total User/Device</label>
									</p>
									<div class="form-group">
										<div class="form-line">
											<input class="form-control" type="text" placeholder="Total User/Device" name="totalUser">
										</div>
									</div>
								</div>
								<!--Koneksi ke Switch-->
								<div class="form-group col-md-12 clearfix">
									<p>
										<label>Koneksi ke Switch</label>
									</p>
									<div class="form-group">
										<div class="form-line" >
											<input class="form-control" type="text" placeholder="Koneksi ke Switch" name="koneksiSwitch">
										</div>
									</div>
								</div>
								<!--Port Switch-->
								<div class="form-group col-md-12 clearfix">
									<p>
										<label>Port Switch</label>
									</p>
									<div class="form-group">
										<div class="form-line" >
											<input class="form-control" type="text" placeholder="Port Switch" name="portSwitch">
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<!--Segment IP Address-->
								<div class="form-group col-md-12 clearfix">
									<p>
										<label for="ipadress">Segment IP Address</label>
									</p>
									<div class="form-group">
										<div class="form-line" >
											<input class="form-control" type="text" placeholder="Segment IP Address" name="segmentIPAddress">
										</div>
									</div>
								</div>
								<!--IP Phone-->
								<div class="form-group col-md-12">
									<P>
										<label for="ipphone">IP Phone</label>
									</P>
									<input class="with-gap" name="ipphone" type="radio" value="Cisco" id="ipphone_1" checked />
									<label for="ipphone_1">Cisco</label><br/>
									<input class="with-gap" name="ipphone" type="radio" value="Avaya" id="ipphone_2"/>
									<label for="ipphone_2">Avaya</label><br/>
									<input class="with-gap" name="ipphone" type="radio" value="Tidak Ada" id="ipphone_3" />
									<label for="ipphone_3">Tidak ada</label><br/>								
								</div>	
								<!--Lama Pemakaian-->
								<div class="form-group col-md-12 clearfix">
									<p>
										<label for="lamapemakaian">Lama Pemakaian</label>
									</p>
									<div class="form-group">
										<div class="form-line" >
											<input class="form-control" type="text" placeholder="Lama Pemakaian" name="lamapemakaian">
										</div>
									</div>
								</div>							
								<!--Bypass NAC/ISE-->
								<div class="form-group col-md-12">
									<P>
										<label for="bypass">Bypass NAC/ISE</label>
									</P>
									<input class="with-gap" name="bypass" type="radio" value="Ya" id="bypass_1" checked />
									<label for="bypass_1">Ya</label><br/>
									<input class="with-gap" name="bypass" type="radio" value="Tidak" id="bypass_2" />
									<label for="bypass_2">Tidak</label><br/>								
								</div>		
								<!--MAC Address-->
								<div class="form-group col-md-12 clearfix" id="macAddressDiv">
									<p>
										<label>IP/MAC Address</label>
									</p>
									<div class="form-group">
										<div style="border: solid #DADADA 1px">
											<textarea class="form-control" style="resize:none" rows="5" name="macAddress"></textarea>
										</div>
									</div>
								</div>
								
							</div>
							<button class="btn form-control btn-success">Submit</button>						  
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Page Content -->
        </div>
    </section>

@stop

@section('content-script')
<script>
$(document).ready(function(){
	
	function reSequence(){
		var i = 1;
		$("#mainTable tbody tr").not('.uneditable').each(function(){
			$(this).find("td").first().html(i++);
		});
	}

	$(".editable").attr("contenteditable", "true");

	$("#mainTable").on("click", ".btn-danger", function(){
		if(window.confirm("Are you sure want to delete row?")){
			$(this).parent().parent().remove();
			reSequence();				
		}
	});
	
	$("#mainTable").on("click", "#newRow", function(e){
		var cloneRow = $("#cloneRow").clone();
		var numSeq = parseInt($("#cloneRow").prev().children().first().html()) + 1;
		cloneRow.removeAttr("id");
		cloneRow.children().first().html(numSeq);
		cloneRow.insertBefore("#cloneRow");
		reSequence();
		cloneRow.show();
	});
	
	$("input[type='radio'][name='bypass']").click(function(){
		var radioValue = $("input[name='bypass']:checked").val();
		radioValue == 'Ya'?	$("#macAddressDiv").show() : $("#macAddressDiv").hide();
	});
	
	// $("input[type='radio']").click(function(){
		// var radioValue = $("input[name='lokasi']:checked").val();
		// alert(radioValue);
	// });
});
</script>
@stop