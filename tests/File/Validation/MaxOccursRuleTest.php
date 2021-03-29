<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

use StructType\ApiParagraphType;
use InvalidArgumentException;

/**
 * @internal
 * @coversDefaultClass
 */
final class MaxOccursRuleTest extends AbstractRuleTest
{
    /**
     * The TaxDescription
     * Meta informations extracted from the WSDL
     * - documentation: Text description of the taxes in a given language.
     * - maxOccurs: 5
     * - minOccurs: 0.
     */
    public function testSetTaxDescriptionWithTooManyItemsMustThrowAnException()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid count of 6, the number of elements contained by the property must be less than or equal to 5');

        $instance = self::getWhlTaxTypeInstance();

        $instance->setTaxDescription([
            new ApiParagraphType(),
            new ApiParagraphType(),
            new ApiParagraphType(),
            new ApiParagraphType(),
            new ApiParagraphType(),
            new ApiParagraphType(),
        ]);
    }

    /**
     * The TaxDescription
     * Meta informations extracted from the WSDL
     * - documentation: Text description of the taxes in a given language.
     * - maxOccurs: 5
     * - minOccurs: 0.
     */
    public function testSetTaxDescriptionWithSameItemsMustPass()
    {
        $instance = self::getWhlTaxTypeInstance();

        $this->assertSame($instance, $instance->setTaxDescription([
            new ApiParagraphType(),
            new ApiParagraphType(),
            new ApiParagraphType(),
            new ApiParagraphType(),
            new ApiParagraphType(),
        ]));
    }

    /**
     * The TaxDescription
     * Meta informations extracted from the WSDL
     * - documentation: Text description of the taxes in a given language.
     * - maxOccurs: 5
     * - minOccurs: 0.
     */
    public function testSetTaxDescriptionWithLessItemsMustPass()
    {
        $instance = self::getWhlTaxTypeInstance();

        $this->assertSame($instance, $instance->setTaxDescription([
            new ApiParagraphType(),
            new ApiParagraphType(),
        ]));
    }

    /**
     * The TaxDescription
     * Meta informations extracted from the WSDL
     * - documentation: Text description of the taxes in a given language.
     * - maxOccurs: 5
     * - minOccurs: 0.
     */
    public function testAddToTaxDescriptionWithTooManyItemsMustThrowAnException()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('You can\'t add anymore element to this property that already contains 5 elements, the number of elements contained by the property must be less than or equal to 5');

        // true to ensure to start from zero for addTo calls
        $instance = self::getWhlTaxTypeInstance(true);

        $instance
            ->addToTaxDescription(new ApiParagraphType())
            ->addToTaxDescription(new ApiParagraphType())
            ->addToTaxDescription(new ApiParagraphType())
            ->addToTaxDescription(new ApiParagraphType())
            ->addToTaxDescription(new ApiParagraphType())
            ->addToTaxDescription(new ApiParagraphType())
            ->addToTaxDescription(new ApiParagraphType())
        ;
    }

    /**
     * The TaxDescription
     * Meta informations extracted from the WSDL
     * - documentation: Text description of the taxes in a given language.
     * - maxOccurs: 5
     * - minOccurs: 0.
     */
    public function testAddToTaxDescriptionWithSameItemsMustPass()
    {
        // true to ensure to start from zero for addTo calls
        $instance = self::getWhlTaxTypeInstance(true);

        $this->assertSame(
            $instance,
            $instance
                ->addToTaxDescription(new ApiParagraphType())
                ->addToTaxDescription(new ApiParagraphType())
                ->addToTaxDescription(new ApiParagraphType())
                ->addToTaxDescription(new ApiParagraphType())
                ->addToTaxDescription(new ApiParagraphType())
        );
    }

    /**
     * The TaxDescription
     * Meta informations extracted from the WSDL
     * - documentation: Text description of the taxes in a given language.
     * - maxOccurs: 5
     * - minOccurs: 0.
     */
    public function testAddToTaxDescriptionWithLessItemsMustPass()
    {
        // true to ensure to start from zero for addTo calls
        $instance = self::getWhlTaxTypeInstance(true);

        $this->assertSame(
            $instance,
            $instance
                ->addToTaxDescription(new ApiParagraphType())
                ->addToTaxDescription(new ApiParagraphType())
        );
    }
}
