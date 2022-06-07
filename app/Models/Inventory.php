<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'item_name',
        'buying_date',
        'quantity',
        'expiry_date'
    ];

    function expense(){
        return $this->hasOne(Expense::class);
    }
}
