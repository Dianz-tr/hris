<?php

namespace App\Http\Controllers;

use App\Goal;
use App\Goaltype;
use Illuminate\Http\Request;

class GoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $goaltype = Goaltype::all();
        $goal = Goal::all();
        return view('Goals.goal.index', ['goaltype' => $goaltype], compact('goal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Goals.goal.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $goal= new Goal();
        $goal->goal_type = $request->get('goal_type');
        $goal->subject = $request->get('subject');
        $goal->target_achievement = $request->get('target_achievement');
        $goal->start_date = $request->get('start_date');
        $goal->end_date = $request->get('end_date');
        $goal->description = $request->get('description');
        $goal->status = $request->get('status');
        $goal->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Goal  $goal
     * @return \Illuminate\Http\Response
     */
    public function show(Goal $goal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Goal  $goal
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $goal = Goal::find($id);
        return $goal;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Goal  $goal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $goal = Goal::find($id);
        $input = $request->all();
        $goal->fill($input)->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Goal  $goal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $goal = Goal::find($id)->delete();
            return redirect()->back();
    }
}
