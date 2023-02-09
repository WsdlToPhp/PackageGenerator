<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\Container\Model\Schema as SchemaContainer;
use WsdlToPhp\PackageGenerator\Model\Schema;
use WsdlToPhp\PackageGenerator\Model\Wsdl;
use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagImport;
use WsdlToPhp\WsdlHandler\Tag\TagElement;
use WsdlToPhp\WsdlHandler\Tag\TagEnumeration;
use WsdlToPhp\WsdlHandler\Tag\TagRestriction;
use WsdlToPhp\WsdlHandler\Wsdl as WsdlDocument;

/**
 * @internal
 * @coversDefaultClass
 */
final class TagImportTest extends WsdlParser
{
    public static function partnerInstanceParser(): TagImport
    {
        return new TagImport(self::generatorInstance(self::wsdlPartnerPath()));
    }

    public static function partnerInstanceParserScd(): TagImport
    {
        return new TagImport(self::generatorInstance(self::wsdlPartnerScdPath()));
    }

    public static function partnerInstanceParserThird(): TagImport
    {
        return new TagImport(self::generatorInstance(self::wsdlPartnerThirdPath()));
    }

    public static function partnerInstanceParserFourth(): TagImport
    {
        return new TagImport(self::generatorInstance(self::wsdlDocDataPaymentsPath()));
    }

    public function testIsWsdlParsed(): void
    {
        $tagImportParser = self::partnerInstanceParser();

        $tagImportParser->parse();

        $this->assertTrue($tagImportParser->isWsdlParsed(new Wsdl($tagImportParser->getGenerator(), self::wsdlPartnerPath(), file_get_contents(self::wsdlPartnerPath()))));
    }

    public function testGetExternalSchemas(): void
    {
        $tagImportParser = self::partnerInstanceParser();

        $tagImportParser->parse();

        $schemaContainer = new SchemaContainer($tagImportParser->getGenerator());
        for ($i = 0; $i < 19; ++$i) {
            $schemaPath = realpath(sprintf(__DIR__.'/../../resources/partner/PartnerService.%d.xsd', $i));
            $schema = new Schema($tagImportParser->getGenerator(), $schemaPath, file_get_contents($schemaPath));
            $schemaContainer->add($schema);
        }

        $this->assertCount($schemaContainer->count(), $tagImportParser->getGenerator()->getWsdl()->getContent()->getExternalSchemas());
    }

    public function testGetExternalSchemasScd(): void
    {
        $tagImportParser = self::partnerInstanceParserScd();

        $tagImportParser->parse();

        $schemaContainer = new SchemaContainer($tagImportParser->getGenerator());
        for ($i = 0; $i < 19; ++$i) {
            $schemaPath = realpath(sprintf(__DIR__.'/../../resources/partner/PartnerService.%d.xsd', $i));
            $schema = new Schema($tagImportParser->getGenerator(), $schemaPath, file_get_contents($schemaPath));
            $schemaContainer->add($schema);
        }

        $this->assertCount($schemaContainer->count(), $tagImportParser->getGenerator()->getWsdl()->getContent()->getExternalSchemas());
    }

    public function testGetExternalSchemasThird(): void
    {
        $tagImportParser = self::partnerInstanceParserThird();

        $tagImportParser->parse();

        $schemaContainer = new SchemaContainer($tagImportParser->getGenerator());
        for ($i = 0; $i < 19; ++$i) {
            $schemaPath = realpath(sprintf(__DIR__.'/../../resources/partner/PartnerService.%d.xsd', $i));
            $schema = new Schema($tagImportParser->getGenerator(), $schemaPath, file_get_contents($schemaPath));
            $schemaContainer->add($schema);
        }

        $this->assertCount($schemaContainer->count(), $tagImportParser->getGenerator()->getWsdl()->getContent()->getExternalSchemas());
    }

    public function testGetExternalSchemasFourth(): void
    {
        $tagImportParser = self::partnerInstanceParserFourth();

        $tagImportParser->parse();

        $schemaContainer = new SchemaContainer($tagImportParser->getGenerator());

        $schemaPath = realpath(__DIR__.'/../../resources/docdatapayments/1_3.1.xsd');
        $schema = new Schema($tagImportParser->getGenerator(), $schemaPath, file_get_contents($schemaPath));
        $schemaContainer->add($schema);

        $schemaPath = realpath(__DIR__.'/../../resources/docdatapayments/1_3.2.xsd');
        $schema = new Schema($tagImportParser->getGenerator(), $schemaPath, file_get_contents($schemaPath));
        $schemaContainer->add($schema);

        $this->assertCount($schemaContainer->count(), $tagImportParser->getGenerator()->getWsdl()->getContent()->getExternalSchemas());
    }

    public function testGetRestrictionFromExternalSchemas(): void
    {
        $tagImportParser = self::partnerInstanceParser();

        $tagImportParser->parse();

        $this->assertInstanceOf(TagRestriction::class, $tagImportParser->getGenerator()->getWsdl()->getContent()->getElementByName(WsdlDocument::TAG_RESTRICTION, true));
    }

    public function testGetEnumerationByAttributesFromExternalSchemas(): void
    {
        $tagImportParser = self::partnerInstanceParser();

        $tagImportParser->parse();

        $this->assertInstanceOf(TagEnumeration::class, $tagImportParser->getGenerator()->getWsdl()->getContent()->getElementByNameAndAttributes(WsdlDocument::TAG_ENUMERATION, [
            'value' => 'InternalServerError',
        ], true));
    }

    public function testGetElementsFromExternalSchemas(): void
    {
        $tagImportParser = self::partnerInstanceParser();

        $tagImportParser->parse();
        $restrictions = $tagImportParser->getGenerator()->getWsdl()->getContent()->getElementsByName(WsdlDocument::TAG_RESTRICTION, true);

        $this->assertCount(12, $restrictions);
        $this->assertContainsOnlyInstancesOf(TagRestriction::class, $restrictions);
    }

    public function testGetElementsByAttributeFromExternalSchemas(): void
    {
        $tagImportParser = self::partnerInstanceParser();

        $tagImportParser->parse();

        $this->assertCount(19, $tagImportParser->getGenerator()->getWsdl()->getSchemas());
        $this->assertCount(19, $tagImportParser->getGenerator()->getWsdl()->getContent()->getExternalSchemas());

        $elements = $tagImportParser->getGenerator()->getWsdl()->getContent()->getElementsByNameAndAttributes(WsdlDocument::TAG_ELEMENT, [
            'name' => 'PartnerCredentials',
        ], null, true);

        $this->assertCount(2, $elements);
        $this->assertContainsOnlyInstancesOf(TagElement::class, $elements);
    }
}
