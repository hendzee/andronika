<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalaryMonth extends Model
{
    protected $table = 'salary_month';  
    protected $primaryKey = 'id_month';
    protected $guarded = [];
    public $incrementing = false;  
    public $timestamps = false;
}
