<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Mission;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    protected $fillable =['first_name','last_name','function','birthday_at'];

    protected $dates=['birthday_at'];

    public function setBirthdayAtAttribute($value){
        $date = Carbon::CreateFromFormat('d/m/Y', $value);
        $this->attributes['birthday_at'] = $date;
    }

    public function getFullnameAttribute(){
        return $this->first_name . ' '. $this->last_name;
    }

    public function vehicles(){
        return $this->hasMany(Vehicle::class);
    }

}
