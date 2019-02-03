<?php

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

class ArrayRuleTest extends AbstractRuleTest
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
     * - minLength: 1
     * @var string[]
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage The AddressLine property can only contain items of type string, NULL(NULL) given
     */
    public function testSetAddressLineWithNullOnOneItemMustThrowAnException()
    {
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
     * - minLength: 1
     * @var string[]
     */
    public function testSetAddressLineWithStringsMustPass()
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
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage The TaxDescription property can only contain items of type \Api\StructType\ApiParagraphType, string(''), integer(1) given
     */
    public function testSetTaxDescriptionValueWithStringValueMustThrowAnException()
    {
        $instance = self::getWhlTaxTypeInstance();

        $instance->setTaxDescription([
            '',
            1,
        ]);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage The TaxDescription property can only contain items of type \Api\StructType\ApiParagraphType, Api\StructType\ApiTaxType given
     */
    public function testSetTaxDescriptionValueWithInvalidObjectItemMustThrowAnException()
    {
        $instance = self::getWhlTaxTypeInstance();

        $this->assertSame(
            $instance,
            $instance->setTaxDescription([
                new \Api\StructType\ApiTaxType(),
                new \Api\StructType\ApiParagraphType(),
            ])
        );
    }

    /**
     *
     */
    public function testSetTaxDescriptionValueWithValidItemsMustPass()
    {
        $instance = self::getWhlTaxTypeInstance();

        $this->assertSame(
            $instance,
            $instance->setTaxDescription([
                new \Api\StructType\ApiParagraphType(),
                new \Api\StructType\ApiParagraphType(),
            ])
        );
    }
}
