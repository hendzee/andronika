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
}
