<?php

namespace App\Http\Controllers;

use Request;
use App\Form_Open_Port;
use App\Service;
use App\AdditionalHelper;
use Yajra\Datatables\Datatables;
use DB;

class ReportController extends Controller
{

    private function makeQuery2($table, $min, $max){
        return DB::select("
                             SELECT svc.id AS id,
                                svc.requester_name AS requester_name,
                                svc.no_remedy AS no_remedy,
                                svc.project_name AS project_name,
                                CAST(svc.created_at AS DATE) AS created_at,
                                ISNULL((SELECT finish_date
                                FROM $table
                                WHERE service_id = svc.id AND finish_date IS NOT NULL), NULL) AS finish_date,
                                ISNULL((SELECT pic
                                FROM $table
                                WHERE service_id = svc.id), NULL) AS pic
                            FROM services svc
                            WHERE (SELECT COUNT(*) FROM $table WHERE service_id = svc.id) > 0 AND svc.created_at >= '$min' AND svc.created_at <= '$max'
                        ");
    }


    private function getMeta($table){
        return DB::select("
                    SELECT
                      AVG(tbl.ct) AS average,
                      SUM(tbl.ct) as count
                    FROM  (
                      SELECT count(*) AS ct
                      FROM $table
                      GROUP BY created_at) tbl
                ");
    }

    function number_of_working_days($from, $to) {
        $workingDays = [1, 2, 3, 4, 5]; # date format = N (1 = Monday, ...)
        $holidayDays = ['*-12-25', '*-01-01', '2013-12-23']; # variable and fixed holidays

        $from = new \DateTime($from);
        $to = new \DateTime($to);
        $to->modify('+1 day');
        $interval = new \DateInterval('P1D');
        $periods = new \DatePeriod($from, $interval, $to);

        $days = 0;
        foreach ($periods as $period) {
            if (!in_array($period->format('N'), $workingDays)) continue;
            if (in_array($period->format('Y-m-d'), $holidayDays)) continue;
            if (in_array($period->format('*-m-d'), $holidayDays)) continue;
            $days++;
        }
        return $days-1 < 1 ? 1 : $days-1;
    }

    private function checkParameter(&$request, &$min, &$max, &$serviceList, &$metaData, $tableName){
        if( !$request->isMethod('post') ){
            $serviceList = $this->makeQuery2($tableName, date('Y-m-d', 1), date('Y-m-d', 0));   
        }else if(!isset($min) && !isset($max)){
            $_SESSION['flash_message'] = "Incomplete Date Input.";
        }else if(!isset($min) || !isset($max)){
            $_SESSION['flash_message'] = "Incomplete Date Input.";
        }else if( $min > $max ){
            $_SESSION['flash_message'] = "End Date must be greater than Start Date.";            
        }else{
            $serviceList = $this->makeQuery2($tableName, $min, $max);
            foreach ($serviceList as $row) {
                $row->diff = $row->finish_date != NULL ? $this->number_of_working_days($row->created_at, $row->finish_date) : '-';
            }
            $metaData = $this->getMeta($tableName)[0];        
        }
    }

    public function index()
    {
        $activeClasses = ['report_active'];
        return view('report.index', compact('activeClasses'));
    }

    public function openPort(){
    	$activeClasses = ['report_active', 'oprep_active'];
        $category = "Open Port";
        $request = Request::instance();
        $min = $request->post('start');
        $max = $request->post('end');
        $serviceList = null;
        $metaData = null;

        $this->checkParameter($request, $min, $max, $serviceList, $metaData, 'form_open_ports');
        return view('report.list', compact('activeClasses', 'serviceList', 'category', 'metaData'));
    }

    public function deviceConnection(){
    	$activeClasses = ['report_active', 'dcrep_active'];
        $category = "Device Connection";
        $request = Request::instance();
        $min = $request->post('start');
        $max = $request->post('end');
        $serviceList = null;
        $metaData = null;

        $this->checkParameter($request, $min, $max, $serviceList, $metaData, 'form_koneksi_device_ke_jaringans');
        return view('report.list', compact('activeClasses', 'serviceList', 'category', 'metaData'));
    }

    public function H2HConnection(){
    	$activeClasses = ['report_active', 'h2hrep_active'];
        $category = "H2H Conenction";
    	$request = Request::instance();
        $min = $request->post('start');
        $max = $request->post('end');
        $serviceList = null;
        $metaData = null;

        $this->checkParameter($request, $min, $max, $serviceList, $metaData, 'form_host_to_hosts');
        return view('report.list', compact('activeClasses', 'serviceList', 'category', 'metaData'));
    }

    public function LANConnection(){
    	$activeClasses = ['report_active', 'lanrep_active'];
        $category = "LAN Connection";
    	$request = Request::instance();
        $min = $request->post('start');
        $max = $request->post('end');
        $serviceList = null;
        $metaData = null;

        $this->checkParameter($request, $min, $max, $serviceList, $metaData, 'form_permohonan_koneksi_lans');
        return view('report.list', compact('activeClasses', 'serviceList', 'category', 'metaData'));
    }

	public function remoteAccess(){
    	$activeClasses = ['report_active', 'lanrep_active'];
        $category = "Remote Access";
    	$request = Request::instance();
        $min = $request->post('start');
        $max = $request->post('end');
        $serviceList = null;
        $metaData = null;

        $this->checkParameter($request, $min, $max, $serviceList, $metaData, 'form_pendaftaran_remote_accesses');
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
