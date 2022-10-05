<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Resignation;
use Illuminate\Http\Request;

class ResignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resignation = Resignation::all();
        $employee = Employee::all();
        return view('resignation.index', compact('resignation', 'employee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('resignation.index', compact('resignation'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $resignation= new Resignation();
        $resignation->resig_employee = $request->get('resig_employee');
        $resignation->not_date = $request->get('not_date');
        $resignation->resig_date = $request->get('resig_date');
        $resignation->reason = $request->get('reason');
        $resignation->save();

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
        $resignation = Resignation::find($id);
        return $resignation;
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
        $resignation = Resignation::find($id);
        $input = $request->all();
        $resignation->fill($input)->save();

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
        $resignation = Resignation::find($id)->delete();
        return redirect()->back();
    }
}
