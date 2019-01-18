<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkerSalary extends Model
{
    protected $table = 'worker_salary';
    protected $primaryKey = 'id_worker';
    protected $guarded = [];
    public $incrementing = false;  
    public $timestamps = false;

    public function worker()
    {
        return $this->belongsTo('App\ProjectWorker', 'id_worker');
    }

    public function project()
    {
        return $this->belongsTo('App\Project', 'id_project');
    }
}
