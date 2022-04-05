<?php

namespace App\Models;


use App\Models\Vehicle;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mission extends Model
{
    use HasFactory;


    public function employees(){
        return $this->hasMany(Employee::class);
    }

    public function vehicles(){
        return $this->hasMany(Vehicle::class);
    }

    
}
