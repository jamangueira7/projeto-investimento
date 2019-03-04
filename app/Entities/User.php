<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    protected $fillable = [
        'cpf','name','phone','birth','gender','notes','email','password','status','permission',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getPasswordAttribute($valeu)
    {
        $this->attributes['password'] = env("PASSWORD_HASH") ? bcrypt('123456') : '123456';

    }
}
