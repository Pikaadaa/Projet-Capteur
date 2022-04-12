<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class VehicleController extends Controller
{


    public function index(){

        $vehicles = Vehicle::orderBy('id')->get();

        return view('vehicles.index',[
            'vehicles'=> $vehicles,
        ]);
    }

    public function create(){

        $employees = Employee::all();

        return view('vehicles.create',[
            'employees'=> $employees
        ]);
    }

    public function store(Request $request){

        /*$validated = $request->validate([
            'registration' => 'required|unique:vehicles'
        ]);*/

        Vehicle::create($request->all()); 

        return redirect()->route('vehicles.index');
    }

    public function show(Vehicle $vehicle){

        return view("vehicles.show", [
            'vehicle'=>$vehicle,
        ]);
    }

    public function edit(Vehicle $vehicle){

        $employees = Employee::all();

        return view('vehicles.edit', [
            'vehicle'=>$vehicle,
            'employees'=>$employees
        ]);
    }

    public function update(Request $request, Vehicle $vehicle){

        /*$validated = $request->validate([
            'registration' => 'required',Rule::unique('vehicles', 'registration')->ignore($request->registration)
        ]);*/

        $vehicle->update($request->all());

        return redirect()->route('vehicles.index');
    }

    public function destroy(Vehicle $vehicle){

        $vehicle->delete();

        return redirect()->route('vehicles.index');
    }
}




