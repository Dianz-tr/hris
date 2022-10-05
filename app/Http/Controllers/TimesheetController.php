<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Project;
use App\timesheet;
use App\User;
use Illuminate\Http\Request;

class TimesheetController extends Controller
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
        $projec = Project::all();
        $timesh = timesheet::all();
        $employ = timesheet::leftjoin('tbl_projects', 'tbl_timesheets.project_id', '=', 'tbl_projects.id')
            ->join('users', 'tbl_projects.lead_project', '=', 'users.id')
            ->join('tbl_employees', 'users.employee_id', '=', 'tbl_employees.id')
            ->select('tbl_timesheets.*','f_name','l_name')
            ->get();
        // return $employ;
        return view('Employees.timesheet.index', compact(
            'employ',
            'projec',
            'timesh'
        ));
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
        $ts = new Timesheet();
        $ts->project_id = $request->get('project_id');
        $ts->date = $request->get('date');
        $ts->hours = $request->get('hours');
        $ts->description = $request->get('description');
        $ts->save();

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
        $ts = timesheet::findOrFail($id);
        $ts->project_id = $request->get('project_id');
        $ts->date = $request->get('date');
        $ts->hours = $request->get('hours');
        $ts->description = $request->get('description');
        $ts->save();

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
        $times = timesheet::find($id);
        $times->delete();

        return redirect()->back();
    }
}
