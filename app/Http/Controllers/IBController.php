<?php

namespace App\Http\Controllers;

use Request;
use Illuminate\Support\Facades\Auth;
use App\AdditionalHelper;
use App\Form_Open_Port;
use App\Form_Koneksi_Device_Ke_Jaringan;
use App\Category;
use App\Service;

class IBController extends Controller
{
    
    public function index()
    {
		$activeClasses = ['ib_active', 'ib_requestlist_active'];
        $serviceList = Category::find(1)->service;
        $ii=0;
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
        $serviceList = Service::with('Form_Open_Port')->where('category', 1)->orderBy('created_at', 'desc')->get(); 
        $activeClasses = ['ib_active', 'ib_services_active', 'ib_openport_active'];
        $category = "openPort";
        // dd($serviceList);
        return view('services.serviceList', compact('activeClasses', 'serviceList', 'category'));
    }
	
	public function showOpenport($id)
    {
        // dd($id);
        $serviceDetail = Service::with('Form_Open_Port')->find($id);
        // dd($serviceDetail);
        $activeClasses = ['ib_active', 'ib_services_active', 'ib_openport_active'];
        $parentProgress = AdditionalHelper::getParentProgress($id);
        $otherService = AdditionalHelper::getOtherServiceById($id);
        return view('services.openport.table', compact('activeClasses', 'serviceDetail', 'parentProgress', 'otherService'));
    }

    public function editOpenport($id)
    {
        $serviceDetail = Service::with('Form_Open_Port')->find($id);
        $activeClasses = ['ib_active', 'ib_services_active', 'ib_openport_active'];
        $parentProgress = AdditionalHelper::getParentProgress($id);
        $otherService = AdditionalHelper::getOtherServiceById($id);
        return view('edit.openport.table', compact('activeClasses', 'serviceDetail', 'parentProgress', 'otherService'));
    }

    
	
	public function deviceConnection()
    {
        $serviceList= Service::with('form_koneksi_device_ke_jaringan')->where('category', 1) ->get(); 
        $activeClasses = ['ib_active', 'ib_services_active', 'ib_deviceconnection_active'];
        $category = "deviceConnection";
        return view('services.serviceList', compact('activeClasses', 'serviceList', 'category'));
    }
	
	public function showDeviceConnection($id)
    {
        $serviceDetail = Service::with('form_koneksi_device_ke_jaringan')->find($id);
        $activeClasses = ['ib_active', 'ib_services_active', 'ib_deviceconnection_active'];
        $parentProgress = AdditionalHelper::getParentProgress($id);
        $otherService = AdditionalHelper::getOtherServiceById($id);
        return view('services.deviceconnection.table', compact('activeClasses', 'serviceDetail', 'parentProgress', 'otherService'));
    }

    public function editDeviceConnection($id)
    {
        $serviceDetail = Service::with('form_koneksi_device_ke_jaringan')->find($id);
        $activeClasses = ['ib_active', 'ib_services_active', 'ib_deviceconnection_active'];
        $parentProgress = AdditionalHelper::getParentProgress($id);
        $otherService = AdditionalHelper::getOtherServiceById($id);
        return view('edit.deviceConnection.table', compact('activeClasses', 'serviceDetail', 'parentProgress', 'otherService'));
    }

    
	public function H2H()
    {
        $serviceList= Service::with('Form_host_to_Host')->where('category', 1) ->get(); 
        $activeClasses = ['ib_active', 'ib_services_active', 'ib_H2H_active'];
        $category = "H2H";
        return view('services.serviceList', compact('activeClasses', 'serviceList', 'category'));
    }
	
	public function showH2H($id)
    {
        $serviceDetail = Service::with('Form_host_to_Host')->find($id);
        $activeClasses = ['ib_active', 'ib_services_active', 'ib_H2H_active'];
        $parentProgress = AdditionalHelper::getParentProgress($id);
        $otherService = AdditionalHelper::getOtherServiceById($id);
        return view('services.h2h.table', compact('activeClasses', 'serviceDetail', 'parentProgress', 'otherService'));
    }
	
	public function ASDelivery()
    {
        $serviceList= Service::with('Form_Application_Service_Delivery')->where('category', 1)->get(); 
        $activeClasses = ['ib_active', 'ib_services_active', 'ib_ASDelivery_active'];
        $category = "ASDelivery";
        return view('services.serviceList', compact('activeClasses', 'serviceList', 'category'));
    }
	
	public function showASDelivery($id)
    {
        $serviceDetail = Service::with('Form_Application_Service_Delivery')->find($id);
        $activeClasses = ['ib_active', 'ib_services_active', 'ib_ASDelivery_active'];
        $parentProgress = AdditionalHelper::getParentProgress($id);
        $otherService = AdditionalHelper::getOtherServiceById($id);
        return view('services.asdelivery.table', compact('activeClasses', 'serviceDetail', 'parentProgress', 'otherService'));
    }
    
    public function editASDelivery($id)
    {
        $serviceDetail = Service::with('Form_Application_Service_Delivery')->find($id);
        $activeClasses = ['ib_active', 'ib_services_active', 'ib_ASDelivery_active'];
        $parentProgress = AdditionalHelper::getParentProgress($id);
        $otherService = AdditionalHelper::getOtherServiceById($id);

        return view('edit.ASDelivery.table', compact('activeClasses', 'serviceDetail', 'parentProgress', 'otherService'));
    }
	
}
