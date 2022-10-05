<?php

namespace App\Http\Controllers;

use App\Department;
use App\Designation;
use App\Employee;
use App\Performapp;
use Illuminate\Http\Request;

class PerformappController extends Controller
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
        $performapp = Performapp::all();
        $employee = Employee::all();
        $designation = Designation::all();
        $department = Department::all();
        return view('Performance.performapp.index', compact('performapp', 'designation', 'department', 'employee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Performance.performapp.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $performapp = new Performapp();
        $performapp->employee_id = $request->get('employee');
        $performapp->date = $request->get('date');
        $performapp->status = $request->get('status');
        $performapp->cust_experience = $request->get('cust_experience');
        $performapp->marketing = $request->get('marketing');
        $performapp->management = $request->get('management');
        $performapp->administration = $request->get('administration');
        $performapp->present_skill = $request->get('present_skill');
        $performapp->quality_work = $request->get('quality_work');
        $performapp->efficiency = $request->get('efficiency');
        $performapp->integrity = $request->get('integrity');
        $performapp->professionalism = $request->get('professionalism');
        $performapp->team_work = $request->get('team_work');
        $performapp->critical_thingking = $request->get('critical_thingking');
        $performapp->conflict_manage = $request->get('conflict_manage');
        $performapp->attendance = $request->get('attendance');
        $performapp->ability_deadline = $request->get('ability_deadline');
        $performapp->save();

        return redirect()->back();


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
        $performapp = Performapp::find($id);
        return $performapp;
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
        $performapp = Performapp::find($id);
        $input = $request->all();
        $performapp->fill($input)->save();

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
        Performapp::find($id)->delete();
        return redirect()->back();
    }
}
