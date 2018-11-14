<?php

namespace Contrata;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {
    
    use Notifiable;

    protected $table = 'users';
    
    protected $fillable = [
        'name','login','password', 'email', 'cod_privilege'
    ];

    protected $sorted = [
        'name','login','password', 'email', 'cod_privilege'
    ];

    protected $hidden = [
        'id', 'password', 'remember_token'
    ];
}
