@extends('template')

@foreach ($activeClasses as $class)
	@section($class)
		active
	@stop
@endforeach

@section('content-head')
	<style>
		#mainTable select{
			background: #F8F8F8;
		}
		
		#asd-box td{
			border: solid white 1px;
		}
		
		.service-box{
			display: none;
		}
		
		#infoTable td{
			border: none !important;
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
                        <div class="header bg-light-blue">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-6">
                                    <h2 class="content-submenu"></h2>
                                </div>
                            </div>
                        </div>
                        <div class="body" style="padding-bottom: 0px !important">   
							<div class="row" style="padding-top: 20px">							
								<!--Input Field-->
								<div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            No. Remedy
                                        </span>
                                        <div class="form-line">
                                            <input class="form-control date" type="text">
                                        </div>
                                        <span class="input-group-addon">
                                            <button class="btn btn-primary btn-xs" id="btnSearch"><i class="material-icons" style="color: white">search</i></button>
                                        </span>
                                    </div>
                                </div>			  
							</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Page Content -->
			<div class="row service-box">
				<div class="col-md-3">
					<div class="card">
                        <div class="body bg-indigo" style="height: 210px">
                            <table class="table" id="infoTable">
								<tr>
									<td>Remedy</td>
									<td>:</td>
									<td>CRQ0000007896</td>
								</tr>
								<tr>
									<td>Requester</td>
									<td>:</td>
									<td>Fredy Sitorus</td>
								</tr>
								<tr>
									<td>Request Date</td>
									<td>:</td>
									<td>27 Agustus 2018</td>
								</tr>
								<tr>
									<td>Estimated Done</td>
									<td>:</td>
									<td>9 September 2018</td>
								</tr>
								
							</table>
                        </div>
                    </div>
				</div>
				<div class="col-md-3">
					<div class="card" align="center">
                        <div class="body bg-green" style="height: 210px">
                            Overall
							<br/>
							<span style="font-size: 90px">50%</span>
                        </div>
                    </div>
				</div>
                <div class="col-md-6">
					 <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
						<div class="info-box bg-pink hover-zoom-effect">
							<div class="icon">
								<i class="material-icons">import_export</i>
							</div>
							<div class="content">
								<div class="text">Open Port</div>
								<div class="number">50%</div>
							</div>
						</div>

					</div>
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
						<div class="info-box bg-purple hover-zoom-effect">
							<div class="icon">
								<i class="material-icons">phonelink</i>
							</div>
							<div class="content">
								<div class="text">Device Connection</div>
								<div class="number">50%</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
						<div class="info-box bg-light-blue hover-zoom-effect">
							<div class="icon">
								<i class="material-icons">device_hub</i>
							</div>
							<div class="content">
								<div class="text">H2H Connection</div>
								<div class="number">50%</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
						<div class="info-box bg-cyan hover-zoom-effect">
							<div class="icon">
								<i class="material-icons">computer</i>
							</div>
							<div class="content">
								<div class="text">LAN Connection</div>
								<div class="number">50%</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
						<div class="info-box bg-orange hover-zoom-effect">
							<div class="icon">
								<i class="material-icons">group</i>
							</div>
							<div class="content">
								<div class="text">App. Service Delivery</div>
								<div class="number">50%</div>
							</div>
						</div>
					</div>
				</div>
               
            </div>
			
			<!--Open Port Section-->
			<div class="row clearfix service-box">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="card">
						<div class="header">
							<div class="row clearfix">
								<div class="col-xs-12 col-sm-6">
									<h2>Open Port (50%)</h2>
								</div>
							</div>
						</div>
						<div class="body" id="metaTable">                            
							<div class="col-md-9" style="padding-left: 0px">
								<table>
									<tr>
										<td style="width:100px">Requester</td>
										<td style="width:20px">:</td>
										<td>Fredy Sitorus</td>									
									</tr>
									<tr>
										<td style="width:100px">Remedy</td>
										<td style="width:20px">:</td>
										<td>CRQ00000009763</td>									
									
									</tr>
									<tr>
										<td style="width:100px">Description</td>
										<td style="width:20px">:</td>
										<td>Open Port to Application XXX</td>																
									</tr>
								</table>							
							</div>
							<div class="col-md-3">
								<table>
									<tr>
										<td style="width:100px">Received</td>
										<td style="width:20px">:</td>
										<td>5 August 2018</td>									
									</tr>
									<tr>
										<td style="width:100px">Done</td>
										<td style="width:20px">:</td>
										<td>-</td>									
									
									</tr>
									<tr>
										<td style="width:100px">PIC</td>
										<td style="width:20px">:</td>
										<td>Ronny</td>									
										
									</tr>
								</table>
							</div>
							<table class="table table-bordered table-hover table-striped" id="mainTable">
								<thead>
									<tr>
										<th>No</th>
										<th>Source</th>
										<th>Destination</th>
										<th>Protocol</th>
										<th>Port Number</th>		
										<th>Direction</th>
										<th>Description</th>
										<th>Status</th>										
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td>
											10.5.40.28<br/>
											10.5.40.29
										</td>
										<td>10.22.3.27</td>
										<td>TCP</td>
										<td>3389</td>	
										<td>1 Direction</td>
										<td>Remote Desktop dari WSA2</td>	
										<td align="center" class="col-teal">Complete</td>												
									</tr>
									<tr>
										<td>2</td>
										<td>10.21.3.7</td>
										<td>10.22.3.27</td>
										<td>TCP</td>
										<td>3389</td>	
										<td>1 Direction</td>
										<td>Remote Desktop dari MBCA</td>	
										<td align="center"><span class="col-pink">Incomplete</span></td>											
									</tr>																		
								</tbody>
							</table>				
						</div>			
					</div>
				</div>
			</div>
			<!--End Of Open Port Section-->
			<!--Device Connection Section-->
			 <div class="row clearfix service-box">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="card">
						<div class="header">
							<div class="row clearfix">
								<div class="col-xs-12 col-sm-6">
									<h2>Device Connection (50%)</h2>
								</div>
							</div>
						</div>
						<div class="body" id="metaTable">
							<div class="col-md-9" style="padding-left: 0px">
								<table>
									<tr>
										<td style="width:100px">Requester</td>
										<td style="width:20px">:</td>
										<td>Fredy Sitorus</td>									
									</tr>
									<tr>
										<td style="width:100px">Remedy</td>
										<td style="width:20px">:</td>
										<td>CRQ00000009763</td>									
									
									</tr>
									<tr>
										<td style="width:100px">Description</td>
										<td style="width:20px">:</td>
										<td>Koneksi Device to Application XXX</td>									
										
									</tr>
								</table>							
							</div>
							<div class="col-md-3">
								<table>
									<tr>
										<td style="width:100px">Received</td>
										<td style="width:20px">:</td>
										<td>5 August 2018</td>									
									</tr>
									<tr>
										<td style="width:100px">Done</td>
										<td style="width:20px">:</td>
										<td>-</td>									
									
									</tr>
									<tr>
										<td style="width:100px">PIC</td>
										<td style="width:20px">:</td>
										<td>Ronny</td>									
										
									</tr>
								</table>
							</div>
							<table class="table table-bordered table-hover table-striped" id="mainTable">
								<thead>
									<tr>
										<th>No</th>
										<th>Server Name</th>
										<th>IP Address</th>
										<th>Network Device</th>
										<th>Interface</th>		
										<th>Description</th>
										<th>Status</th>										
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td>KP2DOMISA02</td>
										<td>10.6.33.99</td>
										<td>MBCA-MGMT-D</td>
										<td>Eth104/1/1</td>	
										<td>Server DNS</td>
										<td align="center" class="col-teal">Complete</td>												
									</tr>
									<tr>
										<td>2</td>
										<td>KPISA01</td>
										<td>10.6.33.88</td>
										<td>MBCA-MGMT-D</td>
										<td>Eth104/1/2</td>	
										<td>Server DNS</td>
										<td align="center">
											<span class="col-pink">Incomplete</span>
										</td>												
									</tr>													
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<!--End Of Device Connection Section-->
			<!--H2H Section-->
			<div class="row clearfix service-box">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="card">
						<div class="header">
							<div class="row clearfix">
								<div class="col-xs-12 col-sm-6">
									<h2>H2H Connection (50%)</h2>
								</div>
							</div>
						</div>
						<div class="body" id="metaTable">
							<div class="col-md-9" style="padding-left: 0px">
								<table>
									<tr>
										<td style="width:100px">Requester</td>
										<td style="width:20px">:</td>
										<td>Fredy Sitorus</td>									
									</tr>
									<tr>
										<td style="width:100px">Remedy</td>
										<td style="width:20px">:</td>
										<td>CRQ00000009763</td>									
									
									</tr>
									<tr>
										<td style="width:100px">Description</td>
										<td style="width:20px">:</td>
										<td>Koneksi Device to Application XXX</td>									
										
									</tr>
								</table>							
							</div>
							<div class="col-md-3">
								<table>
									<tr>
										<td style="width:100px">Received</td>
										<td style="width:20px">:</td>
										<td>5 August 2018</td>									
									</tr>
									<tr>
										<td style="width:100px">Done</td>
										<td style="width:20px">:</td>
										<td>-</td>									
									
									</tr>
									<tr>
										<td style="width:100px">PIC</td>
										<td style="width:20px">:</td>
										<td>Ronny</td>									
										
									</tr>
								</table>
							</div>
							<table class="table table-bordered table-hover table-striped" id="mainTable">
								<thead>
									<tr>
										<th>No</th>
										<th>Partner</th>
										<th>Link</th>
										<th>Site</th>
										<th>BCA Server IP</th>
										<th>Partner Server IP</th>		
										<th>IP P2P BCA</th>		
										<th>IP P2P Partner</th>
										<th>App. Port</th>		
										<th>App. Name</th>
										<th>Status</th>										
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td>Traveloka</td>
										<td>Telkom</td>
										<td>MBCA</td>
										<td>192.168.70.88</td>	
										<td>192.168.33.42</td>
										<td>192.168.88.80</td>
										<td>192.168.88.81</td>
										<td>8080</td>	
										<td>Booking System</td>
										<td align="center" class="col-teal">Complete</td>												
									</tr>
									<tr>
										<td>2</td>
										<td>Tokopedia</td>
										<td>Indosat</td>
										<td>WSA2</td>
										<td>192.168.70.88</td>	
										<td>192.168.33.43</td>
										<td>192.168.88.83</td>
										<td>192.168.88.84</td>
										<td>8080</td>	
										<td>Online Shopping System</td>
										<td align="center">
											<span class="col-pink">Incomplete</span>
										</td>												
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<!--End of H2H Section-->
			<!--LAN Section-->
			<div class="row clearfix service-box">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="card">
						<div class="header">
							<div class="row clearfix">
								<div class="col-xs-12 col-sm-6">
									<h2>LAN Connection (50%)</h2>
								</div>
							</div>
						</div>
						 <div class="body" style="overflow: hidden">   
							<div class="col-md-9" style="padding-left: 0px">
								<table id="metaTable">
									<tr>
										<td style="width:100px">Requester</td>
										<td style="width:20px">:</td>
										<td>Fredy Sitorus</td>									
									</tr>
									<tr>
										<td style="width:100px">Remedy</td>
										<td style="width:20px">:</td>
										<td>CRQ00000009763</td>									
									
									</tr>
									<tr>
										<td style="width:100px">Description</td>
										<td style="width:20px">:</td>
										<td>Open Port to Application XXX</td>																
									</tr>
								</table>							
							</div>
							<div class="col-md-3">
								<table id="metaTable">
									<tr>
										<td style="width:100px">Received</td>
										<td style="width:20px">:</td>
										<td>5 August 2018</td>									
									</tr>
									<tr>
										<td style="width:100px">Done</td>
										<td style="width:20px">:</td>
										<td>-</td>									
									
									</tr>
									<tr>
										<td style="width:100px">PIC</td>
										<td style="width:20px">:</td>
										<td>Ronny</td>																			
									</tr>
								</table>
							</div>
							<hr/>
							<div class="row">
								<div class="col-md-12">
									Status: <span class="col-teal">Complete</span>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
								<div class=" col-md-12">
									<P>
										<label for="lokasi">Lokasi</label>
									</P>
									<input class="with-gap" name="lokasi" type="radio" value="MenaraBCA" id="lokasi_1" checked />
									<label for="lokasi_1">Menara BCA</label><br/>
									<input class="with-gap" name="lokasi" type="radio" value="WismaAsia2" id="lokasi_2" disabled="true"/>
									<label for="lokasi_2">Wisma Asia 2</label><br/>
									<input class="with-gap" name="lokasi" type="radio" value="GrhaAsia" class="with-gap" id="lokasi_3" disabled="true" />
									<label for="lokasi_3">Grha Asia</label><br/>
									<input class="with-gap" name="lokasi" type="radio" value="Lainnya" id="lokasi_4" class="with-gap" disabled="true" />
									<label for="lokasi_4">Lainnya</label>  
								</div>		
								<!--Antivirus-->
								<div class=" col-md-12">
									<P>
										<label for="antivirus">Antivirus</label>
									</P>
									<input class="with-gap" name="antivirus" type="radio" value="Ya" id="antivirus_1" checked />
									<label for="antivirus_1">Ya</label><br/>
									<input class="with-gap" name="antivirus" type="radio" value="Tidak" id="antivirus_2"  disabled="true"/>
									<label for="antivirus_2">Tidak</label><br/>								
								</div>		
								<!--Total User/Device-->
								<div class=" col-md-12 clearfix">
									<p>
										<label>Total User/Device</label>
									</p>
									<div class="">
										99 User
									</div>
								</div>
								<!--Koneksi ke Switch-->
								<div class=" col-md-12 clearfix">
									<p>
										<label>Koneksi ke Switch</label>
									</p>
									<div class="">
										WSA2-LAN-S1
									</div>
								</div>
								<!--Port Switch-->
								<div class=" col-md-12 clearfix">
									<p>
										<label>Port Switch</label>
									</p>
									<div class="">
										Eth5/1/2
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<!--Segment IP Address-->
								<div class=" col-md-12 clearfix">
									<p>
										<label for="ipadress">Segment IP Address</label>
									</p>
									<div class="">
										10.5.40.1/23
									</div>
								</div>
								<!--IP Phone-->
								<div class=" col-md-12">
									<P>
										<label for="ipphone">IP Phone</label>
									</P>
									<input class="with-gap" name="ipphone" type="radio" value="Cisco" id="ipphone_1" checked />
									<label for="ipphone_1">Cisco</label><br/>
									<input class="with-gap" name="ipphone" type="radio" value="Avaya" id="ipphone_2" disabled="true"/>
									<label for="ipphone_2">Avaya</label><br/>
									<input class="with-gap" name="ipphone" type="radio" value="Tidak Ada" id="ipphone_3"  disabled="true"/>
									<label for="ipphone_3">Tidak ada</label><br/>								
								</div>	
								<!--Lama Pemakaian-->
								<div class=" col-md-12 clearfix">
									<p>
										<label for="lamapemakaian">Lama Pemakaian</label>
									</p>
									<div class="">
										4 Bulan
									</div>
								</div>							
								<!--Bypass NAC/ISE-->
								<div class=" col-md-12">
									<P>
										<label for="bypass">Bypass NAC/ISE</label>
									</P>
									<input class="with-gap" name="bypass" type="radio" value="Ya" id="bypass_1" checked />
									<label for="bypass_1">Ya</label><br/>
									<input class="with-gap" name="bypass" type="radio" value="Tidak" id="bypass_2" disabled="true" />
									<label for="bypass_2">Tidak</label><br/>								
								</div>		
								<!--MAC Address-->
								<div class=" col-md-12 clearfix" id="macAddressDiv">
									<p>
										<label>IP/MAC Address</label>
									</p>
									<div class="">
										<div style="border: solid #DADADA 1px">
											<textarea class="form-control" style="resize:none" rows="5" name="macAddress" disabled="true">aa:bb:cc:dd</textarea>
										</div>
									</div>
								</div>								
							</div>		  
                        
							</div>
							<!--lokasi-->
							</div>
                    </div>
				</div>
			</div>
			<!--End of LAN Section--?
			<!--AS Delivery Section-->
			<div class="row clearfix service-box" id="asd-box">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="card">
						<div class="header">
							<div class="row clearfix">
								<div class="col-xs-12 col-sm-6">
									<h2>Application Services Delivery (50%)</h2>
								</div>
							</div>
						</div>
						<div class="body" id="metaTable">
							<div class="col-md-9" style="padding-left: 0px">
								<table>
									<tr>
										<td style="width:100px">Requester</td>
										<td style="width:20px">:</td>
										<td>Fredy Sitorus</td>									
									</tr>
									<tr>
										<td style="width:100px">Remedy</td>
										<td style="width:20px">:</td>
										<td>CRQ00000009763</td>									
									
									</tr>
									<tr>
										<td style="width:100px">Description</td>
										<td style="width:20px">:</td>
										<td>Koneksi Device to Application XXX</td>									
										
									</tr>
								</table>							
							</div>
							<div class="col-md-3">
								<table>
									<tr>
										<td style="width:100px">Received</td>
										<td style="width:20px">:</td>
										<td>5 August 2018</td>									
									</tr>
									<tr>
										<td style="width:100px">Done</td>
										<td style="width:20px">:</td>
										<td>-</td>									
									
									</tr>
									<tr>
										<td style="width:100px">PIC</td>
										<td style="width:20px">:</td>
										<td>Ronny</td>									
										
									</tr>
								</table>
							</div>
							<hr/>
							<div class="row">
								<div class="col-md-6 subservice" style="overflow:hidden">
									<span style="font-weight: bold;">1. Load Balancing Server</span>
									<span class="col-teal">(Complete)</span>
									<table id="loadBalancingServer" class="table" style="margin-bottom: 30px">
										<tr>
											<td>a. IP Server</td>
											<td>:</td>
											<td>
												10.7.5.108<br/>
												10.7.5.109<br/>
												10.23.5.108<br/>
												10.23.5.109
											</td>									
										</tr>
										<tr>
											<td>b. IP Load Balancer</td>
											<td>:</td>
											<td>
												10.7.5.107<br/>
												10.23.5.107
											</td>																				
										</tr>
										<tr>
											<td>c. Port</td>
											<td>:</td>
											<td>443</td>																				
										</tr>
										<tr>
											<td>d. URL</td>
											<td>:</td>
											<td>morning.bca.co.id</td>																				
										</tr>
										<tr>
											<td>e. SSL</td>
											<td>:</td>
											<td>Ya</td>																				
										</tr>
										<tr>
											<td>f. Persistence/Sticky</td>
											<td>:</td>
											<td>Ya</td>																				
										</tr>
										<tr>
											<td>g. Metode</td>
											<td>:</td>
											<td>
												1) Least Connection<br/>
												2) Round Robin
											</td>																				
										</tr>
										<tr>
											<td>h. Keterangan</td>
											<td>:</td>
											<td>Load Balancer MorningBCA</td>																				
										</tr>
									</table>
									<span style="font-weight:bold">2. Web Application Firewall</span>
									<span>
										<span class="col-pink" style="margin-left: 10px">(Incomplete)</span>
									</span>
									<table id="webApplicationFirewall" class="table">
										<tr>
											<td>a. IP Server/LB</td>
											<td>:</td>
											<td>
												10.7.5.107<br/>
												10.7.5.107
											</td>									
										</tr>
										<tr>
											<td>b. Port</td>
											<td>:</td>
											<td>
												443
											</td>																				
										</tr>
										<tr>
											<td>c. SSL</td>
											<td>:</td>
											<td>Tidak</td>																				
										</tr>
										<tr>
											<td>d. Source IP</td>
											<td>:</td>
											<td>192.168.132.64</td>																				
										</tr>
										<tr>
											<td>e. URL</td>
											<td>:</td>
											<td>morning.bca.co.id</td>																				
										</tr>
									</table>	
								</div>
								<div class="col-md-6 subservice" style="overflow:hidden">
									<span style="font-weight: bold">3. Application Acceleration</span>
									<span class="col-teal">(Complete)</span>
									<table id="applicationAcceleration" class="table" style="margin-bottom: 30px">
										<tr>
											<td>a. IP Server/LB</td>
											<td>:</td>
											<td>
												10.7.5.107<br/>
												10.7.5.107
											</td>									
										</tr>
										<tr>
											<td>b. Port</td>
											<td>:</td>
											<td>
												443
											</td>																				
										</tr>
										<tr>
											<td>c. SSL</td>
											<td>:</td>
											<td>Tidak</td>																				
										</tr>
										<tr>
											<td>d. URL</td>
											<td>:</td>
											<td>morning.bca.co.id</td>																				
										</tr>
									</table>
									<span style="font-weight: bold">4. Multiple Active Data Center</span>	
									<span>
										<span class="col-pink" style="margin-left: 10px">(Incomplete)</span>
									</span>									
									<table id="loadBalancingServer" class="table" style="margin-bottom: 30px">
										<tr>
											<td>a. Lokasi</td>
											<td>:</td>
											<td>
												Menara BCA<br/>
												Wisma Asia 2
											</td>									
										</tr>
										<tr>
											<td>b. IP Server/LB</td>
											<td>:</td>
											<td>
												10.7.5.107<br/>
												10.23.5.107
											</td>																				
										</tr>
										<tr>
											<td>c. Port</td>
											<td>:</td>
											<td>443</td>																				
										</tr>
										<tr>
											<td>d. URL</td>
											<td>:</td>
											<td>morning.bca.co.id</td>																				
										</tr>
										<tr>
											<td>e. Persistence/Sticky</td>
											<td>:</td>
											<td>Ya</td>																				
										</tr>
										<tr>
											<td>f. Metode</td>
											<td>:</td>
											<td>
												Least Connection<br/>
												Round Robin
											</td>																				
										</tr>
										<tr>
											<td>g. Keterangan</td>
											<td>:</td>
											<td>
												Aplikasi ini aktif di 2 site
											</td>																				
										</tr>
									</table>
								</div>							
							</div>
						</div>			
					</div>
				</div>
			</div>
			<!--End of AS Delivery Section-->
        </div>
    </section>
@stop

@section('content-script')
	<script>
		$(document).ready(function(){
			$("#btnSearch").click(function(e){
				$('.service-box').show();
			});
		});
	</script>
@stop
