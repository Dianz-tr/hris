<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $table = 'tbl_promotions';

    protected $guarded = [];

    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }
    public function department()
    {
        return $this->belongsTo('App\Department');
    }
    public function designation()
    {
        return $this->belongsTo('App\Designation');
    }
}
