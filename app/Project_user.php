<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project_user extends Model
{
    //
    protected $table = 'tbl_project_users';
    protected $fillable = [
        'id_user', 'id_project'
    ];

    public function users()
    {
        return $this->hasMany('App\Project', 'id_project');
    }
    // public function users()
    // {
    //     return $this->hasMany('App\User', 'id_user');
    // }
}
