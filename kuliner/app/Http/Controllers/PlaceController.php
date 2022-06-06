<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\SubDistrict;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            ->addIndexColumn()
            ->addColumn('subDistrictName', function(Place $place) {
                return $place->subDistrict->name;
            })
            ->addColumn('place-menu', 'places.place-link')
            ->addColumn('action','places.dt-action')
            ->rawColumns(['place-menu'])
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

        return redirect()->route('place.index');
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
    public function edit(Place $place)
    {
        return view('places.edit', [
            'subDistricts' => SubDistrict::get(),
            'place' => $place
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Place $place)
    {
        $this->validate($request,[
            'name' => ['required'],
            'address' => ['required'],
            'sub_district_id' => ['required'],
            'phone' => ['required','numeric'],
            'description' => ['required'],
            'latitude' => ['required'],
            'longitude' => ['required'],
        ]);

        $image = $place->image;

        if($request->has('image')) {
            if(Storage::exists($place->imafe))
            {
                Storage::delete($place->image);
            }
            $image = $request->file('image')->store('images');
        }

        $place->update([
            'sub_district_id' => $request->sub_district_id,
            'name' => $request->name,
            'description' => $request->description,
            'address' => $request->address,
            'phone' => $request->phone,
            'image' => $image,
            'latitude' => $request->latitude,
            'Longitude' => $request->longitude,

        ]);

        session()->flash('success','Berhasil Perbarui');

        return redirect()->route('place.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Place $place)
    {

        session()->flash('error','Data Di hapus');

        if($place->delete()) {

            return response()->json([
                'success' => true,
            ]);
        }

        return response()->json([
            'success' => false,
        ]);
    }
}
