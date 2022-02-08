<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CountryStoreRequest;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $countries = Country::where('country_code','like','%'.$request->search.'%')
            ->orwhere('name','like','%'.$request->search.'%')->get();
            return view('country.index',compact('countries'));
        }
        $countries = Country::all();
        // dd($countries);
        return view('country.index',compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('country.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryStoreRequest $request)
    {

        Country::create([
            'country_code' => $request->country_code,
            'name' => $request->name,
        ]);
        return redirect()->route('countries.index')->with('success','Country Create successfully');

        // dd($request->all());
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
    public function edit(Country $country)
    {
        return view("country.edit",compact('country'));

        // dd($country);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        // dd($request->all() , $country);
        $validated = $request->validate([
            'country_code' => ['required', 'string', 'unique:countries,country_code,'.$country->id],
            'name' => ['required', 'string', 'unique:countries,name,'.$country->id],
        ]);

        $country->update([
            'country_code' => $request->country_code,
            'name' => $request->name,
        ]);

        return redirect()->route('countries.index')->with('success','Country Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        if($country->delete()){
            return redirect()->route('countries.index')->with('success','Country Delete successfully');
        }
    }
}
