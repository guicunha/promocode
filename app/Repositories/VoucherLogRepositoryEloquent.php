<?php

namespace App\Repositories;

use App\Entities\VoucherLog;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class VoucherLogRepositoryEloquent.
 */
class VoucherLogRepositoryEloquent extends BaseRepository implements VoucherLogRepository
{
    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return VoucherLog::class;
    }

    /**
     * Boot up the repository, pushing criteria.
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
