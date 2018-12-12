<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'project';
    protected $primaryKey = 'id_project';
    protected $guarded = [];
    public $incrementing = false;  
    public $timestamps = false;

    public function client()
    {
        return $this->belongsTo('App\Client', 'id_client');
    }
}
