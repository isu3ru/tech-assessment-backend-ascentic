<?php

namespace App\Rules;

use App\Iban\Iban;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class IbanCode implements ValidationRule
{
    public Iban $iban;

    public function __construct(Iban $iban)
    {
        $this->iban = $iban;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!$this->iban->isValid($value)) {
            $fail('The :attribute is not a valid IBAN.');
        }
    }
}
