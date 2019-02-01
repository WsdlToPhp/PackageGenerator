<?php

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

class MinLengthRuleTest extends AbstractRuleTest
{

    /**
     * The dateOfBirth
     * Meta informations extracted from the WSDL
     * - documentation: Shopper's date of birth. | A date formatted as yyyy-MM-dd, for example February 25th, 2014 would become "2012-02-25".
     * - maxOccurs: 1
     * - minOccurs: 0
     * - base: normalizedString
     * - maxLength: 10
     * - minLength: 10
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid length of 9, the number of characters/octets contained by the literal must be greater than or equal to 10
     */
    public function testSetDateOfBirthWithTooShortCharactersMustThrowAnException()
    {
        $instance = self::getDocDataPaymentsShoppperInstance();

        $instance->setDateOfBirth('123456789');
    }

    /**
     * The dateOfBirth
     * Meta informations extracted from the WSDL
     * - documentation: Shopper's date of birth. | A date formatted as yyyy-MM-dd, for example February 25th, 2014 would become "2012-02-25".
     * - maxOccurs: 1
     * - minOccurs: 0
     * - base: normalizedString
     * - maxLength: 10
     * - minLength: 10
     */
    public function testDateOfBirthWithSameCharactersMustPass()
    {
        $instance = self::getDocDataPaymentsShoppperInstance();

        $this->assertSame($instance, $instance->setDateOfBirth('1234567890'));
    }

    /**
     * The dateOfBirth
     * Meta informations extracted from the WSDL
     * - documentation: Shopper's date of birth. | A date formatted as yyyy-MM-dd, for example February 25th, 2014 would become "2012-02-25".
     * - maxOccurs: 1
     * - minOccurs: 0
     * - base: normalizedString
     * - maxLength: 10
     * - minLength: 10
     */
    public function testDateOfBirthWithHigherCharactersMustPass()
    {
        $instance = self::getDocDataPaymentsShoppperInstance();

        $this->assertSame($instance, $instance->setEmail('a@foo.bar'));
    }

    /**
     * The AddressLine
     * Meta informations extracted from the WSDL
     * - documentation: When the address is unformatted (FormattedInd="false") these lines will contain free form address details. When the address is formatted and street number and street name must be sent independently, the street number will be sent
     * using StreetNmbr, and the street name will be sent in the first AddressLine occurrence. | Used for Character Strings, length 1 to 255.
     * - maxOccurs: 5
     * - minOccurs: 0
     * - base: xs:string
     * - maxLength: 255
     * - minLength: 1
     * @var string[]
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid length for value(s) '', '', the number of characters/octets contained by the literal must be greater than or equal to 1
     */
    public function testSetAddressLineWithLessCharactersPerItemMustThrowAnException()
    {
        $instance = self::getWhlAddressTypeInstance();

        $instance->setAddressLine([
            '',
            '',
        ]);
    }

    /**
     * The AddressLine
     * Meta informations extracted from the WSDL
     * - documentation: When the address is unformatted (FormattedInd="false") these lines will contain free form address details. When the address is formatted and street number and street name must be sent independently, the street number will be sent
     * using StreetNmbr, and the street name will be sent in the first AddressLine occurrence. | Used for Character Strings, length 1 to 255.
     * - maxOccurs: 5
     * - minOccurs: 0
     * - base: xs:string
     * - maxLength: 255
     * - minLength: 1
     * @var string[]
     */
    public function testSetAddressLineWithExactCharactersPerItemMustPass()
    {
        $instance = self::getWhlAddressTypeInstance();

        $this->assertSame(
            $instance,
            $instance->setAddressLine([
                'a',
                'b',
            ])
        );
    }

    /**
     * The AddressLine
     * Meta informations extracted from the WSDL
     * - documentation: When the address is unformatted (FormattedInd="false") these lines will contain free form address details. When the address is formatted and street number and street name must be sent independently, the street number will be sent
     * using StreetNmbr, and the street name will be sent in the first AddressLine occurrence. | Used for Character Strings, length 1 to 255.
     * - maxOccurs: 5
     * - minOccurs: 0
     * - base: xs:string
     * - maxLength: 255
     * - minLength: 1
     * @var string[]
     */
    public function testSetAddressLineWithMoreCharactersPerItemMustPass()
    {
        $instance = self::getWhlAddressTypeInstance();

        $this->assertSame(
            $instance,
            $instance->setAddressLine([
                'aaa',
                'bbb',
            ])
        );
    }
}
