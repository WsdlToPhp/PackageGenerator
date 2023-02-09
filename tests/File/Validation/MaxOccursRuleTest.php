<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

use StructType\ApiParagraphType;

/**
 * @internal
 * @coversDefaultClass
 */
final class MaxOccursRuleTest extends AbstractRule
{
    /**
     * The TaxDescription
     * Meta informations extracted from the WSDL
     * - documentation: Text description of the taxes in a given language.
     * - maxOccurs: 5
     * - minOccurs: 0.
     */
    public function testSetTaxDescriptionWithTooManyItemsMustThrowAnException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
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
    public function testSetTaxDescriptionWithSameItemsMustPass(): void
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
    public function testSetTaxDescriptionWithLessItemsMustPass(): void
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
    public function testAddToTaxDescriptionWithTooManyItemsMustThrowAnException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
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
    public function testAddToTaxDescriptionWithSameItemsMustPass(): void
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
    public function testAddToTaxDescriptionWithLessItemsMustPass(): void
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
