<?php

namespace App\Http\Controllers\Api;

use App\Models\Vehicle;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VehicleController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        $i = 0 ;
        $vehiclesCapturs = $vehicle->capturs;

        foreach($vehicle->capturs as $captur){
            $locations[$i] = Location::orderBy('created_at', 'desc')->where('captur_id', '=', $captur->id)->first();
            $i ++ ;
        }

        return[
            'locations' => $locations,
            'vehicles' => $vehiclesCapturs
        ];
    }
}
