<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientModel extends Model
{
    protected $table = 'clients';
    protected $fillable = ['id', 'address', 'email', 'telp',
        'desc'];
}
