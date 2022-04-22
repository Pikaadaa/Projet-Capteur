<?php

namespace App\Http\Livewire;

use App\Models\Vehicle;
use Livewire\Component;
use Livewire\WithPagination;

class VehiclesList extends Component
{

    use WithPagination;

    public $registration;
    public $brand = 1;

    public function render()
    {

        return view('livewire.vehicles-list', [
            'vehicles' => Vehicle::where('registration', 'like', '%'. $this->registration .'%')->where('brand', '=', $this->brand)->paginate(5)
        ]);

    }
}
