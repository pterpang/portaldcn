<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form_Load_Balancer extends Model
{
    protected $table = 'form_load_balancers';
    protected $primarykey ='id';
    protected $fillable = ['service_id', 'finish_date', 'aplication_service_deliveries_id', 'ip_server', 'ip_load_balancer', 'port', 'url', 'ssl', 'persistence', 'metode', 'keterangan'];

    public function Aplication_Service_Delivery(){
        return $this->belongsTo('App\Aplication_Service_Delivery');
    }
}

