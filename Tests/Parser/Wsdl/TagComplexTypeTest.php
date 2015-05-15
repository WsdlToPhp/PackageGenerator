<?php

namespace WsdlToPhp\PackageGenerator\Tests\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\Container\AbstractObjectContainer;
use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagComplexType;

class TagComplexTypeTest extends WsdlParser
{
    /**
     * @return \WsdlToPhp\PackageGenerator\Parser\Wsdl\TagComplexType
     */
    public static function ebayInstance()
    {
        return new TagComplexType(self::generatorInstance(self::wsdlEbayPath()));
    }
    /**
     *
     */
    public function testParseEbay()
    {
        $tagComplexTypeParser = self::ebayInstance();
        AbstractObjectContainer::purgeAllCache();

        $tagComplexTypeParser->parse();

        $ok = false;
        $structs = $tagComplexTypeParser->getGenerator()->getStructs();
        if ($structs->count() > 0) {
            $this->assertTrue($structs->getStructByName('AbstractRequestType')->getIsAbstract());
            $this->assertTrue($structs->getStructByName('AbstractResponseType')->getIsAbstract());
            $ok = true;
        }
        $this->assertTrue((bool)$ok);
    }
}
