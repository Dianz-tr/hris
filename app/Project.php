<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'tbl_projects';

    protected $fillable = [
        'client_id', 'project_name', 'start_date', 'end_date', 'lead_project', 'rate', 'description', 'priority', 'file'
    ];

    public function users()
    {
        return $this->belongsTo('App\User', 'lead_project')->select(['id', 'name', 'email', 'role']);
    }

    public function employee()
    {
        return $this->belongsTo('App\Employee', 'lead_project')->select(['id', 'f_name', 'l_name', 'email', 'phone']);
    }

    public function clients()
    {
        return $this->belongsTo('App\Client', 'client_id')->select(['id', 'name']);
    }
}
