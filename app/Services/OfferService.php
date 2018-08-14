<?php
/**
 * Created by PhpStorm.
 * User: Guilherme Cunha
 * Date: 13/08/2018
 * Time: 10:39
 */

namespace App\Services;


use App\Entities\Offer;
use App\Repositories\OfferRepository;
use App\Validators\OfferValidator;

class OfferService
{

    /**
     * @var OfferRepository
     */
    private $repository;
    /**
     * @var OfferValidator
     */
    private $validator;

    public function __construct(OfferRepository $repository, OfferValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function create(array $offer)
    {
        $this->repository->create($offer);
    }

    public function disableOffers(array $offers, $single = false)
    {

    }

    private function createForAllRecipients(Offer $offer)
    {

    }

}