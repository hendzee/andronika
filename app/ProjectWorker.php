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
}
