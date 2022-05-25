<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\SubDistrict;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $places = Place::with('subDistrict');

            return datatables()->of($places)
            ->addColumn('subDistrictName', function(Place $place) {
                return $place->subDistrict->name;
            })
            ->addColumn('action','places.dt-action')
                ->toJson();
        }
        return view('places.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('places.create',[
            'subDistricts' => SubDistrict::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => ['required'],
            'address' => ['required'],
            'sub_district_id' => ['required'],
            'phone' => ['required','numeric'],
            'description' => ['required'],
            'latitude' => ['required'],
            'longitude' => ['required'],
            'image' => ['required','image'],
        ]);

        $image = null;

        if($request->has('image')) {
            $image = $request->file('image')->store('images');
        }

        Place::create([
            'sub_district_id' => $request->sub_district_id,
            'name' => $request->name,
            'description' => $request->description,
            'address' => $request->address,
            'phone' => $request->phone,
            'image' => $image,
            'latitude' => $request->latitude,
            'Longitude' => $request->longitude,

        ]);

        session()->flash('success','Berhasil Tambah');

        return redirect()->route('places.index');
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
