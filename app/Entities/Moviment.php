<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Moviment.
 *
 * @package namespace App\Entities;
 */
class Moviment extends Model implements Transformable
{
    use TransformableTrait;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','group_id','product_id','value','type'];

    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function group()
    {
        $this->belongsTo(Group::class);
    }

    public function product()
    {
        $this->belongsTo(Product::class);
    }

}
