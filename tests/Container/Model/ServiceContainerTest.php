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
        $serviceContainer = new ServiceContainer(self::getBingGeneratorInstance());
        $serviceContainer->add(new Service(self::getBingGeneratorInstance(), 'Foo'));
        return $serviceContainer;
    }
    /**
     *
     */
    public function testGetServiceByName()
    {
        $serviceContainer = self::instance();

        $this->assertInstanceOf('\WsdlToPhp\PackageGenerator\Model\Service', $serviceContainer->getServiceByName('Foo'));
        $this->assertNull($serviceContainer->getServiceByName('Bar'));
    }
    /**
     *
     */
    public function testAddServiceNonUnique()
    {
        $serviceContainer = self::instance();

        $serviceContainer->addService('Foo', 'bar', 'string', 'int');
        $serviceContainer->addService('Foo', 'bar', 'int', 'string');

        $fooService = $serviceContainer->getServiceByName('Foo');

        $this->assertCount(2, $fooService->getMethods());

        $count = 0;
        foreach ($fooService->getMethods() as $method) {
            $this->assertFalse($method->isUnique());
            $count++;
        }
        $this->assertSame(2, $count);
    }
}
