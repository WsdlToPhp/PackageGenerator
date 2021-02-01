<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

use InvalidArgumentException;

final class StringRuleTest extends AbstractRuleTest
{
    /**
     * The CardNumber
     * Meta informations extracted from the WSDL
     * - documentation: Credit card number embossed on the card. | Used for Numeric Strings, length 1 to 19.
     * - use: optional
     * - base: xs:string
     * - pattern: [0-9]{1,19}
     */
    public function testSetCardNumberWithArrayValueMustThrowAnException()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid value array');

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
     */
    public function testSetCardNumberWithBoolValueMustThrowAnException()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid value true, please provide a string, boolean given');

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
     */
    public function testSetCardNumberWithIntValueMustThrowAnException()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid value 1, please provide a string, integer given');

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
     */
    public function testSetCardNumberWithFloatValueMustThrowAnException()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid value 12.5, please provide a string, double given');

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
