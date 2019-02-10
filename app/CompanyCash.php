<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyCash extends Model
{
    protected $table = 'company_cash';
    protected $primaryKey = 'id_cash';
    protected $guarded = [];
    public $incrementing = false;
    public $timestamps = false;
}
