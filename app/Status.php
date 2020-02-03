<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Employee;

class Status extends Model
{
    protected $fillable = ['name'];
    
    public function employees(){
        return $this->hasMany('App\Employee');
    }
}
