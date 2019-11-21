<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable
{
    //
    use Notifiable;

    protected $table="db_user";
    protected $filltable=[
        'email','password','access',
    ];
    protected $hidden=[
        'password','remember_token',
    ];

    protected $casts=[
        'email_vertified_at'=>'datetime',
    ];

}
