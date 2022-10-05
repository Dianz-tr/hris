<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'tbl_tickets';

    protected $fillable = [
        'ticket_subject',
        'ticket_id',
        'assign_staff',
        'client',
        'priority',
        'cc',
        'assign',
        'add_followers',
        'description',
        'status'
    ];

    public function clients()
    {
        return $this->belongsTo('App\Client');
    }

    public function employee()
    {
        return $this->hasMany('App\Employee', 'id', 'assign_staff');
    }
}
