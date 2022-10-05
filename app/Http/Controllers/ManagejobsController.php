<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\Department;
use App\Expense;
use App\Invoice;
use App\Managejobs;
use App\Tax;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ManagejobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $managejobs = Managejobs::all();
        $departmen = Department::all();
        $candidate = Candidate::all();
        return view('Jobs.manage_jobs.index', compact('managejobs', 'departmen', 'candidate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Jobs.manage_jobs.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $managejobs =  new Managejobs();
        $managejobs->job_title = $request->get('job-title');
        $managejobs->departmen = $request->get('departmen');
        $managejobs->candidate = $request->get('candidate');
        $managejobs->job_location = $request->get('job_location');
        $managejobs->no_vacancies = $request->get('no_vacancies');
        $managejobs->experience = $request->get('experience');
        $managejobs->age = $request->get('age');
        $managejobs->salary_from = $request->get('salary_from');
        $managejobs->salary_to = $request->get('salary_to');
        $managejobs->job_type = $request->get('job_type');
        $managejobs->status = $request->get('status');
        $managejobs->start_date = $request->get('start_date');
        $managejobs->end_date = $request->get('end_date');
        $managejobs->description = $request->get('description');
        $managejobs->save();

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
        $managejobs = Managejobs::find($id);
        $input = $request->all();
        $managejobs->fill($input)->save();

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
        Managejobs::find($id)->delete();
        return redirect()->back();
    }

    public function dashindex()
    {
        $managejobs = Managejobs::all();
        $departmen = Department::all();
        return view('user-dashboard.index', compact('managejobs', 'departmen'));
    }

    public function manageresume()
    {
        $managejobs = Managejobs::all();
        $departmen = Department::all();
        $candidate = Candidate::all();
        return view('Jobs.manage-resume.index', compact('managejobs', 'departmen', 'candidate'));
    }

    public function shortlistcanidate()
    {
        $managejobs = Managejobs::all();
        $departmen = Department::all();
        $candidate = Candidate::all();
        return view('Jobs.shortlist-candidate.index', compact('managejobs', 'departmen', 'candidate'));
    }

    public function userdashboardjobs()
    {
        $date = Carbon::now();
        $managejobs = Managejobs::all();
        $departmen = Department::all();
        $candidate = Candidate::all();
        return view('Jobs.user-dashboard-jobs.index', compact('managejobs', 'departmen', 'candidate'));
    }

    public function userdashboard()
    {
        $managejobs = Managejobs::all();
        $departmen = Department::all();
        $candidate = Candidate::all();
        return view('Jobs.user-dashboard.index', compact('managejobs', 'departmen', 'candidate'));
    }

    public function offerapproval()
    {
        $managejobs = Managejobs::all();
        $departmen = Department::all();
        $candidate = Candidate::all();
        $expense = Expense::all();
        $taxes = Tax::all();
        $invoices = Invoice::all();
        return view('Jobs.offer-approval.index', compact('managejobs', 'departmen', 'candidate', 'expense', 'taxes', 'invoices'));
    }

  
}
