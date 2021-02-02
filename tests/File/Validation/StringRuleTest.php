<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

use TypeError;

/**
 * @internal
 * @coversDefaultClass
 */
final class StringRuleTest extends AbstractRuleTest
{
    /**
     * The CardNumber
     * Meta informations extracted from the WSDL
     * - documentation: Credit card number embossed on the card. | Used for Numeric Strings, length 1 to 19.
     * - use: optional
     * - base: xs:string
     * - pattern: [0-9]{1,19}.
     */
    public function testSetCardNumberWithArrayValueMustThrowAnException()
    {
        $this->expectException(TypeError::class);

        $instance = self::getWhlPaymentCardTypeInstance();

        $instance->setCardNumber([]);
    }

    /**
     * The CardNumber
     * Meta informations extracted from the WSDL
     * - documentation: Credit card number embossed on the card. | Used for Numeric Strings, length 1 to 19.
     * - use: optional
     * - base: xs:string
     * - pattern: [0-9]{1,19}.
     */
    public function testSetCardNumberWithBoolValueMustThrowAnException()
    {
        $this->expectException(TypeError::class);

        $instance = self::getWhlPaymentCardTypeInstance();

        $instance->setCardNumber(true);
    }

    /**
     * The CardNumber
     * Meta informations extracted from the WSDL
     * - documentation: Credit card number embossed on the card. | Used for Numeric Strings, length 1 to 19.
     * - use: optional
     * - base: xs:string
     * - pattern: [0-9]{1,19}.
     */
    public function testSetCardNumberWithIntValueMustThrowAnException()
    {
        $this->expectException(TypeError::class);

        $instance = self::getWhlPaymentCardTypeInstance();

        $instance->setCardNumber(1);
    }

    /**
     * The CardNumber
     * Meta informations extracted from the WSDL
     * - documentation: Credit card number embossed on the card. | Used for Numeric Strings, length 1 to 19.
     * - use: optional
     * - base: xs:string
     * - pattern: [0-9]{1,19}.
     */
    public function testSetCardNumberWithFloatValueMustThrowAnException()
    {
        $this->expectException(TypeError::class);

        $instance = self::getWhlPaymentCardTypeInstance();

        $instance->setCardNumber(12.5);
    }

    /**
     * The CardNumber
     * Meta informations extracted from the WSDL
     * - documentation: Credit card number embossed on the card. | Used for Numeric Strings, length 1 to 19.
     * - use: optional
     * - base: xs:string
     * - pattern: [0-9]{1,19}.
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
     * - pattern: [0-9]{1,19}.
     */
    public function testSetCardNumberWithStringValueMustPass()
    {
        $instance = self::getWhlPaymentCardTypeInstance();

        $this->assertSame($instance, $instance->setCardNumber('015387434387354387343847'));
    }
}
