<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

/**
 * @internal
 * @coversDefaultClass
 */
final class TotalDigitsRuleTest extends AbstractRule
{
    /**
     * The area_total
     * Meta informations extracted from the WSDL
     * - base: xsd:decimal
     * - fractionDigits: 2
     * - totalDigits: 15
     * - var: float.
     */
    public function testSetAreaTotalWithFloatTooManyDigitsMustThrowAnException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid value 123456789101112.12, the value must at most contain 2 fraction digits, 17 given');

        // hack as precision can return false negative with 1.23457E+14,
        ini_set('serialize_precision', '17');

        $instance = self::getReformaHouseProfileDataInstance();

        $instance->setArea_total(123_456_789_101_112.12);
    }

    /**
     * The area_total
     * Meta informations extracted from the WSDL
     * - base: xsd:decimal
     * - fractionDigits: 2
     * - totalDigits: 15
     * - var: float.
     */
    public function testSetAreaTotalWithFloatExactDigitsMustThrowAnException(): void
    {
        $instance = self::getReformaHouseProfileDataInstance();

        $this->assertSame($instance, $instance->setArea_total(1_234_567_891_011.12));
    }

    /**
     * The area_total
     * Meta informations extracted from the WSDL
     * - base: xsd:decimal
     * - fractionDigits: 2
     * - totalDigits: 15
     * - var: float.
     */
    public function testSetAreaTotalWithFloatLessDigitsMustThrowAnException(): void
    {
        $instance = self::getReformaHouseProfileDataInstance();

        $this->assertSame($instance, $instance->setArea_total(1.12));
    }
}
