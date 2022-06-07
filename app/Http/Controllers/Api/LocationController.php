<?php

namespace App\Http\Controllers\Api;

use App\Models\Captur;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $i = 0;
        $location = null ;
        $capturs = Captur::all();

        foreach($capturs as $captur){
            $location[$i] = Location::orderBy('created_at', 'desc')->where('captur_id', '=', $captur->id)->first();
            $i++;
        }

        return [
            'locations' => $location,
            'capturs' => $capturs
        ];
    }   
}
