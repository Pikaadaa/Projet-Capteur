<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Employee;
use Livewire\WithPagination;

class EmployeesList extends Component
{

    use WithPagination;

    public $name;
    public $function;

    public function render()
    {

        return view('livewire.employees-list', [
            'employees' => Employee::where('last_name', 'like', '%'. $this->name .'%')->where('function', 'like', '%'. $this->function .'%')->paginate(5)
        ]);
    }
}
