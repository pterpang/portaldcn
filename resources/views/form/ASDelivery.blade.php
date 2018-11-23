@extends('template')

@section('asd_active')
	active
@stop

@section('content-head')
	<style>
		.panel-title{
			padding: 15px;
		}
		
		.panel-group .panel .panel-heading a{
			display: inline;
		}
		

		[type="checkbox"].filled-in:not(:checked) + label::after{
			background: white;
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
							<div class="row clearfix">
								<!--Col Kiri-->
                                <div class="col-xs-6 ol-sm-6 col-md-6 col-lg-6">
                                    <div class="panel-group" id="accordion_19" role="tablist" aria-multiselectable="true">
                                        <div class="panel panel-col-pink">
                                            <div class="panel-heading" role="tab" id="headingOne_19">
                                                <h4 class="panel-title">
													<input id="tcb1" class="filled-in pull-left chk-col-green" type="checkbox" style="display:inline;"><label for="tcb1" style="display:inline;margin-left: 5px; width: 10px;"></label>                                                    
                                                    <a role="button" data-toggle="collapse" href="#collapseOne_19" aria-expanded="false" aria-controls="collapseOne_19">
                                                        <i class="material-icons pull-right">expand_more</i>1. Load Balancing Server
													</a>
                                                </h4>
                                            </div>
                                            <div id="collapseOne_19" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne_19" aria-expanded="false" style="height: 0px;">
                                                <div class="panel-body">
													<!--IP Server-->
													<div class="form-group col-md-12 clearfix">
														<p>
															<label>IP Server</label>
														</p>
														<div class="form-group">
															<div style="border: solid #DADADA 1px">
																<textarea class="form-control" style="resize:none" rows="5" name="IPServer"></textarea>
															</div>
														</div>
													</div>		
													<!--IP Load Balancer-->
													<div class="form-group col-md-12 clearfix">
														<p>
															<label>IP Load Balancer</label>
														</p>
														<div class="form-group">
															<div style="border: solid #DADADA 1px">
																<textarea class="form-control" style="resize:none" rows="5" name="IPLoadBalancer"></textarea>
															</div>
														</div>
													</div>	
													<!--Port-->
													<div class="form-group col-md-12 clearfix">
														<p>
															<label>Port</label>
														</p>
														<div class="form-group">
															<div class="form-line">
																<input class="form-control" type="text" placeholder="Port" name="port">
															</div>
														</div>
													</div>
													<!--URL-->
													<div class="form-group col-md-12 clearfix">
														<p>
															<label>URL</label>
														</p>
														<div class="form-group">
															<div class="form-line">
																<input class="form-control" type="text" placeholder="URL" name="URL">
															</div>
														</div>
													</div>
													<!--SSL-->
													<div class="form-group col-md-12">
														<P>
															<label for="SSL">SSL</label>
														</P>
														<input class="with-gap" name="SSL" type="radio" value="Ya" id="SSL_1" checked />
														<label for="SSL_1">Ya</label><br/>
														<input class="with-gap" name="SSL" type="radio" value="Tidak" id="SSL_2" />
														<label for="SSL_2">Tidak</label><br/>								
													</div>		
													<!--Persistence-->
													<div class="form-group col-md-12">
														<P>
															<label for="persistence">Persistence</label>
														</P>
														<input class="with-gap" name="persistence" type="radio" value="Ya" id="persistence_1" checked />
														<label for="persistence_1">Ya</label><br/>
														<input class="with-gap" name="persistence" type="radio" value="Tidak" id="persistence_2" />
														<label for="persistence_2">Tidak</label><br/>								
													</div>		
													<!--Metode-->
													<div class="form-group col-md-12">
														<p>
															<label for="metode">Metode</label>
														</p>
														<select class="form-control" style="border: solid #DADADA 1px">
															<option value="" disabled selected>-- Primary --</option>
															<option value="leastConnection">Least Connection</option>
															<option value="roundRobin">Round Robin</option>
														</select>
														<select class="form-control" style="border: solid #DADADA 1px; margin-top: 10px">
															<option value="" disabled selected>-- Secondary --</option>
															<option value="leastConnection">Least Connection</option>
															<option value="roundRobin">Round Robin</option>
														</select>
													</div>
													<!--Keterangan-->
													<div class="form-group col-md-12 clearfix">
														<p>
															<label>Keterangan</label>
														</p>
														<div class="form-group">
															<div style="border: solid #DADADA 1px">
																<textarea class="form-control" style="resize:none" rows="5" name="keterangan"></textarea>
															</div>
														</div>
													</div>	
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-col-cyan">
                                            <div class="panel-heading" role="tab" id="headingTwo_19">
                                                <h4 class="panel-title">
													<input id="tcb2" class="filled-in pull-left chk-col-green" type="checkbox" style="display:inline;"><label for="tcb2" style="display:inline;margin-left: 5px; width: 10px;"></label>
                                                    <a class="" role="button" data-toggle="collapse" href="#collapseTwo_19" aria-expanded="true" aria-controls="collapseTwo_19">
                                                        <i class="material-icons pull-right">expand_more</i>2.  Web Application Firewall
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseTwo_19" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo_19" aria-expanded="true" style="">
                                                <div class="panel-body">
                                                    <!--IP Server-->
													<div class="form-group col-md-12 clearfix">
														<p>
															<label>IP Server/LB</label>
														</p>
														<div class="form-group">
															<div style="border: solid #DADADA 1px">
																<textarea class="form-control" style="resize:none" rows="5" name="IPServer3"></textarea>
															</div>
														</div>
													</div>		
													<!--Source IP-->
													<div class="form-group col-md-12 clearfix">
														<p>
															<label>Source IP</label>
														</p>
														<div class="form-group">
															<div style="border: solid #DADADA 1px">
																<textarea class="form-control" style="resize:none" rows="5" name="SourceIP"></textarea>
															</div>
														</div>
													</div>		
													
													<!--Port-->
													<div class="form-group col-md-12 clearfix">
														<p>
															<label>Port</label>
														</p>
														<div class="form-group">
															<div class="form-line">
																<input class="form-control" type="text" placeholder="Port" name="port3">
															</div>
														</div>
													</div>
													<!--URL-->
													<div class="form-group col-md-12 clearfix">
														<p>
															<label for="URL3">URL</label>
														</p>
														<div class="form-group">
															<div class="form-line">
																<input class="form-control" type="text" placeholder="URL" name="URL3">
															</div>
														</div>
													</div>
													<!--SSL-->
													<div class="form-group col-md-12">
														<P>
															<label for="SSL3">SSL</label>
														</P>
														<input class="with-gap" name="SSL3" type="radio" value="Ya" id="SSL_13" checked />
														<label for="SSL_13">Ya</label><br/>
														<input class="with-gap" name="SSL3" type="radio" value="Tidak" id="SSL_23" />
														<label for="SSL_23">Tidak</label><br/>								
													</div>	
                                                </div>
                                            </div>
                                        </div>
									</div>
                               </div>
							   
								<!--Col Kanan-->
								<div class="col-xs-6 ol-sm-6 col-md-6 col-lg-6">
                                    <div class="panel-group" id="accordion_19" role="tablist" aria-multiselectable="true">
                                        <div class="panel panel-col-teal">
                                            <div class="panel-heading" role="tab" id="headingThree_19">
                                                <h4 class="panel-title">
													<input id="tcb3" class="filled-in pull-left chk-col-green" type="checkbox" style="display:inline;"><label for="tcb3" style="display:inline;margin-left: 5px; width: 10px;"></label>
                                                    <a class="collapsed" role="button" data-toggle="collapse" href="#collapseThree_19" aria-expanded="false" aria-controls="collapseThree_19">
                                                        <i class="material-icons pull-right">expand_more</i> 3. Application Acceleration
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseThree_19" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree_19">
                                                <div class="panel-body">
													<!--IP Server-->
													<div class="form-group col-md-12 clearfix">
														<p>
															<label>IP Server</label>
														</p>
														<div class="form-group">
															<div style="border: solid #DADADA 1px">
																<textarea class="form-control" style="resize:none" rows="5" name="IPServer3"></textarea>
															</div>
														</div>
													</div>		
													<!--Port-->
													<div class="form-group col-md-12 clearfix">
														<p>
															<label>Port</label>
														</p>
														<div class="form-group">
															<div class="form-line">
																<input class="form-control" type="text" placeholder="Port" name="port3">
															</div>
														</div>
													</div>
													<!--URL-->
													<div class="form-group col-md-12 clearfix">
														<p>
															<label for="URL3">URL</label>
														</p>
														<div class="form-group">
															<div class="form-line">
																<input class="form-control" type="text" placeholder="URL" name="URL3">
															</div>
														</div>
													</div>
													<!--SSL-->
													<div class="form-group col-md-12">
														<P>
															<label for="SSL3">SSL</label>
														</P>
														<input class="with-gap" name="SSL3" type="radio" value="Ya" id="SSL_13" checked />
														<label for="SSL_13">Ya</label><br/>
														<input class="with-gap" name="SSL3" type="radio" value="Tidak" id="SSL_23" />
														<label for="SSL_23">Tidak</label><br/>								
													</div>		
													
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-col-orange">
                                            <div class="panel-heading" role="tab" id="headingFour_19">
                                                <h4 class="panel-title">
													<input id="tcb4" class="filled-in pull-left chk-col-green" type="checkbox" style="display:inline;"/><label for="tcb4" style="display:inline;margin-left: 5px; width: 10px;"></label>
                                                    <a class="collapsed" role="button" data-toggle="collapse" href="#collapseFour_19" aria-expanded="false" aria-controls="collapseFour_19">
                                                        <i class="material-icons pull-right">expand_more</i>4. Multiple Active Data Center
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseFour_19" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour_19">
                                                <div class="panel-body">
                                                    
												<!--lokasi-->
												<div class="form-group col-md-12">
													<P>
														<label for="lokasi">Lokasi</label>
													</P>
													<input id="basic_checkbox_1" class="filled-in" type="checkbox">
													<label for="basic_checkbox_1">Internal</label><br/>
													<input id="basic_checkbox_2" class="filled-in" type="checkbox">
													<label for="basic_checkbox_2">External</label><br/>
													<input id="basic_checkbox_3" class="filled-in" type="checkbox">
													<label for="basic_checkbox_3">3rd Party</label>														
												</div>
												<div class="form-group col-md-12 clearfix">
													<p>
														<label>IP Server/LB</label>
													</p>
													<div class="form-group">
														<div style="border: solid #DADADA 1px">
															<textarea class="form-control" style="resize:none" rows="5" name="IPServer3"></textarea>
														</div>
													</div>
												</div>		
												<!--Port-->
												<div class="form-group col-md-12 clearfix">
													<p>
														<label>Port</label>
													</p>
													<div class="form-group">
														<div class="form-line">
															<input class="form-control" type="text" placeholder="Port" name="port3">
														</div>
													</div>
												</div>
												<!--URL-->
												<div class="form-group col-md-12 clearfix">
													<p>
														<label for="URL3">URL</label>
													</p>
													<div class="form-group">
														<div class="form-line">
															<input class="form-control" type="text" placeholder="URL" name="URL3">
														</div>
													</div>
												</div>
												<!--Persistence-->
												<div class="form-group col-md-12">
													<P>
														<label for="SSL3">Persistence/Sticky</label>
													</P>
													<input class="with-gap" name="persistence3" type="radio" value="Ya" id="persistence_13" checked />
													<label for="persistence_13">Ya</label><br/>
													<input class="with-gap" name="persistence3" type="radio" value="Tidak" id="persistence_23" />
													<label for="persistence_23">Tidak</label><br/>								
												</div>	
												<!--Metode-->
												<div class="form-group col-md-12">
													<p>
														<label for="metode">Metode</label>
													</p>
													<select class="form-control" style="border: solid #DADADA 1px">
														<option value="" disabled selected>-- Primary --</option>
														<option value="leastConnection">Least Connection</option>
														<option value="roundRobin">Round Robin</option>
													</select>
													<select class="form-control" style="border: solid #DADADA 1px; margin-top: 10px">
														<option value="" disabled selected>-- Secondary --</option>
														<option value="leastConnection">Least Connection</option>
														<option value="roundRobin">Round Robin</option>
													</select>
												</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<!--End of Col Kanan-->
                            </div>	
							<div class="col-md-12">
								<button class="btn form-control btn-success">Submit</button>						  
							</div>
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
	
	$("a[data-toggle='collapse']").trigger('click');
});
</script>
@stop