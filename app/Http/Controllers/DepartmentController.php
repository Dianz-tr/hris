<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use Illuminate\Support\Facades\Session;

class DepartmentController extends Controller
{
    //  public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Employees.departement.index', ['department'=>Department::all()]);
    }

    public function dataDepartement()
    {
        // return view('system_mgmt.departement.index', ['departments'=>Department::all()]);
        $department = Department::all();
        return $department;
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
        $this->validate($request,[
            'name' => 'required'
        ]);
        
        $department = new Department;
        $department->name = $request->name;
        $department->slug = str_slug($request->name);
        $department->save();

        if ($department) {
            $status = "200";
        };
        
        Session::flash('success', 'department created');
        // return redirect()->route('system_mgmt.departments.index');
        return response()->json([
            'status' => $status,
        ]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return view('Employees.departement.index', ['department'=>Department::where('slug',$slug)->first()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = Department::find($id);

        return $department;
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
        $department = Department::findOrFail($id);
        
        $this->validate($request,[
            'name' => 'required'
        ]);
        
        $department->name = $request->name;
        $department->slug = str_slug($request->name);
        $department->save();
        
        Session::flash('success', 'department updated');
        return response()->json();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dpt = Department::find($id)->delete();

        return response()->json($dpt);
    }
}
