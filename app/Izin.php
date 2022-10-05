<?php

use App\Attendance;

namespace App;

use Illuminate\Database\Eloquent\Model;

class Izin extends Model
{
    //
    protected $table = 'tbl_izins';
    protected $fillable = [
        'attendance_id', 'date', 'name', 'note'
    ];

    public function attendance()
    {
        return $this->belongsTo('App\Attendance', 'id_attendance');
    }
}
