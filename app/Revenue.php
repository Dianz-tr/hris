<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Revenue extends Model
{
    //
    protected $table = 'tbl_revenues';
    protected $fillable = ['note', 'revenue_date', 'amount', 'category_id', 'file'];

    public function categories()
    {
        return $this->belongsTo('App\Categorie', 'category_id')->select(['id', 'category_name', 'sub_category']);
    }

    public function budget()
    {
        return $this->belongsTo('App\Budget', 'amount')->select(['id', 'revenue_amount']);
    }
}
