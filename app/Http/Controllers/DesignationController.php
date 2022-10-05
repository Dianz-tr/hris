<?php

namespace App\Http\Controllers;

use App\Department;
use App\Designation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DesignationController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $department = Department::all();
        // $designation = Designation::all();
        // return view('Employees.designation.index', [
        //     'designation' => $designation,
        //     'department' => $department
        // ]);
        return view('Employees.designation.index',[
            // 'data'=> Role::all(),
            'designation'=> Designation::get(),
            'department'=> Department::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Employees.designation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            'department_id' => 'required'
        ]);

        Designation::create([
            'name' => $request->name,
            'department_id' => $request->department_id,
        ]);

        Session::flash('success', 'designations created');
        return redirect()->back();
        // return redirect()->route('Employees.designation.index');
        // return response()->json(['Berhasil'
        // ]);
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
        // return view('Employees.designation.edit', [
        //     'department' => Department::finnd($id)
        // ]);
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
        $designations = Designation::find($id);
        $input = $request->all();
        $designations->fill($input)->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $designation = Designation::find($id)->delete();
        return redirect()->back();
    }
}
