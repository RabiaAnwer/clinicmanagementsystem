<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TreatmentType extends Model
{
    use HasFactory;

    protected $fillable = [
        'typeof',
        'amount'
    ];

//    function treatment(){
//        $this->hasOne(Treatment::class);
//    }
}
