<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PCT extends Model
{
    protected $table = 'project_contract_transaction';
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

    public function project()
    {
        return $this->belongsTo('App\Project', 'id_project');
    }
}
