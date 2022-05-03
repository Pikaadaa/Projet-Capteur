<?php

namespace App\Http\Livewire;

use App\Models\Captur;
use App\Models\Vehicle;
use Livewire\Component;
use Livewire\WithPagination;

class CaptursList extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $device;
    public $registration ;
    public $perPage = 5 ;


    public function render()
    {
        return view('livewire.capturs-list',[
            'capturs' => Captur::where('device', 'like', '%'. $this->device .'%')->paginate($this->perPage)
        ]);
    }
}
