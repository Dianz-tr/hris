<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trainers extends Model
{
    protected $table = 'tbl_trainers';

    protected $fillable = [
        'name', 'contact', 'email', 'description', 'status'
    ];

}
