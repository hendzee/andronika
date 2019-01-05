<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectBonus extends Model
{
    protected $table = 'project_bonus';
    protected $primaryKey = 'id_bonus';
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
