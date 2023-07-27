<?php

namespace App\Iban;

class Iban
{
    /**
     * Get countries supported with their correct lengths
     */
    public function getCountriesAndLengths(): array
    {
        return [
            'AL' => 28, 'AD' => 24, 'AT' => 20, 'BH' => 22, 'BE' => 16, 'BA' => 20, 'BG' => 22, 'HR' => 21, 'CY' => 28, 'CZ' => 24,
            'DK' => 18, 'EE' => 20, 'FO' => 18, 'FI' => 18, 'FR' => 27, 'DE' => 22, 'GI' => 23, 'GR' => 27, 'GL' => 18, 'HU' => 28,
            'IS' => 26, 'IE' => 22, 'IL' => 23, 'IT' => 27, 'JO' => 30, 'KZ' => 20, 'KW' => 30, 'LV' => 21, 'LB' => 28, 'LI' => 21,
            'LT' => 20, 'LU' => 20, 'MK' => 19, 'MT' => 31, 'MR' => 27, 'MU' => 30, 'MC' => 27, 'ME' => 22, 'NL' => 18, 'NO' => 15,
            'PL' => 28, 'PT' => 25, 'QA' => 29, 'RO' => 24, 'SM' => 27, 'SA' => 24, 'RS' => 22, 'SK' => 24, 'SI' => 19, 'ES' => 24,
            'SE' => 24, 'CH' => 21, 'TN' => 24, 'TR' => 26, 'AE' => 23, 'GB' => 22,
        ];
    }

    /**
     * Check if valid IBAN
     */
    public function isValid(string $value): bool
    {
        $iban = strtoupper($value);
        $iban = preg_replace('/[^a-zA-Z0-9]/', '', $iban);
        $countries = $this->getCountriesAndLengths();
        $countryCode = substr($iban, 0, 2);

        if (!array_key_exists($countryCode, $countries) || (strlen($iban) !== $countries[$countryCode])) {
            return false;
        }

        $iban = substr($iban, 4) . substr($iban, 0, 4);
        $iban = str_replace(range('A', 'Z'), range('10', '35'), $iban);
        $remainder = bcmod($iban, 97);

        return intval($remainder) === 1;
    }
}
