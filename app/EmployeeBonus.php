<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeBonus extends Model
{
    //
    protected $table = 'employee_bonus';
    protected $primaryKey = 'id_bonus';
    protected $guarded = [];
    public $incrementing = false;  
    public $timestamps = false;

    public function employee()
    {
        return $this->belongsTo('App\Employee', 'id_employee');
    }
}
