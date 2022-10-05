<?php

namespace App\Http\Controllers;

use App\SalesExpense;
use App\User;
use Faker\Provider\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalesExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        $salesexpense = SalesExpense::all();
        return view('HR.Sales.Expenses.index', [
            'salesexpense' => $salesexpense,
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $salesexpense = new SalesExpense();

        $salesexpense->item = $request->item;
        $salesexpense->purchase_from = $request->purchase_from;
        $salesexpense->purchase_date = $request->purchase_date;
        $salesexpense->purchase_by = $request->purchase_by;
        $salesexpense->amount = $request->amount;
        $salesexpense->paid_by = $request->paid_by;
        $salesexpense->status = $request->status;


        if ($request->hasFile('file')) {
            $request->file('file')->move('uploads/salesExp/', $request->file('file')->getClientOriginalName());
            $salesexpense->file = $request->file('file')->getClientOriginalName();
            $salesexpense->save();
        }
        $salesexpense->save();

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
        $salesexpense = SalesExpense::find($id);
        return $salesexpense;
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
        //
        $salesexpense = SalesExpense::find($id);
        if ($request->hasFile('file')) {
            $destination = 'uploads/salesExp/' . $salesexpense->file;

            $file = $request->file('file');
            $extension = $file->getClientOriginalName();
            $filename = time() . '.' . $extension;
            $file->move('uploads/salesExp/', $filename);
            $salesexpense->file = $filename;
        }

        $salesexpense->item = $request->item;
        $salesexpense->purchase_from = $request->purchase_from;
        $salesexpense->purchase_date = $request->purchase_date;
        $salesexpense->purchase_by = $request->purchase_by;
        $salesexpense->amount = $request->amount;
        $salesexpense->paid_by = $request->paid_by;
        $salesexpense->status = $request->status;

        $salesexpense->save();

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
        //
        SalesExpense::find($id)->delete();
        return redirect()->back();
    }

    // public function reportsindex()
    // {
    //     //
    //     $users = User::all();
    //     $salesexpense = SalesExpense::all();
    //     // return $salesexpense;
    //     return view('Reports.expenses-reports.index', [
    //         'salesexpense' => $salesexpense,
    //         'users' => $users
    //     ]);
    // }

    public function reportsindex(Request $request)
    {
        if($request->from){
            $purchase_date = Request::get('purchase_date');

            $salesexpense = SalesExpense::where('purchase_date', 'like', '%'.$purchase_date.'%')->get();
            $user = User::all();
            // dd($salesexpense);
        }
        else {
            // $users = User::all();
            $salesexpense = SalesExpense::all();
            $user = User::all();
            // return $salesexpense;
        }
        
        return view('Reports.expenses-reports.index', [
            'salesexpense' => $salesexpense,
            'users' => $user
        ]);

        // return view('Reports.expenses-reports.index' , compact('salesexpense'));
    }

    // public function searchindex(Request $request)
    // {
    //     if($request){
    //         $salesexpense = SalesExpense::with('Users')->where('name','like','%'.$request->cari.'%')->get();
    //     }
    //     else{
    //         $salesexpense = SalesExpense::with('Users')->get();
    //     }
    //     // dd($user);
    //     // dd($employee);
    //     return view('Reports.expenses-reports.index', compact('salesexpense', 'users'));
    // }
}
