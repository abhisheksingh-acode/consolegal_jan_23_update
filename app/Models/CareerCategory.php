<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Career;

class CareerCategory extends Model
{
    use HasFactory;

    public $fillable = [
        'category_name',
        'job_type',
        'location',
        'created_at',
        'updated_at'
    ];

    public function careers(){
        return $this->belongsToMany(Career::class,'category_id','id');
    }
}
