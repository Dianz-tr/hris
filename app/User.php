<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use App\Employee;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // public function employee() {
    //     return $this->hasOne(employee::class);
    // }

    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }

    public function assets()
    {
        return $this->hasMany('App\Asset');
    }

    public function projects()
    {
        return $this->hasMany('App\Project');
    }
    public function SalesExpense()
    {
        return $this->hasMany('App\SalesExpense');
    }

    // public function isAdmin()
    // {
    //     if (Auth::user()->role == 'Admin') {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }
}
