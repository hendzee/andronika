<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WarehouseRent extends Model
{
    protected $table = 'warehouse_rent';  
    protected $primaryKey = 'id_rent';
    protected $guarded = [];
    public $incrementing = false;  
    public $timestamps = false;

    public function client()
    {
        return $this->belongsTo('App\Client', 'id_client');
    }
}
