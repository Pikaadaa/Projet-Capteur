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
            $data = Http::get('https://api.capturs.com/device/'. $captur->device .'/position/limit/1?login=DzSaFKtfJhWY73qpI2mC94888QU2&password=228E7F9CED1DEDBE')->json();
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
