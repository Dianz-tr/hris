<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    //
    protected $table = 'tbl_holidays';
    protected $fillable = [
        'name', 'holidayDate'
    ];
}
