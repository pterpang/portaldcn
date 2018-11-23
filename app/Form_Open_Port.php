<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form_Open_Port extends Model
{
    protected $table = 'form_open_ports';
    protected $primarykey ='id';
    protected $fillable = ['pic', 'finish_date', 'source_ip', 'destination_ip', 'fungsi', 'protocol', 'port', 'arah', 'service_id'];
    
	
    public function Service(){
        return $this->belongsTo('App\Service');
    }

}
