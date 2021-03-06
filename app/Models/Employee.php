<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Mission;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['first_name', 'last_name', 'function', 'birthday_at','image'];

    protected $dates = ['birthday_at'];

    public function setBirthdayAtAttribute($value){
        if($value != null){
            $date = Carbon::CreateFromFormat('d/m/Y', $value);
            $this->attributes['birthday_at'] = $date;
        }else{
            $this->attributes['birthday_at'] = null ;
        }
    }

    public function getFullnameAttribute(){
        return $this->last_name . ' '. $this->first_name;
    }

    public function getImagePathAttribute(){
        $path = '/picture/765-default-avatar.png';

        if($this->image != null){
            $path = $this->image;
        }

        return $path;
    }

    public function storeImage(Employee $employee){
        if (request('image')){
            $employee->update([
                'image' => request('image')->store('picture', 'public')
            ]);
        }
    }

    public function vehicles(){
        return $this->hasMany(Vehicle::class);
    }

}
