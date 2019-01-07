<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;
use App\SLA;
use Illuminate\Support\Facades\DB;

class SLAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slaCategory = ['Open Port', 'Remote Access', 'Device Connection', 'Host-to-Host', 'LAN',
            'Application Service Deliveries'];

        $slaOpenPort =DB::table('form_open_ports')->whereNotNull('expected_finish_date')->whereNotNull('finish_date');
        $slaOpenPortTotal = $slaOpenPort->count();
        if($slaOpenPort->count()>0){
            $slaOpenPort = ($slaOpenPort->whereRaw('finish_date <= expected_finish_date')->count()/$slaOpenPortTotal*100).'%';
        }
        else{
            $slaOpenPort = 'Belum Ada Request';
        }

        $slaRemoteAccess =DB::table('form_pendaftaran_remote_accesses')->whereNotNull('expected_finish_date')->whereNotNull('finish_date');
        $slaRemoteAccessTotal = $slaRemoteAccess->count();
        if($slaRemoteAccess->count()>0){
            $slaRemoteAccess = ($slaRemoteAccess->whereRaw('finish_date <= expected_finish_date')->count()/$slaRemoteAccessTotal*100).'%';
        }
        else{
            $slaRemoteAccess = 'Belum Ada Request';
        }

        $slaDeviceConnection =DB::table('form_koneksi_device_ke_jaringans')->whereNotNull('expected_finish_date')->whereNotNull('finish_date');
        $slaDeviceConnectionTotal= $slaDeviceConnection->count();
        if($slaDeviceConnection->count()>0){
            $slaDeviceConnection = ($slaDeviceConnection->whereRaw('finish_date <= expected_finish_date')->count()/$slaDeviceConnectionTotal*100).'%';
        }
        else{
            $slaDeviceConnection = 'Belum Ada Request';
        }

        $slaHost2Host = DB::table('form_host_to_hosts')->whereNotNull('expected_finish_date')->whereNotNull('finish_date');
        $slaHost2HostTotal = $slaHost2Host->count();
        if($slaHost2Host->count()>0){
            $slaHost2Host = ($slaHost2Host->whereRaw('finish_date <= expected_finish_date')->count()/$slaHost2HostTotal*100).'%';
        }
        else{
            $slaHost2Host = 'Belum Ada Request';
        }

        $slaLAN = DB::table('form_permohonan_koneksi_lans')->whereNotNull('expected_finish_date')->whereNotNull('finish_date');
        $slaLANTotal = $slaLAN->count();
        if($slaLAN->count()>0){
            $slaLAN = ($slaLAN->whereRaw('finish_date <= expected_finish_date')->count()/$slaLANTotal*100).'%';
        }
        else{
            $slaLAN = 'Belum Ada Request';
        }

        $slaASD = DB::table('aplication_service_deliveries')->whereNotNull('expected_finish_date')->whereNotNull('finish_date');
        $slaASDTotal = $slaASD->count();
        if($slaASD->count()>0){
            $slaASD = ($slaASD->whereRaw('finish_date <= expected_finish_date')->count()/$slaASDTotal*100).'%' ;
        }
        else{
            $slaASD = 'Belum Ada Request';
        }

        $slaList[0] = $slaOpenPort;
        $slaList[1] = $slaRemoteAccess;
        $slaList[2] = $slaDeviceConnection;
        $slaList[3] = $slaHost2Host;
        $slaList[4] = $slaLAN;
        $slaList[5] = $slaASD;

        //$slaList = SLA::all();
        $activeClasses = ['sla_active', 'sla_requestlist_active'];

        //return view('sla.index', compact('activeClasses', 'slaList'));
        return view('sla.index', compact('activeClasses', 'slaList', 'slaCategory'));
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sla = sla::find($id);
        $activeClasses = ['sla_active', 'sla_requestlist_active'];
        return view('sla.edit', compact('activeClasses', 'sla'));
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
        $data = json_decode($request->post('data'), true);
        try{
            $id = $data['id'];
            unset($data['id']);
            SLA::where('id', $id)->update($data);
            return "OK";
        }catch(Exception $e){
            return "Error when update data.";
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
