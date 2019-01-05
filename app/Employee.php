<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employee';  
    protected $primaryKey = 'id_employee';
    protected $guarded = [];
    public $incrementing = false;  
    public $timestamps = false;
}
