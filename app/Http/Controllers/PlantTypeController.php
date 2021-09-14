<?php

namespace App\Http\Controllers;

use App\Models\PlantType;
use Illuminate\Http\Request;
use Validator;
use Intervention\Image\ImageManagerStatic as Image;
use Str;

class PlantTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plant_types = PlantType::all();
        return view('plant_type.index', ['plant_types' => $plant_types]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('plant_type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'name' => ['required', 'min:3', 'max:64'],
        ],
        [
        'name.min' => 'Įveskite bent 3 simbolius'
        ]
       );
       if ($validator->fails()) {
        $request->flash();
        return redirect()->back()->withErrors($validator);
        }

        $checked = 0;
        if(isset($_POST[('is_yearling')])) {
            $checked = 1;
        };
        $fileName = null;
        if ($request->has('photo')) {
            $img = Image::make($request->file('photo'));
            $fileName = Str::random(5).'.jpg';
            $folderBig = public_path('/plantPhotos/big');
            $img->resize(1200,null,function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($folderBig."/".$fileName,80,'jpg');

            $folderSmall = public_path('/plantPhotos/small');
            $img->resize(250,null,function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($folderSmall."/".$fileName,100,'jpg');
        }

        $plant_type = new PlantType;
        $plant_type->name = $request->name;
        $plant_type->is_yearling = $checked;
        $plant_type->photo = $fileName;
        $plant_type->save();
        return redirect()->route('plant_type.index')->with('success_message', 'Sekmingai įrašytas.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PlantType  $plantType
     * @return \Illuminate\Http\Response
     */
    public function show(PlantType $plantType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PlantType  $plantType
     * @return \Illuminate\Http\Response
     */
    public function edit(PlantType $plantType)
    {
        return view('plant_type.edit', ['plant_type' => $plantType]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PlantType  $plantType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlantType $plantType)
    {
        $checked = 0;
        if(isset($_POST[('is_yearling')])) {
            $checked = 1;
        };
        $plantType->name = $request->name;
        $plantType->is_yearling = $checked;
        $plantType->save();
        return redirect()->route('plant_type.index')->with('success_message', 'Sėkmingai pakeistas.');
    }

    public function updatePhoto(Request $request, PlantType $plantType)
    {
        if($plantType->photo != null){
            unlink(public_path('/plantPhotos/big/'.$plantType->photo));
            unlink(public_path('/plantPhotos/small/'.$plantType->photo));
        }
        $plantType->photo = null;
        $plantType->save();

        if ($request->has('photo')) {
            $img = Image::make($request->file('photo'));
            $fileName = Str::random(5).'.jpg';
            $folderBig = public_path('/plantPhotos/big');
            $img->resize(1200,null,function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($folderBig."/".$fileName,80,'jpg');

            $folderSmall = public_path('/plantPhotos/small');
            $img->resize(250,null,function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($folderSmall."/".$fileName,100,'jpg');
        }

        $plantType->photo = $fileName;
        $plantType->save();

        return view('plant_type.edit', ['plant_type' => $plantType])->with('success_message', 'Nuotrauka pakeistas.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PlantType  $plantType
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlantType $plantType)
    {
        if($plantType->UniquePlant->count()){
            return redirect()->route('plant_type.index')->with('info_message', 'Trinti negalima, nes turi sodinukų.');
        } 
        $plantType->delete();
        return redirect()->route('plant_type.index')->with('success_message', 'Sekmingai ištrintas.');
    }
}
