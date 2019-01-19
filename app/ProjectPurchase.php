<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectPurchase extends Model
{
    protected $table = 'project_purchase';
    protected $primaryKey = 'id_transaction';
    protected $guarded = [];
    public $incrementing = false;  
    public $timestamps = false;    

    public function project()
    {
        return $this->belongsTo('App\Project', 'id_project');
    }

    public function project_supply()
    {
        return $this->belongsTo('App\ProjectSupply', 'id_supply');
    }
}
