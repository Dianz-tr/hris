<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    //
    protected $table = 'tbl_invoices';
    protected $fillable = [
        'invoice_id', 'client_id', 'project_id', 'email', 'tax_id', 'client_address', 'billing_address', 'invoice_date', 'expiry_date', 'total', 'tax', 'discount', 'grand_total', 'other_info', 'status'
    ];

    public function clients()
    {
        return $this->hasMany('App\Client', 'id', 'client_id')->select(['id', 'name', 'email', 'address', 'company']);
    }

    public function projects()
    {
        return $this->hasMany('App\Project', 'id', 'project_id')->select(['id', 'project_name']);
    }

    public function taxes()
    {
        return $this->hasMany('App\Tax', 'id', 'tax_id')->select(['id', 'tax_name', 'tax_percentage']);
    }
}
