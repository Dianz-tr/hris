<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Performapp extends Model
{
    protected $table = 'tbl_performapps';
    
    protected $guarded = [];

    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }

}
