<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form_Application_Acceleration extends Model
{
    protected $table = 'form_application_accelerations';
    protected $primarykey ='id';
    protected $fillable = ['aplication_service_deliveries_id', 'ip_server_lb', 'port', 'ssl', 'url', 'finish_date'];

    public function Aplication_Service_Delivery(){
        return $this->belongsTo('App\Aplication_Service_Delivery');
    }
}
