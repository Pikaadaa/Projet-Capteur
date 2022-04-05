<?php

namespace App\Models;

use App\Models\User;
use App\Models\Mission;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    public function mission(){
        return $this->belongsTo(Mission::class);
    }

    public function vehicles(){
        return $this->hasMany(Vehicle::class);
    }

    public function user(){
        return $this->hasOne(User::class);
    }
}
