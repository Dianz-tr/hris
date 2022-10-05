<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interquest extends Model
{
    protected $table = 'tbl_interquests';

    protected $fillable =[
        'category', 'department', 'question', 'opa', 'opb', 'opc', 'opc', 'opd', 'cor_answer', 'exp_answer'
    ];
}
