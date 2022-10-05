<?php

namespace App\Http\Controllers;

use App\Client;
use App\Estimate;
use Illuminate\Http\Request;
use App\Expense;
use App\Invoice;
use App\Leaves;
use App\Project;
use App\Revenue;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $clients = Client::all();
        $projects = Project::orderBy('created_at', 'DESC')->get();
        $invoices = Invoice::all();
        $estimates = Estimate::all();

        $expense = Expense::selectRaw('SUM(amount) as total_outcome, YEAR(expense_date) as year')
            ->groupBy('year')->get();
        $revenue = Revenue::selectRaw('SUM(amount) as total_income, YEAR(revenue_date) as year')
            ->groupBy('year')->get();
        // dd($expense);
        $dataChart = [];
        for ($i = 0; $i < count($expense); $i++) {
            for ($j = 0; $j < count($revenue); $j++) {
                if ($expense[$i]['year'] == $revenue[$j]['year']) {
                    $dataChart[] = [
                        'total_income' => $revenue[$i]['total_income'],
                        'total_outcome' => $expense[$j]['total_outcome'],
                        'year' => $revenue[$i]['year'],
                    ];
                }
            }
        }

        $json = json_encode($dataChart);
        return view('user_mgmt.dashboard.dash_admin', [
            'total_pendapatan' => $json,
            'clients' => $clients,
            'projects' => $projects,
            'invoices' => $invoices,
            'estimates' => $estimates
        ]);
    }

    public function indexemploy()
    {
        $leave = Leaves::join('tbl_employees')
            ->take(1)->get();
        // dd($leave);
        return view('user_mgmt.dashboard.dashboard', compact(
            'leave'
        ));
    }

    public function home()
    {
        $clients = Client::all();
        $projects = Project::all();
        $invoices = Invoice::all();

        // $invoices = Invoice::with('clients', 'projects', 'taxes')->get();
        return view('user_mgmt.dashboard.dash_admin', [
            'clients' => $clients,
            'projects' => $projects,
            'invoices' => $invoices
        ]);
    }
}
