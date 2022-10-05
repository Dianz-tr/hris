<?php

namespace App\Http\Controllers;

use App\Client;
use App\detailEstimate;
use App\Estimate;
use App\Project;
use App\Tax;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;

class EstimateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $taxes = Tax::all();
        $projects = Project::all();
        $clients = Client::all();
        // $estimates = Estimate::all();
        $estimates = Estimate::with('clients', 'projects', 'taxes')->get();
        // dd($estimates);
        return view('HR.Sales.Estimate.index', [
            'estimates' => $estimates,
            'clients' => $clients,
            'projects' => $projects,
            'taxes' => $taxes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        // $estimates = Estimate::with('clients', 'projects', 'taxes')->get();

        // dd($estimates);
        $estimates = Estimate::all();
        $taxes = Tax::all();
        $projects = Project::all();
        $clients = Client::all();
        return view('HR.Sales.Estimate.create', [
            'estimates' => $estimates,
            'clients' => $clients,
            'projects' => $projects,
            'taxes' => $taxes
        ]);
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

        $index = 1;
        $estimate = 'estimate' . $index;
        // return $request->$estimate;
        for ($i = 1; $i <= $request->index; $i++) {
            $detail = new detailEstimate();
            $esti = 'estimate' . $i;
            // return ($request->$itm);
            $detail->item = $request->$esti[0];
            $detail->description = $request->$esti[1];
            $detail->unit_cost = $request->$esti[2];
            $detail->qty = $request->$esti[3];
            $detail->amount = $request->$esti[4];
            $detail->save();
        }

        $estimates = new Estimate();
        // return $request;
        $estimate_id = IdGenerator::generate(['table' => 'tbl_estimates', 'length' => 7, 'prefix' => date('hms')]);
        $estimates->estimate_id = "EST-" . $estimate_id;
        $estimates->client_id = $request->client_id;
        $estimates->project_id = $request->project_id;
        $estimates->email = $request->email;
        $estimates->tax_id = $request->tax_id;
        $estimates->client_address = $request->client_address;
        $estimates->billing_address = $request->billing_address;
        $estimates->estimate_date = $request->estimate_date;
        $estimates->expiry_date = $request->expiry_date;
        $estimates->total = $request->total;
        $estimates->tax = $request->tax;
        $estimates->discount = $request->discount;
        $estimates->grand_total = $request->grand_total;
        $estimates->other_info = $request->other_info;
        $estimates->status = $request->status;

        $estimates->save();

        return redirect(route('dtEstimate'))->with('status', 'successs menambah data !!!!');
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


    public function showdatatax(Request $request)
    {
        $id = $request->id;
        $data = Tax::where('id', $id)->get();
        // $data = Client::where('id_client', $id)->get();
        return response()->json([
            'tax' => $data
        ]);
    }
    public function showdataclients(Request $request)
    {
        $id = $request->id;
        $data = Client::where('id', $id)->get();
        // $data = Client::where('id_client', $id)->get();
        return response()->json([
            'clients' => $data
        ]);
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
        $estimates = Estimate::find($id);
        $taxes = Tax::all();
        $projects = Project::all();
        $clients = Client::all();
        return view('HR.Sales.Estimate.edit', [
            'estimates' => $estimates,
            'clients' => $clients,
            'projects' => $projects,
            'taxes' => $taxes
        ]);
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
        $estimates = Estimate::find($id);

        $estimate_id = IdGenerator::generate(['table' => 'tbl_estimates', 'length' => 7, 'prefix' => date('hms')]);
        $estimates->estimate_id = "EST-" . $estimate_id;
        $estimates->client_id = $request->client_id;
        $estimates->project_id = $request->project_id;
        $estimates->email = $request->email;
        $estimates->tax_id = $request->tax_id;
        $estimates->client_address = $request->client_address;
        $estimates->billing_address = $request->billing_address;
        $estimates->estimate_date = $request->estimate_date;
        $estimates->expiry_date = $request->expiry_date;
        $estimates->item = $request->item;
        $estimates->description = $request->description;
        $estimates->unit_cost = $request->unit_cost;
        $estimates->qty = $request->qty;
        $estimates->amount = $request->amount;
        $estimates->total = $request->total;
        $estimates->tax = $request->tax;
        $estimates->discount = $request->discount;
        $estimates->grand_total = $request->grand_total;

        $estimates->save();

        return redirect(route('dtEstimate'))->with('status', 'successs menambah data !!!!');
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
        $estimates = Estimate::find($id);
        $estimates->delete();

        return redirect()->back();
    }
}
