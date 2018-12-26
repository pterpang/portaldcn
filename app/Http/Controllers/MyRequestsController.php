<?php

namespace App\Http\Controllers;

use App\Aplication_Service_Delivery;
use App\Form_Host_to_Host;
use App\Form_Koneksi_Device_ke_Jaringan;
use App\Form_Open_Port;
use App\Form_Pendaftaran_Remote_Access;
use App\Form_Permohonan_Koneksi_Lan;
use Illuminate\Http\Request;
use App\Category;
use App\Service;
use App\AdditionalHelper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use League\Flysystem\Exception;

class MyRequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activeClasses = ['myrq_active'];
        $requestList = Service::with("Category")
                                ->where("requester_name", Auth::user()->name)
                                ->get();
        foreach ($requestList as $row) {
            // $row->parentProgress = AdditionalHelper::getParentProgress($row->no_remedy);
            $row->parentProgress = AdditionalHelper::getParentProgress($row->id);
        }
        return view('additional.myRequests', compact('activeClasses', 'requestList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
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

    //////////////////////////////////////////////////
    //Services Section                              //
    //////////////////////////////////////////////////
        
    public function showOpenport($id)
    {

        $serviceDetail = Service::with('Form_Open_Port')->find($id);
        $activeClasses = ['myrq_active'];
        $parentProgress = AdditionalHelper::getParentProgress($id);
        $otherService = AdditionalHelper::getOtherServiceById($id);
        return view('progress.openport.table', compact('activeClasses', 'serviceDetail', 'parentProgress', 'otherService'));
    }
    
    public function showDeviceConnection($id)
    {
        $serviceDetail = Service::with('Form_Koneksi_Device_ke_Jaringan')->find($id);
        $activeClasses = ['myrq_active'];
        $parentProgress = AdditionalHelper::getParentProgress($id);
        $otherService = AdditionalHelper::getOtherServiceById($id);
        return view('progress.deviceconnection.table', compact('activeClasses', 'serviceDetail', 'parentProgress', 'otherService'));
    }
    
    public function showH2H($id)
    {
        $serviceDetail = Service::with('Form_Host_to_Host')->find($id);
        $activeClasses = ['myrq_active'];
        $parentProgress = AdditionalHelper::getParentProgress($id);
        $otherService = AdditionalHelper::getOtherServiceById($id);
        return view('progress.h2h.table', compact('activeClasses', 'serviceDetail', 'parentProgress', 'otherService'));
    }
    
    public function showASDelivery($id)
    {
        $serviceDetail = Service::with('Form_Application_Service_Delivery')->find($id);
        $activeClasses = ['myrq_active'];
        $parentProgress = AdditionalHelper::getParentProgress($id);
        $otherService = AdditionalHelper::getOtherServiceById($id);
        return view('progress.asdelivery.table', compact('activeClasses', 'serviceDetail', 'parentProgress', 'otherService'));
    }

    public function showLAN($id)
    {
        $serviceDetail = Service::with('Form_Permohonan_Koneksi_Lan')->find($id);
        $activeClasses = ['myrq_active'];
        $parentProgress = AdditionalHelper::getParentProgress($id);
        $otherService = AdditionalHelper::getOtherServiceById($id);
        return view('progress.lan.table', compact('activeClasses', 'serviceDetail', 'parentProgress', 'otherService'));
    }

    public function showRA($id)
    {
        $serviceDetail = Service::with('Form_Pendaftaran_Remote_Access')->find($id);
        $activeClasses = ['myrq_active'];
        $parentProgress = AdditionalHelper::getParentProgress($id);
        $otherService = AdditionalHelper::getOtherServiceById($id);
        return view('progress.remoteaccess.table', compact('activeClasses', 'serviceDetail', 'parentProgress', 'otherService'));
    }

    public function editOpenport($id)
    {
        $serviceDetail = Service::with('Form_Open_Port')->find($id);
        $activeClasses = ['myrq_active'];
        $parentProgress = AdditionalHelper::getParentProgress($id);
        $otherService = AdditionalHelper::getOtherServiceById($id);
        return view('edit.openport.table', compact('activeClasses', 'serviceDetail', 'parentProgress', 'otherService'));
    }

    public function editRemoteAccess($id)
    {
        $serviceDetail = Service::with('Form_Pendaftaran_Remote_Access')->find($id);
        $activeClasses = ['myrq_active'];
        $parentProgress = AdditionalHelper::getParentProgress($id);
        $otherService = AdditionalHelper::getOtherServiceById($id);
        return view('edit.remoteaccess.table', compact('activeClasses', 'serviceDetail', 'parentProgress', 'otherService'));
    }

    public function editLAN($id)
    {
        $serviceDetail = Service::with('Form_Permohonan_Koneksi_Lan')->find($id);
        $activeClasses = ['myrq_actives'];
        $parentProgress = AdditionalHelper::getParentProgress($id);
        $otherService = AdditionalHelper::getOtherServiceById($id);
        return view('edit.lan.table', compact('activeClasses', 'serviceDetail', 'parentProgress', 'otherService'));
    }

    public function editH2H($id)
    {
        $serviceDetail = Service::with('Form_Host_to_Host')->find($id);
        $activeClasses = ['myrq_actives'];
        $parentProgress = AdditionalHelper::getParentProgress($id);
        $otherService = AdditionalHelper::getOtherServiceById($id);
        return view('edit.h2h.table', compact('activeClasses', 'serviceDetail', 'parentProgress', 'otherService'));
    }

    public function editASDelivery($id)
    {
        $serviceDetail = Service::with('Form_Application_Service_Delivery')->find($id);
        $activeClasses = ['myrq_actives'];
        $parentProgress = AdditionalHelper::getParentProgress($id);
        $otherService = AdditionalHelper::getOtherServiceById($id);

        return view('edit.ASDelivery.table', compact('activeClasses', 'serviceDetail', 'parentProgress', 'otherService'));
    }

    public function editDeviceConnection($id)
    {
        $serviceDetail = Service::with('form_koneksi_device_ke_jaringan')->find($id);
        $activeClasses = ['myrq_actives'];
        $parentProgress = AdditionalHelper::getParentProgress($id);
        $otherService = AdditionalHelper::getOtherServiceById($id);
        return view('edit.deviceConnection.table', compact('activeClasses', 'serviceDetail', 'parentProgress', 'otherService'));
    }

}
