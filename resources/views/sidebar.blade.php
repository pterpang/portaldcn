 <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
					<!--div style="width: 45px; height: 45px; border-radius:50%; background-image:url('http://cdr/sites/project/Resource_Photos/[NIP].jpg'); background-size: cover;">
					</div-->
					<div style="width: 45px; height: 45px; border-radius:50%; background-image:url('{{URL::to('/')}}/adminBSB/images/avatar-1.png'); background-size: cover;">
					</div>					
				</div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Welcome, {{Auth::user()->name}}!</div>
                    <!-- <div class="email">pang_pangestu@bca.co.id</div> -->
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li>
                                <a href="#" id="btnLogout"><i class="material-icons">input</i>Sign Out</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <?php if (Auth::user()->name == 'portaldcn' || 1 == 1 /*temporary saja*/): ?>
                    <li class="header">Staff Navigation</li>
                    <li  class="ml-mainmenu @yield('dashboard_active')">
                        <a href="{{URL::to('/')}}">
                            <i class="material-icons">home</i>
                            <span class="ml-mainmenu">Home</span>
                        </a>
                    </li>
					<li class="ml-mainmenu @yield('ib_active')">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">language</i>
                            <span class="mainmenu-title">Internet Banking & E-Channel</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="@yield('ib_requestlist_active')">
                                <a href="{{URL::to('IB')}}">
                                    <span class="submenu-title">Request List</span>
                                </a>
                            </li>
							<!-- <li class="@yield('ib_preventivemaintenance_active')">
                                <a href="{{URL::to('IB/preventiveMaintenance')}}">
                                    <span class="submenu-title">Preventive Maintenance</span>
                                </a>
                            </li>
							 <li class="@yield('ib_incidenthandling_active')">
                                <a href="{{URL::to('IB/incidentHandling')}}">
                                    <span class="submenu-title">Incident Handling</span>
                                </a>
                            </li>
							 <li class="@yield('ib_networkmonitoring_active')">
                                <a href="{{URL::to('IB/networkMonitoring')}}">
                                    <span class="submenu-title">Network Monitoring</span>
                                </a>
                            </li> -->
                            <li class="@yield('ib_services_active')">
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Services</span>
                                </a>
                                <ul class="ml-menu">
									<li class="@yield('ib_openport_active')">
                                        <a href="{{URL::to('IB/openport')}}">
                                            <span class="submenu-title">Open Port Firewall</span>
                                        </a>
                                    </li>
									<li class="@yield('ib_deviceconnection_active')">
                                        <a href="{{URL::to('IB/deviceConnection')}}">
                                            <span class="submenu-title">Device Connection</span>
                                        </a>
                                    </li>
									<li class="@yield('ib_ASDelivery_active')">
                                        <a href="{{URL::to('IB/ASDelivery')}}">
                                            <span class="submenu-title">App. Service Delivery</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>                        
                    <li class="ml-mainmenu  @yield('sf_active')">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">phonelink</i>
                            <span class="mainmenu-title">Server Farm Internal & Intranet</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="@yield('sf_requestlist_active')">
                                <a href="{{URL::to('SF')}}">
                                    <span class="submenu-title">Request List</span>
                                </a>
                            </li>
                           <!--  <li class="@yield('ib_preventivemaintenance_active')">
                                <a href="{{URL::to('SF/preventiveMaintenance')}}">
                                    <span class="submenu-title">Preventive Maintenance</span>
                                </a>
                            </li>
							 <li class="@yield('ib_incidenthandling_active')">
                                <a href="{{URL::to('SF/incidentHandling')}}">
                                    <span class="submenu-title">Incident Handling</span>
                                </a>
                            </li>
							 <li class="@yield('ib_networkmonitoring_active')">
                                <a href="{{URL::to('SF/networkMonitoring')}}">
                                    <span class="submenu-title">Network Monitoring</span>
                                </a>
                            </li> -->
                            <li class="@yield('sf_services_active')">
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Services</span>
                                </a>
                                <ul class="ml-menu">
									<li class="@yield('sf_remoteAccess_active')">
                                        <a href="{{URL::to('SF/remoteAccess')}}">
                                            <span class="submenu-title">Remote Access</span>
                                        </a>
                                    </li>
									<li class="@yield('sf_H2H_active')">
                                        <a href="{{URL::to('SF/H2H')}}">
                                            <span class="submenu-title">H2H Connection</span>
                                        </a>
                                    </li>
                                    <li class="@yield('sf_openport_active')">
                                        <a href="{{URL::to('SF/openport')}}">
                                            <span class="submenu-title">Open Port Firewall</span>
                                        </a>
                                    </li>
									<li class="@yield('sf_deviceconnection_active')">
                                        <a href="{{URL::to('SF/deviceConnection')}}">
                                            <span class="submenu-title">Device Connection</span>
                                        </a>
                                    </li>
									<li class="@yield('sf_ASDelivery_active')">
                                        <a href="{{URL::to('SF/ASDelivery')}}">
                                            <span class="submenu-title">App. Service Delivery</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="ml-mainmenu @yield('tp_active')">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">people</i>
                            <span class="mainmenu-title">H2H & WAN</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="@yield('tp_requestlist_active')">
                                <a href="{{URL::to('TP')}}">
                                    <span class="submenu-title">Request List</span>
                                </a>
                            </li>
                           <!--  <li class="@yield('ib_preventivemaintenance_active')">
                                <a href="{{URL::to('TP/preventiveMaintenance')}}">
                                    <span class="submenu-title">Preventive Maintenance</span>
                                </a>
                            </li>
							 <li class="@yield('ib_incidenthandling_active')">
                                <a href="{{URL::to('TP/incidentHandling')}}">
                                    <span class="submenu-title">Incident Handling</span>
                                </a>
                            </li>
							 <li class="@yield('ib_networkmonitoring_active')">
                                <a href="{{URL::to('TP/networkMonitoring')}}">
                                    <span class="submenu-title">Network Monitoring</span>
                                </a>
                            </li> -->
                            <li class="@yield('tp_services_active')">
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Services</span>
                                </a>
                                <ul class="ml-menu">
									<li class="@yield('tp_H2H_active')">
                                        <a href="{{URL::to('TP/H2H')}}">
                                            <span class="submenu-title">H2H Connection</span>
                                        </a>
                                    </li>
                                    <li class="@yield('tp_openport_active')">
                                        <a href="{{URL::to('TP/openport')}}">
                                            <span class="submenu-title">Open Port Firewall</span>
                                        </a>
                                    </li>
									<li class="@yield('tp_deviceconnection_active')">
                                        <a href="{{URL::to('TP/deviceConnection')}}">
                                            <span class="submenu-title">Device Connection</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
					<li class="ml-mainmenu @yield('lan_active')">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">computer</i>
                            <span class="mainmenu-title">Remote Office & LAN HQ</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="@yield('lan_requestlist_active')">
                                <a href="{{URL::to('LAN')}}">
                                    <span class="submenu-title">Request List</span>
                                </a>
                            </li>
                            <!-- <li class="@yield('ib_preventivemaintenance_active')">
                                <a href="{{URL::to('LAN/preventiveMaintenance')}}">
                                    <span class="submenu-title">Preventive Maintenance</span>
                                </a>
                            </li>
							 <li class="@yield('ib_incidenthandling_active')">
                                <a href="{{URL::to('LAN/incidentHandling')}}">
                                    <span class="submenu-title">Incident Handling</span>
                                </a>
                            </li>
							 <li class="@yield('ib_networkmonitoring_active')">
                                <a href="{{URL::to('LAN/networkMonitoring')}}">
                                    <span class="submenu-title">Network Monitoring</span>
                                </a>
                            </li> -->
                            <li class="@yield('lan_services_active')">
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Services</span>
                                </a>
                                <ul class="ml-menu">
									<li class="@yield('lan_LAN_active')">
                                        <a href="{{URL::to('LAN/LAN')}}">
                                            <span class="submenu-title">LAN Connection</span>
                                        </a>
                                    </li>
                                    <li class="@yield('lan_openport_active')">
                                        <a href="{{URL::to('LAN/openport')}}">
                                            <span class="submenu-title">Open Port Firewall</span>
                                        </a>
                                    </li>
									<li class="@yield('lan_deviceconnection_active')">
                                        <a href="{{URL::to('LAN/deviceConnection')}}">
                                            <span class="submenu-title">Device Connection</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
					<li class="ml-mainmenu @yield('netsec_active')">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">security</i>
                            <span class="mainmenu-title">Network Security & Monitoring</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="@yield('netsec_requestlist_active')">
                                <a href="{{URL::to('netsec')}}">
                                    <span class="submenu-title">Request List</span>
                                </a>
                            </li>
                           <!--  <li class="@yield('ib_preventivemaintenance_active')">
                                <a href="{{URL::to('netsec/preventiveMaintenance')}}">
                                    <span class="submenu-title">Preventive Maintenance</span>
                                </a>
                            </li>
							 <li class="@yield('ib_incidenthandling_active')">
                                <a href="{{URL::to('netsec/incidentHandling')}}">
                                    <span class="submenu-title">Incident Handling</span>
                                </a>
                            </li>
							 <li class="@yield('ib_networkmonitoring_active')">
                                <a href="{{URL::to('netsec/networkMonitoring')}}">
                                    <span class="submenu-title">Network Monitoring</span>
                                </a>
                            </li> -->
                            <li class="@yield('netsec_services_active')">
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Services</span>
                                </a>
                                <ul class="ml-menu">
									<li class="@yield('netsec_LAN_active')">
                                        <a href="{{URL::to('netsec/LAN')}}">
                                            <span class="submenu-title">LAN/WLAN Connection</span>
                                        </a>
                                    </li>
                                    <li class="@yield('netsec_remoteAccess_active')">
                                        <a href="{{URL::to('netsec/remoteAccess')}}">
                                            <span class="submenu-title">Remote Access</span>
                                        </a>
                                    </li>
                                    <li class="@yield('netsec_openport_active')">
                                        <!-- <a href="{{URL::to('netsec/networkUtilization')}}"> -->
                                        <a href="#">
                                            <span class="submenu-title">Network Utilization (soon)</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>   
                                                   
                        </ul>
                    </li>
                    <li class="ml-mainmenu  @yield('newar_active')">
                        <a href="{{ URL::to('article/create') }}">
                            <i class="material-icons">add_box</i>
                            <span class="mainmenu-title">New Article</span>
                        </a>
                    </li> 



                    <li class="ml-mainmenu @yield('report_active')">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">book</i>
                            <span class="mainmenu-title">Reporting</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="@yield('lan_requestlist_active')">
                                <a href="{{URL::to('report')}}">
                                    <span class="submenu-title">General Report</span>
                                </a>
                            </li>
                            <li class="@yield('report_services_active')">
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Teams Report</span>
                                </a>
                                <ul class="ml-menu">
                                    <li class="@yield('lan_LAN_active')">
                                        <a href="{{URL::to('report/IB')}}">
                                            <span class="submenu-title">Internet Banking & E-Channel</span>
                                        </a>
                                    </li>
                                    <li class="@yield('lan_openport_active')">
                                        <a href="{{URL::to('report/SF')}}">
                                            <span class="submenu-title">Server Farm Internal & Intranet</span>
                                        </a>
                                    </li>
                                    <li class="@yield('lan_deviceconnection_active')">
                                        <a href="{{URL::to('report/H2H')}}">
                                            <span class="submenu-title">H2H & WAN</span>
                                        </a>
                                    </li>
                                    <li class="@yield('lan_deviceconnection_active')">
                                        <a href="{{URL::to('report/LAN')}}">
                                            <span class="submenu-title">Remote Office & LAN HQ</span>
                                        </a>
                                    </li>
                                    <li class="@yield('lan_deviceconnection_active')">
                                        <a href="{{URL::to('report/NS')}}">
                                            <span class="submenu-title">Network Security & Monitoring</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="@yield('report_services_active')">
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Services Report</span>
                                </a>
                                <ul class="ml-menu">
                                    <li class="@yield('lan_LAN_active')">
                                        <a href="{{URL::to('report/openport')}}">
                                            <span class="submenu-title">Open Port</span>
                                        </a>
                                    </li>
                                    <li class="@yield('lan_openport_active')">
                                        <a href="{{URL::to('report/deviceconnection')}}">
                                            <span class="submenu-title">Device Connection</span>
                                        </a>
                                    </li>
                                    <li class="@yield('lan_deviceconnection_active')">
                                        <a href="{{URL::to('report/h2hconnection')}}">
                                            <span class="submenu-title">H2H Connection</span>
                                        </a>
                                    </li>
                                    <li class="@yield('lan_deviceconnection_active')">
                                        <a href="{{URL::to('report/lanconnection')}}">
                                            <span class="submenu-title">LAN Connection</span>
                                        </a>
                                    </li>
                                    <li class="@yield('lan_deviceconnection_active')">
                                        <a href="{{URL::to('report/remoteaccess')}}">
                                            <span class="submenu-title">Remote Access</span>
                                        </a>
                                    </li>
                                    <li class="@yield('lan_deviceconnection_active')">
                                        <a href="{{URL::to('report/asdelivery')}}">
                                            <span class="submenu-title">Application Service Delivery</span>
                                        </a>
                                    </li>
                                    
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <?php endif ?>
					<li class="header">User Navigation</li>	
					<li class="ml-mainmenu  @yield('newrq_active')">
                        <a href="{{ URL::to('newRequest') }}">
                            <i class="material-icons">add_box</i>
                            <span class="mainmenu-title">New Request</span>
                        </a>
                    </li>
                   <!--  <li class="ml-mainmenu  @yield('fh2h_active')">
						<a href="{{ URL::to('formH2H') }}">
							<i class="material-icons">label</i>
							<span class="mainmenu-title">Form H2H</span>
						</a>
					</li>
					<li class="ml-mainmenu  @yield('flan_active')">
						<a href="{{ URL::to('formLAN') }}">
							<i class="material-icons">label</i>
							<span class="mainmenu-title">Form LAN</span>
						</a>
					</li>	
					<li class="ml-mainmenu  @yield('op_active')">
						<a href="{{ URL::to('formOpenPort') }}">
							<i class="material-icons">label</i>
							<span class="mainmenu-title">Form Open Port</span>
						</a>
					</li>	
					<li class="ml-mainmenu  @yield('asd_active')">
						<a href="{{ URL::to('formASDelivery') }}">
							<i class="material-icons">label</i>
							<span class="mainmenu-title">Form AS Delivery</span>
						</a>
					</li>		
					<li class="ml-mainmenu  @yield('kd_active')">
						<a href="{{ URL::to('formDeviceConnection') }}">
							<i class="material-icons">label</i>
							<span class="mainmenu-title">Form Koneksi Device</span>
						</a>
					</li> -->					
					<!--li class="header">Additional</li-->	
					<!--li class="ml-mainmenu  @yield('tracking_active')">
						<a href="{{ URL::to('tracking') }}">
							<i class="material-icons">gps_fixed</i>
							<span class="mainmenu-title">Request Tracking</span>
						</a>
					</li-->	
					<li class="ml-mainmenu  @yield('myrq_active')">
						<a href="{{ URL::to('myRequests') }}">
							<i class="material-icons">book</i>
							<span class="mainmenu-title">My Requests</span>
						</a>
					</li>	
                    <li class="ml-mainmenu  @yield('article_active')">
                        <a href="{{ URL::to('article') }}">
                            <i class="material-icons">library_books</i>
                            <span class="mainmenu-title">Articles</span>
                        </a>
                    </li   				
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; Network Data Center 2018
                </div>
                <!--div class="version">
                    <b>Version: </b> 1.0.5
                </div-->
				
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
                <li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                    <ul class="demo-choose-skin">
                        <li data-theme="red" class="active">
                            <div class="red"></div>
                            <span>Red</span>
                        </li>
                        <li data-theme="pink">
                            <div class="pink"></div>
                            <span>Pink</span>
                        </li>
                        <li data-theme="purple">
                            <div class="purple"></div>
                            <span>Purple</span>
                        </li>
                        <li data-theme="deep-purple">
                            <div class="deep-purple"></div>
                            <span>Deep Purple</span>
                        </li>
                        <li data-theme="indigo">
                            <div class="indigo"></div>
                            <span>Indigo</span>
                        </li>
                        <li data-theme="blue">
                            <div class="blue"></div>
                            <span>Blue</span>
                        </li>
                        <li data-theme="light-blue">
                            <div class="light-blue"></div>
                            <span>Light Blue</span>
                        </li>
                        <li data-theme="cyan">
                            <div class="cyan"></div>
                            <span>Cyan</span>
                        </li>
                        <li data-theme="teal">
                            <div class="teal"></div>
                            <span>Teal</span>
                        </li>
                        <li data-theme="green">
                            <div class="green"></div>
                            <span>Green</span>
                        </li>
                        <li data-theme="light-green">
                            <div class="light-green"></div>
                            <span>Light Green</span>
                        </li>
                        <li data-theme="lime">
                            <div class="lime"></div>
                            <span>Lime</span>
                        </li>
                        <li data-theme="yellow">
                            <div class="yellow"></div>
                            <span>Yellow</span>
                        </li>
                        <li data-theme="amber">
                            <div class="amber"></div>
                            <span>Amber</span>
                        </li>
                        <li data-theme="orange">
                            <div class="orange"></div>
                            <span>Orange</span>
                        </li>
                        <li data-theme="deep-orange">
                            <div class="deep-orange"></div>
                            <span>Deep Orange</span>
                        </li>
                        <li data-theme="brown">
                            <div class="brown"></div>
                            <span>Brown</span>
                        </li>
                        <li data-theme="grey">
                            <div class="grey"></div>
                            <span>Grey</span>
                        </li>
                        <li data-theme="blue-grey">
                            <div class="blue-grey"></div>
                            <span>Blue Grey</span>
                        </li>
                        <li data-theme="black">
                            <div class="black"></div>
                            <span>Black</span>
                        </li>
                    </ul>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="settings">
                    <div class="demo-settings">
                        <p>GENERAL SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Report Panel Usage</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Email Redirect</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>SYSTEM SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Notifications</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Auto Updates</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>ACCOUNT SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Offline</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Location Permission</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </aside>
        <!-- #END# Right Sidebar -->
    </section>
