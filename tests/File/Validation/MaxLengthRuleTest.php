<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

/**
 * @internal
 * @coversDefaultClass
 */
final class MaxLengthRuleTest extends AbstractRule
{
    /**
     * The email
     * Meta informations extracted from the WSDL
     * - documentation: Shopper's e-mail address. | Email address.
     * - maxOccurs: 1
     * - minOccurs: 1
     * - base: ddp:string100 | normalizedString
     * - pattern: [_a-zA-Z0-9\-\+\.]+@[a-zA-Z0-9\-]+(\.[a-zA-Z0-9\-]+)*(\.[a-zA-Z]+)
     * - maxLength: 100.
     */
    public function testSetEmailWithTooLongCharactersMustThrowAnException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid length of 107, the number of characters/octets contained by the literal must be less than or equal to 100');

        $instance = self::getDocDataPaymentsShoppperInstance();

        $instance->setEmail(str_repeat('a', 99).'@foo.bar');
    }

    /**
     * The email
     * Meta informations extracted from the WSDL
     * - documentation: Shopper's e-mail address. | Email address.
     * - maxOccurs: 1
     * - minOccurs: 1
     * - base: ddp:string100 | normalizedString
     * - pattern: [_a-zA-Z0-9\-\+\.]+@[a-zA-Z0-9\-]+(\.[a-zA-Z0-9\-]+)*(\.[a-zA-Z]+)
     * - maxLength: 100.
     */
    public function testSetEmailWithSameCharactersMustPass(): void
    {
        $instance = self::getDocDataPaymentsShoppperInstance();

        $this->assertSame($instance, $instance->setEmail(str_repeat('a', 92).'@foo.bar'));
    }

    /**
     * The email
     * Meta informations extracted from the WSDL
     * - documentation: Shopper's e-mail address. | Email address.
     * - maxOccurs: 1
     * - minOccurs: 1
     * - base: ddp:string100 | normalizedString
     * - pattern: [_a-zA-Z0-9\-\+\.]+@[a-zA-Z0-9\-]+(\.[a-zA-Z0-9\-]+)*(\.[a-zA-Z]+)
     * - maxLength: 100.
     */
    public function testSetEmailWithLessCharactersMustPass(): void
    {
        $instance = self::getDocDataPaymentsShoppperInstance();

        $this->assertSame($instance, $instance->setEmail('a@foo.bar'));
    }

    /**
     * The email
     * Meta informations extracted from the WSDL
     * - documentation: Shopper's e-mail address. | Email address.
     * - maxOccurs: 1
     * - minOccurs: 1
     * - base: ddp:string100 | normalizedString
     * - pattern: [_a-zA-Z0-9\-\+\.]+@[a-zA-Z0-9\-]+(\.[a-zA-Z0-9\-]+)*(\.[a-zA-Z]+)
     * - maxLength: 100.
     */
    public function testSetEmailWithNullMustThrowAnException(): void
    {
        $this->expectException(\TypeError::class);

        $instance = self::getDocDataPaymentsShoppperInstance();

        $this->assertSame($instance, $instance->setEmail(null));
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
     * - minLength: 1.
     *
     * @var string[]
     */
    public function testSetAddressLineWithTooManyCharactersPerItemMustThrowAnException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid length for value(s) \'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa\', \'bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb\', the number of characters/octets contained by the literal must be less than or equal to 255');

        $instance = self::getWhlAddressTypeInstance();

        $instance->setAddressLine([
            str_repeat('a', 256),
            str_repeat('b', 257),
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
     * - minLength: 1.
     *
     * @var string[]
     */
    public function testSetAddressLineWithExactCharactersPerItemMustPass(): void
    {
        $instance = self::getWhlAddressTypeInstance();

        $this->assertSame(
            $instance,
            $instance->setAddressLine([
                str_repeat('a', 255),
                str_repeat('b', 255),
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
     * - minLength: 1.
     *
     * @var string[]
     */
    public function testSetAddressLineWithLessCharactersPerItemMustPass(): void
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
}
