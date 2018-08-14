<?php

namespace App\Repositories;

use App\Entities\Recipient;
use App\Validators\RecipientValidator;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class RecipientRepositoryEloquent.
 */
class RecipientRepositoryEloquent extends BaseRepository implements RecipientRepository
{
    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return Recipient::class;
    }

    /**
     * Specify Validator class name.
     *
     * @return mixed
     */
    public function validator()
    {
        return RecipientValidator::class;
    }

    /**
     * Boot up the repository, pushing criteria.
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
