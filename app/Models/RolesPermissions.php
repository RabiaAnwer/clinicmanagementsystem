<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolesPermissions extends Model
{
    use HasFactory;

    function permission(){
        return $this->hasOne(Permission::class,'id','permission_id');
    }
}
