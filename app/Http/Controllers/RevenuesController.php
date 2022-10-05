<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Revenue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class RevenuesController extends Controller
{
    //  
    public function index()
    {
        $revenues = Revenue::all();
        $categories = Categorie::all();
        return view('HR.Accounting.Budget_revenues.index', [
            'revenues' => $revenues,
            'categories' => $categories
        ]);
    }

    public function dataRevenues()
    {
        $revenues = Revenue::with('categories')->get();
        return $revenues;
    }

    public function insertRevenues(Request $request)
    {
        $file = $request->file('file');
        $filename = time() . '_' . $file->getClientOriginalName();

        // File extension
        // $extension = $file->getClientOriginalExtension();

        // File upload location
        $location = 'uploads/revenues/';

        // Upload file
        $file->move($location, $filename);

        // File path
        $filepath = 'uploads/revenues/' . $filename;

        $revenue = new Revenue();
        $revenue->note = $request->note;
        $revenue->revenue_date = $request->revenue_date;
        $revenue->amount = $request->amount;
        $revenue->category_id = $request->category_id;
        $revenue->file = $filepath;
        $revenue->save();

        return response()->json([
            'data' => $revenue
        ]);
    }

    public function editRevenues($id)
    {
        $revenues = Revenue::find($id);
        // $revenue = revenue::all();
        return $revenues;
    }

    public function updateRevenues(Request $request, $id)
    {
        $revenue = Revenue::find($id);
        $imageOld = $revenue->file;
        if ($request->hasFile('file')) {

            File::delete(public_path($imageOld));

            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();

            // File upload location
            $location = 'uploads/revenues/';

            // Upload file
            $file->move($location, $filename);

            // File path
            $filepath = 'uploads/revenues/' . $filename;
        } else {
            $filepath = $imageOld;
        }

        $revenue->note = $request->note;
        $revenue->file = $filepath;
        $revenue->amount = $request->amount;
        $revenue->revenue_date = $request->revenue_date;
        $revenue->category_id = $request->category_id;
        $revenue->save();

        return response()->json(['success' => 'Status change successfully.', 'data' => $revenue]);
    }

    public function deleteRevenues($id)
    {
        $revenues = Revenue::find($id)->delete();
        return response()->json($revenues);
    }
}
