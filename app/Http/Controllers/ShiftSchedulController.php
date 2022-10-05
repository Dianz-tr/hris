<?php

namespace App\Http\Controllers;

use App\Department;
use App\Employee;
use App\Scheduling;
use App\Shift;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShiftSchedulController extends Controller
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
        $sch2 = Carbon::now()->toDateString();
        $sch3 = Carbon::now()->addDays(1)->toDateString();
        $sch4 = Carbon::now()->addDays(2)->toDateString();
        $sch5 = Carbon::now()->addDays(3)->toDateString();
        $sch6 = Carbon::now()->addDays(4)->toDateString();
        $sch7 = Carbon::now()->addDays(5)->toDateString();
        $sch8 = Carbon::now()->addDays(6)->toDateString();
        $sch9 = Carbon::now()->addDays(7)->toDateString();
        $sch10 = Carbon::now()->addDays(8)->toDateString();
        
        $today = Carbon::now();
        $employee = Employee::get();
        $department = Department::get();
        $shift = Shift::get();
        $star = Scheduling::all();
        $end = Scheduling::pluck('end_t', 'id');
              // $total_time = $star + $end;
        $schedceduling = DB::table('tbl_schedulings')
            ->join('tbl_employees', 'tbl_employees.id', '=', 'tbl_schedulings.employee_id')
            ->join('tbl_departments', 'tbl_departments.id', '=', 'tbl_employees.department_id')
            ->join('tbl_shifts', 'tbl_schedulings.shift_id', '=', 'tbl_shifts.id')
            ->select('tbl_schedulings.*','f_name', 'l_name', 'slug', 'tbl_shifts.name')
            ->where('date', '>=', $sch2)
            ->where('date', '<=', $sch10)
            ->orderby('date', 'asc')
            ->get()->groupBy('employee_id');
        // dd($schedceduling);
        return view('Employees.shift-scheduling.scheduling.index', compact(
            'schedceduling',
            'today',
            'employee',
            'department',
            'shift',
            'sch2','sch3','sch4','sch5','sch6','sch7','sch8','sch9', 'sch10'
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
        $schedule = new Scheduling();
        $schedule->department_id = $request->department_id;
        $schedule->employee_id = $request->employee_id;
        $schedule->shift_id = $request->shift_id;
        $schedule->date = $request->date;
        $schedule->min_star_t = $request->min_star_t;
        $schedule->star_t = $request->star_t;
        $schedule->max_star_t = $request->max_star_t;
        $schedule->min_end_t = $request->min_end_t;
        $schedule->end_t = $request->end_t;
        $schedule->max_end_t = $request->max_end_t;
        $schedule->break_t = $request->break_t;
        $schedule->save();

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


    public function showdata(Request $request)
    {
        $id = $request->id;
        $data = Shift::where('id', $id)->get();
        // return $data;
        // $data = Client::where('id_client', $id)->get();
        return response()->json([
            'shift' => $data
        ]);

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
        $sch = Scheduling::find($id);
        $sch->update($request->all());
        $sch->save();

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
        //
    }

    public function shifts()
    {
        $today = Carbon::now();
        $employee = Employee::get();
        $department = Department::get();
        $shift = Shift::get();
        return view('Employees.shift-scheduling.shift.index', [
            'today' => $today,
            'shift' => $shift,
            'employee' => $employee,
            'department' => $department,
        ]);
    }
    public function shift_store(Request $request)
    {
        $shift = new Shift();
        $shift->name = $request->name;
        $shift->min_star_t = $request->min_star_t;
        $shift->star_t = $request->star_t;
        $shift->max_star_t = $request->max_star_t;
        $shift->min_end_t = $request->min_end_t;
        $shift->end_t = $request->end_t;
        $shift->max_end_t = $request->max_end_t;
        $shift->break_t = $request->break_t;
        $shift->repeat_every = $request->repeat_every;
        $shift->end_on = $request->end_on;
        $shift->add_tag = $request->add_tag;
        $shift->add_note = $request->add_note;
        $shift->save();

        return redirect()->back();
    }

    public function shift_update(Request $request, $id)
    {
        $shift = Shift::find($id);
        $shift->update($request->all());
        $shift->save();

        return redirect()->back();
    }
    
    public function shift_destroy($id)
    {
        Shift::find($id)->delete();
        return redirect()->back();
    }
}
