<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\services;

class payment extends Model
{
    use HasFactory;
    public $table = "payments";


    public function service()
    {
        return $this->hasOne(services::class, 'id', 'product_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function fran()
    {
        return $this->hasOne(User::class, 'id', 'fran_id');
    }
}
