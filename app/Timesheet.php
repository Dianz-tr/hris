<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class timesheet extends Model
{
    protected $table = 'tbl_timesheets';

    protected $guarded = [];

    // public function projec()
    // {
    //     return $this->belongsTo('App\Project');
    // }

    public function projec()
    {
        return $this->belongsTo('App\Project', 'project_id')->select(['id', 'rate', 'project_name', 'lead_project']);
    }
}
