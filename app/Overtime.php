<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Overtime extends Model
{
    protected $table = 'tbl_overtimes';
    protected $guarded = [];
    // protected $fillable = ['users_id', 'jumlah_overtime', 'tgl_overtime'];
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function getTglovertimeAttribute($name)
    {
        return date('d-m-Y', strtotime($name));
    }

    public function staff()
    {
        return $this->belongsTo(User::class);
    }
}
