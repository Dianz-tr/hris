<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trainingtype extends Model
{
    protected $table = 'tbl_trainingtypes';

    protected $fillable = [
        'type', 'description', 'status'
    ];
}
