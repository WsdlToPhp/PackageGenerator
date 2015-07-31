<?php

namespace WsdlToPhp\PackageGenerator\Tests\Generator;

use WsdlToPhp\PackageGenerator\ConfigurationReader\GeneratorOptions;
use WsdlToPhp\PackageGenerator\Model\EmptyModel;
use WsdlToPhp\PackageGenerator\Tests\ConfigurationReader\GeneratorOptionsTest;
use WsdlToPhp\PackageGenerator\Generator\Utils;
use WsdlToPhp\PackageGenerator\Tests\TestCase;

class UtilsTest extends TestCase
{
    /**
     *
     */
    public function testResolveCompleteUrl()
    {
        $this->assertSame(sprintf('http://www.foo.com/my/folder/index.%d.xsd', __LINE__), Utils::resolveCompletePath('http://www.foo.com/my/xml.wsdl', sprintf('./folder/index.%d.xsd', __LINE__)));
        $this->assertSame(sprintf('http://www.foo.com/my/titi/index.%d.xsd', __LINE__), Utils::resolveCompletePath('http://www.foo.com/my/xml.wsdl', sprintf('folder/../titi/index.%d.xsd', __LINE__)));
        $this->assertSame(sprintf('http://www.foo.com/my/titi/index.%d.xsd', __LINE__), Utils::resolveCompletePath('http://www.foo.com/my/xml.wsdl', sprintf('./titi/index.%d.xsd', __LINE__)));
        $this->assertSame(sprintf('http://www.foo.com/my/titi/index.%d.xsd', __LINE__), Utils::resolveCompletePath('http://www.foo.com/my/xml.wsdl', sprintf('folder/toto/../../titi/index.%d.xsd', __LINE__)));
    }
    /**
     *
     */
    public function testResolveCompletePath()
    {
        $dirname = __DIR__;
        $this->assertSame(sprintf('%s/../resources/aukro.wsdl', $dirname), Utils::resolveCompletePath(sprintf('%s/../resources/ebaySvc.wsdl', $dirname), './folder/../aukro.wsdl'));
        $this->assertSame(sprintf('%s/../resources/aukro.wsdl', $dirname), Utils::resolveCompletePath(sprintf('%s/../resources/ebaySvc.wsdl', $dirname), 'folder/../aukro.wsdl'));
        $this->assertSame(sprintf('%s/../resources/aukro.wsdl', $dirname), Utils::resolveCompletePath(sprintf('%s/../resources/ebaySvc.wsdl', $dirname), 'folder/../toto/../aukro.wsdl'));
        $this->assertSame(sprintf('%s/../resources/aukro.wsdl', $dirname), Utils::resolveCompletePath(sprintf('%s/../resources/ebaySvc.wsdl', $dirname), 'aukro.wsdl'));
    }
    /**
     *
     */
    public function testGetValueWithinItsType()
    {
        $this->assertSame('020', Utils::getValueWithinItsType('020', 'string'));
        $this->assertSame('01', Utils::getValueWithinItsType('01', 'string'));
    }
    /**
     *
     */
    public function testCleanString()
    {
        $this->assertSame('events', Utils::getPart(GeneratorOptions::VALUE_START, new EmptyModel(self::getBingGeneratorInstance(), 'eventsGet'), GeneratorOptions::GATHER_METHODS));
        $this->assertSame('events', Utils::getPart(GeneratorOptions::VALUE_START, new EmptyModel(self::getBingGeneratorInstance(), '_events'), GeneratorOptions::GATHER_METHODS));
    }
    /**
     *
     */
    public function testCleanComment()
    {
        $this->assertEmpty(Utils::cleanComment(null));
        $this->assertEmpty(Utils::cleanComment(new \stdClass()));
    }
}
