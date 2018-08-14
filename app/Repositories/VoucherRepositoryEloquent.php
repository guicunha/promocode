<?php

namespace App\Repositories;

use App\Entities\Voucher;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class VoucherRepositoryEloquent.
 */
class VoucherRepositoryEloquent extends BaseRepository implements VoucherRepository
{
    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return Voucher::class;
    }

    /**
     * Boot up the repository, pushing criteria.
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
