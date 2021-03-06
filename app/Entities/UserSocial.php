<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class UserSocial extends Model
{
    use Notifiable;
    use SoftDeletes;

    protected $fillable = [
        'user_id','social_network','social_id','social_email','social_avatar',
    ];

    protected $hidden = [];
}


