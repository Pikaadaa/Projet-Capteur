<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Captur;
use App\Models\Mission;
use App\Models\Employee;
use App\Models\Location;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vehicle extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable =['name','brand','model','registration','kilometer','year_of_manufacture','date_of_establishment','employee_id','captur_id'];

    protected $dates=['date_of_establishment'];

    const BRAND_RENAULT = 1 ;
    const BRAND_TOYOTA = 2 ;
    const BRAND_PEUGEOT = 3 ;


    public static function brands():array{

        return [
            self::BRAND_RENAULT => 'Renault',
            self::BRAND_TOYOTA => 'Toyota',
            self::BRAND_PEUGEOT => 'Peugeot',
        ];
    }

    public function getBrandNameAttribute(){
        
        return self::brands()[$this->brand];
        //brand_name
    }

    public function setDateOfEstablishmentAttribute($value){
        $date = Carbon::CreateFromFormat('d/m/Y', $value);
        $this->attributes['date_of_establishment'] = $date;
    }

    public function employee(){
        return $this->belongsTo(Employee::class);
    }

    public function mission(){
        return $this->belongsTo(Mission::class);
    }

    public function capturs(){
        return $this->hasMany(Captur::class);
    }

    public function captursLocations(){
        return $this->hasManyThrough(Location::class, Captur::class);
    }

}
