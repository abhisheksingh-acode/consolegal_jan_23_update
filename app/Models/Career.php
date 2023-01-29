<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CareerCategory;

class Career extends Model
{
    use HasFactory;

    public $fillable = [
        'category_id',
        'name',
        'email',
        'phone',
        'city',
        'message',
        'resume',
        'created_at',
        'updated_at'
    ];

    public function category(){
        return $this->hasOne(CareerCategory::class,'id','category_id');
    }


    public function url(){
         return asset('storage').'/'.$this->resume;
    }
}
