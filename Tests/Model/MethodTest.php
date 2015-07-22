<?php

namespace WsdlToPhp\PackageGenerator\Tests\Model;

use WsdlToPhp\PackageGenerator\Tests\TestCase;
use WsdlToPhp\PackageGenerator\Model\Service;

class MethodTest extends TestCase
{
    /**
     *
     */
    public function testGetMethodName()
    {
        $service = new Service('Foo');
        $service->addMethod('getId', 'string', 'string');
        $service->addMethod('getid', 'string', 'string');
        $service->addMethod('getIdString', 'string', 'id', false);
        $service->addMethod('getIdInt', 'int', 'id', false);

        $this->assertEquals('getId', $service->getMethod('getId')->getMethodName());
        $this->assertEquals('getid_1', $service->getMethod('getid')->getMethodName());
        $this->assertEquals('getIdStringString', $service->getMethod('getIdString')->getMethodName());
        $this->assertEquals('getIdIntInt', $service->getMethod('getIdInt')->getMethodName());
    }
    /**
     *
     */
    public function testGetMethodNameCalledTwice()
    {
        $service = new Service('Foo');
        $service->addMethod('getId', 'string', 'string');
        $service->addMethod('get.id', 'string', 'string');
        $service->addMethod('getIdString', 'string', 'id', false);
        $service->addMethod('getIdInt', 'int', 'id', false);
        $service->addMethod('list', 'int', 'id', true);

        $method = $service->getMethod('get.id');
        $this->assertEquals('get_id', $method->getMethodName());
        $this->assertEquals('get_id', $method->getMethodName());

        $method = $service->getMethod('list');
        $this->assertEquals('_list', $method->getMethodName());
        $this->assertEquals('_list', $method->getMethodName());
    }
}
