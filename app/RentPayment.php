<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RentPayment extends Model
{
    protected $table = 'warehouse_rent_payment';  
    protected $primaryKey = 'id_payment';
    protected $guarded = [];
    public $incrementing = false;  
    public $timestamps = false;
}