<?php

namespace WsdlToPhp\PackageGenerator\Tests\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\Container\AbstractObjectContainer;
use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagExtension;

class TagExtensionTest extends WsdlParser
{
    /**
     * @return \WsdlToPhp\PackageGenerator\Parser\Wsdl\TagExtension
     */
    public static function ebayInstance()
    {
        return new TagExtension(self::generatorInstance(self::wsdlEbayPath()));
    }
    /**
     *
     */
    public function testParseEbay()
    {
        $tagEnumerationParser = self::ebayInstance();
        AbstractObjectContainer::purgeAllCache();

        $tagEnumerationParser->parse();

        $ok = false;
        $structs = $tagEnumerationParser->getGenerator()->getStructs();
        if ($structs->count() > 0) {
            if ($structs->getStructByName('AddDisputeRequestType') !== null) {
                $this->assertSame('AbstractRequestType', $structs->getStructByName('AddDisputeRequestType')->getInheritance());
                $ok = true;
            }
            if ($structs->getStructByName('TaxIdentifierAttributeType') !== null) {
                $this->assertSame('string', $structs->getStructByName('TaxIdentifierAttributeType')->getInheritance());
                $ok = true;
            }
        }
        $this->assertTrue((bool)$ok);
    }
}
