<?php

namespace App\Repositories;

use App\Models\IbanValidation;
use Illuminate\Database\Eloquent\Collection;

class IbanValidationRepository
{
    /**
     * Store validated result
     */
    public function store($data): IbanValidation
    {
        return IbanValidation::create($data);
    }

    /**
     * Get all validated records
     */
    public function all(): Collection
    {
        return IbanValidation::orderBy('created_at', 'desc')
            ->get();
    }

    /**
     * Get validated records for a user
     */
    public function byUser(int $userId): Collection
    {
        return IbanValidation::where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->get();
    }
}
