<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

use InvalidArgumentException;

/**
 * @internal
 * @coversDefaultClass
 */
final class PatternRuleTest extends AbstractRuleTest
{
    /**
     * The Code
     * Meta informations extracted from the WSDL
     * - documentation: Code identifying the fee (e.g.,agency fee, municipality fee). Refer to OpenTravel Code List Fee Tax Type (FTT). | Used for codes in the OpenTravel Code tables. Possible values of this pattern are 1, 101, 101.EQP, or 101.EQP.X.
     * - base: xs:string
     * - pattern: [0-9A-Z]{1,3}(\.[A-Z]{3}(\.X){0,1}){0,1}.
     */
    public function testSetCodeWithInvalidValueMustThrowAnException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid value \'$^ù\', please provide a literal that is among the set of character sequences denoted by the regular expression /[0-9A-Z]{1,3}(\.[A-Z]{3}(\.X){0,1}){0,1}|0AA.BBBX|^$/');

        $instance = self::getWhlTaxTypeInstance();

        $instance->setCode('$^ù');
    }

    /**
     * The Code
     * Meta informations extracted from the WSDL
     * - documentation: Code identifying the fee (e.g.,agency fee, municipality fee). Refer to OpenTravel Code List Fee Tax Type (FTT). | Used for codes in the OpenTravel Code tables. Possible values of this pattern are 1, 101, 101.EQP, or 101.EQP.X.
     * - base: xs:string
     * - pattern: [0-9A-Z]{1,3}(\.[A-Z]{3}(\.X){0,1}){0,1}.
     */
    public function testSetCodeWithValidEmptyValueMustPass(): void
    {
        $instance = self::getWhlTaxTypeInstance();

        $this->assertSame($instance, $instance->setCode(''));
    }

    /**
     * The Code
     * Meta informations extracted from the WSDL
     * - documentation: Code identifying the fee (e.g.,agency fee, municipality fee). Refer to OpenTravel Code List Fee Tax Type (FTT). | Used for codes in the OpenTravel Code tables. Possible values of this pattern are 1, 101, 101.EQP, or 101.EQP.X.
     * - base: xs:string
     * - pattern: [0-9A-Z]{1,3}(\.[A-Z]{3}(\.X){0,1}){0,1}.
     */
    public function testSetCodeWithValidValueMustPass(): void
    {
        $instance = self::getWhlTaxTypeInstance();

        $this->assertSame($instance, $instance->setCode('AAA-111-BBB'));
    }

    /**
     * The CardNumber
     * Meta informations extracted from the WSDL
     * - documentation: Credit card number embossed on the card. | Used for Numeric Strings, length 1 to 19.
     * - use: optional
     * - base: xs:string
     * - pattern: [0-9]{1,19}.
     */
    public function testSetCardNumberWithInvalidValueTooShortMustThrowAnException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid value \'\', please provide a literal that is among the set of character sequences denoted by the regular expression /[0-9]{1,19}/');

        $instance = self::getWhlPaymentCardTypeInstance();

        $instance->setCardNumber(str_repeat('0', 0));
    }

    /**
     * The CardNumber
     * Meta informations extracted from the WSDL
     * - documentation: Credit card number embossed on the card. | Used for Numeric Strings, length 1 to 19.
     * - use: optional
     * - base: xs:string
     * - pattern: [0-9]{1,19}.
     */
    public function testSetCardNumberWithInvalidCharactersMustThrowAnException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid value \'aaaaa\', please provide a literal that is among the set of character sequences denoted by the regular expression /[0-9]{1,19}/');

        $instance = self::getWhlPaymentCardTypeInstance();

        $instance->setCardNumber(str_repeat('a', 5));
    }

    /**
     * The CardNumber
     * Meta informations extracted from the WSDL
     * - documentation: Credit card number embossed on the card. | Used for Numeric Strings, length 1 to 19.
     * - use: optional
     * - base: xs:string
     * - pattern: [0-9]{1,19}.
     */
    public function testSetCardNumberWithValidValueMustPass(): void
    {
        $instance = self::getWhlPaymentCardTypeInstance();

        $this->assertSame($instance, $instance->setCardNumber(str_repeat('0', 20)));
    }
}
