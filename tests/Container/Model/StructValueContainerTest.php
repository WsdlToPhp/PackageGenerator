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
        $structValueContainer = new StructValueContainer(self::getBingGeneratorInstance());
        $structValueContainer->add(new StructValue(self::getBingGeneratorInstance(), 1, 0, $struct));
        $structValueContainer->add(new StructValue(self::getBingGeneratorInstance(), 2, 1, $struct));
        $structValueContainer->add(new StructValue(self::getBingGeneratorInstance(), 'any', 2, $struct));
        $structValueContainer->add(new StructValue(self::getBingGeneratorInstance(), 'bar', 3, $struct));
        return $structValueContainer;
    }
    /**
     *
     */
    public function testGetStructValueByName()
    {
        $structvalueContainer = self::instance();

        $this->assertInstanceOf('\WSdlToPhp\PackageGenerator\Model\StructValue', $structvalueContainer->getStructValueByName(1));
        $this->assertInstanceOf('\WSdlToPhp\PackageGenerator\Model\StructValue', $structvalueContainer->getStructValueByName(2));
        $this->assertInstanceOf('\WSdlToPhp\PackageGenerator\Model\StructValue', $structvalueContainer->getStructValueByName('any'));
        $this->assertNull($structvalueContainer->getStructValueByName('Bar'));
    }
}
