<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    //
    protected $table = 'tbl_categories';
    protected $fillable = ['category_name', 'sub_category'];

    public function revenue()
    {
        return $this->hasMany('App\Revenue');
    }
    public function expense()
    {
        return $this->hasMany('App\Expense');
    }
}
