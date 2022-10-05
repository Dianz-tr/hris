<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goaltype extends Model
{
    protected $table = 'tbl_goaltypes';

    protected $fillable = [
        'type', 'description', 'status'
    ];
}
