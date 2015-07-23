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

        $this->assertSame('getId', $service->getMethod('getId')->getMethodName());
        $this->assertSame('getid_1', $service->getMethod('getid')->getMethodName());
        $this->assertSame('getIdStringString', $service->getMethod('getIdString')->getMethodName());
        $this->assertSame('getIdIntInt', $service->getMethod('getIdInt')->getMethodName());
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
        $this->assertSame('get_id', $method->getMethodName());
        $this->assertSame('get_id', $method->getMethodName());

        $method = $service->getMethod('list');
        $this->assertSame('_list', $method->getMethodName());
        $this->assertSame('_list', $method->getMethodName());
    }
    /**
     *
     */
    public function testMultipleServicesSameMethods()
    {
        $service1 = new Service('Login');
        $service1->addMethod('Login', 'int', 'id');

        $service2 = new Service('Login');
        $service2->addMethod('login', 'int', 'id');

        $service3 = new Service('login');
        $service3->addMethod('Login', 'int', 'id');

        Service::purgeUniqueNames();
        $this->assertSame('Login', $service1->getMethod('Login')->getMethodName());
        Service::purgeUniqueNames();
        $this->assertSame('login', $service2->getMethod('login')->getMethodName());
        Service::purgeUniqueNames();
        $this->assertSame('Login', $service3->getMethod('Login')->getMethodName());
    }
    /**
     *
     */
    public function testMultipleServicesSameMethodsWithoutPurging()
    {
        $service1 = new Service('Login');
        $service1->addMethod('Login', 'int', 'id');

        $service2 = new Service('Login');
        $service2->addMethod('login', 'int', 'id');

        $service3 = new Service('login');
        $service3->addMethod('Login', 'int', 'id');

        Service::purgeUniqueNames();
        $this->assertSame('Login', $service1->getMethod('Login')->getMethodName());
        $this->assertSame('login_1', $service2->getMethod('login')->getMethodName());
        $this->assertSame('Login', $service3->getMethod('Login')->getMethodName());
    }
}
