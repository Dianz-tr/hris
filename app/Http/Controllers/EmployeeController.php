<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Session;

use App\Employee;
use App\Role;
use App\Department;
use App\Designation;
use App\Salary;
use App\User;

class EmployeeController extends Controller
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
    public function index(Request $request)
    {
    //     if($request->employee_id){
    //         $employees = Employee::where('employee_id', 'like', '%'.$request->employee_id.'%')->get();
    //         $designation = Designation::get();
    //         $department = Department::get();
    //     }elseif($request->name){
    //         $employees = Employee::where('f_name', 'like', '%'.$request->name.'%')->get();
    //     if ($request->employee_id) {
    //         $employees = Employee::where('employee_id', 'like', '%' . $request->employee_id . '%')->get();
    //         // $employees = Employee::where('f_name', 'like', '%'.$request->name.'%')->get();
    //         // $designation = Designation::where('name', 'like', '%'.$request->designation_name.'%')->get();
    //         $designation = Designation::get();
    //         $department = Department::get();
    //     } elseif ($request->name) {
    //         $employees = Employee::where('f_name', 'like', '%' . $request->name . '%')->get();
    //         // $designation = Designation::where('name', 'like', '%'.$request->designation_name.'%')->get();
    //         $designation = Designation::get();
    //         $department = Department::get();
            // }elseif($request->designation_name){
            //     // $employees = Employee::where('f_name', 'like', '%'.$request->name.'%')->get();
            //     $designation = Designation::where('name', 'like', '%'.$request->designation_name.'%')->get();
            //     // $designation = Designation::get();
            //     $employees = Employee::get();
            //     $department = Department::get();
        // } else {
            $employees = Employee::get();
            $designation = Designation::get();
            $department = Department::get();
        // }

        return view('Employees.employee.index', compact(
            'employees',
            'designation',
            'department'
            // 'users' => User::all(),
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
        $this->validate($request, [
            'email' => 'required|string|email|max:255|unique:tbl_employees',
        ]);

        $employee_id = Helper::IDGenerator(new Employee, 'employee_id', 4, 'FT-');
        /** Generate id */

        $employee = new Employee();
        $employee->employee_id = "" . $employee_id;
        $employee->f_name = $request->get('f_name');
        $employee->l_name = $request->get('l_name');
        $employee->email = $request->get('email');
        $employee->join = $request->get('join');
        $employee->phone = $request->get('phone');
        $employee->company = $request->get('company');
        $employee->designation_id = $request->get('designation_id');
        $employee->department_id = $request->get('department_id');
        $employee->save();

        return redirect()->back()->with('success', 'ok');
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
        $employee = Employee::find($id);
        $input = $request->all();
        $employee->fill($input)->save();

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
        $employee = Employee::findOrFail($id);
        $employee->delete();

        Session::flash('success', 'Employee deleted');
        return redirect()->back();
    }

    public function reportsindex()
    {
        $employees = Employee::all();
        $designation = Designation::all();
        $department = Department::all();
        $user = User::all();
        $salary = Salary::pluck('net_salary');

        // dd($salary);

        return view('Reports.employee-reports.index', compact('employees', 'designation', 'department', 'salary'));
    }

    public function indexpdf()
    {
        $employee = $this->employee->get();

        return view('Reports.employee-reports.index', ['employee' => $employee]);
    }

    public function downloadPDF()
    {
        $employee = $this->employee->get();

        // load view for pdf file
        $pdf = PDF::loadView('pdf.users', ['employee' => $employee]);

        return $pdf->download('employee.pdf');
    }

    public function viewPDF()
    {
        //get all users
        $users = $this->user->get();

        // load view for pdf
        $pdf = PDF::loadView('pdf.users', ['users' => $users]);

        // stream pdf on browser
        return $pdf->stream();
    }
}
