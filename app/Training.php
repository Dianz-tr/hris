<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $table = 'tbl_trainings';

    protected $fillable = [
        'training_type', 'trainer', 'employee', 'start_date', 'end_date', 'description', 'cost', 'status'
    ];
}
