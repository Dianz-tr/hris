<?php

namespace App\Http\Controllers;

use App\Client;
use App\detailInvoice;
use App\Estimate;
use App\Invoice;
use App\Project;
use App\Tax;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;

class InvoicesController extends Controller
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
        // $invoices = Invoice::all();
        $invoices = Invoice::with('clients', 'projects', 'taxes')->get();
        // return $invoices;
        return view('HR.Sales.Invoices.index', [
            'invoices' => $invoices,
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
        $invoices = Invoice::all();
        $taxes = Tax::all();
        $projects = Project::all();
        $clients = Client::all();
        return view('HR.Sales.Invoices.create', [
            'estimates' => $invoices,
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
        $item = 'item' . $index;
        // return $request;
        for ($i = 1; $i <= $request->index; $i++) {
            $detail = new detailInvoice();
            $itm = 'item' . $i;
            // return ($request->$itm);
            $detail->item = $request->$itm[0];
            $detail->description = $request->$itm[1];
            $detail->unit_cost = $request->$itm[2];
            $detail->qty = $request->$itm[3];
            $detail->amount = $request->$itm[4];
            $detail->save();
        }

        $invoices = new Invoice();
        $invoice_id = IdGenerator::generate(['table' => 'tbl_invoices', 'length' => 7, 'prefix' => date('hms')]);
        $invoices->invoice_id = "#INV-" . $invoice_id;
        $invoices->client_id = $request->client_id;
        $invoices->project_id = $request->project_id;
        $invoices->email = $request->email;
        $invoices->tax_id = $request->tax_id;
        $invoices->client_address = $request->client_address;
        $invoices->billing_address = $request->billing_address;
        $invoices->invoice_date = $request->invoice_date;
        $invoices->expiry_date = $request->expiry_date;
        $invoices->total = $request->total;
        $invoices->tax = $request->tax;
        $invoices->discount = $request->discount;
        $invoices->grand_total = $request->grand_total;
        $invoices->other_info = $request->other_info;
        $invoices->status = $request->status;

        $invoices->save();

        // $invoices = PDF::loadView()

        return redirect(route('dtInvoices'))->with('status', 'successs menambah data !!!!');
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
        $invoices = Invoice::find($id);
        $taxes = Tax::all();
        $projects = Project::all();
        $clients = Client::all();
        return view('HR.Sales.Invoices.edit', [
            'estimates' => $invoices,
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
        $invoices = Invoice::find($id);

        $invoices->invoice_id = $request->invoice_id;
        $invoices->client_id = $request->client_id;
        $invoices->project_id = $request->project_id;
        $invoices->email = $request->email;
        $invoices->tax_id = $request->tax_id;
        $invoices->client_address = $request->client_address;
        $invoices->billing_address = $request->billing_address;
        $invoices->estimate_date = $request->estimate_date;
        $invoices->expiry_date = $request->expiry_date;
        $invoices->item = $request->item;
        $invoices->description = $request->description;
        $invoices->unit_cost = $request->unit_cost;
        $invoices->qty = $request->qty;
        $invoices->amount = $request->amount;
        $invoices->total = $request->total;
        $invoices->tax = $request->tax;
        $invoices->discount = $request->discount;
        $invoices->grand_total = $request->grand_total;

        $invoices->save();

        return redirect(route('dtInvoices'))->with('status', 'successs menambah data !!!!');
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
        $invoices = Invoice::find($id);
        $invoices->delete();

        return redirect()->back();
    }

    public function view($id)
    {
        $invoices = Invoice::find($id);
        $detail = detailInvoice::all();
        return view('HR.Sales.Invoices.view', [
            'invoices' => $invoices,
            'detail ' => $detail
        ]);
    }

    public function reportsindex()
    {
        // $invoices = Invoice::all();
        $invoices = Invoice::with('clients', 'projects', 'taxes')->get();
        // return $invoices;
        return view('Reports.invoices-reports.index', [
            'invoices' => $invoices
            // 'clients' => $clients,
            // 'projects' => $projects,
            // 'taxes' => $taxes
        ]);
    }
}
