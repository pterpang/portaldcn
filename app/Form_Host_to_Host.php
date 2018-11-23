<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form_Host_to_Host extends Model
{
    protected $table = 'form_host_to_hosts';
    protected $primarykey ='id';
    protected $fillable = ['service_id', 'pic', 'finish_date', 'nama_partner', 'link_komunikasi', 'site', 'ip_server_partner', 'ip_server_bca', 'ip_p2p_bca', 'ip_p2p_partner', 'port_aplikasi', 'nama_aplikasi', 'arah_akses'];

    public function service(){
        return $this->belongsTo('App\Service');
    }
	
	
	
	
}
