<?php

namespace App\Http\Controllers;

use App\AdditionalHelper;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Form_Koneksi_Device_ke_Jaringan;
use App\Form_Pendaftaran_Remote_Access;
use App\Form_Permohonan_Koneksi_Lan;
use App\Form_Host_to_Host;
use App\Form_Open_Port;
use App\Form_Load_Balancer;
use App\Form_Multiple_Active_Data_Center;
use App\Form_Web_Application_Firewall;
use App\Form_Application_Acceleration;
use App\Aplication_Service_Delivery;

class TaskController extends Controller
{
    public function finishOpenport($id){
    	try{
	    	Form_Open_Port::find($id)->update(['finish_date' => date('Y-m-d H:i:s')]);	
	    	echo "";	
    	}catch(Exception $e){
    		echo "Error in when updating data.";
    	}
    }

    public function finishDeviceConnection($id){
    	try{
	    	Form_Koneksi_Device_ke_Jaringan::find($id)->update(['finish_date' => date('Y-m-d H:i:s')]);	
	    	echo "";	
    	}catch(Exception $e){
    		echo "Error in when updating data.";
    	}
    }

    public function finishRemoteAccess($id){
    	try{
	    	Form_Pendaftaran_Remote_Access::find($id)->update(['finish_date' => date('Y-m-d H:i:s')]);	
	    	echo "";	
    	}catch(Exception $e){
    		echo "Error in when updating data.";
    	}
    }

    public function finishH2H($id){
    	try{
	    	Form_Host_to_Host::find($id)->update(['finish_date' => date('Y-m-d H:i:s')]);	
	    	echo "";	
    	}catch(Exception $e){
    		echo "Error in when updating data.";
    	}
    }

     public function finishLAN($id){
     	try{
	    	Form_Permohonan_Koneksi_Lan::find($id)->update(['finish_date' => date('Y-m-d H:i:s')]);	
	    	echo "";	
    	}catch(Exception $e){
    		echo "Error in when updating data.";
    	}
    }

    public function finishLoadBalancer($id){
     	try{
	    	Form_Load_Balancer::find($id)->update(['finish_date' => date('Y-m-d H:i:s')]);	
	    	echo "";	
    	}catch(Exception $e){
    		echo "Error in when updating data.";
    	}
    }

     public function finishWebApplicationFirewall($id){
     	try{
	    	Form_Web_Application_Firewall::find($id)->update(['finish_date' => date('Y-m-d H:i:s')]);	
	    	echo "";	
    	}catch(Exception $e){
    		echo "Error in when updating data.";
    	}
    }

     public function finishApplicationAcceleration($id){
     	try{
	    	Form_Application_Acceleration::find($id)->update(['finish_date' => date('Y-m-d H:i:s')]);	
	    	echo "";	
    	}catch(Exception $e){
    		echo "Error in when updating data.";
    	}
    }

    public function finishMADC($id){
     	try{
	    	Form_Multiple_Active_Data_Center::find($id)->update(['finish_date' => date('Y-m-d H:i:s')]);	
	    	echo "";	
    	}catch(Exception $e){
    		echo "Error in when updating data.";
    	}
    }

    public static function finishASDelivery($id){
        try{
            Aplication_Service_Delivery::find($id)->update(['finish_date' => date('Y-m-d H:i:s')]);
            echo "";
        }catch(Exception $e){
            echo "Error in when updating data.";
        }
    }

    public function takeOpenport($id)
    {
        try{
            $expectedFinishDate = AdditionalHelper::addWorkingDays(date('Y-m-d'));
            //$time = date('H:i:s');
            //$expectedFinishDate = $date.' '.$time;
            Form_Open_Port::where('service_id', '=', $id)->update(['pic' => Auth::user()->name,
                'start_date'=>date('Y-m-d H:i:s'),'expected_finish_date'=>$expectedFinishDate]);
            echo "";    
        }catch(Exception $e){
            echo "Error in when updating data.";
        }
    }

    public function takeDeviceConnection($id)
    {
        try{
            $expectedFinishDate = AdditionalHelper::addWorkingDays(date('Y-m-j'));
            //$time = date('H:i:s');
            //$expectedFinishDate = $date.' '.$time;
            Form_Koneksi_Device_ke_Jaringan::where('service_id', '=', $id)->update(['pic' => Auth::user()->name,
                'start_date'=>date('Y-m-d H:i:s'),'expected_finish_date'=>$expectedFinishDate]);
            echo "";    
        }catch(Exception $e){
            echo "Error in when updating data.";
        }
    }
    public function takeASDelivery($id)
    {
        try{
            $expectedFinishDate = AdditionalHelper::addWorkingDays(date('Y-m-j'));
            //$time = date('H:i:s');
            //$expectedFinishDate = $date.' '.$time;
            Aplication_Service_Delivery::where('service_id', '=', $id)->update(['pic' => Auth::user()->name,
                'start_date'=>date('Y-m-d H:i:s'),'expected_finish_date'=>$expectedFinishDate]);
            echo "";    
        }catch(Exception $e){
            echo "Error in when updating data.";
        }
    }
    
