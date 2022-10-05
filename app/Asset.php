<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    //
    protected $table = 'tbl_assets';
    protected $fillable = ['asset_user', 'asset_id', 'asset_name', 'model', 'serial_number', 'supplier', 'condition', 'purchase_date', 'warranty', 'warranty_end', 'price', 'status'];

    public function users()
    {
        return $this->belongsTo('App\User', 'asset_user')->select(['id', 'name']);
    }
}
