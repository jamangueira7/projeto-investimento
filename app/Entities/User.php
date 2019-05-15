<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    public    $timestamps   = true;
    protected $table        = 'users';
    protected $fillable = [
        'cpf','name','phone','birth','gender','notes','email','password','status','permission',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getPasswordAttribute($value)
    {
        $this->attributes['password'] = env("PASSWORD_HASH") ? bcrypt('123456') : '123456';
    }

    public function getFormattedCpfAttribute()
    {
        $cpf = $this->attributes['cpf'];

        return substr($cpf, 0,3). '.'.substr($cpf, 3,3).'.'.substr($cpf, 7,3).'-'.substr($cpf, -2);
    }

    public function getFormattedPhoneAttribute()
    {
        $phone = $this->attributes['phone'];

        return "(".substr($phone, 0,2) . ")" . substr($phone, 3,4) ." - " . substr($phone, -4);
    }

    public function getFormattedBirthAttribute()
    {
        $birth = explode('-',$this->attributes['birth']);
        if(count($birth) != 3){
            return null;
        }
        return $birth[2] . "/". $birth[1] . "/" . $birth[0];
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class, 'user_groups', 'user_id', 'group_id');
    }

    public function moviments()
    {
        return $this->hasMany(Moviment::class);
    }
}
