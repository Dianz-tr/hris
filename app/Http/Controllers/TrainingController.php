<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Trainers;
use App\Training;
use App\Trainingtype;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trainers = Trainers::all();
        $trainingtype = Trainingtype::all();
        $employee = Employee::all();
        $training = Training::all();
        return view('Training.training.index', compact('training', 'trainers', 'trainingtype', 'employee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
       return view('Training.training.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $training= new Training();
        $training->training_type = $request->get('training_type');
        $training->trainer = $request->get('trainer');
        $training->employee = $request->get('employee');
        $training->start_date = $request->get('start_date');
        $training->end_date = $request->get('end_date');
        $training->description = $request->get('description');
        $training->cost = $request->get('cost');
        $training->status = $request->get('status');
        $training->save();

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
        $training = Training::find($id);
        return $training;
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
        $training = Training::find($id);
        $input = $request->all();
        $training->fill($input)->save();

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
        $training = Training::find($id)->delete();
        return redirect()->back();
    }
}
