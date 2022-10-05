<?php

namespace App;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    // protected $guarded = [];
    protected $table = 'tbl_clients';
    protected $fillable = ['name', 'image', 'id_client', 'email', 'position', 'phone', 'birthday', 'company', 'address', 'gender'];

    public function projects()
    {
        return $this->hasMany('App\Project');
    }
    public function ticket()
    {
        return $this->hasMany('App\Ticket');
    }
}
