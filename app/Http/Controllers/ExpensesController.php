<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class ExpensesController extends Controller
{
    //  
    public function index()
    {
        $categories = Categorie::all();
        $expenses = Expense::all();
        return view('HR.Accounting.Budget_expenses.index', [
            'expenses' => $expenses,
            'categories' => $categories
        ]);
    }

    public function dataExpenses()
    {
        $expenses = Expense::with('categories')->get();
        return $expenses;
    }

    public function insertExpenses(Request $request)
    {
        $file = $request->file('file');
        $filename = time() . '_' . $file->getClientOriginalName();

        // File extension
        // $extension = $file->getClientOriginalExtension();

        // File upload location
        $location = 'uploads/expenses/';

        // Upload file
        $file->move($location, $filename);

        // File path
        $filepath = 'uploads/expenses/' . $filename;

        $expense = new Expense();
        $expense->note = $request->note;
        $expense->expense_date = $request->expense_date;
        $expense->amount = $request->amount;
        $expense->category_id = $request->category_id;
        $expense->file = $filepath;
        $expense->save();

        return response()->json([
            'data' => $expense
        ]);
    }

    public function editExpenses($id)
    {
        $expense = Expense::find($id);
        // $revenue = revenue::all();
        return $expense;
    }

    public function updateExpenses(Request $request, $id)
    {
        $expense = Expense::find($id);
        $imageOld = $expense->file;
        if ($request->hasFile('file')) {

            File::delete(public_path($imageOld));

            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();

            // File upload location
            $location = 'uploads/expenses/';

            // Upload file
            $file->move($location, $filename);

            // File path
            $filepath = 'uploads/expenses/' . $filename;
        } else {
            $filepath = $imageOld;
        }

        $expense->note = $request->note;
        $expense->file = $filepath;
        $expense->amount = $request->amount;
        $expense->expense_date = $request->expense_date;
        $expense->category_id = $request->category_id;
        $expense->save();

        return response()->json(['success' => 'Status change successfully.', 'data' => $expense]);
    }

    public function deleteExpenses($id)
    {
        $expenses = Expense::find($id)->delete();
        return response()->json($expenses);
    }
    
    
}
