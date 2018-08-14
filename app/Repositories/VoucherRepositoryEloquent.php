<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\VoucherRepository;
use App\Entities\Voucher;
use App\Validators\VoucherValidator;

/**
 * Class VoucherRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class VoucherRepositoryEloquent extends BaseRepository implements VoucherRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Voucher::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
