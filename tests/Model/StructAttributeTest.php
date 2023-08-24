<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\Model;

use WsdlToPhp\PackageGenerator\ConfigurationReader\StructReservedMethod;
use WsdlToPhp\PackageGenerator\Model\Service;
use WsdlToPhp\PackageGenerator\Tests\AbstractTestCase;

/**
 * @internal
 * @coversDefaultClass
 */
final class StructAttributeTest extends AbstractTestCase
{
    public function testGetUniqueNameMustGenerateAUniqueNameAmongstTheSameStruct(): void
    {
        $struct = StructTest::instance('Foo', true)
            ->addAttribute('id', 'int')
            ->addAttribute('name', 'string')
            ->addAttribute('Name', 'string')
        ;
        $this->assertSame('id', $struct->getAttribute('id')->getUniqueName());
        $this->assertSame('name', $struct->getAttribute('name')->getUniqueName());
        $this->assertSame('Name_1', $struct->getAttribute('Name')->getUniqueName());
    }

    public function testGetUniqueNameMustGenerateOriginalNameBetweenTwoIndependentStructsSamelyCaseInsensitivelyNamed(): void
    {
        $Foo = StructTest::instance('Foo', true)
            ->addAttribute('id', 'int')
            ->addAttribute('name', 'string')
            ->addAttribute('bar', 'string')
        ;
        $foo = StructTest::instance('foo', true)
            ->addAttribute('id', 'int')
            ->addAttribute('name', 'string')
        ;
        $this->assertSame('id', $Foo->getAttribute('id')->getUniqueName());
        $this->assertSame('id', $foo->getAttribute('id')->getUniqueName());
        $this->assertSame('name', $Foo->getAttribute('name')->getUniqueName());
        $this->assertSame('name', $foo->getAttribute('name')->getUniqueName());
    }

    public function testGetReservedMethodsInstance(): void
    {
        $struct = StructTest::instance('Foo', true)->addAttribute('id', 'int');
        $this->assertInstanceOf(StructReservedMethod::class, $struct->getAttribute('id')->getReservedMethodsInstance());
    }

    public function testGetUniqueNameWithConflict(): void
    {
        /**
         * previous context.
         */
        $service = new Service(self::getBingGeneratorInstance(), 'Query');
        $service->addMethod('query', '', '');
        $service->getMethod('query')->getMethodName();

        /**
         * current context.
         */
        $struct = StructTest::instance('query', true);
        $struct->addAttribute('query', 'string');
        $structAttribute = $struct->getAttribute('query');
        $this->assertSame('query', $structAttribute->getUniqueName('foo'));
        $this->assertSame('query', $structAttribute->getUniqueName('foo'));
        $this->assertSame('getQuery', $structAttribute->getGetterName());
        $this->assertSame('setQuery', $structAttribute->getSetterName());
    }

    public function testStructAttributeTypeMustBeBool(): void
    {
        $structAttribute = self::unitTestsInstance()->getStructByName('Result')->getAttribute('Success');

        $this->assertSame('boolean', $structAttribute->getType(true));
        $this->assertSame('Success', $structAttribute->getType());
        $this->assertFalse($structAttribute->getDefaultValue('boolean'));
    }

    public function testIsNullableMustReturnFalse(): void
    {
        $structAttribute = self::unitTestsInstance()->getStructByName('Result')->getAttribute('Success');

        $this->assertFalse($structAttribute->isNullable());
    }

    public function testIsNullableMustReturnTrue(): void
    {
        $structAttribute = self::vehicleSelectionPackGeneratorInstance()->getStructByName('Legends')->getAttribute('legends');

        $this->assertTrue($structAttribute->isNullable());
    }
}
