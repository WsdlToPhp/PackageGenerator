<?php

namespace WsdlToPhp\PackageGenerator\Tests\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\Container\Model\Schema as SchemaContainer;
use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagImport;
use WsdlToPhp\PackageGenerator\Model\Wsdl;
use WsdlToPhp\PackageGenerator\Model\Schema;
use WsdlToPhp\PackageGenerator\WsdlHandler\Wsdl as WsdlDocument;

class TagImportTest extends WsdlParser
{
    /**
     * @return \WsdlToPhp\PackageGenerator\Parser\Wsdl\TagImport
     */
    public static function partnerInstanceParser()
    {
        return new TagImport(self::generatorInstance(self::wsdlPartnerPath()));
    }
    /**
     * @return \WsdlToPhp\PackageGenerator\Parser\Wsdl\TagImport
     */
    public static function partnerInstanceParserScd()
    {
        return new TagImport(self::generatorInstance(self::wsdlPartnerScdPath()));
    }
    /**
     * @return \WsdlToPhp\PackageGenerator\Parser\Wsdl\TagImport
     */
    public static function partnerInstanceParserThird()
    {
        return new TagImport(self::generatorInstance(self::wsdlPartnerThirdPath()));
    }
    /**
     * @return \WsdlToPhp\PackageGenerator\Parser\Wsdl\TagImport
     */
    public static function partnerInstanceParserFourth()
    {
        return new TagImport(self::generatorInstance(self::wsdlDocDataPaymentsPath()));
    }
    /**
     *
     */
    public function testIsWsdlParsed()
    {
        $tagImportParser = self::partnerInstanceParser();

        $tagImportParser->parse();

        $this->assertTrue($tagImportParser->isWsdlParsed(new Wsdl($tagImportParser->getGenerator(), self::wsdlPartnerPath(), file_get_contents(self::wsdlPartnerPath()))));
    }
    /**
     *
     */
    public function testGetExternalSchemas()
    {
        $tagImportParser = self::partnerInstanceParser();

        $tagImportParser->parse();

        $schemaContainer = new SchemaContainer($tagImportParser->getGenerator());
        for ($i = 0; $i < 19; $i++) {
            $schemaPath = realpath(sprintf(__DIR__ . '/../../resources/partner/PartnerService.%d.xsd', $i));
            $schema = new Schema($tagImportParser->getGenerator(), $schemaPath, file_get_contents($schemaPath));
            $schemaContainer->add($schema);
        }

        $tagImportParser->getGenerator()->getWsdl()->getContent()->getExternalSchemas()->rewind();
        $this->assertEquals($schemaContainer, $tagImportParser->getGenerator()->getWsdl()->getContent()->getExternalSchemas());
    }
    /**
     *
     */
    public function testGetExternalSchemasScd()
    {
        $tagImportParser = self::partnerInstanceParserScd();

        $tagImportParser->parse();

        $schemaContainer = new SchemaContainer($tagImportParser->getGenerator());
        for ($i = 0; $i < 19; $i++) {
            $schemaPath = realpath(sprintf(__DIR__ . '/../../resources/partner/PartnerService.%d.xsd', $i));
            $schema = new Schema($tagImportParser->getGenerator(), $schemaPath, file_get_contents($schemaPath));
            $schemaContainer->add($schema);
        }

        $tagImportParser->getGenerator()->getWsdl()->getContent()->getExternalSchemas()->rewind();
        $this->assertEquals($schemaContainer, $tagImportParser->getGenerator()->getWsdl()->getContent()->getExternalSchemas());
    }
    /**
     *
     */
    public function testGetExternalSchemasThird()
    {
        $tagImportParser = self::partnerInstanceParserThird();

        $tagImportParser->parse();

        $schemaContainer = new SchemaContainer($tagImportParser->getGenerator());
        for ($i = 0; $i < 19; $i++) {
            $schemaPath = realpath(sprintf(__DIR__ . '/../../resources/partner/PartnerService.%d.xsd', $i));
            $schema = new Schema($tagImportParser->getGenerator(), $schemaPath, file_get_contents($schemaPath));
            $schemaContainer->add($schema);
        }

        $tagImportParser->getGenerator()->getWsdl()->getContent()->getExternalSchemas()->rewind();
        $this->assertEquals($schemaContainer, $tagImportParser->getGenerator()->getWsdl()->getContent()->getExternalSchemas());
    }
    /**
     *
     */
    public function testGetExternalSchemasFourth()
    {
        $tagImportParser = self::partnerInstanceParserFourth();

        $tagImportParser->parse();

        $schemaContainer = new SchemaContainer($tagImportParser->getGenerator());

        $schemaPath = realpath(__DIR__ . '/../../resources/docdatapayments/1_3.1.xsd');
        $schema = new Schema($tagImportParser->getGenerator(), $schemaPath, file_get_contents($schemaPath));
        $schemaContainer->add($schema);

        $schemaPath = realpath(__DIR__ . '/../../resources/docdatapayments/1_3.2.xsd');
        $schema = new Schema($tagImportParser->getGenerator(), $schemaPath, file_get_contents($schemaPath));
        $schemaContainer->add($schema);

        $tagImportParser->getGenerator()->getWsdl()->getContent()->getExternalSchemas()->rewind();
        $this->assertEquals($schemaContainer, $tagImportParser->getGenerator()->getWsdl()->getContent()->getExternalSchemas());
    }
    /**
     *
     */
    public function testGetRestrictionFromExternalSchemas()
    {
        $tagImportParser = self::partnerInstanceParser();

        $tagImportParser->parse();

        $this->assertInstanceOf('\WsdlToPhp\PackageGenerator\WsdlHandler\Tag\TagRestriction', $tagImportParser->getGenerator()->getWsdl()->getContent()->getElementByName(WsdlDocument::TAG_RESTRICTION, true));
    }
    /**
     *
     */
    public function testGetEnumerationByAttributesFromExternalSchemas()
    {
        $tagImportParser = self::partnerInstanceParser();

        $tagImportParser->parse();

        $this->assertInstanceOf('\WsdlToPhp\PackageGenerator\WsdlHandler\Tag\TagEnumeration', $tagImportParser->getGenerator()->getWsdl()->getContent()->getElementByNameAndAttributes(WsdlDocument::TAG_ENUMERATION, [
            'value' => 'InternalServerError',
        ], true));
    }
    /**
     *
     */
    public function testGetElementsFromExternalSchemas()
    {
        $tagImportParser = self::partnerInstanceParser();

        $tagImportParser->parse();
        $restrictions = $tagImportParser->getGenerator()->getWsdl()->getContent()->getElementsByName(WsdlDocument::TAG_RESTRICTION, true);

        $this->assertNotEmpty($restrictions);
        $this->assertContainsOnlyInstancesOf('\WsdlToPhp\PackageGenerator\WsdlHandler\Tag\TagRestriction', $restrictions);
    }
    /**
     *
     */
    public function testGetElementsByAttributeFromExternalSchemas()
    {
        $tagImportParser = self::partnerInstanceParser();

        $tagImportParser->parse();
        $elements = $tagImportParser->getGenerator()->getWsdl()->getContent()->getElementsByNameAndAttributes(WsdlDocument::TAG_ELEMENT, [
            'name' => 'PartnerCredentials',
        ], null, true);

        $this->assertNotEmpty($elements);
        $this->assertContainsOnlyInstancesOf('\WsdlToPhp\PackageGenerator\WsdlHandler\Tag\TagElement', $elements);
    }
}
