<?php

namespace App\Http\Controllers;

use App\Cuti;
use App\Leaves;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DateTime;
use Illuminate\Support\Facades\DB;

class LeavesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leaves = Leaves::orderBy('created_at', 'desc')->get();
        $new_leave = DB::table('tbl_leaves')->whereStatus(NULL)->count();
        $pending_leave = DB::table('tbl_leaves')->whereStatus('Pending')->count();
        $approved_leave = DB::table('tbl_leaves')->whereStatus('Approved')->count();
        $declined_leave = DB::table('tbl_leaves')->whereStatus('Declined')->count();

        // dd($pending_leave);
        return view('Employees.leaves.index', compact('leaves', 'new_leave', 'pending_leave', 'approved_leave', 'declined_leave'));
    }

    public function index_admin(Request $request)
    {
        if ($request->emp_name) {
            $today = Carbon::now();
            $leaves = Leaves::where('name', 'like', '%' . $request->emp_name . '%')->get();
        } elseif($request->from_date) {
            $today = Carbon::now();
            $leaves = Leaves::where('from_date', 'like', '%' . $request->from_date . '%')->get();
        } elseif ($request->to_date) {
            $today = Carbon::now();
            $leaves = Leaves::where('to_date', 'like', '%' . $request->to_date . '%')->get();
        }
        else {
            $today = Carbon::now();
            $leaves = Leaves::orderBy('created_at', 'desc')->get();
        }

        return view('Employees.leaves.index_admin', compact('leaves'));
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
        $request->validate([
            'leave_type'   => 'required|string|max:255',
            'from_date'    => 'required|string|max:255',
            'to_date'      => 'required|string|max:255',
        ]);

        DB::beginTransaction();
        try {

            $from_date = new DateTime($request->from_date);
            $to_date = new DateTime($request->to_date);
            $day     = $from_date->diff($to_date);
            $dayst    = $day->d;
            $days = $dayst+1;

            $leaves = new Leaves();
            $leaves->name          = $request->name;
            $leaves->leave_type    = $request->leave_type;
            $leaves->from_date     = $request->from_date;
            $leaves->to_date       = $request->to_date;
            $leaves->days          = $days;
            $leaves->leave_reason  = $request->leave_reason;
            $leaves->save();

            DB::commit();
            return redirect()->back()->with('success');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('failed');
        }
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
        $request->validate([
            'leave_type'   => 'required|string|max:255',
            'from_date'    => 'required|string|max:255',
            'to_date'      => 'required|string|max:255',
        ]);

        DB::beginTransaction();
        try {

            $from_date = new DateTime($request->from_date);
            $to_date = new DateTime($request->to_date);
            $day     = $from_date->diff($to_date);
            $dayst    = $day->d;
            $days = $dayst+1;

            $leaves = Leaves::find($id);
            $leaves->leave_type    = $request->leave_type;
            $leaves->from_date     = $request->from_date;
            $leaves->to_date       = $request->to_date;
            $leaves->days          = $days;
            $leaves->leave_reason  = $request->leave_reason;
            $leaves->save();

            DB::commit();
            return redirect()->back()->with('success');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Leaves::find($id)->delete();
        return redirect()->back();
    }

    public function approve_Pending($id)
    {
        $leaves = Leaves::find($id);
        $leaves->status = 'Pending';
        $leaves->save();
        return redirect()->back();
    }
    public function approve_approved($id)
    {
        $leaves = Leaves::find($id);
        $leaves->status = 'Approved';
        $leaves->save();
        return redirect()->back();
    }
    public function approve_declined($id)
    {
        $leaves = Leaves::find($id);
        $leaves->status = 'Declined';
        $leaves->save();
        return redirect()->back();
    }

    public function reportsindex()
    {
        // $leaves = Leaves::orderBy('created_at', 'desc')->get();
        $leaves = DB::table('tbl_leaves')
        ->join('users', 'users.name', '=', 'tbl_leaves.name')
        ->join('tbl_employees', 'users.employee_id', '=', 'tbl_employees.id')
        ->leftjoin('tbl_departments', 'tbl_employees.department_id', '=', 'tbl_departments.id')
        ->select('tbl_leaves.*', 'users.name', 'users.role',
         'tbl_employees.employee_id', 'tbl_employees.employee_id', 'tbl_employees.f_name', 'tbl_employees.l_name',
         'tbl_departments.slug',)
        ->orderBy('created_at', 'desc')
        ->get();
        dd($leaves);

        return view('Reports.leave-reports.index', compact('leaves'));
    }
}
