<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'phone', 'service_id', 'from', 'status'];


    public function isUser()
    {
        return $this->hasOne(User::class, 'email', 'email');
    }

    public function service(){
        return $this->hasOne(services::class,'id','service_id');
    }

    public function fran(){
        return $this->hasOne(Frans::class,'id','fran_id');
    }
    public function agent(){
        return $this->hasOne(agents_model::class,'id','agent_id');
    }


}
