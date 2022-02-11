<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $states = State::all();
        if($request->has('search')){
            $cities = City::where('country_id','like','%'.$request->search.'%')
            ->orwhere('name','like','%'.$request->search.'%')->get();
            return view('city.index',compact('cities','states'));
        }


        // dd($states);
        $cities = City::all();
        return view('city.index',compact('cities','states'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = State::all();
        return view('city.create',compact('states'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
           // dd($request->all() , $country);
           $validated = $request->validate([
            'states_id' => ['required'],
            'name' => ['required', 'string', 'unique:cities'],
        ]);
        City::create([
            'states_id' => $request->states_id,
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
        $states = State::all();
        return view("city.edit",compact('city','states'));
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
            'states_id' => ['required'],
            'name' => ['required', 'string', 'unique:cities,name,'.$city->id],
        ]);

        $city->update([
            'states_id' => $request->states_id,
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
