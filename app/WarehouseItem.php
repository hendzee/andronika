<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WarehouseItem extends Model
{
    protected $table = 'warehouse_item';
    protected $primaryKey = 'item_name';
    protected $guarded = [];
    public $incrementing = false;  
    public $timestamps = false;
}
