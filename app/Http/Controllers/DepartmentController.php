<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentStoreRequest;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $departments = Department::
            where('name','like','%'.$request->search.'%')->get();
            return view('depertment.index',compact('departments'));
        }

        $departments = Department::all();
        return view('depertment.index',compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('depertment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartmentStoreRequest $request)
    {
        Department::create([
            'name' => $request->name,
        ]);
        return redirect()->route('departments.index')->with('success','Department Create successfully');
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
    public function edit(Department $department)
    {
        return view("depertment.edit",compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'unique:departments,name,'.$department->id],
        ]);
        $department->update([
            'name' => $request->name,
        ]);
        return redirect()->route('departments.index')->with('success','Department Update successfully');
    }


    public function destroy(Department $department)
    {
        if($department->delete()){
            return redirect()->route('departments.index')->with('success','Department Delete successfully');
        }
    }
}
