<?php

namespace WsdlToPhp\PackageGenerator\Tests\Generator;

use WsdlToPhp\PackageGenerator\ConfigurationReader\GeneratorOptions;
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
        $this->assertSame(2.568, Utils::getValueWithinItsType('2.568', 'float'));
        $this->assertSame(true, Utils::getValueWithinItsType('true', 'bool'));
        $this->assertSame(false, Utils::getValueWithinItsType('false', 'bool'));
    }
    /**
     *
     */
    public function testGetPartStart()
    {
        $this->assertSame('events', Utils::getPart(GeneratorOptions::VALUE_START, 'eventsGet'));
        $this->assertSame('events', Utils::getPart(GeneratorOptions::VALUE_START, '_events'));
    }
    /**
     *
     */
    public function testGetPartEnd()
    {
        $this->assertSame('Get', Utils::getPart(GeneratorOptions::VALUE_END, 'eventsGet'));
        $this->assertSame('Partition', Utils::getPart(GeneratorOptions::VALUE_END, 'eventsGetPartition'));
        $this->assertSame('events', Utils::getPart(GeneratorOptions::VALUE_END, '_events'));
    }
    /**
     *
     */
    public function testGetPartUndefined()
    {
        $this->assertSame('', Utils::getPart(null, 'eventsGet'));
    }
    /**
     *
     */
    public function testCleanComment()
    {
        $this->assertEmpty(Utils::cleanComment(null));
        $this->assertEmpty(Utils::cleanComment(new \stdClass()));
    }
    /**
     *
     */
    public function testGetContentFromUrlContextOptionsBasicAuth()
    {
        $this->assertSame([
            'http' => [
                'header' => [
                    sprintf('Authorization: Basic %s', base64_encode('foo:bar')),
                ],
            ],
        ], Utils::getStreamContextOptions('foo', 'bar'));
    }
    /**
     *
     */
    public function testGetContentFromUrlContextOptionsProxy()
    {
        $this->assertSame([
            'http' => [
                'proxy' => 'tcp://dns.proxy.com:4545',
                'header' => [
                    sprintf('Proxy-Authorization: Basic %s', base64_encode('foo:bar')),
                ],
            ],
        ], Utils::getStreamContextOptions(null, null, 'dns.proxy.com', 4545, 'foo', 'bar'));
    }
    /**
     *
     */
    public function testGetContentFromUrlContextOptionsBasicAuthProxy()
    {
        $this->assertSame([
            'http' => [
                'proxy' => 'tcp://dns.proxy.com:4545',
                'header' => [
                    sprintf('Proxy-Authorization: Basic %s', base64_encode('foo:bar')),
                    sprintf('Authorization: Basic %s', base64_encode('foo:bar')),
                ],
            ],
        ], Utils::getStreamContextOptions('foo', 'bar', 'dns.proxy.com', 4545, 'foo', 'bar'));
    }
    /**
     *
     */
    public function testGetContentFromUrlContextOptions()
    {
        $this->assertSame([
            'ssl' => [
                'verify_peer' => true,
                'ca_file' => basename(__FILE__),
                'ca_path' => __DIR__,
            ],
            'http' => [
                'proxy' => 'tcp://dns.proxy.com:4545',
                'header' => [
                    sprintf('Proxy-Authorization: Basic %s', base64_encode('foo:bar')),
                    sprintf('Authorization: Basic %s', base64_encode('foo:bar')),
                ],
            ],
        ], Utils::getStreamContextOptions('foo', 'bar', 'dns.proxy.com', 4545, 'foo', 'bar', [
            'ssl' => [
                'verify_peer' => true,
                'ca_file' => basename(__FILE__),
                'ca_path' => __DIR__,
            ],
        ]));
    }
    /**
     *
     */
    public function testGetPartStringBeginingWithInt()
    {
        $this->assertSame('My', Utils::getPart(GeneratorOptions::VALUE_START, '0MyOperation'));
    }
    /**
     *
     */
    public function testGetPartStringBeginingWithMultipleInt()
    {
        $this->assertSame('My', Utils::getPart(GeneratorOptions::VALUE_START, '0123456789MyOperation'));
    }
    /**
     *
     */
    public function testGetEndPartStringBeginingWithMultipleInt()
    {
        $this->assertSame('Operation', Utils::getPart(GeneratorOptions::VALUE_END, '012345678MyOperation'));
    }
    /**
     *
     */
    public function testGetEndPartStringBeginingWithMultipleIntAndOnlyCaps()
    {
        $this->assertSame('MO', Utils::getPart(GeneratorOptions::VALUE_END, '1234567890MO'));
    }
    /**
     *
     */
    public function testGetEndPartStringEndingWithInt()
    {
        $this->assertSame('Operation', Utils::getPart(GeneratorOptions::VALUE_END, 'MyOperation0'));
    }
    /**
     *
     */
    public function testCleanString()
    {
        $this->assertSame('КонтактнаяИнформация', Utils::cleanString('КонтактнаяИнформация'));
        $this->assertSame('____________________', Utils::cleanString('-"\'{&~(|`\\^¨@)°]+=}£'));
        $this->assertSame('1234567890aBcD_EfGhI', Utils::cleanString('1234567890aBcD_EfGhI'));
        $this->assertSame('äöüß', Utils::cleanString('äöüß'));
        $this->assertSame('θωερτψυιοπασδφγηςκλζχξωβνμάέήίϊΐόύϋΰώ', 'θωερτψυιοπασδφγηςκλζχξωβνμάέήίϊΐόύϋΰώ');
    }
    /**
     *
     */
    public function testSaveSchemas()
    {
        $path = __DIR__ . '/../resources/generated';
        $wsdlFolder = 'schema_save_folder';
        // test file name extracted from url
        $this->assertSame($path . '/' . $wsdlFolder . '/webservice.wsdl', Utils::saveSchemas($path, $wsdlFolder, 'http://www.foo.com/webservice.wsdl', '<Text>Save schema to folder</Text>'));
        // test file name not set in url
        $this->assertSame($path . '/' . $wsdlFolder . '/schema.wsdl', Utils::saveSchemas($path, $wsdlFolder, 'http://www.foo.com/index.php?WSDL', '<Text>Save schema to folder</Text>'));
        // test save folder is empty
        $this->assertSame($path . '/wsdl/schema.wsdl', Utils::saveSchemas($path, '', 'http://www.foo.com/index.php?WSDL', '<Text>Save schema to folder</Text>'));
        // test get saved content
        $this->assertSame('<Text>Save schema to folder</Text>', file_get_contents($path . '/' . $wsdlFolder . '/webservice.wsdl'));
        $this->assertSame('<Text>Save schema to folder</Text>', file_get_contents($path . '/' . $wsdlFolder . '/schema.wsdl'));
        $this->assertSame('<Text>Save schema to folder</Text>', file_get_contents($path . '/wsdl/schema.wsdl'));
    }
}
