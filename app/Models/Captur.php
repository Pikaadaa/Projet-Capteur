<?php

namespace App\Models;

use App\Models\Vehicle;
use App\Models\Location;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Captur extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable =['device','vehicle_id','battery'];


    public function vehicle(){
        return $this->belongsTo(Vehicle::class);
    }

    public function locations(){
        return $this->hasMany(Location::class);
    }
}
