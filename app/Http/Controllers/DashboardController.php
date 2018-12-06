<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Adldap\AdldapInterface;
use App\AdditionalHelper;
use App\Service;
use App\Article;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    protected $ldap;
    
    public function __construct(AdldapInterface $ldap)
    {

    }

    public function index(){
        if (Auth::user()->name == "guest") {
            return redirect("myRequests");
        }
    	$activeClasses = ['dashboard_active'];
        $flotData = array();
        $flotData = AdditionalHelper::get7DaysRequests();
        $articleList = Article::orderBy('created_at', 'DESC')->limit(5)->get();
    	$topRequester = DB::table('services')
    							->selectRaw('requester_name, count(*) as count')
    							->groupBy('requester_name')
    							->orderBy('count', 'DESC')
    							->limit(5)
    							->get();
		$totalRequest = DB::table('services')
    							->selectRaw('category, count(*) as count')
    							->groupBy('category')
    							->orderBy("category")
    							->get();
    	$openPortWorker = DB::table('form_open_ports')
    							->selectRaw('pic, count(*) as count')
    							->groupBy('pic')
    							->get();
		$deviceConnectionWorker = DB::table('form_koneksi_device_ke_jaringans')
                                ->selectRaw('pic, count(*) as count')
                                ->groupBy('pic')
                                ->get();
		$ASDeliveryWorker = DB::table('aplication_service_deliveries')
    							->selectRaw('pic, count(*) as count')
    							->groupBy('pic')
    							->get();
    	$H2HWorker = DB::table('form_host_to_hosts')
    							->selectRaw('pic, count(*) as count')
    							->groupBy('pic')
    							->get();
    	$LANWorker = DB::table('form_permohonan_koneksi_lans')
    							->selectRaw('pic, count(*) as count')
    							->groupBy('pic')
    							->get();
    	$remoteAccessWorker = DB::table('form_pendaftaran_remote_accesses')
    							->selectRaw('pic, count(*) as count')
    							->groupBy('pic')
    							->get();
    							
		$topWorker = $openPortWorker->merge($deviceConnectionWorker)
									->merge($ASDeliveryWorker)
									->merge($H2HWorker)
									->merge($LANWorker)
									->merge($remoteAccessWorker);
		
		$tempArr = array(); 

		for ($i=0; $i < sizeof($topWorker); $i++) { 
			if( !array_key_exists( $topWorker[$i]->pic, $tempArr ) ){
				$tempArr[ $topWorker[$i]->pic ] = (int)$topWorker[$i]->count;
			}else{
				$tempArr[ $topWorker[$i]->pic ] = (int)$tempArr[ $topWorker[$i]->pic ] + (int)$topWorker[$i]->count;
			}
		}
		arsort($tempArr);
		$tempArr = array_slice($tempArr, 0, 5);
		return view('dashboard.index', compact('activeClasses', 'topRequester'
            , 'totalRequest', 'tempArr', 'articleList', 'flotData'));
    }

    public function LDAP(){
        $users = $this->ldap->search()->users()->get();
       
        return "";
    }
}
