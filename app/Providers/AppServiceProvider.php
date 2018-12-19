<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $openPortRequests = DB::table('form_open_ports')
            ->join('services', 'form_open_ports.service_id','=','services.id')
            ->selectRaw('form_open_ports.id, services.category')
            ->where('pic', '=','-')
            ->get();
        $deviceConnectionRequests =  DB::table('form_koneksi_device_ke_jaringans')
            ->join('services', 'form_koneksi_device_ke_jaringans.service_id','=','services.id')
            ->selectRaw('form_koneksi_device_ke_jaringans.id, services.category')
            ->where('pic', '=','-')
            ->get();
        $ASDeliveryRequests = DB::table('aplication_service_deliveries')
            ->join('services', 'aplication_service_deliveries.service_id','=','services.id')
            ->selectRaw('aplication_service_deliveries.id, services.category')
            ->where('pic', '=','-')
            ->get();
        $H2HRequests = DB::table('form_host_to_hosts')
            ->join('services', 'form_host_to_hosts.service_id','=','services.id')
            ->selectRaw('form_host_to_hosts.id, services.category')
            ->where('pic', '=','-')
            ->get();
       $LANRequests = DB::table('form_permohonan_koneksi_lans')
            ->join('services', 'form_permohonan_koneksi_lans.service_id','=','services.id')
            ->selectRaw('form_permohonan_koneksi_lans.id, services.category')
            ->where('pic', '=','-')
            ->get();
        $remoteAccessRequests = DB::table('form_pendaftaran_remote_accesses')
            ->join('services', 'form_pendaftaran_remote_accesses.service_id','=','services.id')
            ->selectRaw('form_pendaftaran_remote_accesses.id, services.category')
            ->where('pic', '=','-')
            ->get();

        //IB
        $openPortIBCount = $openPortRequests
            ->where('category','=',1)
            ->count();
        $deviceConnectionIBCount = $deviceConnectionRequests
            ->where('category','=',1)
            ->count();
        $ASDeliveryIBCount = $ASDeliveryRequests
            ->where('category','=',1)
            ->count();

        //SF
        $openPortSFCount = $openPortRequests
            ->where('category','=',2)
            ->count();
        $deviceConnectionSFCount = $deviceConnectionRequests
            ->where('category','=',2)
            ->count();
        $ASDeliverySFCount = $ASDeliveryRequests
            ->where('category','=',2)
            ->count();
        $H2HSFCount = $H2HRequests
            ->where('category','=',2)
            ->count();
        $remoteAccessSFCount = $remoteAccessRequests
            ->where('category','=',2)
            ->count();

        //H2H
        $H2HCount = $H2HRequests
            ->where('category','=',3)
            ->count();
        $openPortH2HCount = $openPortRequests
            ->where('category','=',3)
            ->count();
        $deviceConnectionH2HCount = $deviceConnectionRequests
            ->where('category','=',3)
            ->count();

        //ROL
        $lanROLCount = $LANRequests
            ->where('category','=',4)
            ->count();
        $openPortROLCount = $openPortRequests
            ->where('category','=',4)
            ->count();
        $deviceConnectionROLCount = $deviceConnectionRequests
            ->where('category','=',4)
            ->count();

        //netSec
        $lanNetSecCount = $LANRequests
            ->where('category','=',5)
            ->count();
        $remoteAccessNetSecCount = $remoteAccessRequests
            ->where('category','=',5)
            ->count();


        View::share('openPortIBCount',$openPortIBCount);
        View::share('deviceConnectionIBCount', $deviceConnectionIBCount);
        View::share('ASDeliveryIBCount', $ASDeliveryIBCount);

        View::share('openPortSFCount',$openPortSFCount);
        View::share('deviceConnectionSFCount',$deviceConnectionSFCount);
        View::share('ASDeliverySFCount', $ASDeliverySFCount);
        View::share('H2HSFCount', $H2HSFCount);
        View::share('remoteAccessSFCount', $remoteAccessSFCount);

        View::share('H2HCount', $H2HCount);
        View::share('openPortH2HCount', $openPortH2HCount);
        View::share('deviceConnectionH2HCount', $deviceConnectionH2HCount);

        View::share('lanROLCount', $lanROLCount);
        View::share('openPortROLCount', $openPortROLCount);
        View::share('deviceConnectionROLCount', $deviceConnectionROLCount);

        View::share('lanNetSecCount', $lanNetSecCount);
        View::share('remoteAccessNetSecCount', $remoteAccessNetSecCount);

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
