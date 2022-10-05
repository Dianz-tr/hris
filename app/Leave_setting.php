<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leave_setting extends Model
{
    protected $table = 'tbl_leave_settings';

    protected $fillable = [
        'days', 'carry_f', 'c_forward', 'earned_l'
    ];
}
