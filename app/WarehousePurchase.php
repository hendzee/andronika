<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WarehousePurchase extends Model
{
    protected $table = 'warehouse_purchase';
    protected $primaryKey = 'id_purchase';
    protected $guarded = [];
    public $incrementing = false;  
    public $timestamps = false;
}
