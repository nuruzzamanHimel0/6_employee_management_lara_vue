<?php

namespace App\Http\Controllers;

use App\Http\Requests\StateStoreRequest;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $states = State::all();
        $countries = Country::all();
        // dd($states);
        return view('state.index',compact('states','countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return view('state.create',compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StateStoreRequest $request)
    {

        State::create([
            'country_id' => $request->country_id,
            'name' => $request->name,
        ]);
        return redirect()->route('states.index')->with('success','State Create successfully');
        // dd($request->all() );
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
    public function edit(State $state)
    {

        $countries = Country::all();
        return view("state.edit",compact('state','countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, State $state)
    {
          // dd($request->all() , $country);
          $validated = $request->validate([
            'country_id' => ['required'],
            'name' => ['required', 'string', 'unique:states,name,'.$state->id],
        ]);

        $state->update([
            'country_id' => $request->country_id,
            'name' => $request->name,
        ]);

        return redirect()->route('states.index')->with('success','State Update successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(State $state)
    {
        if($state->delete()){
            return redirect()->route('countries.index')->with('success','State Delete successfully');
        }
    }
}
