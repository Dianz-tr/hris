<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
	use SoftDeletes;

	protected $table = 'tbl_employees';
	// protected $fillable = ['users_id', 'name', 'birth', 'addres', 'startdate', 'phone', 'photo'];
	// // protected $dates = ['deleted_at'];

	protected $dates = ['deleted_at'];

	// public function users() {
	//     return $this->belongsTo(Users::class);
	// }

	// protected $primaryKey = 'users_id';
	// protected $fillable=['name','users_id','slug','profil_image','role_id','full_time', 'street','town','city','country'];

	protected $guarded = [];

	public function designation()
	{
		return $this->belongsTo('App\Designation');
	}
	public function department()
	{
		return $this->belongsTo('App\Department');
	}

	public function providentFund() 
	{
		return $this->hasMany('App\Provident_fund');
	}
	public function salary()
	{
		return $this->hasMany('App\salary');
	}
	public function user()
	{
		return $this->hasMany('App\User');
	}
}
