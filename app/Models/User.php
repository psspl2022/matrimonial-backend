<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    function getAdmin(){
        return $this->hasOne(AdminRegister::class, 'id', 'admin_reg_id');
    }

    function getUser(){
        return $this->hasOne(UserRegister::class, 'id', 'user_reg_id' );
    }

    function getCountry(){
        return $this->hasOneThrough(Country::class, AdminRegister::class,'id','id','admin_reg_id', 'country' );
    }

    function getState(){
        return $this->hasOneThrough(State::class, AdminRegister::class,'id','id','admin_reg_id', 'state' );
    }

    function getCity(){
        return $this->hasOneThrough(City::class, AdminRegister::class,'id','id','admin_reg_id', 'city' );
    }

    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
