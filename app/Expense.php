<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    //
    protected $table = 'tbl_expenses';
    protected $fillable = ['note', 'category_id', 'amount', 'expense_date', 'file'];

    public function categories()
    {
        return $this->belongsTo('App\Categorie', 'category_id')->select(['id', 'category_name', 'sub_category']);
    }

    public function budget()
    {
        return $this->belongsTo('App\Budget', 'amount')->select(['id', 'expense_amount']);
    }
}
