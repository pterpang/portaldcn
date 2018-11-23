<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form_Web_Application_Firewall extends Model
{
    protected $table = 'form_web_application_firewalls';
    protected $primarykey ='id';
    protected $fillable = ['aplication_service_deliveries_id', 'ip_server_lb', 'port', 'ssl', 'source_ip', 'url', 'finish_date'];

    public function Aplication_Service_Delivery(){
        return $this->belongsTo('App\Aplication_Service_Delivery');
    }
}
