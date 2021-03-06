<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\Employees\StoreEmployeeRequest;
use App\Http\Requests\Employees\UpdateEmployeeRequest;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        return view('employees.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(StoreEmployeeRequest $request)
    {
        $employee = Employee::create($request->all()); 

        $employee->storeImage($employee);

        return redirect()->route('employees.index')->with('success', 'Employé enregistré !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show(Employee $employee)
    {
        return view("employees.show", [
            'employee' => $employee,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit(Employee $employee)
    {

        return view('employees.edit', [
            'employee' => $employee,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $employee->update($request->all());

        $this->storeImage($employee);

        return redirect()->route('employees.index')->with('success', 'Employé modifié !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function destroy(Employee $employee)
    {
        $employee->delete();
        
        return redirect()->route('employees.index')->with('success', 'Employé supprimé !');
    }

}
