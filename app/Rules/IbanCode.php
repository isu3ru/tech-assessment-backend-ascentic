<?php

namespace App\Rules;

use App\Iban\Iban;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class IbanCode implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $iban = new Iban();
        if (!$iban->isValid($value)) {
            $fail('The :attribute is not a valid IBAN.');
        }
    }
}
