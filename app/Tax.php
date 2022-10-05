<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    //
    protected $table = 'tbl_taxes';
    protected $fillable = ['tax_name', 'tax_percentage', 'status'];
}
