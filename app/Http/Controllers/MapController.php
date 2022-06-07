<?php

namespace App\Http\Controllers;

use App\Models\Captur;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class MapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $capturs = Captur::all();

        foreach($capturs as $captur){
            $data = Http::get('https://api.capturs.com/device/'. $captur->device .'/position/limit/1?login='. env('CAPTURS_LOGIN') . '&password='. env('CAPTURS_MDP'))->json();
        }

        if(isset($data['result'])){
            $result = $data['result']; 
            for($i = 0 ; $i < $result ; $i++){
                $captur_id = Captur::where('device' , 'like', $data['position'][$i]['device'])->get();
                $locations = Location::create([
                    'latitude' => $data['position'][$i]['latitude'],
                    'longitude' => $data['position'][$i]['longitude'],
                    'captur_id' => $captur_id[0]->id
                ]);
            }
        }
        
        return view('maps.index', [
            'capturs' => $capturs
        ]);
    }
}
