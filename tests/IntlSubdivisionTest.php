<?php
namespace Symfony\Component\IntlSubdivision;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Intl\Exception\MissingResourceException;

class IntlSubdivisionTest extends TestCase
{
    protected $country = 'US';

    public function testGetStatesAndProvinces()
    {
        $result = IntlSubdivision::getStatesAndProvinces();

        self::assertNotEmpty($result);
        self::assertArrayHasKey('US', $result);
        self::assertArrayHasKey('CA', $result['US']);
        self::assertArrayHasKey('MO', $result['US']);
        self::assertArrayHasKey('TX', $result['US']);
    }

    public function testGetStatesAndProvincesForCountry()
    {
        $result = IntlSubdivision::getStatesAndProvincesForCountry($this->country);

        self::assertNotEmpty($result);
        self::assertArrayHasKey('CA', $result);
        self::assertArrayHasKey('MO', $result);
        self::assertArrayHasKey('TX', $result);
    }

    public function testGetStatesAndProvincesForCountryThrowsMissingResourceException()
    {
        $badCountry = '0Z';

        self::expectException(MissingResourceException::class);

        IntlSubdivision::getStatesAndProvincesForCountry($badCountry);
    }
}
