<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PSTransaction extends Model
{
    protected $table = 'project_salary_transaction';
    protected $primaryKey = 'id_transaction';
    protected $guarded = [];
    public $incrementing = false;  
    public $timestamps = false;

    public function salary()
    {
        return $this->belongsTo('App\WorkerSalary', 'id_salary');
    }

    public function worker()
    {
        return $this->belongsTo('App\ProjectWorker', 'id_worker');
    }
}
