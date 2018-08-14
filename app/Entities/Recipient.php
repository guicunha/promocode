<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Recipient.
 *
 * @package namespace App\Entities;
 */
class Recipient extends Model implements Transformable
{
    use TransformableTrait;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'is_valid'
    ];

    protected $dates = ['deleted_at'];

    public function vouchers()
    {
        return $this->hasMany(Voucher::class, 'recipient_email', 'email');
    }

    public function logs()
    {
        return $this->hasMany(VoucherLog::class, 'recipient_email', 'email');
    }

}
