<?php

namespace App\Http\Controllers;

use App\Department;
use App\Termination;
use Illuminate\Http\Request;

class TerminationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $terminations = Termination::all();
        $departement = Department::all();

        return view('termination.index', compact('terminations', 'departement'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('termination.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $terminations= new Termination();
        $terminations->term_employee = $request->get('term_employee');
        $terminations->term_type = $request->get('term_type');
        $terminations->term_date = $request->get('term_date');
        $terminations->departement = $request->get('departement');
        $terminations->reason = $request->get('reason');
        $terminations->not_date = $request->get('not_date');
        $terminations->save();

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
        $terminations = Termination::find($id);
        return $terminations;
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
        $terminations = Termination::find($id);
        $terminations->term_employee = $request->get('term_employee');
        $terminations->term_type = $request->get('term_type');
        $terminations->term_date = $request->get('term_date');
        $terminations->departement = $request->get('departement');
        $terminations->reason = $request->get('reason');
        $terminations->not_date = $request->get('not_date');
        $terminations->save();

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
        $terminations = Termination::find($id)->delete();
        return redirect()->back();
    }
}
