<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Form_Koneksi_Device_ke_Jaringan;
use App\AdditionalHelper;
use App\Form_Open_Port;
use App\Category;
use App\Service;

class NetsecController extends Controller
{

    public function index()
    {
        $activeClasses = ['netsec_active', 'netsec_requestlist_active'];
        $serviceList = Category::find(5)->service;
        foreach ($serviceList as $row) {
            $row->parentProgress = AdditionalHelper::getParentProgress($row->id);
        }
        return view('services.requestList', compact('activeClasses', 'serviceList'));
    }
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
	
	//////////////////////////////////////////////////
	//Services Section								//
	//////////////////////////////////////////////////
	
	public function openport()
    {
		$serviceList= Service::with('Form_Open_Port')->where('category', 5) ->get(); 
        $activeClasses = ['netsec_active', 'netsec_services_active', 'netsec_openport_active'];
        $category = "openport";
        return view('services.serviceList', compact('activeClasses', 'serviceList', 'category'));
    }
	
	public function showOpenport($id)
    {
		$serviceDetail = Service::with('Form_Open_Port')->find($id);
        $activeClasses = ['netsec_active', 'netsec_services_active', 'netsec_openport_active'];
        $parentProgress = AdditionalHelper::getParentProgress($id);
        $otherService = AdditionalHelper::getOtherServiceById($id);
        return view('services.openport.table', compact('activeClasses', 'serviceDetail', 'parentProgress', 'otherService'));
    }
	
	public function LAN()
    {
         $serviceList= Service::with('Form_Permohonan_Koneksi_Lan')->where('category', 5) ->get(); 
        $activeClasses = ['netsec_active', 'netsec_services_active', 'netsec_LAN_active'];
        $category = "LAN";
        return view('services.serviceList', compact('activeClasses', 'serviceList', 'category'));
    }
	
	public function showLAN($id)
    {
        $serviceDetail = Service::with('Form_Permohonan_Koneksi_Lan')->find($id);
        $activeClasses = ['netsec_active', 'netsec_services_active', 'netsec_LAN_active'];
        $parentProgress = AdditionalHelper::getParentProgress($id);
        $otherService = AdditionalHelper::getOtherServiceById($id);
        return view('services.LAN.table', compact('activeClasses', 'serviceDetail', 'parentProgress', 'otherService'));
    }
	
	
	public function remoteAccess()
    {
        $serviceList= Service::with('Form_Pendaftaran_Remote_Access')->where('category', 5) ->get(); 
        $activeClasses = ['netsec_active', 'netsec_services_active', 'netsec_remoteAccess_active'];
        $category = "remoteAccess";
        return view('services.serviceList', compact('activeClasses', 'serviceList', 'category'));
    }
	
	public function showRemoteAccess($id)
    {
        $serviceDetail = Service::with('Form_Pendaftaran_Remote_Access')->find($id);
        $activeClasses = ['netsec_active', 'netsec_services_active', 'netsec_remoteAccess_active'];
        $parentProgress = AdditionalHelper::getParentProgress($id);
        $otherService = AdditionalHelper::getOtherServiceById($id);
        return view('services.remoteAccess.table', compact('activeClasses', 'serviceDetail', 'parentProgress', 'otherService'));
    }

    public function editRemoteAccess($id)
    {
        $serviceDetail = Service::with('Form_Pendaftaran_Remote_Access')->find($id);
        $activeClasses = ['netsec_active', 'netsec_services_active', 'netsec_remoteAccess_active'];
        $parentProgress = AdditionalHelper::getParentProgress($id);
        $otherService = AdditionalHelper::getOtherServiceById($id);
        return view('edit.remoteaccess.table', compact('activeClasses', 'serviceDetail', 'parentProgress', 'otherService'));
    }

    public function editLAN($id)
    {
        $serviceDetail = Service::with('Form_Permohonan_Koneksi_Lan')->find($id);
        $activeClasses = ['netsec_active', 'netsec_services_active', 'netsec_LAN_active'];
        $parentProgress = AdditionalHelper::getParentProgress($id);
        $otherService = AdditionalHelper::getOtherServiceById($id);
        return view('edit.lan.table', compact('activeClasses', 'serviceDetail', 'parentProgress', 'otherService'));
    }
}
