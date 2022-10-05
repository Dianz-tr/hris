<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resignation extends Model
{
    protected $table = 'tbl_resignations';

    protected $fillable = [
        'resig_employee', 'not_date', 'resig_date', 'reason'
    ];
}
