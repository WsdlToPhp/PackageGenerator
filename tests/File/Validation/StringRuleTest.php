<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

/**
 * @internal
 * @coversDefaultClass
 */
final class StringRuleTest extends AbstractRule
{
    /**
     * The CardNumber
     * Meta informations extracted from the WSDL
     * - documentation: Credit card number embossed on the card. | Used for Numeric Strings, length 1 to 19.
     * - use: optional
     * - base: xs:string
     * - pattern: [0-9]{1,19}.
     */
    public function testSetCardNumberWithArrayValueMustThrowAnException(): void
    {
        $this->expectException(\TypeError::class);

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
    public function testSetCardNumberWithBoolValueMustThrowAnException(): void
    {
        $this->expectException(\TypeError::class);

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
    public function testSetCardNumberWithIntValueMustThrowAnException(): void
    {
        $this->expectException(\TypeError::class);

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
    public function testSetCardNumberWithFloatValueMustThrowAnException(): void
    {
        $this->expectException(\TypeError::class);

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
    public function testSetCardNumberWithNullValueMustPass(): void
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
    public function testSetCardNumberWithStringValueMustPass(): void
    {
        $instance = self::getWhlPaymentCardTypeInstance();

        $this->assertSame($instance, $instance->setCardNumber('015387434387354387343847'));
    }
}
