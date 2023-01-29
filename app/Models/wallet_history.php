<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wallet_history extends Model
{
    use HasFactory;

    protected $table = 'wallet_history';


    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function fran()
    {
        return $this->hasOne(Frans::class, 'id', 'fran_id');
    }
}
