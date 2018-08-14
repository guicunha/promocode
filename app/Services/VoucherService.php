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
use App\Repositories\RecipientRepository;
use App\Repositories\VoucherRepository;
use App\Validators\VoucherValidator;
use Illuminate\Database\QueryException;

class VoucherService
{

    /**
     * @var VoucherRepository
     */
    private $repository;
    /**
     * @var VoucherValidator
     */
    private $validator;
    /**
     * @var RecipientRepository
     */
    private $recipientRepository;
    /**
     * @var OfferRepository
     */
    private $offerRepository;

    public function __construct(VoucherRepository $repository,
                                RecipientRepository $recipientRepository,
                                VoucherValidator $validator,
                                OfferRepository $offerRepository)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->recipientRepository = $recipientRepository;
        $this->offerRepository = $offerRepository;
    }

    public function create(array $offer, array $recipients, $all = true)
    {
        $offerData = $this->offerRepository->find($offer['id']);
        return $this->createAllVouchers($offerData);
    }


    public function disableVoucher(array $vouchers)
    {

    }

    private function createAllVouchers(Offer $offer)
    {
        foreach($this->getRecipients() as $recipient)
        {
            $promoCode = $this->generatePromoCode($offer);
            try {
                $this->repository->create([
                    'promo_code' => $promoCode,
                    'recipient_email' => $recipient['email'],
                    'offer_id' => $offer->id,
                    'offer_name' => $offer->name,
                    'expiration' => $offer->expiration
                ]);
            }catch (QueryException $e) {
                $errorCode = $e->errorInfo[1];
                if($errorCode == 1062) {
                    // ignore duplicate entry to the same user
                }
            }
        }
    }

    private function generatePromoCode(Offer $offer)
    {
        $hash = $this->random_alphanumeric_string( rand(7,9),3);
        return $offer->special_code . $hash;
    }


    private function checkCodeStatus($promoCode)
    {
        return $this->repository->findByField('promo_code',$promoCode);
    }

    private function getRecipients()
    {
        $recipients = $this->recipientRepository->all();
        return $recipients;
    }

    /**
     * @param $length
     * @param $repeats
     * @return bool|string
     */

    function random_alphanumeric_string($length, $repeats) {
        $now = new \DateTime();
        $chars = strtoupper(hash('sha256', $now->getTimestamp()));
        return substr(str_shuffle(str_repeat($chars, $repeats)), rand(0,30), $length);
    }

}