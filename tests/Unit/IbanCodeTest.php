<?php


namespace Tests\Unit;

use App\Iban\Iban;
use PHPUnit\Framework\TestCase;

class IbanCodeTest extends TestCase
{
    /**
     * Iban codes for valid testing.
     *
     * @return void
     */
    public function getIbanCodesData(): array
    {
        return [
            'iban_code' => 'AL35202111090000000001234567',
            'iban_code' => 'AD1400080001001234567890',
            'iban_code' => 'AT483200000012345864',
            'iban_code' => 'AZ77VTBA00000000001234567890',
            'iban_code' => 'BH02CITI00001077181611',
            'iban_code' => 'BY86AKBB10100000002966000000',
            'iban_code' => 'BE71096123456769',
            'iban_code' => 'BA393385804800211234',
            'iban_code' => 'BR1500000000000010932840814P2',
            'iban_code' => 'BG18RZBB91550123456789',
            'iban_code' => 'BI1320001100010000123456789',
            'iban_code' => 'CR23015108410026012345',
            'iban_code' => 'HR1723600001101234565',
            'iban_code' => 'CY21002001950000357001234567',
            'iban_code' => 'CZ5508000000001234567899',
            'iban_code' => 'DK9520000123456789',
            'iban_code' => 'DJ2110002010010409943020008',
            'iban_code' => 'DO22ACAU00000000000123456789',
            'iban_code' => 'EG800002000156789012345180002',
            'iban_code' => 'SV43ACAT00000000000000123123',
            'iban_code' => 'EE471000001020145685',
            'iban_code' => 'FO9264600123456789',
            'iban_code' => 'FI1410093000123458',
            'iban_code' => 'FR7630006000011234567890189',
            'iban_code' => 'GE60NB0000000123456789',
            'iban_code' => 'DE75512108001245126199',
            'iban_code' => 'GI56XAPO000001234567890',
            'iban_code' => 'GR9608100010000001234567890',
            'iban_code' => 'GL8964710123456789',
            'iban_code' => 'GT20AGRO00000000001234567890',
            'iban_code' => 'VA59001123000012345678',
            'iban_code' => 'HU93116000060000000012345676',
            'iban_code' => 'IS750001121234563108962099',
            'iban_code' => 'IQ20CBIQ861800101010500',
            'iban_code' => 'IE64IRCE92050112345678',
            'iban_code' => 'IL170108000000012612345',
            'iban_code' => 'IT60X0542811101000000123456',
            'iban_code' => 'JO71CBJO0000000000001234567890',
            'iban_code' => 'KZ244350000012344567',
            'iban_code' => 'XK051212012345678906',
            'iban_code' => 'KW81CBKU0000000000001234560101',
            'iban_code' => 'LV97HABA0012345678910',
            'iban_code' => 'LB92000700000000123123456123',
            'iban_code' => 'LY38021001000000123456789',
            'iban_code' => 'LI7408806123456789012',
            'iban_code' => 'LT601010012345678901',
            'iban_code' => 'LU120010001234567891',
            'iban_code' => 'MT31MALT01100000000000000000123',
            'iban_code' => 'MR1300020001010000123456753',
            'iban_code' => 'MU43BOMM0101123456789101000MUR',
            'iban_code' => 'MD21EX000000000001234567',
            'iban_code' => 'MC5810096180790123456789085',
            'iban_code' => 'MN580050099123456789',
            'iban_code' => 'ME25505000012345678951',
            'iban_code' => 'NL02ABNA0123456789',
            'iban_code' => 'NI79BAMC00000000000003123123',
            'iban_code' => 'MK07200002785123453',
            'iban_code' => 'NO8330001234567',
            'iban_code' => 'PK36SCBL0000001123456702',
            'iban_code' => 'PS92PALS000000000400123456702',
            'iban_code' => 'PL10105000997603123456789123',
            'iban_code' => 'PT50002700000001234567833',
            'iban_code' => 'QA54QNBA000000000000693123456',
            'iban_code' => 'RO66BACX0000001234567890',
            'iban_code' => 'RU0204452560040702810412345678901',
            'iban_code' => 'LC14BOSL123456789012345678901234',
            'iban_code' => 'SM76P0854009812123456789123',
            'iban_code' => 'ST23000200000289355710148',
            'iban_code' => 'SA4420000001234567891234',
            'iban_code' => 'RS35105008123123123173',
            'iban_code' => 'SC74MCBL01031234567890123456USD',
            'iban_code' => 'SK8975000000000012345671',
            'iban_code' => 'SI56192001234567892',
            'iban_code' => 'SO061000001123123456789',
            'iban_code' => 'ES7921000813610123456789',
            'iban_code' => 'SD8811123456789012',
            'iban_code' => 'SE7280000810340009783242',
            'iban_code' => 'CH5604835012345678009',
            'iban_code' => 'TL380010012345678910106',
            'iban_code' => 'TN5904018104004942712345',
            'iban_code' => 'TR320010009999901234567890',
            'iban_code' => 'UA903052992990004149123456789',
            'iban_code' => 'AE460090000000123456789',
            'iban_code' => 'GB33BUKB20201555555555',
            'iban_code' => 'VG07ABVI0000000123456789',
        ];
    }

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
