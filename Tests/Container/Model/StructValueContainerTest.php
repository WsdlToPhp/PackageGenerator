<?php

namespace WsdlToPhp\PackageGenerator\Tests\Container\Model;

use WsdlToPhp\PackageGenerator\Tests\Model\StructTest;
use WsdlToPhp\PackageGenerator\Model\StructValue;
use WsdlToPhp\PackageGenerator\Container\Model\StructValue as StructValueContainer;
use WsdlToPhp\PackageGenerator\Tests\TestCase;

class StructValueContainerTest extends TestCase
{
    /**
     * @return StructValueContainer
     */
    public static function instance()
    {
        $struct = StructTest::instance('Foo', 'true');
        $structValueContainer = new StructValueContainer();
        $structValueContainer->add(new StructValue(1, 0, $struct));
        $structValueContainer->add(new StructValue(2, 1, $struct));
        $structValueContainer->add(new StructValue('any', 2, $struct));
        $structValueContainer->add(new StructValue('bar', 3, $struct));
        return $structValueContainer;
    }
    /**
     *
     */
    public function testGetStructValueByName()
    {
        $structvalueContainer = self::instance();

        $this->assertInstanceOf('\\WSdlToPhp\\PackageGenerator\\Model\\StructValue', $structvalueContainer->getStructValueByName(1));
        $this->assertInstanceOf('\\WSdlToPhp\\PackageGenerator\\Model\\StructValue', $structvalueContainer->getStructValueByName(2));
        $this->assertInstanceOf('\\WSdlToPhp\\PackageGenerator\\Model\\StructValue', $structvalueContainer->getStructValueByName('any'));
        $this->assertNull($structvalueContainer->getStructValueByName('Bar'));
    }
}
