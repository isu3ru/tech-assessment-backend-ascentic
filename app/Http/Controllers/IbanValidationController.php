<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIbanValidationRequest;
use Illuminate\Http\Request;

class IbanValidationController extends Controller
{
    /**
     * Validate and store the iban validation request
     */
    public function store(StoreIbanValidationRequest $request)
    {
        $data = $request->validated();

        $request->user()->ibanValidations()->create($data);

        return response()->json([
            'message' => 'Iban validated successfully.',
        ], 201);
    }
}
