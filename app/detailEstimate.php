<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detailEstimate extends Model
{
    //
    protected $table = 'tbl_detail_estimates';
    protected $fillable = [
        'item', 'description', 'unit_cost', 'qty', 'amount'
    ];
}
