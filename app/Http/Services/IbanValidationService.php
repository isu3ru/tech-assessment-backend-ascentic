<?php

namespace App\Http\Services;

use App\Repositories\IbanValidationRepository;

class IbanValidationService
{
    public function __construct(public IbanValidationRepository $ibanValidationRepository)
    {
    }

    public function all()
    {
        return $this->ibanValidationRepository->all();
    }

    public function store($data)
    {
        $data['user_id'] = request()->user()->id;
        return $this->ibanValidationRepository->store($data);
    }

    public function byUser(int $userId)
    {
        return $this->ibanValidationRepository->byUser($userId);
    }
}
