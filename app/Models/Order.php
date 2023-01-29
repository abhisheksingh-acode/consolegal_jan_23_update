<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\payment;
use App\Models\services;

class Order extends Model
{
    use HasFactory;

    public $fillable = [
        'user_id',
        'fran_id',
        'service_id',
        'working_status',
        'form_submitted',
        'payment_mode',
        'payment_id',
        'status',
        'created_at',
        'updated_at',
    ];


    public function service(){
        return $this->hasOne(services::class,'id','service_id');
    }

    public function payment(){
        return $this->hasOne(payment::class,'r_payment_id','payment_id');
    }

    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }
    public function fran(){
        return $this->hasOne(User::class,'id','fran_id');
    }
    
}
