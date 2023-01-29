<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JoinApp extends Model
{
    use HasFactory;

    public $table = "join_apps";

    public $fillable = [ "phone", "created_at", "updated_at" ];
}
