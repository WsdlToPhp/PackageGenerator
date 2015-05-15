<?php

namespace WsdlToPhp\PackageGenerator\Tests\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\Container\AbstractObjectContainer;
use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagAttribute;

class TagAttributeTest extends WsdlParser
{
    /**
     * @return \WsdlToPhp\PackageGenerator\Parser\Wsdl\TagAttribute
     */
    public static function ebayInstance()
    {
        return new TagAttribute(self::generatorInstance(self::wsdlEbayPath()));
    }
    /**
     *
     */
    public function testParseEbay()
    {
        $tagAttributeParser = self::ebayInstance();
        AbstractObjectContainer::purgeAllCache();

        $tagAttributeParser->parse();

        $ok = false;
        $structs = $tagAttributeParser->getGenerator()->getStructs();
        if ($structs->count() > 0) {
            if ($structs->getStructByName('QuantityType') !== null) {
                $this->assertSame('token', $structs->getStructByName('QuantityType')->getAttribute('unit')->getType());
                $this->assertSame(array('use'=>'optional'), $structs->getStructByName('QuantityType')->getAttribute('unit')->getMeta());
                $ok = true;
            }
            if ($structs->getStructByName('CharityIDType') !== null) {
                $this->assertSame('CharityAffiliationTypeCodeType', $structs->getStructByName('CharityIDType')->getAttribute('type')->getType());
                $this->assertSame(array('use'=>'required'), $structs->getStructByName('CharityIDType')->getAttribute('type')->getMeta());
                $ok = true;
            }
            if ($structs->getStructByName('CharityAffiliationType') !== null) {
                $this->assertSame('string', $structs->getStructByName('CharityAffiliationType')->getAttribute('id')->getType());
                $this->assertSame('CharityAffiliationTypeCodeType', $structs->getStructByName('CharityAffiliationType')->getAttribute('type')->getType());
                $ok = true;
            }
        }
        $this->assertTrue((bool)$ok);
    }
}
