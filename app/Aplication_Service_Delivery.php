<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aplication_Service_Delivery extends Model
{
    protected $table = 'aplication_service_deliveries';
    protected $primarykey ='id';
    protected $fillable = ['service_id', 'pic', 'finish_date', 'service_aplikasi', 'lokasi'];

    public function Form_Load_Balancer(){
        return $this->hasMany('App\Form_Load_Balancer','aplication_service_deliveries_id');
    }
	
	public function Form_Web_Application_Firewall(){
        return $this->hasMany('App\Form_Web_Application_Firewall','aplication_service_deliveries_id');
    }
	
	public function Form_Application_Acceleration(){
        return $this->hasMany('App\Form_Application_Acceleration','aplication_service_deliveries_id');
    }
	
	public function Form_Multiple_Active_Data_Center(){
        return $this->hasMany('App\Form_Multiple_Active_Data_Center','aplication_service_deliveries_id');
    }
	
	public function Service(){
        return $this->belongsTo('App\Service', 'service_id');
    }
}
