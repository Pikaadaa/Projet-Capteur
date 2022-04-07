<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Employee;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function create(){

        $employees = Employee::all();

        return view('formVehicle',[
            'employees'=> $employees
        ]);
    }

    public function enregister(Request $request){

        $employees_id = Employee::where('name', '=', $request->employee)->get('id');
        $vehicles = Vehicle::orderBy('id')->get();
        $employees = Employee::all();

        foreach($employees_id as $employee_id){
            Vehicle::create([
                'name'=>$request->name,
                'brand'=>$request->brand,
                'model'=>$request->model,
                'registration'=>$request->registration,
                'kilometer'=>$request->kilometer,
                'date_of_manufacture'=>$request->date_of_manufacture,
                'date_of_etablishment'=>$request->date_of_etablishment,
                'employee_id'=>$employee_id->id
            ]); 
        };

        return redirect('vehicle');
    }

    public function show(){

        $vehicles = Vehicle::orderBy('id')->get();
        $employees = Employee::all();

        return view('vehicles',[
            'vehicles'=> $vehicles,
            'employees'=> $employees
        ]);
    }

    public function delete($id){

        $vehicle= Vehicle::find($id);
        $vehicle->delete();

        return redirect('vehicle');
    }


    public function showData($id, $employee_id){

        $vehicle = Vehicle::find($id);
        $employees = Employee::all();
        $employees_name = Employee::where('id','=',$employee_id)->get();

        return view('edit', [
            'vehicle'=>$vehicle,
            'employees'=>$employees,
            'employees_name'=>$employees_name
        ]);
    }

    public function update(Request $request){

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


