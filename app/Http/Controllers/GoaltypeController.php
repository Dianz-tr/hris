<?php

namespace App\Http\Controllers;

use App\Goaltype;
use Illuminate\Http\Request;

class GoaltypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $goaltype = Goaltype::all();
        return view('Goals.goaltype.index', compact('goaltype'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Goals.goaltype.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $goaltype= new Goaltype();
        $goaltype->type = $request->get('type');
        $goaltype->description = $request->get('description');
        $goaltype->status = $request->get('status');
        $goaltype->save();

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
        $goaltype = Goaltype::find($id);
        return $goaltype;
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
        $goaltype = Goaltype::find($id);
        $input = $request->all();
        $goaltype->fill($input)->save();

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
        $goaltype = Goaltype::find($id)->delete();
            return redirect()->back();
    }
}
