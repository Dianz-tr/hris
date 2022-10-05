<?php

namespace App\Http\Controllers;

use App\Department;
use App\Designation;
use App\Employee;
use App\Promotion;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PromotionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promotions = Promotion::with('employee')->get();
        $employees = Employee::all();
        // $department = Department::all();
        $designation = Designation::all();
        // dd($promotions);
        return view('promotions.index', compact('promotions', 'employees','designation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('promotions.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $promotions = new Promotion();
        $promotions->prom_for = $request->get('prom_for');
        // $promotions->department = $request->get('department');
        $promotions->prom_designation_from = Auth::user()->name;
        $promotions->prom_designation_to = $request->get('prom_designation_to');
        $promotions->prom_date = $request->get('prom_date');
        $promotions->save();
    

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

    public function showData(Request $request)
    {
        $id = $request->id;
        $data = Employee::where('id', $id)->get();
        // $data = Client::where('id_client', $id)->get();
        return response()->json([
            'employee' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $promotions = Promotion::find($id);
        return $promotions;
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
        $promotions = Promotion::find($id);
        $input = $request->all();
        $promotions->fill($input)->save();

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
        Promotion::find($id)->delete();
        return redirect()->back();
    }
}
