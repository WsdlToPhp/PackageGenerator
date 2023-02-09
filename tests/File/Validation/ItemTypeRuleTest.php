<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

use StructType\ApiParagraphType;

/**
 * @internal
 * @coversDefaultClass
 */
final class ItemTypeRuleTest extends AbstractRule
{
    public function testAddToTaxDescriptionValueWithStringValueMustThrowATypeError(): void
    {
        $this->expectException(\TypeError::class);

        $instance = self::getWhlTaxTypeInstance();

        $instance->addToTaxDescription('foo');
    }

    public function testAddToTaxDescriptionValueWithNullValueMustThrowAnException(): void
    {
        $this->expectException(\TypeError::class);

        $instance = self::getWhlTaxTypeInstance();

        $instance->addToTaxDescription(null);
    }

    public function testAddToTaxDescriptionValueWithApiParagraphTypeInstanceMustPass(): void
    {
        // true to avoid the maxoccurs error to occur
        $instance = self::getWhlTaxTypeInstance(true);

        $this->assertSame($instance, $instance->addToTaxDescription(new ApiParagraphType())); // @phpstan-ignore-line
    }

    public function testAddToFirstSegmentsIdsValueWithStringValueMustThrowAnException(): void
    {
        $this->expectException(\TypeError::class);

        // true to avoid the maxoccurs error to occur
        $instance = self::getOdigeoFareItineraryInstance(true);

        $instance->addToFirstSegmentsIds('foo');
    }

    public function testAddToFirstSegmentsIdsValueWithNullValueMustThrowAnException(): void
    {
        $this->expectException(\TypeError::class);

        // true to avoid the maxoccurs error to occur
        $instance = self::getOdigeoFareItineraryInstance(true);

        $instance->addToFirstSegmentsIds(null);
    }

    public function testAddToFirstSegmentsIdsValueWithIntValueMustPass(): void
    {
        // true to avoid the maxoccurs error to occur
        $instance = self::getOdigeoFareItineraryInstance(true);

        $this->assertSame($instance, $instance->addToFirstSegmentsIds(18));
    }

    public function testAddToFirstSegmentsIdsValueWithStringIntValueMustPass(): void
    {
        // true to avoid the maxoccurs error to occur
        $instance = self::getOdigeoFareItineraryInstance(true);

        $this->assertSame($instance, $instance->addToFirstSegmentsIds(18));
    }
}
