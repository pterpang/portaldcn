<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Form_Koneksi_Device_ke_Jaringan;
use App\Application_Service_Delivery;
use App\Form_Host_to_Host;
USE App\AdditionalHelper;
use App\Form_Open_Port;
use App\Category;
use App\Service;

class LANController extends Controller
{
    public function index()
    {
        $serviceList = Category::find(4)->service;
        $activeClasses = ['lan_active', 'lan_requestlist_active'];
        foreach ($serviceList as $row) {
            $row->parentProgress = AdditionalHelper::getParentProgress($row->id);
        }
        return view('services.requestList', compact('activeClasses', 'serviceList'));
    }

	
	//////////////////////////////////////////////////
	//Services Section								//
	//////////////////////////////////////////////////
	
	public function openport()
    {
		$serviceList= Service::with('Form_Open_Port')->where('category', 4) ->get(); 
        $activeClasses = ['lan_active', 'lan_services_active', 'lan_openport_active'];
        $category = "openPort";
        return view('services.serviceList', compact('activeClasses', 'serviceList', 'category'));
    }
	
	public function showOpenport($id)
    {
		 $serviceDetail = Service::with('Form_Pendaftaran_Remote_Access')->find($id);
        $activeClasses = ['lan_active', 'lan_services_active', 'lan_openport_active'];
        $parentProgress = AdditionalHelper::getParentProgress($id);
        $otherService = AdditionalHelper::getOtherServiceById($id);
        return view('services.openport.table', compact('activeClasses', 'serviceDetail', 'parentProgress', 'otherService'));
    }
	
    public function editOpenport($id)
    {
        $serviceDetail = Service::with('Form_Open_Port')->find($id);
        $activeClasses = ['lan_active', 'lan_services_active', 'lan_openport_active'];
        $parentProgress = AdditionalHelper::getParentProgress($id);
        $otherService = AdditionalHelper::getOtherServiceById($id);
        return view('edit.openport.table', compact('activeClasses', 'serviceDetail', 'parentProgress', 'otherService'));
    }

	public function deviceConnection()
    {
        $serviceList= Service::with('Form_Koneksi_Device_ke_Jaringan')->where('category', 4) ->get(); 
        $activeClasses = ['lan_active', 'lan_services_active', 'lan_deviceconnection_active'];
        $category = "deviceConnection";
        return view('services.serviceList', compact('activeClasses', 'serviceList', 'category'));
    }
	
	public function showDeviceConnection($id)
    {
         $serviceDetail = Service::with('Form_Pendaftaran_Remote_Access')->find($id);
        $activeClasses = ['lan_active', 'lan_services_active', 'lan_deviceconnection_active'];
        $parentProgress = AdditionalHelper::getParentProgress($id);
        $otherService = AdditionalHelper::getOtherServiceById($id);
        return view('services.deviceconnection.table', compact('activeClasses', 'serviceDetail', 'parentProgress', 'otherService'));
    }

    public function editDeviceConnection($id)
    {
        $serviceDetail = Service::with('form_koneksi_device_ke_jaringan')->find($id);
        $activeClasses = ['lan_active', 'lan_services_active', 'lan_deviceconnection_active'];
        $parentProgress = AdditionalHelper::getParentProgress($id);
        $otherService = AdditionalHelper::getOtherServiceById($id);
        return view('edit.deviceConnection.table', compact('activeClasses', 'serviceDetail', 'parentProgress', 'otherService'));
    }
	
	
	public function LAN()
    {
        $serviceList= Service::with('Form_Permohonan_Koneksi_Lan')->where('category', 4) ->get(); 
        $activeClasses = ['lan_active', 'lan_services_active', 'lan_LAN_active'];
        $category = "LAN";
        return view('services.serviceList', compact('activeClasses', 'serviceList', 'category'));
    }
	
	public function showLAN($id)
    {
        $serviceDetail = Service::with('Form_Permohonan_Koneksi_Lan')->find($id);
        $activeClasses = ['lan_active', 'lan_services_active', 'lan_LAN_active'];
        $parentProgress = AdditionalHelper::getParentProgress($id);
        $otherService = AdditionalHelper::getOtherServiceById($id);
        return view('services.lan.table', compact('activeClasses', 'serviceDetail', 'parentProgress', 'otherService'));
    }

    public function editLAN($id)
    {
        $serviceDetail = Service::with('Form_Permohonan_Koneksi_Lan')->find($id);
        $activeClasses = ['lan_active', 'lan_services_active', 'lan_lan_active'];
        $parentProgress = AdditionalHelper::getParentProgress($id);
        $otherService = AdditionalHelper::getOtherServiceById($id);
        return view('edit.lan.table', compact('activeClasses', 'serviceDetail', 'parentProgress', 'otherService'));
    }
    

    public function remoteAccess()
    {
        $serviceList= Service::with('Form_Pendaftaran_Remote_Access')->where('category', 2) ->get(); 
        $activeClasses = ['lan_active', 'lan_services_active', 'lan_remoteAccess_active'];
        $category = "remoteAccess";
        return view('services.serviceList', compact('activeClasses', 'serviceList', 'category'));
    }
    
    public function showRemoteAccess($id)
    {
        $serviceDetail = Service::with('Form_Pendaftaran_Remote_Access')->find($id);
        $activeClasses = ['lan_active', 'lan_services_active', 'lan_remoteAccess_active'];
        $parentProgress = AdditionalHelper::getParentProgress($id);
        $otherService = AdditionalHelper::getOtherServiceById($id);
        return view('services.remoteaccess.table', compact('activeClasses', 'serviceDetail', 'parentProgress', 'otherService'));
    }
    
}
