<?php

namespace WsdlToPhp\PackageGenerator\Tests\Container\Model;

use WsdlToPhp\PackageGenerator\Model\Service;
use WsdlToPhp\PackageGenerator\Container\Model\Service as ServiceContainer;
use WsdlToPhp\PackageGenerator\Tests\TestCase;

class ServiceContainerTest extends TestCase
{
    /**
     * @return ServiceContainer
     */
    public static function instance()
    {
        $serviceContainer = new ServiceContainer();
        $serviceContainer->add(new Service(self::getBingGeneratorInstance(), 'Foo'));
        return $serviceContainer;
    }
    /**
     *
     */
    public function testGetServiceByName()
    {
        $serviceContainer = self::instance();

        $this->assertInstanceOf('\\WsdlToPhp\\PackageGenerator\\Model\\Service', $serviceContainer->getServiceByName('Foo'));
        $this->assertNull($serviceContainer->getServiceByName('Bar'));
    }
    /**
     *
     */
    public function testGetAs()
    {
        $serviceContainer = self::instance();

        $this->assertInstanceOf('\\WsdlToPhp\\PackageGenerator\\Model\\Service', $serviceContainer->getAs(array(
            ServiceContainer::KEY_NAME => 'Foo',
        )));
        $this->assertNull($serviceContainer->getAs(array(
            ServiceContainer::KEY_NAME => 'foo',
        )));
    }
    /**
     *
     */
    public function testAddServiceNonUnique()
    {
        $serviceContainer = self::instance();

        $serviceContainer->addService(self::getBingGeneratorInstance(), 'Foo', 'bar', 'string', 'int');
        $serviceContainer->addService(self::getBingGeneratorInstance(), 'Foo', 'bar', 'int', 'string');

        $fooService = $serviceContainer->getServiceByName('Foo');

        $count = 0;
        foreach ($fooService->getMethods() as $method) {
            $this->assertFalse($method->getIsUnique());
            $count++;
        }
        $this->assertSame(2, $count);
    }
}
