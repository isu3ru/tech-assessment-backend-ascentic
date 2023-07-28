<?php

namespace App\Http\Services;

use App\Models\IbanValidation;
use App\Repositories\IbanValidationRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class IbanValidationService
{
    public function __construct(public IbanValidationRepository $ibanValidationRepository)
    {
    }

    public function all(): Collection
    {
        return $this->ibanValidationRepository->all();
    }

    public function list(): LengthAwarePaginator
    {
        return $this->ibanValidationRepository->list();
    }

    public function store($data): IbanValidation
    {
        $data['user_id'] = request()->user()->id;
        return $this->ibanValidationRepository->store($data);
    }

    public function byUser(int $userId): Collection
    {
        return $this->ibanValidationRepository->byUser($userId);
    }
}
