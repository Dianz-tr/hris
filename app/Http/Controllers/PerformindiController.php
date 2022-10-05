<?php

namespace App\Http\Controllers;

use App\Department;
use App\Designation;
use App\Performindi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PerformindiController extends Controller
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
        $performindi = Performindi::all();
        $designation = Designation::all();
        $department = Department::all();
        $abab = DB::table('tbl_performindis')
            ->join('users', 'tbl_performindis.added_by', '=', 'users.name')
            ->leftjoin('tbl_employees', 'users.employee_id', '=', 'tbl_employees.id')
            ->leftjoin('tbl_departments', 'tbl_employees.department_id', '=', 'tbl_departments.id')
            ->select('tbl_departments.name')
            ->get();
            // dd($abab);
        return view('Performance.performindi.index', compact('performindi', 'designation',  'department', 'abab'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Performance.performindi.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $performindi = new Performindi();
        $performindi->designation_id = $request->get('designation_id');
        // $performindi->department = $request->get('departement');
        $performindi->added_by = Auth::user()->name;
        $performindi->cust_experience = $request->get('cust_experience');
        $performindi->integrity = $request->get('integrity');
        $performindi->marketing = $request->get('marketing');
        $performindi->professionalism = $request->get('professionalism');
        $performindi->management = $request->get('management');
        $performindi->team_work = $request->get('team_work');
        $performindi->administration = $request->get('administration');
        $performindi->critical_thinking = $request->get('critical_thinking');
        $performindi->present_skill = $request->get('present_skill');
        $performindi->conflict_management = $request->get('conflict_management');
        $performindi->quality_work = $request->get('quality_work');
        $performindi->attendance = $request->get('attendance');
        $performindi->efficiency = $request->get('efficiency');
        $performindi->abblity_deadline = $request->get('abblity_deadline');
        $performindi->status = $request->get('status');
        $performindi->save();

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
        $performindi = Performindi::find($id);
        return $performindi;
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
        $performindi = Performindi::find($id);
        $input = $request->all();
        $performindi->fill($input)->save();

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
        Performindi::find($id)->delete();
        return redirect()->back();
    }
}
