<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesExpense extends Model
{
    //
    protected $table = 'tbl_sales_expenses';
    protected $fillable = [
        'item', 'purchase_from', 'purchase_date', 'purchase_by', 'amount', 'paid_by', 'status'
    ];

    public function users()
    {
        return $this->belongsTo('App\User', 'purchase_by')->select(['id', 'name']);
    }
}
