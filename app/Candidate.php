<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $table = 'tbl_candidates';

    protected $fillable = [
        'fname', 'lname', 'contact', 'email', 'employee_id', 'start_date'
    ];
}
