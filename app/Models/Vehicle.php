<?php

namespace App\Models;

use App\Models\Captur;
use App\Models\Mission;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vehicle extends Model
{
    use HasFactory;

    public function employee(){
        return $this->belongsTo(Employee::class);
    }

    public function mission(){
        return $this->belongsTo(Mission::class);
    }

    public function captur(){
        return $this->belongsTo(Captur::class);
    }

}
