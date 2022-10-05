<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Performindi extends Model
{
    protected $table = 'tbl_performindis';

    protected $guarded = [];

    public function designation()
    {
        return $this->belongsTo('App\Designation');
    }
}
