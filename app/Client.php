<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'client';
    protected $primaryKey = 'id_client';
    protected $guarded = [];
    public $incrementing = false;  
    public $timestamps = false;

}
