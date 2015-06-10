<?php

namespace WsdlToPhp\PackageGenerator\Tests\Container\Model;

use WsdlToPhp\PackageGenerator\Tests\TestCase;
use WsdlToPhp\PackageGenerator\Model\Schema;
use WsdlToPhp\PackageGenerator\Container\Model\Schema as SchemaContainer;

class WSchemaContainerTest extends TestCase
{
    const
        SCHEMA_BING = 'bingsearch.wsdl',
        SCHEMA_EBAY = 'ebaySvc.wsdl';
    /**
     * @return SchemaContainer
     */
    public static function instance()
    {
        $wsdlContainer = new SchemaContainer();
        $wsdlContainer->add(new Schema(self::SCHEMA_BING, file_get_contents(dirname(__FILE__) . '/../../resources/' . self::SCHEMA_BING)));
        $wsdlContainer->add(new Schema(self::SCHEMA_EBAY, file_get_contents(dirname(__FILE__) . '/../../resources/' . self::SCHEMA_EBAY)));
        return $wsdlContainer;
    }
    /**
     *
     */
    public function testGetSchemaByName()
    {
        $wsdlContainer = self::instance();

        $this->assertInstanceOf('\\WsdlToPhp\\PackageGenerator\\Model\\Schema', $wsdlContainer->getSchemaByName(self::SCHEMA_BING));
        $this->assertInstanceOf('\\WsdlToPhp\\PackageGenerator\\Model\\Schema', $wsdlContainer->getSchemaByName(self::SCHEMA_EBAY));
        $this->assertNull($wsdlContainer->getSchemaByName('Bar'));
    }
    /**
     *
     */
    public function testGetAs()
    {
        $wsdlContainer = self::instance();

        $this->assertInstanceOf('\\WsdlToPhp\\PackageGenerator\\Model\\Schema', $wsdlContainer->getAs(array(
            SchemaContainer::KEY_NAME => self::SCHEMA_BING,
        )));
        $this->assertNull($wsdlContainer->getAs(array(
            SchemaContainer::KEY_NAME => 'bar',
        )));
    }
}
