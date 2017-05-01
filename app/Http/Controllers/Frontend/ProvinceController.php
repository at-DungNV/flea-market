<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Province;
use App\Models\District;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinces = Province::all();
        if ($provinces) {
            return response()->json(['provinces' => $provinces], \Config::get('common.SUCCESS_CODE'));
        }
        return response()->json([
                'success' => false,
            ], \Config::get('common.CLIENT_ERROR_CODE'));
    }
    
    /**
     * Display a listing of the resource according to province id
     *
     * @return \Illuminate\Http\Response
     */
    public function getDistricts($id)
    {
        $districts = District::where('province_id', '=', $id)->get();
        if ($districts) {
            return response()->json(['districts' => $districts], \Config::get('common.SUCCESS_CODE'));
        }
        return response()->json([
                'success' => false,
            ], \Config::get('common.CLIENT_ERROR_CODE'));
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
