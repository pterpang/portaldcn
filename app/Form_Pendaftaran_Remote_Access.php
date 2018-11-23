<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form_Pendaftaran_Remote_Access extends Model
{
    protected $table = 'form_pendaftaran_remote_accesses';
    protected $primarykey ='id';
    protected $fillable = ['jenis_remote_access', 'jenis_user_remote', 'environment', 'unit_kerja', 'berlaku_sampai_dengan', 'nama_pic', 'nama_server', 'ip_address', 'protocol', 'port', 'client', 'nama_pic', 'deskripsi', 'service_id', 'pic', 'finish_date'];

	
    public function Service(){
        return $this->belongsTo('App\Service');
    }
}
