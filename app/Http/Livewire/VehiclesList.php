<?php

namespace App\Http\Livewire;

use App\Models\Vehicle;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Pagination\Paginator;

class VehiclesList extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $registration;
    public $brand;
    public $perPage = 10;

    public function render()
    {

        $query = Vehicle::where('registration', 'like', '%'. $this->registration .'%');

        if($this->brand != null){
            $query->where('brand', '=', $this->brand);
        }

        $query = $query->paginate($this->perPage);

        return view('livewire.vehicles-list', [
            'vehicles' => $query 
        ]);
    }
}
