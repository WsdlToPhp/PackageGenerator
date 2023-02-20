<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\Container\Model\Schema as SchemaContainer;
use WsdlToPhp\PackageGenerator\Model\Schema;
use WsdlToPhp\PackageGenerator\Model\Wsdl;
use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagInclude;

/**
 * @internal
 * @coversDefaultClass
 */
final class TagIncludeTest extends WsdlParser
{
    public static function partnerInstanceParser(): TagInclude
    {
        return new TagInclude(self::generatorInstance(self::wsdlImageViewServicePath()));
    }

    public static function partnerInstanceParserScd(): TagInclude
    {
        return new TagInclude(self::generatorInstance(self::wsdlDocDataPaymentsPath()));
    }

    public function testIsWsdlParsed(): void
    {
        $tagIncludeParser = self::partnerInstanceParser();

        $tagIncludeParser->parse();

        $this->assertTrue($tagIncludeParser->isWsdlParsed(new Wsdl($tagIncludeParser->getGenerator(), self::wsdlImageViewServicePath(), file_get_contents(self::wsdlImageViewServicePath()))));
    }

    public function testGetExternalSchemas(): void
    {
        $tagIncludeParser = self::partnerInstanceParser();

        $tagIncludeParser->parse();

        $schemas = [
            'availableImagesRequest.xsd',
            'availableImagesResponse.xsd',
            'imagesRequest.xsd',
            'imagesResponse.xsd',
            'imageViewCommon.xsd',
        ];
        $schemaContainer = new SchemaContainer($tagIncludeParser->getGenerator());
        foreach ($schemas as $schemaPath) {
            $schemaPath = realpath(sprintf(__DIR__.'/../../resources/image/%s', $schemaPath));
            $schema = new Schema($tagIncludeParser->getGenerator(), $schemaPath, file_get_contents($schemaPath));
            $schemaContainer->add($schema);
        }

        $this->assertCount($schemaContainer->count(), $tagIncludeParser->getGenerator()->getWsdl()->getContent()->getExternalSchemas());
    }

    public function testGetExternalSchemasScd(): void
    {
        // import tag must be parsed first
        $tagIncludeParser = self::partnerInstanceParserScd();

        $tagIncludeParser->parse();

        $schemaContainer = new SchemaContainer($tagIncludeParser->getGenerator());

        $schema1Path = realpath(__DIR__.'/../../resources/docdatapayments/1_3.1.xsd');
        $schema1 = new Schema($tagIncludeParser->getGenerator(), $schema1Path, file_get_contents($schema1Path));
        $schemaContainer->add($schema1);

        $schema2Path = realpath(__DIR__.'/../../resources/docdatapayments/1_3.2.xsd');
        $schema2 = new Schema($tagIncludeParser->getGenerator(), $schema2Path, file_get_contents($schema2Path));
        $schemaContainer->add($schema2);

        $this->assertCount($schemaContainer->count(), $tagIncludeParser->getGenerator()->getWsdl()->getContent()->getExternalSchemas());
    }
}
