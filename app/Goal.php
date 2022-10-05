<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    protected $table = 'tbl_goals';

    protected $fillable = [
        'goal_type', 'subject', 'target_achievement', 'start_date', 'end_date', 'description', 'status'
    ];
}
