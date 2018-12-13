<?php

namespace App\Http\Controllers;

use App\AdditionalHelper;
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

    public function takeOpenport($id)
    {
        try{
            $date = AdditionalHelper::addWorkingDays(date('Y-m-j'));
            $time = date('H:i:s');
            $expectedFinishDate = $date.' '.$time;
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
            $date = AdditionalHelper::addWorkingDays(date('Y-m-j'));
            $time = date('H:i:s');
            $expectedFinishDate = $date.' '.$time;
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
            $date = AdditionalHelper::addWorkingDays(date('Y-m-j'));
            $time = date('H:i:s');
            $expectedFinishDate = $date.' '.$time;
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
            $date = AdditionalHelper::addWorkingDays(date('Y-m-j'));
            $time = date('H:i:s');
            $expectedFinishDate = $date.' '.$time;
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
            $date = AdditionalHelper::addWorkingDays(date('Y-m-j'));
            $time = date('H:i:s');
            $expectedFinishDate = $date.' '.$time;
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
            $date = AdditionalHelper::addWorkingDays(date('Y-m-j'));
            $time = date('H:i:s');
            $expectedFinishDate = $date.' '.$time;
            Form_Permohonan_Koneksi_Lan::where('service_id', '=', $id)->update(['pic' => Auth::user()->name,
                'start_date'=>date('Y-m-d H:i:s'),'expected_finish_date'=>$expectedFinishDate]);
            echo "";    
        }catch(Exception $e){
            echo "Error in when updating data.";
        }
    }

}
