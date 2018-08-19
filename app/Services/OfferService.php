<?php
/**
 * Created by PhpStorm.
 * User: Guilherme Cunha
 * Date: 13/08/2018
 * Time: 10:39.
 */

namespace App\Services;

use App\Entities\Offer;
use App\Repositories\OfferRepository;
use App\Repositories\VoucherRepository;
use App\Validators\OfferValidator;
use Carbon\Carbon;

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
    /**
     * @var VoucherRepository
     */
    private $voucherRepository;

    public function __construct(OfferRepository $repository, OfferValidator $validator, VoucherRepository $voucherRepository)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->voucherRepository = $voucherRepository;
    }

    public function create(array $offer)
    {
        return $this->repository->create($offer);
    }

    public function disableOffers(array $offers, $single = false)
    {

    }

    public function show($id)
    {
        $offer = $this->repository->with(['vouchers'])->find($id);
        $offer->analytics = $this->analyticsOffer(8);
        return $offer;
    }

    private function analyticsOffer($id)
    {

        $now = Carbon::now()->timestamp;

        $used = $this->voucherRepository->scopeQuery(function ($query) use ($id) {
            return $query->selectRaw('count(*) as total')
                ->where('offer_id', '=', $id)
                ->where('used_date', '>', 0);
        })->first();

        $expireds = $this->voucherRepository->scopeQuery(function ($query) use ($now,$id) {
            return $query->selectRaw('count(*) as total')
                ->where('offer_id', '=', $id)
                ->where('expiration', '<', $now);
        })->first();

        $data = [
            'useds_total' => $used->total,
            'expireds_total' => $expireds->total
        ];

        return $data;

    }


    private function createForAllRecipients(Offer $offer)
    {

    }

}
