<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Offer.
 *
 * @package namespace App\Entities;
 */
class Offer extends Model implements Transformable
{
    use TransformableTrait;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'discount',
        'special_code',
        'expiration'
    ];

    protected $dates = ['deleted_at'];

    public function vouchers()
    {
        return $this->hasMany(Voucher::class);
    }

}
