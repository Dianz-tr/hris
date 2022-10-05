<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detailInvoice extends Model
{
    //
    protected $table = 'tbl_detail_invoices';

    protected $fillable = [
        'item', 'description', 'unit_cost', 'qty', 'amount'
    ];
}
