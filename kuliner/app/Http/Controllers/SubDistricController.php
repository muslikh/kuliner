<?php

namespace App\Http\Controllers;

use App\Models\SubDistrict;
use Illuminate\Http\Request;


class SubDistricController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        if($request->ajax()) {
            $subDistricts = SubDistrict::query();

            return datatables()->of($subDistricts)->toJson();
        }

        return view('sub-district.index');
    }
}
