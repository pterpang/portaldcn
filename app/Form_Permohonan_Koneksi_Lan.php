<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form_Permohonan_Koneksi_Lan extends Model
{
    protected $table = 'form_permohonan_koneksi_lans';
    protected $primarykey ='id';
    protected $fillable = ['service_id', 'finish_date', 'pic', 'tanggal_pemakaian', 'lokasi', 'lantai', 'antivirus', 'total_user_per_device', 'koneksi_ke_switch', 'port_switch', 'segment_ip_address', 'ip_phone', 'lama_pemakaian', 'bypass_nas_ise'];
	
    public function Service(){
        return $this->belongsTo('App\Service');
    }

}
