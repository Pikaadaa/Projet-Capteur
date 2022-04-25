<?php

namespace App\Http\Livewire;

use App\Models\Vehicle;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Pagination\Paginator;

class VehiclesList extends Component
{

    use WithPagination;

    public $registration;
    public $brand;
    public $perPage = 5;

    public function render()
    {

        if($this->brand != null){
            return view('livewire.vehicles-list', [
                'vehicles' => Vehicle::where('registration', 'like', '%'. $this->registration .'%')->where('brand', '=', $this->brand)->paginate($this->perPage)
            ]);
        }else{
            return view('livewire.vehicles-list', [
                'vehicles' => Vehicle::where('registration', 'like', '%'. $this->registration .'%')->paginate($this->perPage)
            ]);
        }

        

    }
}
