<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Employee;

class EmploymentStatus extends Model
{
    $fillable = ['name'];

    public function employees(){
        return $this->hasMany('App\Employee');
    }
}
