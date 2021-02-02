<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

use Api\StructType\ApiParagraphType;
use TypeError;

final class ItemTypeRuleTest extends AbstractRuleTest
{
    public function testAddToTaxDescriptionValueWithStringValueMustThrowATypeError()
    {
        $this->expectException(TypeError::class);

        $instance = self::getWhlTaxTypeInstance();

        $instance->addToTaxDescription('foo');
    }

    public function testAddToTaxDescriptionValueWithNullValueMustThrowAnException()
    {
        $this->expectException(TypeError::class);

        $instance = self::getWhlTaxTypeInstance();

        $instance->addToTaxDescription(null);
    }

    public function testAddToTaxDescriptionValueWithApiParagraphTypeInstanceMustPass()
    {
        // true to avoid the maxoccurs error to occur
        $instance = self::getWhlTaxTypeInstance(true);

        $this->assertSame($instance, $instance->addToTaxDescription(new ApiParagraphType()));
    }

    public function testAddToFirstSegmentsIdsValueWithStringValueMustThrowAnException()
    {
        $this->expectException(TypeError::class);

        // true to avoid the maxoccurs error to occur
        $instance = self::getOdigeoFareItineraryInstance(true);

        $instance->addToFirstSegmentsIds('foo');
    }

    public function testAddToFirstSegmentsIdsValueWithNullValueMustThrowAnException()
    {
        $this->expectException(TypeError::class);

        // true to avoid the maxoccurs error to occur
        $instance = self::getOdigeoFareItineraryInstance(true);

        $instance->addToFirstSegmentsIds(null);
    }

    public function testAddToFirstSegmentsIdsValueWithIntValueMustPass()
    {
        // true to avoid the maxoccurs error to occur
        $instance = self::getOdigeoFareItineraryInstance(true);

        $this->assertSame($instance, $instance->addToFirstSegmentsIds(18));
    }

    public function testAddToFirstSegmentsIdsValueWithStringIntValueMustPass()
    {
        // true to avoid the maxoccurs error to occur
        $instance = self::getOdigeoFareItineraryInstance(true);

        $this->assertSame($instance, $instance->addToFirstSegmentsIds(18));
    }
}
