<?php

namespace WsdlToPhp\PackageGenerator\Tests\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\Container\Model\Schema as SchemaContainer;
use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagImport;
use WsdlToPhp\PackageGenerator\Model\Wsdl;
use WsdlToPhp\PackageGenerator\Model\Schema;
use WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Wsdl as WsdlDocument;

class TagImportTest extends WsdlParser
{
    /**
     * @return \WsdlToPhp\PackageGenerator\Parser\Wsdl\TagImport
     */
    public static function instance()
    {
        return new TagImport(self::generatorInstance(self::wsdlPartnerPath()));
    }
    /**
     * @return \WsdlToPhp\PackageGenerator\Parser\Wsdl\TagImport
     */
    public static function instanceScd()
    {
        return new TagImport(self::generatorInstance(self::wsdlPartnerScdPath()));
    }
    /**
     * @return \WsdlToPhp\PackageGenerator\Parser\Wsdl\TagImport
     */
    public static function instanceThird()
    {
        return new TagImport(self::generatorInstance(self::wsdlPartnerThirdPath()));
    }
    /**
     * @return \WsdlToPhp\PackageGenerator\Parser\Wsdl\TagImport
     */
    public static function instanceFourth()
    {
        return new TagImport(self::generatorInstance(self::wsdlDocDataPaymentsPath()));
    }
    /**
     *
     */
    public function testIsWsdlParsed()
    {
        $tagImportParser = self::instance();

        $tagImportParser->parse();

        $this->assertTrue($tagImportParser->isWsdlParsed(new Wsdl($tagImportParser->getGenerator(), self::wsdlPartnerPath(), file_get_contents(self::wsdlPartnerPath()))));
    }
    /**
     *
     */
    public function testGetExternalSchemas()
    {
        $tagImportParser = self::instance();

        $tagImportParser->parse();

        $schemaContainer = new SchemaContainer($tagImportParser->getGenerator());
        for ($i=0; $i<19; $i++) {
            $schemaPath = realpath(sprintf(__DIR__ . '/../../resources/partner/PartnerService.%d.xsd', $i));
            $schema = new Schema($tagImportParser->getGenerator(), $schemaPath, file_get_contents($schemaPath));
            $schema->getContent()->setCurrentTag('import');
            $schemaContainer->add($schema);
        }

        foreach($tagImportParser->getGenerator()->getWsdl()->getContent()->getExternalSchemas() as $schema) {
            $schema->getContent()->setCurrentTag(WsdlDocument::TAG_IMPORT);
        }

        $tagImportParser->getGenerator()->getWsdl()->getContent()->getExternalSchemas()->rewind();
        $this->assertEquals($schemaContainer, $tagImportParser->getGenerator()->getWsdl()->getContent()->getExternalSchemas());
    }
    /**
     *
     */
    public function testGetExternalSchemasScd()
    {
        $tagImportParser = self::instanceScd();

        $tagImportParser->parse();

        $schemaContainer = new SchemaContainer($tagImportParser->getGenerator());
        for ($i=0; $i<19; $i++) {
            $schemaPath = realpath(sprintf(__DIR__ . '/../../resources/partner/PartnerService.%d.xsd', $i));
            $schema = new Schema($tagImportParser->getGenerator(), $schemaPath, file_get_contents($schemaPath));
            $schema->getContent()->setCurrentTag('import');
            $schemaContainer->add($schema);
        }

        foreach($tagImportParser->getGenerator()->getWsdl()->getContent()->getExternalSchemas() as $schema) {
            $schema->getContent()->setCurrentTag(WsdlDocument::TAG_IMPORT);
        }

        $tagImportParser->getGenerator()->getWsdl()->getContent()->getExternalSchemas()->rewind();
        $this->assertEquals($schemaContainer, $tagImportParser->getGenerator()->getWsdl()->getContent()->getExternalSchemas());
    }
    /**
     *
     */
    public function testGetExternalSchemasThird()
    {
        $tagImportParser = self::instanceThird();

        $tagImportParser->parse();

        $schemaContainer = new SchemaContainer($tagImportParser->getGenerator());
        for ($i=0; $i<19; $i++) {
            $schemaPath = realpath(sprintf(__DIR__ . '/../../resources/partner/PartnerService.%d.xsd', $i));
            $schema = new Schema($tagImportParser->getGenerator(), $schemaPath, file_get_contents($schemaPath));
            $schema->getContent()->setCurrentTag('import');
            $schemaContainer->add($schema);
        }

        foreach($tagImportParser->getGenerator()->getWsdl()->getContent()->getExternalSchemas() as $schema) {
            $schema->getContent()->setCurrentTag(WsdlDocument::TAG_IMPORT);
        }

        $tagImportParser->getGenerator()->getWsdl()->getContent()->getExternalSchemas()->rewind();
        $this->assertEquals($schemaContainer, $tagImportParser->getGenerator()->getWsdl()->getContent()->getExternalSchemas());
    }
    /**
     *
     */
    public function testGetExternalSchemasFourth()
    {
        $tagImportParser = self::instanceFourth();

        $tagImportParser->parse();

        $schemaContainer = new SchemaContainer($tagImportParser->getGenerator());

        $schemaPath = realpath(__DIR__ . '/../../resources/docdatapayments/1_3.1.xsd');
        $schema = new Schema($tagImportParser->getGenerator(), $schemaPath, file_get_contents($schemaPath));
        $schema->getContent()->setCurrentTag('import');
        $schemaContainer->add($schema);

        $schemaPath = realpath(__DIR__ . '/../../resources/docdatapayments/1_3.2.xsd');
        $schema = new Schema($tagImportParser->getGenerator(), $schemaPath, file_get_contents($schemaPath));
        $schema->getContent()->setCurrentTag('import');
        $schemaContainer->add($schema);

        $tagImportParser->getGenerator()->getWsdl()->getContent()->getExternalSchemas()->rewind();
        $this->assertEquals($schemaContainer, $tagImportParser->getGenerator()->getWsdl()->getContent()->getExternalSchemas());
    }
    /**
     *
     */
    public function testGetRestrictionFromExternalSchemas()
    {
        $tagImportParser = self::instance();

        $tagImportParser->parse();

        $this->assertInstanceOf('\\WsdlToPhp\\PackageGenerator\\DomHandler\\Wsdl\\Tag\\TagRestriction', $tagImportParser->getGenerator()->getWsdl()->getContent()->getElementByName(WsdlDocument::TAG_RESTRICTION, true));
    }
    /**
     *
     */
    public function testGetEnumerationByAttributesFromExternalSchemas()
    {
        $tagImportParser = self::instance();

        $tagImportParser->parse();

        $this->assertInstanceOf('\\WsdlToPhp\\PackageGenerator\\DomHandler\\Wsdl\\Tag\\TagEnumeration', $tagImportParser->getGenerator()->getWsdl()->getContent()->getElementByNameAndAttributes(WsdlDocument::TAG_ENUMERATION, array(
            'value' => 'InternalServerError',
        ), true));
    }
    /**
     *
     */
    public function testGetElementsFromExternalSchemas()
    {
        $tagImportParser = self::instance();

        $tagImportParser->parse();
        $restrictions = $tagImportParser->getGenerator()->getWsdl()->getContent()->getElementsByName(WsdlDocument::TAG_RESTRICTION, true);

        $this->assertNotEmpty($restrictions);
        $this->assertContainsOnlyInstancesOf('\\WsdlToPhp\\PackageGenerator\\DomHandler\\Wsdl\\Tag\\TagRestriction', $restrictions);
    }
    /**
     *
     */
    public function testGetElementsByAttributeFromExternalSchemas()
    {
        $tagImportParser = self::instance();

        $tagImportParser->parse();
        $elements = $tagImportParser->getGenerator()->getWsdl()->getContent()->getElementsByNameAndAttributes(WsdlDocument::TAG_ELEMENT, array(
            'name' => 'PartnerCredentials',
        ), null, true);

        $this->assertNotEmpty($elements);
        $this->assertContainsOnlyInstancesOf('\\WsdlToPhp\\PackageGenerator\\DomHandler\\Wsdl\\Tag\\TagElement', $elements);
    }
}
