<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectPayment extends Model
{
    protected $table = 'project_payment';
    protected $primaryKey = 'id_payment';
    protected $guarded = [];
    public $incrementing = false;  
    public $timestamps = false;

    public function project()
    {
        return $this->belongsTo('App\Project', 'id_project');
    }
}
