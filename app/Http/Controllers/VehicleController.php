<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function create(){
        return view('formVehicle');
    }

    public function enregister(Request $request){

        Vehicle::create([
            'name'=>$request->name,
            'brand'=>$request->brand,
            'model'=>$request->model,
            'registration'=>$request->registration,
            'kilometer'=>$request->kilometer,
            'date_of_manufacture'=>$request->date_of_manufacture,
            'date_of_etablishment'=>$request->date_of_etablishment,
        ]); 

        dd('Vehicule enregistré !');
    }
}
