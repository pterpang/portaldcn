<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Login Page




// Test LDAP
// Route::get('/ldap', 'DashboardController@LDAP');

Route::get('/email', 'AdditionalController@sendEmail');

Route::get('/login', function(){ 
    if(Auth::check()){
        return redirect('/');
    }
	return view('authentication.login');
		})->name("login");
		Route::post('/login', 'Auth\LoginController@customLogin');
		Route::get('/logout', function(){
			return redirect('/');
		});

	Route::post('/logout', 'Auth\LoginController@logout');



Route::group(['middleware' => ['auth']], function(){
	// Dashboard
	Route::get('/', 'DashboardController@index');
	// Tracking Page
	Route::get('/tracking', function () {
		$activeClasses = ['tracking_active'];
		return view('additional.tracking', compact('activeClasses'));
	});

	// New Request Page
	Route::get('/newRequest', 'AdditionalController@newRequest');
	Route::post('/newRequest', 'AdditionalController@store');

	// Article
	Route::get('/article', 'ArticleController@index');
	Route::post('/article', 'ArticleController@store');
	Route::get('/article/create', 'ArticleController@create');
	Route::post('/article/insert', 'ArticleController@store');
	Route::get('/article/{id}', 'ArticleController@read');
	Route::get('/article/{id}/edit', 'ArticleController@edit');
	Route::post('/article/{id}/update', 'ArticleController@update');
	
		// Route::resource('article', 'ArticleController');

	//Form Request
	Route::get('/formH2H', function () {return view('form.H2H');});
	Route::get('/formLAN', function () {return view('form.LAN');});
	Route::get('/formOpenPort', function () {return view('form.openPort');});
	Route::get('/formASDelivery', function () {return view('form.ASDelivery');});
	Route::get('/formDeviceConnection', function () {return view('form.DeviceConnection');});

	//RESOURCES FOR CRUD
	Route::resource('profile', 'ProfileController');
	Route::resource('article', 'ArticleController');

	//IB
	Route::get('IB/H2H', 'IBController@H2H');
	Route::get('IB/openport', 'IBController@openport');
	Route::get('IB/ASDelivery', 'IBController@ASDelivery');
	Route::get('IB/deviceConnection', 'IBController@deviceConnection');

	Route::get('IB/H2H/{id}', 'IBController@showH2H');
	Route::get('IB/openport/{id}', 'IBController@showOpenport');
	Route::get('IB/ASDelivery/{id}', 'IBController@showASDelivery');
	Route::get('IB/deviceConnection/{id}', 'IBController@showDeviceConnection');

	Route::get('IB/openport/{id}/edit', 'IBController@editOpenport');
	Route::post('IB/openport/{id}/edit', 'AdditionalController@updateService');
	Route::get('IB/ASDelivery/{id}/edit', 'IBController@editASDelivery');
	Route::post('IB/ASDelivery/{id}/edit', 'AdditionalController@updateService');
	Route::get('IB/deviceConnection/{id}/edit', 'IBController@editDeviceConnection');
	Route::post('IB/deviceConnection/{id}/edit', 'AdditionalController@updateService');




	Route::resource('IB', 'IBController');

	//SF
	Route::get('SF/H2H', 'SFController@H2H');
	Route::get('SF/openport', 'SFController@openport');
	Route::get('SF/ASDelivery', 'SFController@ASDelivery');
	Route::get('SF/remoteAccess', 'SFController@remoteAccess');
	Route::get('netsec/remoteAccess', 'netsecController@remoteAccess');
	Route::get('SF/deviceConnection', 'SFController@deviceConnection');


	Route::get('SF/H2H/{id}', 'SFController@showH2H');
	Route::get('SF/openport/{id}', 'SFController@showOpenport');
	Route::get('SF/ASDelivery/{id}', 'SFController@showASDelivery');
	Route::get('SF/remoteAccess/{id}', 'SFController@showRemoteAccess');
	Route::get('netsec/remoteAccess/{id}', 'netsecController@showRemoteAccess');
	Route::get('SF/deviceConnection/{id}', 'SFController@showDeviceconnection');

	Route::get('SF/H2H/{id}/edit', 'SFController@editH2H');
	Route::post('SF/H2H/{id}/edit', 'AdditionalController@updateService');
	Route::get('SF/openport/{id}/edit', 'SFController@editOpenport');
	Route::post('SF/openport/{id}/edit', 'AdditionalController@updateService');
	Route::get('SF/ASDelivery/{id}/edit', 'SFController@editASDelivery');
	Route::post('SF/ASDelivery/{id}/edit', 'AdditionalController@updateService');
	Route::get('SF/deviceConnection/{id}/edit', 'SFController@editDeviceConnection');
	Route::post('SF/deviceConnection/{id}/edit', 'AdditionalController@updateService');

	Route::resource('SF', 'SFController');

	//TP
	Route::get('TP/H2H', 'TPController@H2H');
	Route::get('TP/openport', 'TPController@openport');
	Route::get('TP/ASDelivery', 'TPController@ASDelivery');
	Route::get('TP/deviceConnection', 'TPController@deviceConnection');

	Route::get('TP/H2H/{id}', 'TPController@showH2H');
	Route::get('TP/openport/{id}', 'TPController@showOpenport');
	Route::get('TP/ASDelivery/{id}', 'TPController@showASDelivery');
	Route::get('TP/deviceConnection/{id}', 'TPController@showDeviceConnection');

	Route::get('TP/H2H/{id}/edit', 'TPController@editH2H');
	Route::post('TP/H2H/{id}/edit', 'AdditionalController@updateService');
	Route::get('TP/openport/{id}/edit', 'TPController@editOpenport');
	Route::post('TP/openport/{id}/edit', 'AdditionalController@updateService');
	Route::get('TP/deviceConnection/{id}/edit', 'TPController@editDeviceConnection');
	Route::post('TP/deviceConnection/{id}/edit', 'AdditionalController@updateService');

	Route::resource('TP', 'TPController');

	//MyRequests
	Route::get('myRequests/', 'MyRequestsController@index');
	Route::get('myRequests/H2H/{id}', 'MyRequestsController@showH2H');
	Route::get('myRequests/LAN/{id}', 'MyRequestsController@showLAN');
	Route::get('myRequests/openport/{id}', 'MyRequestsController@showOpenport');
	Route::get('myRequests/ASDelivery/{id}', 'MyRequestsController@showASDelivery');
	Route::get('myRequests/deviceConnection/{id}', 'MyRequestsController@showDeviceConnection');
	Route::get('myRequests/remoteAccess/{id}', 'MyRequestsController@showRA');

	// Editing My Request
	Route::get('myRequests/openport/{id}/edit', 'MyRequestsController@editOpenport');
	Route::post('myRequests/openport/{id}/edit', 'AdditionalController@updateService');
	Route::get('myRequests/remoteAccess/{id}/edit', 'MyRequestsController@editRemoteAccess');
	Route::post('myRequests/remoteAccess/{id}/edit', 'AdditionalController@updateService');
	Route::get('myRequests/LAN/{id}/edit', 'MyRequestsController@editLAN');
	Route::post('myRequests/LAN/{id}/edit', 'AdditionalController@updateService');
	Route::get('myRequests/H2H/{id}/edit', 'MyRequestsController@editH2H');
	Route::post('myRequests/H2H/{id}/edit', 'AdditionalController@updateService');
	Route::get('myRequests/ASDelivery/{id}/edit', 'MyRequestsController@editASDelivery');
	Route::post('myRequests/ASDelivery/{id}/edit', 'AdditionalController@updateService');
	Route::get('myRequests/deviceConnection/{id}/edit', 'MyRequestsController@editDeviceConnection');
	Route::post('myRequests/deviceConnection/{id}/edit', 'AdditionalController@updateService');

	//LAN
	Route::get('LAN/LAN', 'LANController@LAN');
	Route::get('LAN/openport', 'LANController@openport');
	Route::get('LAN/deviceConnection', 'LANController@deviceConnection');

	Route::get('LAN/LAN/{id}', 'LANController@showLAN');
	Route::get('LAN/openport/{id}', 'LANController@showOpenport');
	Route::get('LAN/deviceConnection/{id}', 'LANController@showDeviceConnection');

	Route::get('LAN/openport/{id}/edit', 'LANController@editOpenport');
	Route::post('LAN/openport/{id}/edit', 'AdditionalController@updateService');
	Route::get('LAN/LAN/{id}/edit', 'LANController@editLAN');
	Route::post('LAN/LAN/{id}/edit', 'AdditionalController@updateService');
	Route::get('LAN/deviceConnection/{id}/edit', 'LANController@editDeviceConnection');
	Route::post('LAN/deviceConnection/{id}/edit', 'AdditionalController@updateService');

	Route::resource('LAN', 'LANController');

	//Network Security
	Route::get('netsec/LAN', 'netsecController@LAN');
	Route::get('netsec/openport', 'netsecController@openport');
	Route::get('netsec/remoteAccess', 'netsecController@remoteAccess');

	Route::get('netsec/LAN/{id}', 'netsecController@showLAN');
	Route::get('netsec/LAN/{id}/edit', 'netsecController@editLAN');
	Route::post('netsec/LAN/{id}/edit', 'AdditionalController@updateService');
	Route::get('netsec/openport/{id}', 'netsecController@showOpenport');
	Route::get('netsec/remoteAccess/{id}', 'netsecController@showRemoteAccess');
	Route::get('netsec/remoteAccess/{id}/edit', 'netsecController@editRemoteAccess');
	Route::post('netsec/remoteAccess/{id}/edit', 'AdditionalController@updateService');

	Route::resource('netsec', 'NetsecController');


	// Finishing Task
	Route::post('h2h/finishTask/{id}', 'TaskController@finishH2H');
	Route::post('lan/finishTask/{id}', 'TaskController@finishLAN');
	Route::post('openport/finishTask/{id}', 'TaskController@finishOpenport');
	Route::post('remoteAccess/finishTask/{id}', 'TaskController@finishRemoteAccess');
	Route::post('deviceconnection/finishTask/{id}', 'TaskController@finishDeviceConnection');
	Route::post('asdelivery/loadbalancer/finishTask/{id}', 'TaskController@finishLoadBalancer');
	Route::post('asdelivery/waf/finishTask/{id}', 'TaskController@finishWebApplicationFirewall');
	Route::post('asdelivery/aa/finishTask/{id}', 'TaskController@finishApplicationAcceleration');
	Route::post('asdelivery/madc/finishTask/{id}', 'TaskController@finishMADC');

	// Taking Task
	Route::post('IB/openport/{id}/take', 'TaskController@takeOpenport');	
	Route::post('IB/deviceConnection/{id}/take', 'TaskController@takeDeviceConnection');
	Route::post('IB/ASDelivery/{id}/take', 'TaskController@takeASDelivery');
	Route::post('SF/remoteAccess/{id}/take', 'TaskController@takeRemoteAccess');
	Route::post('SF/H2H/{id}/take', 'TaskController@takeH2h');
	Route::post('SF/openport/{id}/take', 'TaskController@takeOpenport');
	Route::post('SF/deviceConnection/{id}/take', 'TaskController@takeDeviceConnection');
	Route::post('SF/ASDelivery/{id}/take', 'TaskController@takeASDelivery');
	Route::post('TP/H2H/{id}/take', 'TaskController@takeH2h');
	Route::post('TP/openport/{id}/take', 'TaskController@takeOpenport');
	Route::post('TP/deviceConnection/{id}/take', 'TaskController@takeDeviceConnection');
	Route::post('LAN/LAN/{id}/take', 'TaskController@takeLan');
	Route::post('LAN/openport/{id}/take', 'TaskController@takeOpenport');
	Route::post('LAN/deviceConnection/{id}/take', 'TaskController@takeDeviceConnection');
	Route::post('netsec/LAN/{id}/take', 'TaskController@takeLan');
	Route::post('netsec/remoteAccess/{id}/take', 'TaskController@takeRemoteAccess');


	Route::get('report', 'ReportController@index');
	Route::get('report/openport', 'ReportController@openPort');
	Route::get('report/deviceconnection', 'ReportController@deviceconnection');
	Route::get('report/h2hconnection', 'ReportController@h2hConnection');
	Route::get('report/lanconnection', 'ReportController@lanConnection');
	Route::get('report/remoteaccess', 'ReportController@remoteAccess');
	Route::get('report/IB', 'ReportController@IB');
	Route::get('report/SF', 'ReportController@SF');
	Route::get('report/TP', 'ReportController@TP');
	Route::get('report/LAN', 'ReportController@LAN');
	Route::get('report/NS', 'ReportController@NS');



});

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
