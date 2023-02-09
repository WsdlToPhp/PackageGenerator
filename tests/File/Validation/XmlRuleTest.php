<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

/**
 * @internal
 * @coversDefaultClass
 */
final class XmlRuleTest extends AbstractRule
{
    public function testSetAnyWithEmptyStringMustThrowAnException(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $instance = self::getActonItemInstance();

        $instance->setAny('');
    }

    public function testSetAnyWithInvalidXmlStringMustThrowAnException(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $instance = self::getActonItemInstance();

        @$instance->setAny('<attribute>1</attribute');
    }

    public function testSetAnyWithValidXmlStringMustPass(): void
    {
        $instance = self::getActonItemInstance();

        $instance->setAny($string = '<attribute>1</attribute>');

        $this->assertSame($string, $instance->getAny());
    }

    public function testSetAnyWithIntMustThrowAnException(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $instance = self::getActonItemInstance();

        $instance->setAny(2);
    }

    public function testSetAnyWithDomDocumentMustPass(): void
    {
        $instance = self::getActonItemInstance();
        $domDocument = new \DOMDocument();
        $domDocument->appendChild($domDocument->createElement('element', '147'));

        $instance->setAny($domDocument);

        $this->assertSame('<element>147</element>', $instance->getAny());
    }

    public function testSetAnyWithInvalidObjectMustThrowAnException(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $instance = self::getActonItemInstance();

        $instance->setAny(new \stdClass());
    }

    public function testSetAnyWithArrayMustThrowAnException(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $instance = self::getActonItemInstance();

        $instance->setAny([]);
    }
}
