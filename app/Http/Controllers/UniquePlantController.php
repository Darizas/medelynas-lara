<?php

namespace App\Http\Controllers;

use App\Models\UniquePlant;
use Illuminate\Http\Request;
use App\Models\PlantType;

class UniquePlantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unique_plants = UniquePlant::all();
        return view('unique_plant.index', ['unique_plants' => $unique_plants]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $plant_types = PlantType::all();
        return view('unique_plant.create', ['plant_types' => $plant_types]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $unique_plant = new UniquePlant;
        $unique_plant->age = $request->age;
        $unique_plant->height = $request->height;
        $unique_plant->health = $request->health;
        $unique_plant->plant_id = $request->plant_id;
        $unique_plant->save();
        return redirect()->route('unique_plant.index')->with('success_message', 'Sekmingai įrašytas.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UniquePlant  $uniquePlant
     * @return \Illuminate\Http\Response
     */
    public function show(UniquePlant $uniquePlant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UniquePlant  $uniquePlant
     * @return \Illuminate\Http\Response
     */
    public function edit(UniquePlant $uniquePlant)
    {
        $plant_types = PlantType::all();
        return view('unique_plant.edit', ['unique_plant' => $uniquePlant, 'plant_types' => $plant_types]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UniquePlant  $uniquePlant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UniquePlant $uniquePlant)
    {
        $uniquePlant->age = $request->age;
        $uniquePlant->height = $request->height;
        $uniquePlant->health = $request->health;
        $uniquePlant->plant_id = $request->plant_id;
        $uniquePlant->save();
        return redirect()->route('unique_plant.index')->with('success_message', 'Sėkmingai pakeistas.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UniquePlant  $uniquePlant
     * @return \Illuminate\Http\Response
     */
    public function destroy(UniquePlant $uniquePlant)
    {
        $uniquePlant->delete();
        return redirect()->route('unique_plant.index')->with('success_message', 'Sekmingai ištrintas.');
    }
}
