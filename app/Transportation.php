<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transportation extends Model
{
    //
    protected $table = 'transportation';  
    protected $primaryKey = 'id_transportation';
    protected $guarded = [];
    public $incrementing = false;  
    public $timestamps = false;

    public function employee()
    {
        return $this->belongsTo('App\Employee', 'id_employee');
    }

    public function transaction_transportation()
    {
        return $this->hasMany('App\TransactionTransportation', 'id_transportation');
    }
}