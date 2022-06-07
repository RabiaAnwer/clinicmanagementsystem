<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
      'treatment_id',
      'date',
      'paid',
      'balance'
    ];

    function treatment(){
        return $this->belongsTo(Treatment::class);
    }
//    function treatments(){
//        return $this->belongsToMany(Treatment::class);
//    }
}
