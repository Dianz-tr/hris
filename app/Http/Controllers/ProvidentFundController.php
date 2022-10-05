<?php

namespace App\Http\Controllers;

use App\Designation;
use App\Employee;
use App\Provident_fund;
use Illuminate\Http\Request;

class ProvidentFundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $employees = Employee::all();
        // $designation = Designation::all();
        $providents = Provident_fund::all();
        return view('HR.Sales.ProvidentFund.index', [
            'providents' => $providents,
            'employees' => $employees,
            // 'designation' => $designation
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $employees = Employee::all();
        return view('HR.Sales.ProvidentFund.create', [
            'employees' => $employees
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $providents = new Provident_fund();

        $providents->employee_name = $request->employee_name;
        $providents->provident_type = $request->provident_type;
        $providents->employee_share_amount = $request->employee_share_amount;
        $providents->organization_share_amount = $request->organization_share_amount;
        $providents->employee_share = $request->employee_share;
        $providents->organization_share = $request->organization_share;
        $providents->description = $request->description;
        $providents->save();

        // dd($providents);
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
        // //
        // $providents = Provident_fund::find($id);
        // // dd($providents);
        // return $providents;
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
        //
        $providents = Provident_fund::find($id);
        // dd($providents);

        $providents->employee_name = $request->employee_name;
        $providents->provident_type = $request->provident_type;
        $providents->employee_share_amount = $request->employee_share_amount;
        $providents->organization_share_amount = $request->organization_share_amount;
        $providents->employee_share = $request->employee_share;
        $providents->organization_share = $request->organization_share;
        $providents->description = $request->description;
        $providents->save();

        return redirect(route('dtProvident'));
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
        $providents = Provident_fund::find($id);
        $providents->delete();

        return redirect()->back();
    }
}
