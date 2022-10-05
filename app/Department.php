<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'tbl_departments';

    protected $fillable=['name','slug'];
    
    public function roles(){
        return $this->hasMany('App\Role');
    }
}
