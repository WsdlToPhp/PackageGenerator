<?php

namespace WsdlToPhp\PackageGenerator\Tests\Container\Model;

use WsdlToPhp\PackageGenerator\Tests\TestCase;
use WsdlToPhp\PackageGenerator\Model\Schema;
use WsdlToPhp\PackageGenerator\Container\Model\Schema as SchemaContainer;

class SchemaContainerTest extends TestCase
{
    const
        SCHEMA_BING = 'bingsearch.wsdl',
        SCHEMA_EBAY = 'ebaySvc.wsdl';
    /**
     * @return SchemaContainer
     */
    public static function instance()
    {
        $schemaContainer = new SchemaContainer(self::getBingGeneratorInstance());
        $schemaContainer->add(new Schema(self::getBingGeneratorInstance(), self::SCHEMA_BING, file_get_contents(self::wsdlBingPath())));
        $schemaContainer->add(new Schema(self::getBingGeneratorInstance(), self::SCHEMA_EBAY, file_get_contents(self::wsdlEbayPath())));
        return $schemaContainer;
    }
    /**
     *
     */
    public function testGetSchemaByName()
    {
        $schemaContainer = self::instance();

        $this->assertInstanceOf('\WsdlToPhp\PackageGenerator\Model\Schema', $schemaContainer->getSchemaByName(self::SCHEMA_BING));
        $this->assertInstanceOf('\WsdlToPhp\PackageGenerator\Model\Schema', $schemaContainer->getSchemaByName(self::SCHEMA_EBAY));
        $this->assertNull($schemaContainer->getSchemaByName('Bar'));
    }
}
