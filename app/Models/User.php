<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    protected $fillable = [
        'nama', 'email', 'nomor_telepon', 'gender', 'password', 'media', 'role'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

}
