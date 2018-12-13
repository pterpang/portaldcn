<?php

namespace App;

use Faker\Provider\DateTime;
use Illuminate\Database\Eloquent\Model;

class AdditionalHelper extends Model
{
    public static function getParentProgress($id){
        $service = Service::with('Form_Open_Port')
                                ->with('Form_Host_to_Host')
                                ->with('Form_Pendaftaran_Remote_Access')
                                ->with('Form_Koneksi_Device_ke_Jaringan')
                                ->with('form_Application_Service_Delivery')
                                ->with('Form_Permohonan_Koneksi_Lan')
                                ->find($id);
        $up = 0;
        $down = 0;
        if(/*sizeof($service->Form_Open_Port) && */sizeof($service->Form_Open_Port) > 0){
            foreach ($service->Form_Open_Port as $row) {
                if(isset($row->finish_date)){
                    $up++;
                    $down++;
                }else{
                    $down++;
                }
            }
        }
        if(/*sizeof($service->Form_Koneksi_Device_ke_Jaringan) && */sizeof($service->Form_Koneksi_Device_ke_Jaringan) > 0){
            foreach ($service->Form_Koneksi_Device_ke_Jaringan as $row) {
                if(isset($row->finish_date)){
                    $up++;
                    $down++;
                }else{
                    $down++;
                }
            }
        }
        if(/*isset($service->Form_Pendaftaran_Remote_Access) && */sizeof($service->Form_Pendaftaran_Remote_Access) > 0){
            foreach ($service->Form_Pendaftaran_Remote_Access as $row) {
                if(isset($row->finish_date)){
                    $up++;
                    $down++;
                }else{
                    $down++;
                }
            }
        }
        if(/*isset($service->Form_Host_to_Host) && */sizeof($service->Form_Host_to_Host) > 0){
            foreach ($service->Form_Host_to_Host as $row) {
                if(isset($row->finish_date)){
                    $up++;
                    $down++;
                }else{
                    $down++;
                }
            }
        }
        if(/*isset($service->Form_Permohonan_Koneksi_Lan) &&*/ sizeof($service->Form_Permohonan_Koneksi_Lan) > 0){
            if(isset($service->Form_Permohonan_Koneksi_Lan[0]->finish_date)){
                $up++;
                $down++;
            }else{
                $down++;
            }
        }
        if(/*isset($service->form_Application_Service_Delivery) && */sizeof($service->form_Application_Service_Delivery) > 0){
            foreach ($service->Form_Application_Service_Delivery as $row) {
                if(sizeof($row->Form_Load_Balancer) > 0){
                    if(isset($row->Form_Load_Balancer[0]->finish_date)){
                        $up++;
                        $down++;
                    }else{
                        $down++;
                    }
                }
                if(sizeof($row->Form_Web_Application_Firewall) > 0){
                    if(isset($row->Form_Web_Application_Firewall[0]->finish_date)){
                        $up++;
                        $down++;
                    }else{
                        $down++;
                    }
                }
                if(sizeof($row->Form_Application_Acceleration) > 0){
                    if(isset($row->Form_Application_Acceleration[0]->finish_date)){
                        $up++;
                        $down++;
                    }else{
                        $down++;
                    }
                }
                if(sizeof($row->Form_Multiple_Active_Data_Center) > 0){
                    if(isset($row->Form_Multiple_Active_Data_Center[0]->finish_date)){
                        $up++;
                        $down++;
                    }else{
                        $down++;
                    }
                }
            }
        }
        return $down == 0 ? 0 : floor($up*100/$down);
    }

    public static function getOtherServiceById($id){
        $service = Service::with('Form_Open_Port')
                                ->with('Form_Host_to_Host')
                                ->with('Form_Pendaftaran_Remote_Access')
                                ->with('Form_Koneksi_Device_ke_Jaringan')
                                ->with('form_Application_Service_Delivery')
                                ->with('Form_Permohonan_Koneksi_Lan')
                                ->find($id);
        $arr = array();

        if(sizeof($service->Form_Open_Port) > 0) array_push($arr, 'op');
        if(sizeof($service->Form_Koneksi_Device_ke_Jaringan) > 0) array_push($arr, 'dc');
        if(sizeof($service->Form_Host_to_Host) > 0) array_push($arr, 'h2h');
        if(sizeof($service->Form_Permohonan_Koneksi_Lan) > 0) array_push($arr, 'lan');
        if(sizeof($service->Form_Pendaftaran_Remote_Access) > 0) array_push($arr, 'ra');
        if(isset($service->Form_Application_Service_Delivery)){
            foreach ($service->Form_Application_Service_Delivery as $row) {
                if(sizeof($row->Form_Load_Balancer) > 0)
                    array_push($arr, 'asd');
                else if (sizeof($row->Form_Web_Application_Firewall) > 0)
                    array_push($arr, 'asd');
                else if (sizeof($row->Form_Application_Acceleration) > 0)
                    array_push($arr, 'asd');
                else if (sizeof($row->Form_Multiple_Active_Data_Center) > 0)
                    array_push($arr, 'asd');                   
            }
        }
        
        return $arr;
    }

    public static function get7DaysRequests(){

        $requests = array();

        for($i=6;$i>=0;$i--){
            $row = array();
            $date = date("Y-m-d", strtotime( '-'. $i .' days' ) );
            $count = Service::whereDate('created_at', $date )->get()->count();        
            array_push($requests, $count);
        }
        return $requests;
    }

    public static function addWorkingDays($date){
        //$arrayHoliday = ["2017-12-25","2017-01-01"]; //dummy data
        //$arrayHoliday = [];
        $arrayHoliday = $array = json_decode(file_get_contents("https://raw.githubusercontent.com/guangrei/Json-Indonesia-holidays/master/calendar.json"),true);
        $count = 8;

        /*old */
        //$startDate=date('m-j', strtotime($date));
        //$endDate = date('m-j', strtotime('+ '.$count.' weekdays'));
        //foreach($arrayHoliday as $holidayDate){
        //    if($startDate<=date('m-j',strtotime($holidayDate)) && date('m-j',strtotime($holidayDate))<=$endDate
        //    && date('N', strtotime($holidayDate))!=6 && date('N', strtotime($holidayDate)!=7)){
        //        $count = $count + 1;
        //        $endDate = date('m-j', strtotime('+ '.$count.' weekdays'));
        //    }
        //}
        $startDate = date('Ymj', strtotime($date));
        $newDate = '';

        $i = 0;
        while ($i <= $count){
            if(isset($arrayHoliday[$startDate])){
                $newDate = date('Ymj', strtotime($startDate.'+ 1 weekdays'));
                $startDate = $newDate;
            }
            $newDate = date('Ymj', strtotime($startDate.'+ 1 weekdays'));
            $startDate = $newDate;
            $i++;
        }

        $endDate = date('Y-m-j', strtotime($newDate));

        return $endDate;
    }
}
