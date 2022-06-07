<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'inventory_id',
        'date',
        'amount',
        'description'
    ];

    function user(){
        return $this->belongsTo(User::class);
    }
    function inventory(){
        return $this->belongsTo(Inventory::class);
    }

}
