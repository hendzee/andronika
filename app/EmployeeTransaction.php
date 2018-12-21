<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeTransaction extends Model
{
    //
    protected $table = 'employee_salary_transaction';
    protected $primaryKey = 'id_transaction';
    protected $guarded = [];
    public $incrementing = false;  
    public $timestamps = false;

    public function employee()
    {
        return $this->belongsTo('App\Employee', 'id_employee');
    }
}
