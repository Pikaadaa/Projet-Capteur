<?php

namespace App\Models;

use App\Models\Captur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends Model
{
    use HasFactory;

    protected $fillable =['latitude','longitude','captur_id'];

    public function captur(){
        return $this->belongsTo(Captur::class);
    }
}
