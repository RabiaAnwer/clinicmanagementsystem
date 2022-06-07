<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id' ,
        'treatment_date',
        'typeof_id',
        'description'
    ];

    function user(){
        return $this->belongsTo(User::class);
    }
    function payment(){
        return $this->hasOne(Payment::class);
    }
    function payments(){
        return $this->hasMany(Payment::class);
    }
    function type(){
        return $this->belongsTo(TreatmentType::class,'typeof_id','id');
    }

}
