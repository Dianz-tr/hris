<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $table = 'tbl_experiences';

    protected $fillable = [
        'experiance', 'status'
    ];
}
