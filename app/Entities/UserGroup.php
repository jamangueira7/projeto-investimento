<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
    use Notifiable;
    //use SoftDeletes;

    protected $fillable = [
        'user_id','group_id','permission'
    ];

    protected $hidden = [];
    public $timestamps = true;
}
