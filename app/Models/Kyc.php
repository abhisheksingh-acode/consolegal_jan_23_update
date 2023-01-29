<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kyc extends Model
{
    use HasFactory;

    public $fillable = [
        "user_type", "user_id", "pan", "aadhaar", "other_label", "other_doc", "photo", "created_at", "updated_at"
    ];
}
