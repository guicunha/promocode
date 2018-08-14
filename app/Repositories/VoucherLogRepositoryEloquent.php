<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\VoucherLogRepository;
use App\Entities\VoucherLog;
use App\Validators\VoucherLogValidator;

/**
 * Class VoucherLogRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class VoucherLogRepositoryEloquent extends BaseRepository implements VoucherLogRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return VoucherLog::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
