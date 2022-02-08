<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::all();
        $countries = Country::all();
        // dd($cities);
        return view('city.index',compact('cities','countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return view('city.create',compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
           // dd($request->all() , $country);
           $validated = $request->validate([
            'country_id' => ['required'],
            'name' => ['required', 'string', 'unique:cities'],
        ]);
        City::create([
            'country_id' => $request->country_id,
            'name' => $request->name,
        ]);
        return redirect()->route('cities.index')->with('success','City Create successfully');

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
    public function edit(City $city)
    {
        $countries = Country::all();
        return view("city.edit",compact('city','countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {

        // dd($request->all() , $city);
        $validated = $request->validate([
            'country_id' => ['required'],
            'name' => ['required', 'string', 'unique:cities,name,'.$city->id],
        ]);

        $city->update([
            'country_id' => $request->country_id,
            'name' => $request->name,
        ]);

        return redirect()->route('cities.index')->with('success','City Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        if($city->delete()){
            return redirect()->route('cities.index')->with('success','City Delete successfully');
        }
    }
}
