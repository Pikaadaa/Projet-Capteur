<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Employee;
use Livewire\WithPagination;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;

class EmployeesList extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $name;
    public $function;
    public $perPage = 10;

    public function render()
    {

        return view('livewire.employees-list', [
            'employees' => Employee::where(function (Builder $query) {
                $query->where('last_name', 'like', '%'. $this->name .'%')->orWhere('first_name', 'like', '%'. $this->name .'%');
            })->where(function(Builder $query){
                $query->where('function', 'like', '%'. $this->function .'%'); 
            })->paginate($this->perPage)
        ]);

    }
}
