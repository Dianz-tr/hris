<?php

namespace App\Http\Controllers;

use App\Trainers;
use Illuminate\Http\Request;

class TrainersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trainer = Trainers::all();
        // dd($trainer);
        return view('Training.trainer.index', compact('trainer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Training.trainer.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $trainer= new Trainers();
        $trainer->fname = $request->get('fname');
        $trainer->lname = $request->get('lname');
        $trainer->role = $request->get('role');
        $trainer->contact = $request->get('contact');
        $trainer->email = $request->get('email');
        $trainer->description = $request->get('description');
        $trainer->status = $request->get('status');
        $trainer->save();

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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $trainer= Trainers::find($id);
        $trainer->fname = $request->get('fname');
        $trainer->lname = $request->get('lname');
        $trainer->role = $request->get('role');
        $trainer->contact = $request->get('contact');
        $trainer->email = $request->get('email');
        $trainer->description = $request->get('description');
        $trainer->status = $request->get('status');
        $trainer->save();

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
        $trainer = Trainers::find($id)->delete();
            return redirect()->back();
    }
}
