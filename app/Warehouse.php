<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    protected $table = 'warehouse';
    protected $primaryKey = 'item_name';
    protected $guarded = [];
    public $incrementing = false;  
    public $timestamps = false;

    public function rent()
    {
        return $this->hasMany('App\WarehouseRent', 'item_name');
    }

    public function repair_and_used()
    {
        return $this->hasOne('App\RepairAndUsed', 'item_name');
    }
}
