<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Form_Koneksi_Device_ke_Jaringan;
use App\AdditionalHelper;
use App\Form_Open_Port;
use App\Category;
use App\Service;

class SFController extends Controller
{

    public function index()
    {
        $serviceList = Category::find(2)->service;
        $activeClasses = ['sf_active', 'sf_requestlist_active'];
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
		$serviceList= Service::with('Form_Open_Port')->where('category', 2) ->get(); 
        $activeClasses = ['sf_active', 'sf_services_active', 'sf_openport_active'];
        $category = "openPort";
        return view('services.serviceList', compact('activeClasses', 'serviceList', 'category'));
    }
	
	public function showOpenport($id)
    {
		$serviceDetail = Service::with('Form_Open_Port')->find($id);
        $activeClasses = ['sf_active', 'sf_services_active', 'sf_openport_active'];
        $parentProgress = AdditionalHelper::getParentProgress($id);
        $otherService = AdditionalHelper::getOtherServiceById($id);
        return view('services.openport.table', compact('activeClasses', 'serviceDetail', 'parentProgress', 'otherService'));
    }

     public function editOpenport($id)
    {
        $serviceDetail = Service::with('Form_Open_Port')->find($id);
        $activeClasses = ['sf_active', 'sf_services_active', 'sf_openport_active'];
        $parentProgress = AdditionalHelper::getParentProgress($id);
        $otherService = AdditionalHelper::getOtherServiceById($id);
        return view('edit.openport.table', compact('activeClasses', 'serviceDetail', 'parentProgress', 'otherService'));
    }
	
	public function deviceConnection()
    {
        $serviceList= Service::with('Form_Koneksi_Device_ke_Jaringan')->where('category', 1) ->get(); 
        $activeClasses = ['sf_active', 'sf_services_active', 'sf_deviceconnection_active'];
        $category = "deviceConnection";
        return view('services.serviceList', compact('activeClasses', 'serviceList', 'category'));
    }
	
	public function showDeviceConnection($id)
    {
        $serviceDetail = Service::with('Form_Koneksi_Device_ke_Jaringan')->find($id);
        $activeClasses = ['sf_active', 'sf_services_active', 'sf_deviceconnection_active'];
        $parentProgress = AdditionalHelper::getParentProgress($id);
        $otherService = AdditionalHelper::getOtherServiceById($id);
        return view('services.deviceconnection.table', compact('activeClasses', 'serviceDetail', 'parentProgress', 'otherService'));
    }

    public function editDeviceConnection($id)
    {
        $serviceDetail = Service::with('form_koneksi_device_ke_jaringan')->find($id);
        $activeClasses = ['sf_active', 'sf_services_active', 'sf_deviceconnection_active'];
        $parentProgress = AdditionalHelper::getParentProgress($id);
        $otherService = AdditionalHelper::getOtherServiceById($id);
        return view('edit.deviceConnection.table', compact('activeClasses', 'serviceDetail', 'parentProgress', 'otherService'));
    }
	
	public function H2H()
    {
        $serviceList= Service::with('Form_Host_to_Host')->where('category', 2) ->get(); 
        $activeClasses = ['sf_active', 'sf_services_active', 'sf_H2H_active'];
        $category = "H2H";
        return view('services.serviceList', compact('activeClasses', 'serviceList', 'category'));
    }
	
	public function showH2H($id)
    {
        $serviceDetail = Service::with('Form_Host_to_Host')->find($id);
        $activeClasses = ['sf_active', 'sf_services_active', 'sf_H2H_active'];
        $parentProgress = AdditionalHelper::getParentProgress($id);
        $otherService = AdditionalHelper::getOtherServiceById($id);
        return view('services.h2h.table', compact('activeClasses', 'serviceDetail', 'parentProgress', 'otherService'));
    }

    public function editH2H($id)
    {
        $serviceDetail = Service::with('Form_Host_to_Host')->find($id);
        $activeClasses = ['sf_active', 'sf_services_active', 'sf_deviceconnection_active'];
        $parentProgress = AdditionalHelper::getParentProgress($id);
        $otherService = AdditionalHelper::getOtherServiceById($id);
        return view('edit.h2h.table', compact('activeClasses', 'serviceDetail', 'parentProgress', 'otherService'));
    }
    
	
	public function ASDelivery()
    {
        $serviceList= Service::with('form_Application_Service_Delivery')->where('category', 2) ->get(); 
        $activeClasses = ['sf_active', 'sf_services_active', 'sf_ASDelivery_active'];
        $category = "ASDelivery";
        return view('services.serviceList', compact('activeClasses', 'serviceList', 'category'));
    }
	
	public function showASDelivery($id)
    {
        $serviceDetail = Service::with('Form_Application_Service_Delivery')->find($id);
        $activeClasses = ['sf_active', 'sf_services_active', 'sf_ASDelivery_active'];
        $parentProgress = AdditionalHelper::getParentProgress($id);
        $otherService = AdditionalHelper::getOtherServiceById($id);
        return view('services.asdelivery.table', compact('activeClasses', 'serviceDetail', 'parentProgress', 'otherService'));
    }
	
    public function editASDelivery($id)
    {
        $serviceDetail = Service::with('Form_Application_Service_Delivery')->find($id);
        $activeClasses = ['sf_active', 'sf_services_active', 'sf_ASDelivery_active'];
        $parentProgress = AdditionalHelper::getParentProgress($id);
        $otherService = AdditionalHelper::getOtherServiceById($id);

        return view('edit.ASDelivery.table', compact('activeClasses', 'serviceDetail', 'parentProgress', 'otherService'));
    }
		
	public function remoteAccess()
    {
        $serviceList= Service::with('Form_Pendaftaran_Remote_Access')->where('category', 2) ->get(); 
        $activeClasses = ['sf_active', 'sf_services_active', 'sf_remoteAccess_active'];
        $category = "remoteAccess";
        return view('services.serviceList', compact('activeClasses', 'serviceList', 'category'));
    }
	
	public function showRemoteAccess($id)
    {
        $serviceDetail = Service::with('Form_Pendaftaran_Remote_Access')->find($id);
        $activeClasses = ['sf_active', 'sf_services_active', 'sf_remoteAccess_active'];
        $parentProgress = AdditionalHelper::getParentProgress($id);
        $otherService = AdditionalHelper::getOtherServiceById($id);
        return view('services.remoteaccess.table', compact('activeClasses', 'serviceDetail', 'parentProgress', 'otherService'));
    }
}
