<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SLA extends Model
{
    protected $table = 'slas';
    protected $primarykey ='id';
    protected $fillable = ['description', 'lama_kerja', 'tingkat_keberhasilan'];

    public function Aplication_Service_Delivery(){
        return $this->belongsTo('App\Aplication_Service_Delivery');
    }
}
