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
}
