<?php

namespace App\Http\Controllers;

use App\Department;
use App\Interquest;
use Illuminate\Http\Request;

class InterquestController extends Controller
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
        $interquest = Interquest::all();
        $department = Department::all();
        return view('Jobs.interquest.index', compact('interquest', 'department'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Jobs.interquest.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $interquest= new Interquest();
        $interquest->category = $request->get('category');
        $interquest->department = $request->get('department');
        $interquest->question = $request->get('question');
        $interquest->opa = $request->get('opa');
        $interquest->opb = $request->get('opb');
        $interquest->opc = $request->get('opc');
        $interquest->opd = $request->get('opd');
        $interquest->cor_answer = $request->get('cor_answer');
        $interquest->exp_answer = $request->get('exp_answer');
        $interquest->save();

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
        $interquest = Interquest::find($id);
        return $interquest;
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
        $interquest = Interquest::find($id);
        $input = $request->all();
        $interquest->fill($input)->save();

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
        $interquest = Interquest::find($id)->delete();
        return redirect()->back();
    }
}
