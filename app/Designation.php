<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    protected $table = 'tbl_designations';

    protected $fillable = ['name', 'slug', 'department_id'];

    public $with = ['department'];

    public function department()
    {
        return $this->belongsTo('App\Department');
    }

    public function employees()
    {
        return $this->hasMany('App\Employee');
    }
}
