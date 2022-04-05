<?php

namespace App\Models;

use App\Models\Captur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends Model
{
    use HasFactory;

    public function captur(){
        return $this->belongsTo(Captur::class);
    }
}