    public function takeRemoteAccess($id)
    {
        try{
            $expectedFinishDate = AdditionalHelper::addWorkingDays(date('Y-m-j'));
            //$time = date('H:i:s');
            //$expectedFinishDate = $date.' '.$time;
            Form_Pendaftaran_Remote_Access::where('service_id', '=', $id)->update(['pic' => Auth::user()->name,
                'start_date'=>date('Y-m-d H:i:s'),'expected_finish_date'=>$expectedFinishDate]);
            echo "";    
        }catch(Exception $e){
            echo "Error in when updating data.";
        }
    }

    public function takeH2h($id)
    {
        try{
            $expectedFinishDate = AdditionalHelper::addWorkingDays(date('Y-m-j'));
            //$time = date('H:i:s');
            //$expectedFinishDate = $date.' '.$time;
            Form_Host_to_Host::where('service_id', '=', $id)->update(['pic' => Auth::user()->name,
                'start_date'=>date('Y-m-d H:i:s'),'expected_finish_date'=>$expectedFinishDate]);
            echo "";    
        }catch(Exception $e){
            echo "Error in when updating data.";
        }
    }

    public function takeLan($id)
    {
        try{
            $expectedFinishDate = AdditionalHelper::addWorkingDays(date('Y-m-j'));
            //$time = date('H:i:s');
            //$expectedFinishDate = $date.' '.$time;
            Form_Permohonan_Koneksi_Lan::where('service_id', '=', $id)->update(['pic' => Auth::user()->name,
                'start_date'=>date('Y-m-d H:i:s'),'expected_finish_date'=>$expectedFinishDate]);
            echo "";    
        }catch(Exception $e){
            echo "Error in when updating data.";
        }
    }

    public function deleteRequest($id)
    {
        try{
            $asdId = Aplication_Service_Delivery::select('id')->where('service_id','=',$id)->first();

            Form_Load_Balancer::where('aplication_service_deliveries_id','=',$asdId["id"])->delete();
            Form_Application_Acceleration::where('aplication_service_deliveries_id','=',$asdId["id"])->delete();
            Form_Web_Application_Firewall::where('aplication_service_deliveries_id','=',$asdId["id"])->delete();
            Form_Multiple_Active_Data_Center::where('aplication_service_deliveries_id','=',$asdId["id"])->delete();

            Form_Open_Port::where('service_id', '=', $id)->delete();
            Form_Koneksi_Device_ke_Jaringan::where('service_id', '=', $id)->delete();
            Form_Host_to_Host::where('service_id', '=', $id)->delete();
            Form_Permohonan_Koneksi_Lan::where('service_id', '=', $id)->delete();
            Form_Pendaftaran_Remote_Access::where('service_id', '=', $id)->delete();
            Aplication_Service_Delivery::where('service_id', '=', $id)->delete();

            $request = Service::find($id);
            $request->delete();

            echo "OK";
        }
        catch (Exception $e){
            echo "Error ".$e->getMessage();
        }
    }

    public function deleteOpenPort($id)
    {
        //Form_Open_Port::find($id)->delete();
        Form_Open_Port::where('service_id', '=', $id)->delete();

        echo "OK";
    }

    public function deleteDeviceConnection($id)
    {
        //Form_Koneksi_Device_ke_Jaringan::find($id)->delete();
        Form_Koneksi_Device_ke_Jaringan::where('service_id', '=', $id)->delete();

        echo "OK";
    }

    public function deleteH2H($id)
    {
        //Form_Host_to_Host::find($id)->delete();
        Form_Host_to_Host::where('service_id', '=', $id)->delete();

        echo "OK";
    }

    public function deleteLAN($id)
    {
        //Form_Permohonan_Koneksi_Lan::find($id)->delete();
        Form_Permohonan_Koneksi_Lan::where('service_id', '=', $id)->delete();

        echo "OK";
    }

    public function deleteRemoteAccess($id){
        Form_Pendaftaran_Remote_Access::where('service_id', '=', $id)->delete();

        echo "OK";
    }

    public function deleteASDelivery($id)
    {
        $asdId = Aplication_Service_Delivery::select('id')->where('service_id','=',$id)->first();
        Form_Load_Balancer::where('aplication_service_deliveries_id','=',$asdId["id"])->delete();
        Form_Application_Acceleration::where('aplication_service_deliveries_id','=',$asdId["id"])->delete();
        Form_Web_Application_Firewall::where('aplication_service_deliveries_id','=',$asdId["id"])->delete();
        Form_Multiple_Active_Data_Center::where('aplication_service_deliveries_id','=',$asdId["id"])->delete();

        Aplication_Service_Delivery::find($asdId["id"])->delete();

        echo "OK";
    }
}
