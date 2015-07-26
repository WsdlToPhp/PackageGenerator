<?php

namespace WsdlToPhp\PackageGenerator\Tests\Container\Model;

use WsdlToPhp\PackageGenerator\Tests\TestCase;
use WsdlToPhp\PackageGenerator\Model\Wsdl;
use WsdlToPhp\PackageGenerator\Container\Model\Wsdl as WsdlContainer;

class WSdlContainerTest extends TestCase
{
    const WSDL_BING = 'bingsearch.wsdl';
    const WSDL_EBAY = 'ebaySvc.wsdl';
    /**
     * @return WsdlContainer
     */
    public static function instance()
    {
        $wsdlContainer = new WsdlContainer();
        $wsdlContainer->add(new Wsdl(self::getBingGeneratorInstance(), self::WSDL_BING, file_get_contents(self::wsdlBingPath())));
        $wsdlContainer->add(new Wsdl(self::getBingGeneratorInstance(), self::WSDL_EBAY, file_get_contents(self::wsdlEbayPath())));
        return $wsdlContainer;
    }
    /**
     *
     */
    public function testGetWsdlByName()
    {
        $wsdlContainer = self::instance();

        $this->assertInstanceOf('\\WsdlToPhp\\PackageGenerator\\Model\\Wsdl', $wsdlContainer->getWsdlByName(self::WSDL_BING));
        $this->assertInstanceOf('\\WsdlToPhp\\PackageGenerator\\Model\\Wsdl', $wsdlContainer->getWsdlByName(self::WSDL_EBAY));
        $this->assertNull($wsdlContainer->getWsdlByName('Bar'));
    }
}
