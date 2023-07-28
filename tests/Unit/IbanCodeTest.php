<?php


namespace Tests\Unit;

use App\Iban\Iban;
use PHPUnit\Framework\TestCase;

class IbanCodeTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function testIsValidIban(): void
    {
        $iban = new Iban();

        $valids = [
            'AL47212110090000000235698741',
            'AD1200012030200359100100',
            'AT611904300234573201',
            'BH02CITI00001077181611',
            'BE68539007547034',
            'BA391290079401028494',
            'BG80BNBG96611020345678',
            'HR1210010051863000160',
            'CY17002001280000001200527600',
            'CZ5508000000001234567899',
        ];

        array_walk($valids, function ($ibanCode) use ($iban) {
            $this->assertTrue($iban->isValid($ibanCode));
        });
    }

    /**
     * Test if invalid
     */
    public function testIsInvalidIban(): void
    {
        $iban = new Iban();

        $invalids = [
            "DE9999999999999999", // Length too long
            "FR12345678901234567", // Length too long
            "IT9999999999999999", // Length too long
            "GB9999999999999999", // Length too long
            "DE0000000000000000", // Country code not valid
            "FR1234567890123456", // Check digits not valid
            "IT0000000000000000", // Country code not valid
            "GB0000000000000000", // Country code not valid
            "DE999999999999999A", // Invalid character in IBAN code
            "FR123456789012345Z", // Invalid character in IBAN code
        ];

        array_walk($invalids, function ($ibanCode) use ($iban) {
            $this->assertFalse($iban->isValid($ibanCode));
        });
    }
}
