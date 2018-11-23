<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form_Koneksi_Device_ke_Jaringan extends Model
{
    protected $table = 'form_koneksi_device_ke_jaringans';
    protected $primarykey ='id';
    protected $fillable = ['pic', 'finish_date', 'nama_server', 'ip_address', 'interface', 'deskripsi', 'koneksi_perangkat_network', 'service_id'];
	
    public function Service(){
        return $this->belongsTo('App\Service');
    }
}
