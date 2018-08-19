<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Recipient.
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
    ];

    protected $visible = [
        'first_name',
        'last_name',
        'email',
        'is_valid',
        'vouchers',
    ];

    protected $dates = ['deleted_at'];

    public function vouchers()
    {
        return $this->hasMany(Voucher::class, 'email', 'email');
    }

    public function path()
    {
        return 'recipient/'.$this->id;
    }
}
