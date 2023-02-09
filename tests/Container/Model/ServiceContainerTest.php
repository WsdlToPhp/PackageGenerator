<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\Container\Model;

use WsdlToPhp\PackageGenerator\Container\Model\Service as ServiceContainer;
use WsdlToPhp\PackageGenerator\Model\Service as ServiceModel;
use WsdlToPhp\PackageGenerator\Tests\AbstractTestCase;

/**
 * @internal
 * @coversDefaultClass
 */
final class ServiceContainerTest extends AbstractTestCase
{
    public static function instance(): ServiceContainer
    {
        $serviceContainer = new ServiceContainer(self::getBingGeneratorInstance());
        $serviceContainer->add(new ServiceModel(self::getBingGeneratorInstance(), 'Foo'));

        return $serviceContainer;
    }

    public function testGetServiceByName(): void
    {
        $serviceContainer = self::instance();

        $this->assertInstanceOf(ServiceModel::class, $serviceContainer->getServiceByName('Foo'));
        $this->assertNull($serviceContainer->getServiceByName('Bar'));
    }

    public function testAddServiceNonUnique(): void
    {
        $serviceContainer = self::instance();

        $serviceContainer->addService('Foo', 'bar', 'string', 'int');
        $serviceContainer->addService('Foo', 'bar', 'int', 'string');

        $fooService = $serviceContainer->getServiceByName('Foo');

        $this->assertCount(2, $fooService->getMethods());

        $count = 0;
        foreach ($fooService->getMethods() as $method) {
            $this->assertFalse($method->isUnique());
            ++$count;
        }
        $this->assertSame(2, $count);
    }
}
