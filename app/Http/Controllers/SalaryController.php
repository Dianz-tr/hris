<?php

namespace App\Http\Controllers;

use App\Department;
use App\Employee;
use App\Helpers\Helper;
use App\Salary;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;

class SalaryController extends Controller
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
        $salary = Salary::all();
        $employee = Employee::get();
        return view('Payroll.employee-salary.index', compact('salary', 'employee'));
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
        $id_salary = Helper::IDGenerator(new Salary, 'id_salary', 4, '#');

        $com = new Salary();
        $com->id_salary =  $id_salary;
        $com->employee_id = $request->get('employee_id');
        $com->for_month = $request->get('for_month');
        $com->net_salary = $request->get('net_salary');
        $com->basic = $request->get('basic');
        $com->da = $request->get('da');
        $com->hra = $request->get('hra');
        $com->conveyance = $request->get('conveyance');
        $com->allowance = $request->get('allowance');
        $com->medical_allowance = $request->get('medical_allowance');
        $com->other_earnings = $request->get('other_earnings');
        $com->tds = $request->get('tds');
        $com->esi = $request->get('esi');
        $com->pf = $request->get('pf');
        $com->leave = $request->get('leave');
        $com->prof_tax = $request->get('prof_tax');
        $com->labour_welfare = $request->get('labour_welfare');
        $com->other_deduction = $request->get('other_deduction');

        $com->netSalary();
        $com->save();

        return redirect()->back();

        // return redirect()->route('payrolls.show', ['id' => $id]);  
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
        $sum = Salary::find($id);
        $sum->update($request->all());
        $sum->netSalary();
        $sum->save();

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
        Salary::find($id)->delete();

        return redirect()->back();
    }

    public function generate($id) {
        $salary = Salary::find($id);
        $employee = Employee::all();
        $total_earnings = $salary->basic + $salary->da + $salary->hra + $salary->conveyance + $salary->allowance + $salary->medical_allowance + $salary->other_earnings;
        $total_deductions = $salary->tds + $salary->esi + $salary->pf + $salary->leave + $salary->prof_tax + $salary->labour_welfare + $salary->other_deduction;
        // dd($total_deductions);
        return view('Payroll.employee-salary.show', compact('salary', 'employee', 'total_earnings', 'total_deductions'));
    }

    public function reportsindex()
    {
        $salary = Salary::all();
        $employee = Employee::get();
        $department = Department::get();
        return view('Reports.payslip-reports.index', compact('salary', 'employee', 'department'));
    }
}
