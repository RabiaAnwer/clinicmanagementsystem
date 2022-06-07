<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    function role(){
        return $this->belongsTo(Role::class);
    }
    function userDetail(){
        return $this->hasOne(UserDetail::class);
    }
    function treatments(){
        return $this->hasMany(Treatment::class);
    }
    function appointment(){
        return $this->hasOne(Appointment::class);
    }
    function expenses(){
        return $this->hasMany(Expense::class);
    }
    function payments(){
        return $this->hasManyThrough(Payment::class,Treatment::class);
    }

}
