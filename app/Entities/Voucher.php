<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Voucher.
 */
class Voucher extends Model implements Transformable
{
    use TransformableTrait;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'promo_code',
        'email',
        'offer_id',
        'offer_name',
    ];

    protected $visible = [
        'promo_code',
        'email',
        'offer_id',
        'offer_name',
        'expiration',
        'used_date',
        'recipient_name',
        'on_time',
        'total',
    ];

    protected $appends = ['on_time'];

    protected $dates = ['deleted_at'];

    public function recipient()
    {
        return $this->hasOne(Recipient::class, 'email', 'email');
    }

    /**
     * @return bool for each voucher entity checking if this voucher are on time to use (true) or expired (false)
     */
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

    public function path()
    {
        return 'voucher/'.$this->id;
    }
}
