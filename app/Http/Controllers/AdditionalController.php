<?php

namespace App\Http\Controllers;

use Request;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\Service;
use App\Form_Open_Port;
use App\Form_Host_to_Host;
use App\Form_Load_Balancer;
use App\Aplication_Service_Delivery;
use App\Form_Permohonan_Koneksi_Lan;
use App\Form_Web_Application_Firewall;
use App\Form_Application_Acceleration;
use App\Form_Pendaftaran_Remote_Access;
use App\Form_Koneksi_Device_ke_Jaringan;
use App\Form_Multiple_Active_Data_Center;

class AdditionalController extends Controller
{

    public function newRequest(){
    	$activeClasses = ['newrq_active'];
    	$categories = Category::all();
		return view('additional.newRequest', compact('activeClasses', 'categories'));
    }

    public function newArticle(){
    	$activeClasses = ['newar_active'];
    	return view('additional.newArticle', compact('activeClasses'));
    }
	
	public function store(Request $request){
		$request = Request::instance();
		try{
			$meta = json_decode($request->post('meta'), true);
			$op = json_decode($request->post('op'), true);
			$dc = json_decode($request->post('dc'), true);
			$h2h = json_decode($request->post('h2h'), true);
			$ra = json_decode($request->post('ra'), true);
			$lan = json_decode($request->post('lan'), true);
			$asd = json_decode($request->post('asd'), true);
			$lb = json_decode($request->post('lb'), true);
			$waf = json_decode($request->post('waf'), true);
			$aa = json_decode($request->post('aa'), true);
			$madc = json_decode($request->post('madc'), true);

			if(sizeof($op) == 0 && sizeof($dc) == 0 && sizeof($h2h) == 0 && sizeof($ra) == 0 && sizeof($lan) == 0 && sizeof($asd) == 0){
				echo "EMPTY";
				return;	
			}

			$metaRes = Service::create($meta);
			for($i = 0; $i < sizeof($op); $i++) {
				$op[$i]['service_id'] = $metaRes->id;
				$op[$i]['pic'] = "-";
				Form_Open_Port::create($op[$i]);
			}

			for($i = 0; $i < sizeof($dc); $i++) {
				$dc[$i]['service_id'] = $metaRes->id;
				$dc[$i]['pic'] = "-";
				Form_Koneksi_Device_ke_Jaringan::create($dc[$i]);
			}

			for($i = 0; $i < sizeof($h2h); $i++) {
				$h2h[$i]['service_id'] = $metaRes->id;
				$h2h[$i]['pic'] = "-";
				Form_Host_to_Host::create($h2h[$i]);
			}

			for($i = 0; $i < sizeof($ra); $i++) {
				$ra[$i]['service_id'] = $metaRes->id;
				$ra[$i]['pic'] = "-";
				Form_Pendaftaran_Remote_Access::create($ra[$i]);
			}

			if(isset($lan[0]) && sizeof($lan) > 0){
				$lan[0]['service_id'] = $metaRes->id;
				$lan[0]['pic'] = "-";			
				Form_Permohonan_Koneksi_Lan::create($lan[0]);
			}

			if(sizeof($asd) > 0){
				$asd['service_id'] = $metaRes->id;
				$asd['pic'] = "-";
				$asdRes = Aplication_Service_Delivery::create($asd);

				if(strpos($asd['service_aplikasi'], 'LB') !== false){
					$lb['aplication_service_deliveries_id'] = $asdRes->id;
					Form_Load_Balancer::create($lb);
				}
				if(strpos($asd['service_aplikasi'], 'WAF') !== false){
					$waf['aplication_service_deliveries_id'] = $asdRes->id;
					Form_Web_Application_Firewall::create($waf);
				}
				if(strpos($asd['service_aplikasi'], 'AA') !== false){
					$aa['aplication_service_deliveries_id'] = $asdRes->id;
					Form_Application_Acceleration::create($aa);
				}
				if(strpos($asd['service_aplikasi'], 'MADC') !== false){
					$madc['aplication_service_deliveries_id'] = $asdRes->id;
					Form_Multiple_Active_Data_Center::create($madc);
				}
										
			}

		}catch(Exception $e){
			echo "ERROR";			
		}
		echo "OK";
	}    
	
	public function updateService($id)
    {
        $request = Request::instance();
        $res = json_decode($request->post('data'), true);

        if (strpos( Request::url(), "LAN" ) !== false && strpos( Request::url(), "ASDelivery" ) !== false){
	        for ($i=0;$i<sizeof($res);$i++) {
	            foreach ($res[$i] as $key => $value) {
	                $res[$i][$key] = str_replace('<p>', '', $res[$i][$key]);
	                $res[$i][$key] = str_replace('</p>', '<br>', $res[$i][$key]);
	                $res[$i][$key] = preg_replace('#(<br */?>\s*)+#i', '<br>', $res[$i][$key]);
	                $res[$i][$key] = trim($res[$i][$key]);
	            }
	        }
        }

        foreach ($res as $row) {
            try{
                $id = $row['id'];
                unset($row['id']);
                if (strpos( Request::url(), "openport" ) !== false) {
                    Form_Open_Port::where('id', $id)->update($row);                    
                }else if (strpos( Request::url(), "deviceConnection" ) !== false){
                    Form_Koneksi_Device_Ke_Jaringan::where('id', $id)->update($row); 
                }else if (strpos( Request::url(), "H2H" ) !== false){
                    Form_Host_to_Host::where('id', $id)->update($row); 
                }else if (strpos( Request::url(), "LAN" ) !== false){
                    Form_Permohonan_Koneksi_Lan::where('id', $id)->update($row); 
                }else if (strpos( Request::url(), "remoteAccess" ) !== false){
                    Form_Pendaftaran_Remote_Access::where('id', $id)->update($row); 
                }

            }catch(Exception $e){
                echo "Error when update data.";
                return false;
            }
        }
        echo "OK";
    }

    public function sendEmail(){
    	
    }
}
