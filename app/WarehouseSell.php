<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WarehouseSell extends Model
{
    protected $table = 'warehouse_sell';
    protected $primaryKey = 'id_sell';
    protected $guarded = [];
    public $incrementing = false;
    public $timestamps = false;
}
