<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\Model;

use WsdlToPhp\PackageGenerator\ConfigurationReader\ServiceReservedMethod;
use WsdlToPhp\PackageGenerator\Model\Service;
use WsdlToPhp\PackageGenerator\Tests\AbstractTestCase;

/**
 * @internal
 * @coversDefaultClass
 */
final class MethodTest extends AbstractTestCase
{
    public function testGetMethodName(): void
    {
        $service = new Service(self::getBingGeneratorInstance(), 'Foo');
        $service->addMethod('getId', 'string', 'string');
        $service->addMethod('getid', 'string', 'string');
        $service->addMethod('getIdString', 'string', 'id', false);
        $service->addMethod('getIdInt', 'int', 'id', false);

        $this->assertSame('getId', $service->getMethod('getId')->getMethodName());
        $this->assertSame('getid_1', $service->getMethod('getid')->getMethodName());
        $this->assertSame('getIdStringString', $service->getMethod('getIdString')->getMethodName());
        $this->assertSame('getIdIntInt', $service->getMethod('getIdInt')->getMethodName());
    }

    public function testGetMethodNameCalledTwice(): void
    {
        $service = new Service(self::getBingGeneratorInstance(), 'Foo');
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

    public function testMultipleServicesSameMethods(): void
    {
        Service::purgeUniqueNames();
        $service1 = new Service(self::getBingGeneratorInstance(), 'Login');
        $service1->addMethod('Login', 'int', 'id');

        $service2 = new Service(self::getBingGeneratorInstance(), 'Login');
        $service2->addMethod('login', 'int', 'id');

        $service3 = new Service(self::getBingGeneratorInstance(), 'login');
        $service3->addMethod('Login', 'int', 'id');

        $service4 = new Service(self::getBingGeneratorInstance(), 'login');
        $service4->addMethod('Login', 'int', 'id', false);

        $service5 = new Service(self::getBingGeneratorInstance(), 'login');
        $service5->addMethod('Login', ['int', ' string'], 'id', false);

        $this->assertSame('Login', $service1->getMethod('Login')->getMethodName());
        $this->assertSame('login_1', $service2->getMethod('login')->getMethodName());
        $this->assertSame('Login', $service3->getMethod('Login')->getMethodName());
        $this->assertSame('LoginInt', $service4->getMethod('Login')->getMethodName());
        $this->assertSame(sprintf('Login_%s', md5(var_export(['int', ' string'], true))), $service5->getMethod('Login')->getMethodName());
    }

    public function testMultipleServicesSameMethodsWithoutPurging(): void
    {
        Service::purgeUniqueNames();
        $service1 = new Service(self::getBingGeneratorInstance(), 'Login');
        $service1->addMethod('Login', 'int', 'id');

        $service2 = new Service(self::getBingGeneratorInstance(), 'Login');
        $service2->addMethod('login', 'int', 'id');

        $service3 = new Service(self::getBingGeneratorInstance(), 'login');
        $service3->addMethod('Login', 'int', 'id');

        $this->assertSame('Login', $service1->getMethod('Login')->getMethodName());
        $this->assertSame('login_1', $service2->getMethod('login')->getMethodName());
        $this->assertSame('Login', $service3->getMethod('Login')->getMethodName());
    }

    public function testGetCleanNameWithOneInt(): void
    {
        Service::purgeUniqueNames();
        $service1 = new Service(self::getBingGeneratorInstance(), 'Login');
        $service1->addMethod('0MyOperation', 'int', 'id');

        $this->assertSame('_MyOperation', $service1->getMethod('0MyOperation')->getCleanName());
    }

    public function testGetCleanNameWithMultipleInt(): void
    {
        Service::purgeUniqueNames();
        $service1 = new Service(self::getBingGeneratorInstance(), 'Login');
        $service1->addMethod('0123456789MyOperation', 'int', 'id');

        $this->assertSame('_MyOperation', $service1->getMethod('0123456789MyOperation')->getCleanName());
    }

    public function testNameIsCleanWithOneInt(): void
    {
        Service::purgeUniqueNames();
        $service1 = new Service(self::getBingGeneratorInstance(), 'Login');
        $service1->addMethod('0MyOperation', 'int', 'id');

        $this->assertFalse($service1->getMethod('0MyOperation')->nameIsClean());
    }

    public function testNameIsCleanWithMultipleInt(): void
    {
        Service::purgeUniqueNames();
        $service1 = new Service(self::getBingGeneratorInstance(), 'Login');
        $service1->addMethod('0123456789MyOperation', 'int', 'id');

        $this->assertFalse($service1->getMethod('0123456789MyOperation')->nameIsClean());
    }

    public function testGetReservedMethodsInstance(): void
    {
        $service = new Service(self::getBingGeneratorInstance(), 'Foo');
        $service->addMethod('getId', 'string', 'string');
        $this->assertInstanceOf(ServiceReservedMethod::class, $service->getMethod('getId')->getReservedMethodsInstance());
    }

    public function testReplaceReservedMethod(): void
    {
        $service = new Service(self::getBingGeneratorInstance(), 'Foo');
        $method = $service->addMethod('__construct', 'string', 'string', true);

        $this->assertSame('___construct', $method->getMethodName());
        $this->assertSame('___construct', $method->replaceReservedMethod('__construct'));
    }
}
