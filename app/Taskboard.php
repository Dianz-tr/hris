<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taskboard extends Model
{
    protected $table = 'tbl_taskboards';

    protected $fillable = [
        'title'
    ];

}
