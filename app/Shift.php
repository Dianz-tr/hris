<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    protected $table = 'tbl_shifts';

    protected $guarded = [];

    public function Shift()
    {
        return $this->hasMany('App\Scheduling');
    }
}