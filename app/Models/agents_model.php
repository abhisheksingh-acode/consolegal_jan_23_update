<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class agents_model extends Model
{
    use HasFactory;
    protected $table = 'agents';


    public $appends = ["user_id"];

    public function getUserIdAttribute()
    {
        return "AM-CL-00" . $this->id;
    }
}
