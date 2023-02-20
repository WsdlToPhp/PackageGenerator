<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

use StructType\ApiParagraphType;
use StructType\ApiTaxType;

/**
 * @internal
 * @coversDefaultClass
 */
final class ArrayRuleTest extends AbstractRule
{
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
     */
    public function testSetAddressLineWithNullOnOneItemMustThrowAnException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('The AddressLine property can only contain items of type string, NULL(NULL) given');

        $instance = self::getWhlAddressTypeInstance();

        $this->assertSame(
            $instance,
            $instance->setAddressLine([
                null,
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
     * - minLength: 1.
     *
     * @var string[]
     */
    public function testSetAddressLineWithStringsMustPass(): void
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

    public function testSetTaxDescriptionValueWithStringValueMustThrowAnException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('The TaxDescription property can only contain items of type \StructType\ApiParagraphType, string(\'\'), integer(1) given');

        $instance = self::getWhlTaxTypeInstance();

        $instance->setTaxDescription([
            '',
            1,
        ]);
    }

    public function testSetTaxDescriptionValueWithInvalidObjectItemMustThrowAnException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('The TaxDescription property can only contain items of type \StructType\ApiParagraphType, StructType\ApiTaxType given');

        $instance = self::getWhlTaxTypeInstance();

        $this->assertSame(
            $instance,
            $instance->setTaxDescription([
                new ApiTaxType(),
                new ApiParagraphType(), // @phpstan-ignore-line
            ])
        );
    }

    public function testSetTaxDescriptionValueWithValidItemsMustPass(): void
    {
        $instance = self::getWhlTaxTypeInstance();

        $this->assertSame(
            $instance,
            $instance->setTaxDescription([
                new ApiParagraphType(), // @phpstan-ignore-line
                new ApiParagraphType(), // @phpstan-ignore-line
            ])
        );
    }
}
