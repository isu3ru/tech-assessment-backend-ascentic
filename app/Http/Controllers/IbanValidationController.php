<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIbanValidationRequest;
use App\Http\Services\IbanValidationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class IbanValidationController extends Controller
{
    public function __construct(public IbanValidationService $ibanValidationService)
    {
    }

    /**
     * Validate and store the iban validation request
     */
    public function store(StoreIbanValidationRequest $request): JsonResponse
    {
        $this->ibanValidationService->store($request->validated());

        return response()->json([
            'message' => 'Iban validated successfully.',
        ], 201);
    }

    public function all(): JsonResponse
    {
        $paginatedList = $this->ibanValidationService->list();

        return response()->json($paginatedList, 200);
    }
}
