<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\Department;
use App\Designation;
use App\Employee;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $candidate = Candidate::all();
       $employee = Employee::all();
       $designation = Designation::all();
       $departmen = Department::all();
    //    dd($candidate);
       return view('Jobs.candidate.index', compact('candidate', 'employee', 'designation', 'departmen')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Jobs.candidate.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $candidate= new Candidate();
        $candidate->fname = $request->get('fname');
        $candidate->lname = $request->get('lname');
        $candidate->contact = $request->get('contact');
        $candidate->email = $request->get('email');
        $candidate->employee_id = $request->get('employee_id');
        $candidate->start_date = $request->get('start_date');
        $candidate->save();

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
        $candidate = Candidate::find($id);
        return $candidate;
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
        $candidate= Candidate::find($id);
        $candidate->fname = $request->get('fname');
        $candidate->lname = $request->get('lname');
        $candidate->contact = $request->get('contact');
        $candidate->email = $request->get('email');
        $candidate->employee_id = $request->get('employee_id');
        $candidate->start_date = $request->get('start_date');
        $candidate->save();

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
        $candidate = Candidate::find($id)->delete();
        return redirect()->back();
    }

    public function reportsindex()
    {
       $candidate = Candidate::all();
       $employee = Employee::all();
       $designation = Designation::all();
       $departmen = Department::all();
    //    dd($designation);
       return view('Jobs.shortlist-candidate.index', compact('candidate', 'employee', 'department', 'designation')); 
    }

    public function dashindex()
    {
        $candidate = Candidate::all();
     //    dd($candidate);
        return view('Jobs.user-dashboard-jobs.index', compact('candidate')); 
    }

}
