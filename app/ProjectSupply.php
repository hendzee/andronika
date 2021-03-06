<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectSupply extends Model
{
    protected $table = 'project_supply';
    protected $primaryKey = 'id_supply';
    protected $guarded = [];
    public $incrementing = false;  
    public $timestamps = false;

    public function project()
    {
        return $this->belongsTo('App\Project', 'id_project');
    }
}
