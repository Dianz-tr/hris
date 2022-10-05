<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Termination extends Model
{
    protected $table = 'tbl_terminations';

    // protected $guarded = [];
    
    protected $fillable = [
        'term_employee', 'term_type', 'term_date', 'departement', 'reason', 'not_date'
    ];

}
