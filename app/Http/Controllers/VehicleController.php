<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class VehicleController extends Controller
{
    public function create(){

        $employees = Employee::all();

        return view('vehicle.create',[
            'employees'=> $employees
        ]);
    }

    public function store(Request $request){

        $validated = $request->validate([
            'registration' => 'required|unique:vehicles'
        ]);

        Vehicle::create([
            'name'=>$request->name,
            'brand'=>$request->brand,
            'model'=>$request->model,
            'registration'=>$request->registration,
            'kilometer'=>$request->kilometer,
            'date_of_manufacture'=>$request->date_of_manufacture,
            'date_of_etablishment'=>$request->date_of_etablishment,
            'employee_id'=>$request->employee
        ]); 


        return redirect('vehicle');
    }

    public function index(){

        $vehicles = Vehicle::orderBy('id')->get();
        $employees = Employee::all();

        return view('vehicle.index',[
            'vehicles'=> $vehicles,
            'employees'=> $employees
        ]);
    }

    public function destroy($id){

        $vehicle= Vehicle::find($id);
        $vehicle->delete();

        return redirect('vehicle');
    }


    public function edit($id){

        $vehicle = Vehicle::find($id);
        $employees = Employee::all();
        $employee_name = $vehicle->employee;
        //dd($employee_name);

        return view('vehicle.edit', [
            'vehicle'=>$vehicle,
            'employees'=>$employees,
            'employee_name'=>$employee_name
        ]);
    }

    public function update(Request $request){

        $validated = $request->validate([
            'registration' => 'required',Rule::unique('vehicles', 'registration')->ignore($request->registration)
        ]);

        $employees_id = Employee::where('name', '=', $request->employee)->get('id');

        foreach($employees_id as $employee_id){
            $vehicles=Vehicle::find($request->id);
            $vehicles->name=$request->name;
            $vehicles->brand=$request->brand;
            $vehicles->model=$request->model;
            $vehicles->registration=$request->registration;
            $vehicles->kilometer=$request->kilometer;
            $vehicles->date_of_manufacture=$request->date_of_manufacture;
            $vehicles->employee_id=$employee_id->id;
            $vehicles->save();
        };
        
        return redirect('vehicle');
    }
}


