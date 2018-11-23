<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Form_Open_Port;
use App\Service;
use App\AdditionalHelper;
use DB;

class ReportController extends Controller
{
    private function makeQuery($table){
        return DB::select("
                            SELECT svc.id AS id,
                                svc.requester_name AS requester_name,
                                svc.no_remedy AS no_remedy,
                                svc.project_name AS project_name,
                                svc.created_at AS created_at,
                                (CASE WHEN(SELECT COUNT(*)
                                FROM $table
                                WHERE service_id = svc.id AND finish_date IS NOT NULL) > 0
                                    THEN 'DONE'
                                    ELSE 'ON PROGRESS'
                                    END) AS status
                            FROM services svc
                            WHERE (SELECT COUNT(*) FROM $table WHERE service_id = svc.id) > 0
                        ");
    }

    public function index()
    {
        $activeClasses = ['report_active'];
        return view('report.index', compact('activeClasses'));
    }

    public function openPort(){
    	$activeClasses = ['report_active', 'oprep_active'];
        $category = "Open Port";
    	$serviceList = $this->makeQuery('form_open_ports');
        $metaData = array();
        $metaData['count'] = sizeof($serviceList);
        $metaData['average'] = number_format((float)($metaData['count'] / getdate()["mday"]), 2, '.', '');
        return view('report.list', compact('activeClasses', 'serviceList', 'category', 'metaData'));
    }

    public function deviceConnection(){
    	$activeClasses = ['report_active', 'dcrep_active'];
        $category = "Device Connection";
    	$serviceList = $this->makeQuery('form_koneksi_device_ke_jaringans');
        $metaData = array();
        $metaData['count'] = sizeof($serviceList);
        $metaData['average'] = number_format((float)($metaData['count'] / getdate()["mday"]), 2, '.', '');
        return view('report.list', compact('activeClasses', 'serviceList', 'category', 'metaData'));
    }

    public function H2HConnection(){
    	$activeClasses = ['report_active', 'h2hrep_active'];
        $category = "H2H Conenction";
    	$serviceList = $this->makeQuery('form_host_to_hosts');
        $metaData = array();
        $metaData['count'] = sizeof($serviceList);
        $metaData['average'] = number_format((float)($metaData['count'] / getdate()["mday"]), 2, '.', '');
        return view('report.list', compact('activeClasses', 'serviceList', 'category', 'metaData'));
    }

    public function LANConnection(){
    	$activeClasses = ['report_active', 'lanrep_active'];
        $category = "LAN Connection";
    	$serviceList = $this->makeQuery('form_permohonan_koneksi_lans');
        $metaData = array();
        $metaData['count'] = sizeof($serviceList);
        $metaData['average'] = number_format((float)($metaData['count'] / getdate()["mday"]), 2, '.', '');
        return view('report.list', compact('activeClasses', 'serviceList', 'category', 'metaData'));
    }

	public function remoteAccess(){
    	$activeClasses = ['report_active', 'lanrep_active'];
        $category = "Remote Access";
    	$serviceList = $this->makeQuery('form_pendaftaran_remote_accesses');
        $metaData = array();
        $metaData['count'] = sizeof($serviceList);
        $metaData['average'] = number_format((float)($metaData['count'] / getdate()["mday"]), 2, '.', '');
        return view('report.list', compact('activeClasses', 'serviceList', 'category', 'metaData'));
    }

    public function IB(){
        $activeClasses = ['report_active', 'lanrep_active'];
        $category = "Remote Access";
        $serviceList = Service::select("id", "requester_name", "no_remedy", "project_name", "created_at")
                                ->whereMonth("created_at", date('m'))
                                ->where("category", "1")
                                ->get();
        foreach ($serviceList as $row) {
            $row->status = AdditionalHelper::getParentProgress( $row->id ) == 100? 'DONE' : 'ON PROGRESS';
        }
        $metaData = array();
        $metaData['count'] = $serviceList->count();
        $metaData['average'] = number_format((float)($serviceList->count() / getdate()["mday"]), 2, '.', '');
       return view('report.list', compact('activeClasses', 'serviceList', 'category', 'metaData'));
    }

    public function SF(){
        $activeClasses = ['report_active', 'lanrep_active'];
        $category = "Remote Access";
        $serviceList = Service::select("id", "requester_name", "no_remedy", "project_name", "created_at")
                                ->whereMonth("created_at", date('m'))
                                ->where("category", "2")
                                ->get();
        foreach ($serviceList as $row) {
            $row->status = AdditionalHelper::getParentProgress( $row->id ) == 100? 'DONE' : 'ON PROGRESS';
        }
        $metaData = array();
        $metaData['count'] = $serviceList->count();
        $metaData['average'] = number_format((float)($serviceList->count() / getdate()["mday"]), 2, '.', '');
        return view('report.list', compact('activeClasses', 'serviceList', 'category', 'metaData'));
    }

    public function TP(){
        $activeClasses = ['report_active', 'lanrep_active'];
        $category = "Remote Access";
        $serviceList = Service::select("id", "requester_name", "no_remedy", "project_name", "created_at")
                                ->whereMonth("created_at", date('m'))
                                ->where("category", "3")
                                ->get();
        foreach ($serviceList as $row) {
            $row->status = AdditionalHelper::getParentProgress( $row->id ) == 100? 'DONE' : 'ON PROGRESS';
        }
        $metaData = array();
        $metaData['count'] = $serviceList->count();
        $metaData['average'] = number_format((float)($serviceList->count() / getdate()["mday"]), 2, '.', '');
       return view('report.list', compact('activeClasses', 'serviceList', 'category', 'metaData'));
    }

    public function LAN(){
        $activeClasses = ['report_active', 'lanrep_active'];
        $category = "Remote Access";
        $serviceList = Service::select("id", "requester_name", "no_remedy", "project_name", "created_at")
                                ->whereMonth("created_at", date('m'))
                                ->where("category", "4")
                                ->get();
        foreach ($serviceList as $row) {
            $row->status = AdditionalHelper::getParentProgress( $row->id ) == 100? 'DONE' : 'ON PROGRESS';
        }
        $metaData = array();
        $metaData['count'] = $serviceList->count();
        $metaData['average'] = number_format((float)($serviceList->count() / getdate()["mday"]), 2, '.', '');
       return view('report.list', compact('activeClasses', 'serviceList', 'category', 'metaData'));
    }

    public function NS(){
        $activeClasses = ['report_active', 'lanrep_active'];
        $category = "Remote Access";
        $serviceList = Service::select("id", "requester_name", "no_remedy", "project_name", "created_at")
                                ->whereMonth("created_at", date('m'))
                                ->where("category", "5")
                                ->get();
        foreach ($serviceList as $row) {
            $row->status = AdditionalHelper::getParentProgress( $row->id ) == 100? 'DONE' : 'ON PROGRESS';
        }
        $metaData = array();
        $metaData['count'] = $serviceList->count();
        $metaData['average'] = number_format((float)($serviceList->count() / getdate()["mday"]), 2, '.', '');
        
        return view('report.list', compact('activeClasses', 'serviceList', 'category', 'metaData'));
    }


}
