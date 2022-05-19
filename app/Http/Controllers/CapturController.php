<?php

namespace App\Http\Controllers;

use App\Models\Captur;
use App\Models\Vehicle;
use App\Models\Location;
use Illuminate\Http\Request;
use Cornford\Googlmapper\Mapper;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\Capturs\StoreCapturRequest;
use App\Http\Requests\Capturs\UpdateCapturRequest;

class CapturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('capturs.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehicles = Vehicle::all();

        return view('capturs.create',[
            'vehicles' => $vehicles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCapturRequest $request)
    {
        Captur::create($request->all()); 

        return redirect()->route('capturs.index')->with('success', 'Capteur enregistré !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Captur $captur)
    {
        return view("capturs.show", [
            'captur' => $captur,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Captur $captur)
    {
        $vehicles = Vehicle::all();

        return view('capturs.edit', [
            'captur' => $captur,
            'vehicles' => $vehicles
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCapturRequest $request, Captur $captur)
    {
        $captur->update($request->all());

        return redirect()->route('capturs.index')->with('success', 'Capteur modifié !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Captur $captur)
    {
        $captur->delete();

        Location::where('captur_id', '=', $captur->id)->delete();

        return redirect()->route('capturs.index')->with('success', 'Capteur supprimé !');
    }
}
