<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SMDetail extends Model
{
    protected $table = 'salary_month_detail';  
    protected $primaryKey = 'id_detail';
    protected $guarded = [];
    public $incrementing = false;  
    public $timestamps = false;

    public function employee()
    {
        return $this->belongsTo('App\Employee', 'id_employee');
    }

    public function salary_month()
    {
        return $this->belongsTo('App\SalaryMonth', 'id_month');
    }

    public function employee_transaction()
    {
        return $this->hasMany('App\EmployeeTransaction', 'id_detail');
    }

    public function employee_bonus()
    {
        return $this->hasMany('App\EmployeeBonus', 'id_detail');
    }
}
