<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\File\Validation;

/**
 * @internal
 * @coversDefaultClass
 */
final class XmlRuleTest extends AbstractRule
{
    /**
     * @throws \ReflectionException
     */
    public function testSetAnyWithEmptyStringMustThrowAnException(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $instance = self::getActonItemInstance();

        $instance->setAny('');
    }

    /**
     * @throws \ReflectionException
     */
    public function testSetAnyWithInvalidXmlStringMustThrowAnException(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $instance = self::getActonItemInstance();

        @$instance->setAny('<attribute>1</attribute');
    }

    /**
     * @throws \ReflectionException
     */
    public function testSetAnyWithValidXmlStringMustPass(): void
    {
        $instance = self::getActonItemInstance();

        $instance->setAny($string = '<attribute>1</attribute>');

        $this->assertSame($string, $instance->getAny());
    }

    /**
     * @throws \ReflectionException
     */
    public function testSetAnyWithIntMustThrowAnException(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $instance = self::getActonItemInstance();

        $instance->setAny(2);
    }

    /**
     * @throws \DOMException
     * @throws \ReflectionException
     */
    public function testSetAnyWithDomDocumentMustPass(): void
    {
        $instance = self::getActonItemInstance();
        $domDocument = new \DOMDocument();
        $domDocument->appendChild($domDocument->createElement('element', '147'));

        $instance->setAny($domDocument);

        $this->assertSame('<element>147</element>', $instance->getAny());
    }

    /**
     * @throws \ReflectionException
     */
    public function testSetAnyWithInvalidObjectMustThrowAnException(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $instance = self::getActonItemInstance();

        $instance->setAny(new \stdClass());
    }

    /**
     * @throws \ReflectionException
     */
    public function testSetAnyWithArrayMustThrowAnException(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $instance = self::getActonItemInstance();

        $instance->setAny([]);
    }
}
