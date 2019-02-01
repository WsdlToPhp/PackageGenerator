<?php

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

class TotalDigitsRuleTest extends AbstractRuleTest
{

    /**
     * The area_total
     * Meta informations extracted from the WSDL
     * - base: xsd:decimal
     * - fractionDigits: 2
     * - totalDigits: 15
     * - var: float
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid value 123456789101112.12, the value must at most contain 2 fraction digits, 17 given
     */
    public function testSetAreaTotalWithFloatTooManyDigitsMustThrowAnException()
    {
        // hack as precision can return false negative with 1.23457E+14,
        ini_set('serialize_precision', 17);

        $instance = self::getReformaHouseProfileDataInstance();

        $instance->setArea_total(123456789101112.12);
    }

    /**
     * The area_total
     * Meta informations extracted from the WSDL
     * - base: xsd:decimal
     * - fractionDigits: 2
     * - totalDigits: 15
     * - var: float
     */
    public function testSetAreaTotalWithFloatExactDigitsMustThrowAnException()
    {
        $instance = self::getReformaHouseProfileDataInstance();

        $this->assertSame($instance, $instance->setArea_total(1234567891011.12));
    }

    /**
     * The area_total
     * Meta informations extracted from the WSDL
     * - base: xsd:decimal
     * - fractionDigits: 2
     * - totalDigits: 15
     * - var: float
     */
    public function testSetAreaTotalWithFloatLessDigitsMustThrowAnException()
    {
        $instance = self::getReformaHouseProfileDataInstance();

        $this->assertSame($instance, $instance->setArea_total(1.12));
    }
}
