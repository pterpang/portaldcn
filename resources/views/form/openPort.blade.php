@extends('template')

@section('op_active')
	active
@stop

@section('content-head')
	<style>
		#mainTable select{
			background: #F8F8F8;
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
							<i style="font-size: 90%; color: gray">*) Simply click the table cell to edit the value, separated with newline (enter)</i>
							<table id="mainTable" class="table table-bordered">
							  <thead>
								<th>No.</th>
								<th>Source</th>
								<th>Destination</th>
								<th>Port Number</th>                
								<th>Port Type</th>                
								<th>Direction</th>              
								<th>Description</th>
								<th>Action</th>
							  </thead>
							  <tbody>
								<tr id="cloneRow" style="display:none">
								  <td tdNo></td>
								  <td class="editable tdSource"></td>
								  <td class="editable tdDestination"></td>
								  <td class="editable tdPortNumner"></td>
								  <td class="form-group tdPortNumber" style="width: 200px">
									<select class="form-control portType tdPortType spk">
									  <option value="TCP">TCP</option>
									  <option value="UDP">UDP</option>                      
									  <option value="IP">IP</option>
									</select>
								  </td>
								  <td class="form-group tdDirection" style="width: 200px">
									<select class="form-control">
									  <option value="1direction">1 Direction</option>
									  <option value="2direction">2 Direction</option>                      
									</select>
								  </td>
								  <td class="editable tdDescription"></td>       
								  <td align="center"><button class="btn btn-danger btn-sm"><i class="material-icons">close</i></button></td>                     
								</tr>               
								<tr class="uneditable">
								  <td id="newRow" colspan="8" align="center" style="background: #EEEEEE; cursor: pointer"><span style="font-weight: bold; font-size: 20px">+</span>&nbsp;Add New Row</td>                
								</tr> 
							  </tbody>
							</table>
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
<!-- Jquery Bootstrap Select -->
<script src="{{ asset('AdminBSB/plugins/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
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

	$("#mainTable").on("change", ".portType", function(){
		if($(this).val() == "IP"){
			$(this).parent().prev().attr("contenteditable", "false");
			$(this).parent().prev().html("-");
			$(this).parent().prev().css("text-align", "center");
			$(this).parent().prev().css("cursor", "not-allowed");
		}else{
			$(this).parent().prev().attr("contenteditable", "true");
			$(this).parent().prev().css("text-align", "");
			$(this).parent().prev().html("");
			$(this).parent().prev().css("cursor", "");
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
});
</script>
@stop