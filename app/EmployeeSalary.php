<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeSalary extends Model
{
    protected $table = 'employee_salary';  
    protected $primaryKey = 'id_employee';
    protected $guarded = [];
    public $incrementing = false;  
    public $timestamps = false;

    public function employee()
    {
        return $this->belongsTo('App\Employee', 'id_employee');
    }
}
