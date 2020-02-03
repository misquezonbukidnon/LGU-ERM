<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Office;
use App\Status;
use App\Position;

class Employee extends Model
{
    protected $fillable = [
    	'employee_number',
    	'lastname',
    	'firstname',
        'middlename',
        'suffix',
    	'positions_id',
        'offices_id',
    	'address',
    	'contact_number',
    	'emergency_contact_person',
    	'ecp_contact_number',
        'statuses_id',
        'image'
    ];
    //
    
    public function offices(){
        return $this->belongsTo('App\Office', 'offices_id');
    }
    
    public function statuses(){
        return $this->belongsTo('App\Status', 'statuses_id');
    }

    public function positions(){
        return $this->belongsTo('App\Position', 'positions_id');
    }
}
