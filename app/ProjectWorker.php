<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectWorker extends Model
{
    protected $table = 'project_worker';
    protected $primaryKey = 'id_worker';
    protected $guarded = [];
    public $incrementing = false;  
    public $timestamps = false;

    public function project()
    {
        return $this->belongsTo('App\Project', 'id_project');
    }

    public function worker_salary()
    {
        return $this->hasOne('App\WorkerSalary', 'id_worker');
    }

    public function ps_transaction()
    {
        return $this->hasMany('App\PSTransaction', 'id_worker');
    }
    
    public function project_bonus()
    {
        return $this->hasMany('App\ProjectBonus', 'id_worker');
    }

    public function worker_contract()
    {
        return $this->hasOne('App\WorkerContract', 'id_worker');
    }

    public function pct()
    {
        return $this->hasMany('App\PCT', 'id_worker');
    }
}