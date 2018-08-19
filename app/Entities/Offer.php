<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Offer.
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
        'expiration',
        'is_multiplier',
        'is_enabled',
    ];

    protected $appends = ['on_time'];

    protected $dates = ['deleted_at'];

    public function getOnTimeAttribute()
    {
        $now = new \DateTime();
        $nowUnix = $now->getTimestamp();

        if ($this->expiration > $nowUnix) {
            return true;
        } else {
            return false;
        }
    }

    public function vouchers()
    {
        return $this->hasMany(Voucher::class);
    }

    public function path()
    {
        return 'offer/'.$this->id;
    }
}
