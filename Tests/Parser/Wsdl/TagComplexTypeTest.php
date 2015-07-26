<?php

namespace WsdlToPhp\PackageGenerator\Tests\Parser\Wsdl;

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
     * @return \WsdlToPhp\PackageGenerator\Parser\Wsdl\TagComplexType
     */
    public static function partnerInstance()
    {
        return new TagComplexType(self::generatorInstance(self::wsdlPartnerPath()));
    }
    /**
     *
     */
    public function testParseEbay()
    {
        $tagComplexTypeParser = self::ebayInstance();

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
    /**
     *
     */
    public function testParseOrderContract()
    {
        $tagComplexTypeParser = self::partnerInstance();

        $tagComplexTypeParser->parse();

        $ok = false;
        $structs = $tagComplexTypeParser->getGenerator()->getStructs();
        if ($structs->count() > 0) {
            $this->assertSame('true', $structs->getStructByName('MemberNumber')->getMetaValue('nillable'));
            $this->assertSame('tns:MemberNumber', $structs->getStructByName('MemberNumber')->getMetaValue('type'));
            $ok = true;
        }
        $this->assertTrue((bool)$ok);
    }
}
