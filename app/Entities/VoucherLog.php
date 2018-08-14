<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class VoucherLog.
 *
 * @package namespace App\Entities;
 */
class VoucherLog extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'used_email',
        'promo_code',
        'short_message',
        'message',
        'ip_address'
    ];

    public function voucher()
    {
        return $this->hasOne(Voucher::class, "promo_code", "promo_code");
    }

}
