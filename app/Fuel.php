<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fuel extends Model
{
    //
    protected $table = 'fuel';  
    protected $primaryKey = 'id_fuel';
    protected $guarded = [];
    public $incrementing = false;  
    public $timestamps = false;
}
