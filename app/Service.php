<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';
    protected $primarykey ='id';
    protected $fillable = ['no_remedy', 'project_name', 'requester_name',  'category'];

    public function Form_Host_to_Host(){
        return $this->hasMany('App\Form_Host_to_Host','service_id');
    }
	
	public function Form_Open_Port(){
        return $this->hasMany('App\Form_Open_Port','service_id');
    }
	
	public function Form_Koneksi_Device_ke_Jaringan(){
        return $this->hasMany('App\Form_Koneksi_Device_ke_Jaringan','service_id');
    }
	
	public function Form_Pendaftaran_Remote_Access(){
        return $this->hasMany('App\Form_Pendaftaran_Remote_Access','service_id');
    }
	
	public function Form_Application_Service_Delivery(){
        return $this->hasMany('App\Aplication_Service_Delivery','service_id');
    }
	
	public function Form_Permohonan_Koneksi_Lan(){
        return $this->hasMany('App\Form_Permohonan_Koneksi_Lan','service_id');
    }

    public function Category(){
        return $this->belongsTo('App\Category');
    }
}
