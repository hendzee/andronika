<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RepairAndUsed extends Model
{
    protected $table = 'repair_and_used';
    protected $primaryKey = 'item_name';
    protected $guarded = [];
    public $incrementing = false;  
    public $timestamps = false;
}
