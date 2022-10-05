<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    //
    protected $table = 'tbl_budgets';
    protected $fillable = [
        'budget_title', 'budget_type', 'start_date', 'end_date', 'revenue_title', 'revenue_amount', 'overall_revenue', 'expense_title', 'expense_amount', 'overall_expense', 'profit', 'tax_amount', 'budget_amount'
    ];

    // public function revenue()
    // {
    //     return $this->hasMany('App\Revenue');
    // }

    // public function expense()
    // {
    //     return $this->hasMany('App\Expense');
    // }
}
