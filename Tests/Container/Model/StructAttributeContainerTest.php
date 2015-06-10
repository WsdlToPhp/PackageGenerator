<?php

namespace WsdlToPhp\PackageGenerator\Tests\Container\Model;

use WsdlToPhp\PackageGenerator\Tests\Model\StructTest;
use WsdlToPhp\PackageGenerator\Model\StructAttribute;
use WsdlToPhp\PackageGenerator\Container\Model\StructAttribute as StructAttributeContainer;
use WsdlToPhp\PackageGenerator\Tests\TestCase;

class StructAttributeContainerTest extends TestCase
{
    /**
     * @return StructAttributeContainer
     */
    public static function instance()
    {
        $struct = StructTest::instance('Bar', true);
        $structAttributeContainer = new StructAttributeContainer();
        $structAttributeContainer->add(new StructAttribute('foo', 'string', $struct));
        $structAttributeContainer->add(new StructAttribute('bar', 'int', $struct));
        $structAttributeContainer->add(new StructAttribute('Bar', 'float', $struct));
        $structAttributeContainer->add(new StructAttribute('fooBar', 'bool', $struct));
        return $structAttributeContainer;
    }
    /**
     *
     */
    public function testGetStructAttributeByName()
    {
        $structAttributeContainer = self::instance();

        $this->assertInstanceOf('\\WsdlTophp\\PackageGenerator\\Model\\StructAttribute', $structAttributeContainer->getStructAttributeByName('foo'));
        $this->assertInstanceOf('\\WsdlTophp\\PackageGenerator\\Model\\StructAttribute', $structAttributeContainer->getStructAttributeByName('bar'));
        $this->assertInstanceOf('\\WsdlTophp\\PackageGenerator\\Model\\StructAttribute', $structAttributeContainer->getStructAttributeByName('fooBar'));
        $this->assertNull($structAttributeContainer->getStructAttributeByName('foobar'));
    }
    /**
     *
     */
    public function testGetAs()
    {
        $structAttributeContainer = self::instance();

        $this->assertInstanceOf('\\WsdlToPhp\\PackageGenerator\\Model\\StructAttribute', $structAttributeContainer->getAs(array(
            StructAttributeContainer::KEY_NAME => 'bar',
        )));
        $this->assertNull($structAttributeContainer->getAs(array(
            StructAttributeContainer::KEY_NAME => 'Foo',
        )));
    }
}
