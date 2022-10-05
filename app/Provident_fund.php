<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provident_fund extends Model
{
    //
    protected $table = 'tbl_provident_funds';
    protected $fillable = [
        'employee_name', 'provident_type', 'employee_share_amount', 'organization_share_amount', 'employee_share', 'organization_share', 'description'
    ];

    public function employees()
    {
        return $this->belongsTo('App\Employee', 'employee_name')->select(['id', 'f_name', 'l_name']);
    }
}
