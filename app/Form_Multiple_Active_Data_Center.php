<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form_Multiple_Active_Data_Center extends Model
{
    protected $table = 'form_multiple_active_data_centers';
    protected $primarykey ='id';
    protected $fillable = ['aplication_service_deliveries_id', 'lokasi', 'finish_date', 'ip_server_lb', 'port', 'url', 'persistence', 'metode', 'keterangan'];

    public function Aplication_Service_Delivery(){
        return $this->belongsTo('App\Aplication_Service_Delivery');
    }
}
