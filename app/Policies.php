<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Policies extends Model
{
    protected $table = 'tbl_policies';

    protected $fillable = [
        'pol_name', 'depart','description'
    ];
}
