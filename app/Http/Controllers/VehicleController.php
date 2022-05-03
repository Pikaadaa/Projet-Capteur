<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\Vehicles\StoreVehicleRequest;
use App\Http\Requests\Vehicles\UpdateVehicleRequest;

class VehicleController extends Controller
{


    public function index(){

        return view('vehicles.index');
    }

    public function create(){

        $employees = Employee::all();
        $brands = Vehicle::brands();

        return view('vehicles.create',[
            'employees' => $employees,
            'brands' => $brands
        ]);
    }

    public function store(StoreVehicleRequest $request){

        Vehicle::create($request->all()); 

        return redirect()->route('vehicles.index')->with('success', 'Véhicule enregistré !');
    }

    public function show(Vehicle $vehicle){

        return view("vehicles.show", [
            'vehicle' => $vehicle,
        ]);
    }

    public function edit(Vehicle $vehicle){

        $employees = Employee::all();
        $brands = Vehicle::brands();

        return view('vehicles.edit', [
            'vehicle' => $vehicle,
            'employees' => $employees,
            'brands' => $brands
        ]);
    }

    public function update(UpdateVehicleRequest $request, Vehicle $vehicle){

        $vehicle->update($request->all());

        return redirect()->route('vehicles.index')->with('success', 'Véhicule modifié !');
    }

    public function destroy(Vehicle $vehicle){

        $vehicle->delete();

        return redirect()->route('vehicles.index')->with('success', 'Véhicule supprimé !');
    }
}




