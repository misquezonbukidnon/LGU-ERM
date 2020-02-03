<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Employee;
use App\User;

class Office extends Model
{
 
    protected $fillable = ['name'];

    
    public function employees(){
        return $this->hasMany('App\Employee');
    }

    public function users(){
    	return $this->hasMany('App\User');
    }
   //
}
