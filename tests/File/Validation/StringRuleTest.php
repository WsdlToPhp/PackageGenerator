<?php

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

class StringRuleTest extends AbstractRuleTest
{

    /**
     * The CardNumber
     * Meta informations extracted from the WSDL
     * - documentation: Credit card number embossed on the card. | Used for Numeric Strings, length 1 to 19.
     * - use: optional
     * - base: xs:string
     * - pattern: [0-9]{1,19}
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid value array
     */
    public function testSetCardNumberWithArrayValueMustThrowAnException()
    {
        $instance = self::getWhlPaymentCardTypeInstance();

        $instance->setCardNumber([]);
    }

    /**
     * The CardNumber
     * Meta informations extracted from the WSDL
     * - documentation: Credit card number embossed on the card. | Used for Numeric Strings, length 1 to 19.
     * - use: optional
     * - base: xs:string
     * - pattern: [0-9]{1,19}
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid value true, please provide a string, boolean given
     */
    public function testSetCardNumberWithBoolValueMustThrowAnException()
    {
        $instance = self::getWhlPaymentCardTypeInstance();

        $instance->setCardNumber(true);
    }

    /**
     * The CardNumber
     * Meta informations extracted from the WSDL
     * - documentation: Credit card number embossed on the card. | Used for Numeric Strings, length 1 to 19.
     * - use: optional
     * - base: xs:string
     * - pattern: [0-9]{1,19}
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid value 1, please provide a string, integer given
     */
    public function testSetCardNumberWithIntValueMustThrowAnException()
    {
        $instance = self::getWhlPaymentCardTypeInstance();

        $instance->setCardNumber(1);
    }

    /**
     * The CardNumber
     * Meta informations extracted from the WSDL
     * - documentation: Credit card number embossed on the card. | Used for Numeric Strings, length 1 to 19.
     * - use: optional
     * - base: xs:string
     * - pattern: [0-9]{1,19}
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid value 12.5, please provide a string, double given
     */
    public function testSetCardNumberWithFloatValueMustThrowAnException()
    {
        $instance = self::getWhlPaymentCardTypeInstance();

        $instance->setCardNumber(12.5);
    }

    /**
     * The CardNumber
     * Meta informations extracted from the WSDL
     * - documentation: Credit card number embossed on the card. | Used for Numeric Strings, length 1 to 19.
     * - use: optional
     * - base: xs:string
     * - pattern: [0-9]{1,19}
     */
    public function testSetCardNumberWithNullValueMustPass()
    {
        $instance = self::getWhlPaymentCardTypeInstance();

        $this->assertSame($instance, $instance->setCardNumber(null));
    }

    /**
     * The CardNumber
     * Meta informations extracted from the WSDL
     * - documentation: Credit card number embossed on the card. | Used for Numeric Strings, length 1 to 19.
     * - use: optional
     * - base: xs:string
     * - pattern: [0-9]{1,19}
     */
    public function testSetCardNumberWithStringValueMustPass()
    {
        $instance = self::getWhlPaymentCardTypeInstance();

        $this->assertSame($instance, $instance->setCardNumber('015387434387354387343847'));
    }
}
