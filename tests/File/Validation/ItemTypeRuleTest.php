<?php

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

class ItemTypeRuleTest extends AbstractRuleTest
{
    /**
     * TypeError introduced in PHP 7, https://www.php.net/manual/fr/class.typeerror.php
     * @requires PHP 7.0
     * @expectedException \TypeError
     */
    public function testAddToTaxDescriptionValueWithStringValueMustThrowATypeError()
    {
        $instance = self::getWhlTaxTypeInstance();

        $instance->addToTaxDescription('foo');
    }

    /**
     * TypeError introduced in PHP 7, https://www.php.net/manual/fr/class.typeerror.php
     * @requires PHP 7.0
     * @expectedException \TypeError
     */
    public function testAddToTaxDescriptionValueWithNullValueMustThrowAnException()
    {
        $instance = self::getWhlTaxTypeInstance();

        $instance->addToTaxDescription(null);
    }

    /**
     *
     */
    public function testAddToTaxDescriptionValueWithApiParagraphTypeInstanceMustPass()
    {
        // true to avoid the maxoccurs error to occur
        $instance = self::getWhlTaxTypeInstance(true);

        $this->assertSame($instance, $instance->addToTaxDescription(new \StructType\ApiParagraphType()));
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage The firstSegmentsIds property can only contain items of type int, string given
     */
    public function testAddToFirstSegmentsIdsValueWithStringValueMustThrowAnException()
    {
        // true to avoid the maxoccurs error to occur
        $instance = self::getOdigeoFareItineraryInstance(true);

        $instance->addToFirstSegmentsIds('foo');
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage The firstSegmentsIds property can only contain items of type int, NULL given
     */
    public function testAddToFirstSegmentsIdsValueWithNullValueMustThrowAnException()
    {
        // true to avoid the maxoccurs error to occur
        $instance = self::getOdigeoFareItineraryInstance(true);

        $instance->addToFirstSegmentsIds(null);
    }

    /**
     *
     */
    public function testAddToFirstSegmentsIdsValueWithIntValueMustPass()
    {
        // true to avoid the maxoccurs error to occur
        $instance = self::getOdigeoFareItineraryInstance(true);

        $this->assertSame($instance, $instance->addToFirstSegmentsIds(18));
    }

    /**
     *
     */
    public function testAddToFirstSegmentsIdsValueWithStringIntValueMustPass()
    {
        // true to avoid the maxoccurs error to occur
        $instance = self::getOdigeoFareItineraryInstance(true);

        $this->assertSame($instance, $instance->addToFirstSegmentsIds('18'));
    }
}
