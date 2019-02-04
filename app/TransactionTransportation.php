<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionTransportation extends Model
{
    //
    protected $table = 'transaction_transportation';
    protected $primaryKey = 'id_transaction';
    protected $guarded = [];
    public $incrementing = false;  
    public $timestamps = false;

    public function transportation()
    {
        return $this->belongsTo('App\Transportaion', 'id_transportation');
    }
}
