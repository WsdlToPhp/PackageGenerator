<?php

namespace WsdlToPhp\PackageGenerator\Tests\Model;

use WsdlToPhp\PackageGenerator\Tests\TestCase;
use WsdlToPhp\PackageGenerator\Model\Service;

class ServiceTest extends TestCase
{
    /**
     * @param string $name
     * @return Service
     */
    public static function instance($name)
    {
        return new Service(self::getBingGeneratorInstance(true), $name);
    }
    /**
     *
     */
    public function testGetMethod()
    {
        $service = self::instance('Foo');
        $service->addMethod('getBar', 'string', 'int');
        $service->addMethod('getFoo', 'string', 'int');

        $this->assertInstanceOf('\WsdlToPhp\PackageGenerator\Model\Method', $service->getMethod('getBar'));
        $this->assertNotInstanceOf('\WsdlToPhp\PackageGenerator\Model\Method', $service->getMethod('getbar'));

        $service->getMethod('getBar')->setName('getbar');
        $this->assertInstanceOf('\WsdlToPhp\PackageGenerator\Model\Method', $service->getMethod('getbar'));
    }
    public function testGetReservedMethodsInstance()
    {
        $this->assertInstanceOf('\WsdlToPhp\PackageGenerator\ConfigurationReader\ServiceReservedMethod', self::instance('foo')->getReservedMethodsInstance());
    }

    public function testGetNamespaceWithCustomDirectoryStructureMustReturnTheDirectoryWithinTheNamespace()
    {
        $model = self::instance('foo');
        $model->getGenerator()->setOptionServicesFolder('Domain/Services');
        $this->assertSame('Domain\Services', $model->getNamespace());
    }
}
