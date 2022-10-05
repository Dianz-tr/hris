<?php

namespace App\Http\Controllers;

use App\Budget;
use App\Revenue;
use App\Expense;
use Illuminate\Http\Request;

class BudgetsController extends Controller
{
    //  
    public function index()
    {
        $budgets = Budget::all();
        // dd($budgets);
        return view('HR.Accounting.Budgets.index', [
            'budgets' => $budgets
        ]);
    }

    public function dataBudgets()
    {
        $budgets = Budget::all();
        return $budgets;
    }

    public function insertBudgets(Request $request)
    {
        $budgets = new Budget();
        $budgets->budget_title = $request->budget_title;
        $budgets->budget_type = $request->budget_type;
        $budgets->start_date = $request->start_date;
        $budgets->end_date = $request->end_date;
        $budgets->revenue_title = $request->revenue_title;
        $budgets->revenue_amount = $request->revenue_amount;
        $budgets->overall_revenue = $request->overall_revenue;
        $budgets->overall_expense = $request->overall_expense;
        $budgets->expense_title = $request->expense_title;
        $budgets->expense_amount = $request->expense_amount;
        $budgets->profit = $request->profit;
        $budgets->tax_amount = $request->tax_amount;
        $budgets->budget_amount = $request->budget_amount;
        $budgets->save();

        return response()->json([
            'data' => $budgets
        ]);
    }

    public function editBudgets($id)
    {
        $budgets = Budget::find($id);
        return $budgets;
    }

    public function updateBudgets(Request $request, $id)
    {
        $budgets = Budget::find($id);
        $budgets->update($request->all());
        $budgets->save();

        return response()->json(['success' => 'Status change successfully.', 'data' => $budgets]);
    }

    public function deleteBudgets($id)
    {
        $budgets = Budget::find($id)->delete();
        return response()->json($budgets);
    }
}
