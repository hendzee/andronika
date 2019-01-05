<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mutation extends Model
{
    protected $table = 'mutation';
    protected $primaryKey = 'id_mutation';
    protected $guarded = [];
    public $incrementing = false;  
    public $timestamps = false;

    public function project()
    {
        return $this->belongsToMany('App\Project');
    }
}
