<?php

namespace App\Http\Controllers;

use App\Tax;
use Illuminate\Http\Request;

class TaxesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $taxes = Tax::All();
        return view('HR.Sales.Taxes.index', [
            'taxes' => $taxes,
        ]);
    }

    public function dataTaxes()
    {
        $taxes = Tax::all();
        return $taxes;
    }

    // public function changeStatus(Request $request, $id)
    // {
    //     $taxes = Tax::find($id);
    //     if ($request->get('status') == '0' || $request->get('status') == '1') {
    //         $taxes->where('status', $request->get('status'));
    //     }
    // }

    public function insertTaxes(Request $request)
    {
        $data = $request->all();
        $taxes = new Tax($data);
        $taxes->save();

        $status = 400;
        $message = "Gagal menyimpan data-Projects!";

        if ($taxes) {
            $status = 200;
            $message = "Berhasil menyimpan data-Projects!";
        }

        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $taxes
        ]);
    }

    public function editTaxes($id)
    {
        $taxes = Tax::find($id);
        return $taxes;
    }

    public function updateTaxes(Request $request, $id)
    {
        $taxes = Tax::find($id);
        $taxes->update($request->all());
        $taxes->save();

        return response()->json(['success' => 'Status change successfully.', 'data' => $taxes]);
    }

    public function deleteTaxes($id)
    {
        $taxes = Tax::find($id);
        $taxes->delete();

        return response()->json();
    }
}
