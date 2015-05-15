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
        $serviceContainer->add(new Service('Foo'));
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
}
