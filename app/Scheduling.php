<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scheduling extends Model
{
    protected $table = 'tbl_schedulings';

    protected $guarded = [];

    public function employee()
    {
        return $this->belongsTo('App\Employee', 'employee_id')->select(['id', 'f_name']);
    }

    public function department()
    {
        return $this->belongsTo('App\Department');
    }

    public function shift()
    {
        return $this->belongsTo('App\Shift');
    }

}
