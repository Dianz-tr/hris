<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    //
    protected $table = 'tbl_attendances';
    protected $fillable = ['user_id', 'name', 'date', 'masuk', 'keluar', 'note'];
}
