<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    //
    protected $table = 'driver';  
    protected $primaryKey = 'id_driver';
    protected $guarded = [];
    public $incrementing = false;  
    public $timestamps = false;
}
