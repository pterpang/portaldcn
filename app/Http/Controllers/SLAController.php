<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SLA;

class SLAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slaList = SLA::all();
        $activeClasses = ['sla_active', 'sla_requestlist_active'];
        return view('sla.index', compact('activeClasses', 'slaList'));
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
