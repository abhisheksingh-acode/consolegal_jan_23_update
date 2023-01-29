<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\form_name;
use App\Models\Frans;

class assigned extends Model
{
    use HasFactory;
    public $table = "assigned";


    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }

    public function frans(){
        return $this->hasOne(Frans::class,'id','fran_id');
    }
    
    public function form(){
        return $this->hasOne(form_name::class,'id','form_name_id');
    }
}
