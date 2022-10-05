<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Salary extends Model
{
    use SoftDeletes;

    protected $table = 'tbl_salaries';
    protected $guarded = [];
    // protected $fillable = ['users_id', 'salary', 'uang_overtime', 'jumlah_overtime', 'pot_bpjs', 'transportasi', 'total', 'periode', 'status', 'tgl_salary', 'status_gaji'];
    protected $dates = ['deleted_at'];

    public function salary()
    {
        return $this->belongsTo('App\Employee');
    }

    public function staff()
    {
        return $this->belongsTo('App\Staff', 'users_id');
    }

    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }

    public function department()
    {
        return $this->belongsTo('App\Department');
    }

    public function absensi()
    {
        return $this->hasMany(Absensi::class);
    }

    public function netSalary()
    {
        $calc1 = $this->basic + $this->da + $this->hra + $this->conveyance + $this->allowance + $this->medical_allowance + $this->other_earnings;
        $calc2 = - $this->tds - $this->esi - $this->pf - $this->leave - $this->prof_tax - $this->labour_welfare - $this->other_deduction;
        $sum = $calc1 + $calc2;
        return $this->net_salary = $sum;
    }
}
