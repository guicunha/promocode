<?php
/**
 * Created by PhpStorm.
 * User: Guilherme Cunha
 * Date: 13/08/2018
 * Time: 10:28.
 */

namespace App\Services;

use App\Repositories\RecipientRepository;
use App\Validators\RecipientValidator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class RecipientService
{
    /**
     * @var RecipientRepository
     */
    private $repository;
    /**
     * @var RecipientValidator
     */
    private $validator;

    public function __construct(RecipientRepository $repository, RecipientValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function create(array $recipient)
    {
        $isValid = $this->checkMxExists($recipient['email']);
        $recipient['is_valid'] = $isValid;

        return $this->repository->create($recipient);
    }

    public function delete($id)
    {
        try {
            return $this->repository->find($id);
        } catch (ModelNotFoundException $e) {
            return [
              'message' => trans('messages.recipient_not_found'),
              'success' => false,
            ];
        }
    }

    private function checkMxExists($email, $record = 'MX')
    {
        list($user, $domain) = mb_split('@', $email);

        return checkdnsrr($domain, $record);
    }
}
