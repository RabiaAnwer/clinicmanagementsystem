<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'care_of',
        'age',
        'gender',
        'address',
        'mobile_number',
        'phone_number',
    ];
}
