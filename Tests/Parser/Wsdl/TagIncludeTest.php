<?php

namespace WsdlToPhp\PackageGenerator\Tests\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\Container\Model\Schema as SchemaContainer;
use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagInclude;
use WsdlToPhp\PackageGenerator\Generator\Generator;
use WsdlToPhp\PackageGenerator\Model\Wsdl;
use WsdlToPhp\PackageGenerator\Model\Schema;

class TagIncludeTest extends WsdlParser
{
    /**
     * @return \WsdlToPhp\PackageGenerator\Parser\Wsdl\TagInclude
     */
    public static function instance()
    {
        return new TagInclude(new Generator(self::wsdlImageViewServicePath()));
    }
    /**
     *
     */
    public function testIsWsdlParsed()
    {
        $tagIncludeParser = self::instance();

        $tagIncludeParser->parse();

        $this->assertTrue($tagIncludeParser->isWsdlParsed(new Wsdl(self::wsdlImageViewServicePath(), file_get_contents(self::wsdlImageViewServicePath()))));
    }
    /**
     *
     */
    public function testGetExternalSchemas()
    {
        $tagIncludeParser = self::instance();

        $tagIncludeParser->parse();

        $schemas = array(
            'availableImagesRequest.xsd',
            'availableImagesResponse.xsd',
            'imagesRequest.xsd',
            'imagesResponse.xsd',
            'imageViewCommon.xsd',
        );
        $schemaContainer = new SchemaContainer();
        foreach ($schemas as $schemaPath) {
            $schemaPath = sprintf(__DIR__ . '/../../resources/%s', $schemaPath);
            $schema = new Schema($schemaPath, file_get_contents($schemaPath));
            $schema->getContent()->setCurrentTag('include');
            $schemaContainer->add($schema);
        }

        $tagIncludeParser->getGenerator()->getWsdl(0)->getContent()->getExternalSchemas()->rewind();
        $this->assertEquals($schemaContainer, $tagIncludeParser->getGenerator()->getWsdl(0)->getContent()->getExternalSchemas());
    }
    /**
     *
     */
    public function testCountWsdlsAfterParsing()
    {
        $tagIncludeParser = self::instance();

        $tagIncludeParser->parse();

        $this->assertCount(1, $tagIncludeParser->getGenerator()->getWsdls());
    }
}
