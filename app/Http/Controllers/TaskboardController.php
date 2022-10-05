<?php

namespace App\Http\Controllers;

use App\Project;
use App\Taskboard;
use Illuminate\Http\Request;

class TaskboardController extends Controller
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
        $taskboard = Taskboard::all();
        return view('taskboard.index', [
            'taskboard' => $taskboard
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('taskboard.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $taskboard = new Taskboard();
        $taskboard->title = $request->get('title');
        $taskboard->start_date = $request->get('start_date');
        $taskboard->end_date = $request->get('end_date');
        $taskboard->save();

        return redirect('taskboard')->with('success', 'Event has been added');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Taskboard $taskboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Taskboard $taskboard)
    {
        return view('taskboard.edit', [
            'taskboard' => $taskboard
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Project $project)
    // {
    //     //
    // }
    public function update($id, Request $request)
    {
        $this->validate($request, [

            'title' => 'required'

        ]);

        Project::find($id)->update($request->all());

        return redirect()->route('daftarTaskboard')

            ->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(taskboard $taskboards, $id)

    {

        Project::find($id)->delete();

        return redirect()->back();
    }
}
