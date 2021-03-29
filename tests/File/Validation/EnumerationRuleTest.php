<?php

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

class EnumerationRuleTest extends AbstractRuleTest
{

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid value(s) 'foo', please use one of: Off, Moderate, Strict from enumeration class \EnumType\ApiAdultOption
     */
    public function testSetAdultValueWithInvalidValueMustThrowAnException()
    {
        $instance = self::getBingSearchRequestInstance();

        $instance->setAdult('foo');
    }

    /**
     *
     */
    public function testSetAdultValueWithValidValueMustPass()
    {
        $instance = self::getBingSearchRequestInstance();

        $this->assertSame($instance, $instance->setAdult(\EnumType\ApiAdultOption::VALUE_MODERATE));
    }

    /**
     *
     */
    public function testSetAdultValueWithNullValueMustPass()
    {
        $instance = self::getBingSearchRequestInstance();

        $this->assertSame($instance, $instance->setAdult(null));
    }
}
