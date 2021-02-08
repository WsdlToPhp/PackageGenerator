<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

use DOMDocument;
use InvalidArgumentException;
use stdClass;

/**
 * @internal
 * @coversDefaultClass
 */
final class XmlRuleTest extends AbstractRuleTest
{
    public function testSetAnyWithEmptyStringMustThrowAnException()
    {
        $this->expectException(InvalidArgumentException::class);

        $instance = self::getActonItemInstance();

        $instance->setAny('');
    }

    public function testSetAnyWithInvalidXmlStringMustThrowAnException()
    {
        $this->expectException(InvalidArgumentException::class);

        $instance = self::getActonItemInstance();

        @$instance->setAny('<attribute>1</attribute');
    }

    public function testSetAnyWithValidXmlStringMustPass()
    {
        $instance = self::getActonItemInstance();

        $instance->setAny($string = '<attribute>1</attribute>');

        $this->assertSame($string, $instance->getAny());
    }

    public function testSetAnyWithIntMustThrowAnException()
    {
        $this->expectException(InvalidArgumentException::class);

        $instance = self::getActonItemInstance();

        $instance->setAny(2);
    }

    public function testSetAnyWithDomDocumentMustPass()
    {
        $instance = self::getActonItemInstance();
        $domDocument = new DOMDocument();
        $domDocument->appendChild($domDocument->createElement('element', '147'));

        $instance->setAny($domDocument);

        $this->assertSame('<element>147</element>', $instance->getAny());
    }

    public function testSetAnyWithInvalidObjectMustThrowAnException()
    {
        $this->expectException(InvalidArgumentException::class);

        $instance = self::getActonItemInstance();

        $instance->setAny(new stdClass());
    }

    public function testSetAnyWithArrayMustThrowAnException()
    {
        $this->expectException(InvalidArgumentException::class);

        $instance = self::getActonItemInstance();

        $instance->setAny([]);
    }
}
