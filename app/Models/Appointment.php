<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'booking_date',
        'appointment_type',
        'appointment_date'
    ];

    function user(){
        return $this->belongsTo(User::class);
    }
}
