<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\Model;

use InvalidArgumentException;
use WsdlToPhp\PackageGenerator\ConfigurationReader\StructArrayReservedMethod;
use WsdlToPhp\PackageGenerator\ConfigurationReader\StructReservedMethod;
use WsdlToPhp\PackageGenerator\Model\StructAttribute;
use WsdlToPhp\PackageGenerator\Model\StructValue;
use WsdlToPhp\PackageGenerator\Tests\AbstractTestCase;
use WsdlToPhp\PackageGenerator\Model\Struct;

final class StructTest extends AbstractTestCase
{
    public static function instance(string $name, bool $isStruct): Struct
    {
        return new Struct(self::getBingGeneratorInstance(), $name, $isStruct);
    }

    public function testGetContextualPartEnum()
    {
        $struct = self::instance('Foo', false);
        $struct->setRestriction(true);
        $this->assertEquals('EnumType', $struct->getContextualPart());
        $struct->setStruct(false);
        $this->assertEquals('EnumType', $struct->getContextualPart());
        $struct->setStruct(true);
        $this->assertEquals('EnumType', $struct->getContextualPart());
    }

    public function testGetDocSubPackagesEnum()
    {
        $struct = self::instance('Foo', false);
        $struct->setRestriction(true);
        $this->assertContains(Struct::DOC_SUB_PACKAGE_ENUMERATIONS, $struct->getDocSubPackages());
        $struct->setStruct(false);
        $this->assertContains(Struct::DOC_SUB_PACKAGE_ENUMERATIONS, $struct->getDocSubPackages());
        $struct->setStruct(true);
        $this->assertContains(Struct::DOC_SUB_PACKAGE_ENUMERATIONS, $struct->getDocSubPackages());
    }

    public function testGetContextualPartStruct()
    {
        $struct = self::instance('Foo', false);
        $this->assertEquals('StructType', $struct->getContextualPart());
        $struct->setRestriction(false);
        $this->assertEquals('StructType', $struct->getContextualPart());
        $struct->setStruct(true);
        $this->assertEquals('StructType', $struct->getContextualPart());
    }

    public function testGetDocSubPackagesStruct()
    {
        $struct = self::instance('Foo', false);
        $this->assertContains(Struct::DOC_SUB_PACKAGE_STRUCTS, $struct->getDocSubPackages());
        $struct->setRestriction(false);
        $this->assertContains(Struct::DOC_SUB_PACKAGE_STRUCTS, $struct->getDocSubPackages());
    }

    public function testGetCountAttributes()
    {
        $struct = self::instance('Foo', false);
        $struct->addAttribute('bar', 'string');
        $struct->addAttribute('bool', 'bool');

        $this->assertSame(2, $struct->getAttributes()->count());
    }

    public function testIsArrayTrue()
    {
        $struct = self::instance('ArrayFoo', false);
        $struct->addAttribute('ArrayOfId', 'array');
        $this->assertTrue($struct->isArray());
    }

    public function testIsArrayForArrayTypeWihoutArrayInNameAsTrue()
    {
        $struct = self::omnitureGeneratorInstance()->getStructByName('rscollection_calculated_metric');
        $this->assertTrue($struct->isArray());
    }

    public function testIsArrayFalseForName()
    {
        $struct = self::instance('Foo', false);
        $struct->addAttribute('ArrayOfId', 'array');
        $this->assertFalse($struct->isArray());
    }

    public function testIsArrayFalseForMultipleAttributes()
    {
        $struct = self::instance('ArrayFoo', false);
        $struct->addAttribute('ArrayOfId', 'array');
        $struct->addAttribute('ArrayOfString', 'array');
        $this->assertFalse($struct->isArray());
    }

    public function testGetValue()
    {
        $struct = self::instance('Foo', true);
        $struct->addValue('id');
        $struct->addValue('name');
        $struct->addValue('_key');
        $this->assertInstanceOf(StructValue::class, $struct->getValue('id'));
        $this->assertNotInstanceOf(StructValue::class, $struct->getValue('_id'));
    }

    public function testGetAttibute()
    {
        $struct = self::instance('Foo', true);
        $struct->addAttribute('id', 'int');
        $struct->addAttribute('name', 'string');
        $struct->addAttribute('_key', 'string');
        $this->assertInstanceOf(StructAttribute::class, $struct->getAttribute('id'));
        $this->assertNotInstanceOf(StructAttribute::class, $struct->getAttribute('_id'));
    }

    public function testAddEmptyAttributeNameWithException()
    {
        $this->expectException(InvalidArgumentException::class);

        $struct = self::instance('Foo', true);
        $struct->addAttribute('', 'string');
    }

    public function testAddEmptyAttributeTypeWithException()
    {
        $this->expectException(InvalidArgumentException::class);

        $struct = self::instance('Foo', true);
        $struct->addAttribute('bar', '');
    }

    public function testGetReservedMethodsInstance()
    {
        $this->assertInstanceOf(StructReservedMethod::class, self::instance('foo', true)->getReservedMethodsInstance());
    }

    public function testGetReservedMethodsInstanceForArray()
    {
        $instance = self::instance('array', true);
        $instance->addAttribute('bar', 'string');
        $this->assertInstanceOf(StructArrayReservedMethod::class, $instance->getReservedMethodsInstance());
    }

    public function testSetListMustSetTheListProperty()
    {
        $instance = self::instance('Foo', true)->setList($list = 'string');
        $this->assertSame($list, $instance->getList());
    }

    public function testGetProperAttributesMustReturnTheSearchRequestAttributes()
    {
        $bing = self::bingGeneratorInstance();

        $searchRequest = $bing->getStructByName('SearchRequest');

        if ($searchRequest) {
            $this->assertCount(19, $searchRequest->getProperAttributes());
        } else {
            $this->fail('Struct SearchRequest not found');
        }
    }

    public function testGetProperAttributesMustReturnTheAttendeeAttributes()
    {
        $myBoard = self::myBoardPackGeneratorInstance();

        $attendee = $myBoard->getStructByName('Attendee');

        if ($attendee) {
            $this->assertCount(19, $attendee->getAttributes(true));
            $this->assertCount(13, $attendee->getAttributes(false));
            $this->assertCount(13, $attendee->getProperAttributes());
        } else {
            $this->fail('Struct Attendee not found');
        }
    }

    public function testGetProperAttributesMustReturnTheSenderIdTypeAttributes()
    {
        $vehicleSelection = self::vehicleSelectionPackGeneratorInstance();

        $fieldString1000 = $vehicleSelection->getStructByName('fieldString1000');

        if ($fieldString1000) {
            $this->assertCount(4, $fieldString1000->getAttributes(true));
            $this->assertCount(1, $fieldString1000->getAttributes());
            $this->assertCount(0, $fieldString1000->getProperAttributes());
        } else {
            $this->fail('Struct fieldString1000 not found');
        }
    }
}
