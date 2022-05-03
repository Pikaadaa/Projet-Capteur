<?php

namespace App\Http\Controllers\Api;

use App\Models\Captur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class CapturController extends Controller
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
            $position = Http::get('https://api.capturs.com/device/'. $captur->device .'/position/limit/1?login=DzSaFKtfJhWY73qpI2mC94888QU2&password=228E7F9CED1DEDBE')->json();
        }

        return $position;
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
     * @param  \App\Models\Captur  $captur
     * @return \Illuminate\Http\Response
     */
    public function show(Captur $captur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Captur  $captur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Captur $captur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Captur  $captur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Captur $captur)
    {
        //
    }
}
