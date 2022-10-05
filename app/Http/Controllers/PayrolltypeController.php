<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Payrolltype;
use App\payrolltypeadition;
use App\Payrolltypededuction;
use App\Payrolltypeovertime;
use Illuminate\Http\Request;

class PayrolltypeController extends Controller
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
        $payrolltypeaddition = payrolltypeadition::get();
        $payrolltypeovertime = Payrolltypeovertime::get();
        $payrolltypededuction = Payrolltypededuction::get();
        return view('Payroll.payroll-item.main', compact(
            'payrolltypeaddition',
            'payrolltypeovertime',
            'payrolltypededuction'
        ));
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
        if($request->get('name_a')){
            $typeadition = new payrolltypeadition();
            $typeadition->name = $request->get('name_a');
            $typeadition->category = $request->get('category_a');
            $typeadition->amount = $request->get('amount_a');
            $typeadition->save();
        }
        elseif($request->get('name_o')) {
            $typeovertime = new Payrolltypeovertime();
            $typeovertime->name = $request->get('name_o');
            $typeovertime->rate_type = $request->get('rtype_o');
            $typeovertime->rate = $request->get('rate_o');
            $typeovertime->save();
        }
        elseif($request->get('name_d')) {
            $typedeductions = new Payrolltypededuction();
            $typedeductions->name = $request->get('name_d');
            $typedeductions->amount = $request->get('amount_d');
            $typedeductions->save();
        }

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
        // dd($request);
        if($request->type == '1'){
            $paytype = payrolltypeadition::find($id);
            $input =  $request->only('name', 'category', 'amount');
            // dd($input);
            $paytype->fill($input)->save();
        }
        if($request->type == '2'){
            $paytype = Payrolltypeovertime::find($id);
            $input =  $request->only('name', 'rate_type', 'rate');
            // dd($input);
            $paytype->fill($input)->save();
        }
        if($request->type == '3'){
            $paytype = Payrolltypededuction::find($id);
            $input =  $request->only('name', 'amount');
            // dd($input);
            $paytype->fill($input)->save();
        }
        // $paytype = payrolltypeadition::find($id);
        // $paytype = Payrolltypeovertime::find($id);
        // $paytype = Payrolltypededuction::find($id);
        // $input = $request->all();
        // $paytype->fill($input)->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $type)
    {
        // dd($id, $type);
        if($type == 1){
            payrolltypeadition::find($id)->delete();
        }
        if($type == 2){
            Payrolltypeovertime::find($id)->delete();
        }
        if($type == 3){
            Payrolltypededuction::find($id)->delete();
        }

        return redirect()->back();
    }
}
