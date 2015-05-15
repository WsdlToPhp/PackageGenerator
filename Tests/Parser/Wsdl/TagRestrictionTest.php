<?php

namespace WsdlToPhp\PackageGenerator\Tests\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\Container\AbstractObjectContainer;
use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagRestriction;
use WsdlToPhp\PackageGenerator\Model\Struct;

class TagRestrictionTest extends WsdlParser
{
    /**
     * @return \WsdlToPhp\PackageGenerator\Parser\Wsdl\TagRestriction
     */
    public static function bingInstance()
    {
        return new TagRestriction(self::generatorInstance(self::wsdlBingPath()));
    }
    /**
     * @return \WsdlToPhp\PackageGenerator\Parser\Wsdl\TagRestriction
     */
    public static function partnerInstance()
    {
        return new TagRestriction(self::generatorInstance(self::wsdlPartnerPath()));
    }
    /**
     * @return \WsdlToPhp\PackageGenerator\Parser\Wsdl\TagRestriction
     */
    public static function imageViewInstance()
    {
        return new TagRestriction(self::generatorInstance(self::wsdlImageViewServicePath()));
    }
    /**
     *
     */
    public function testParseImageViewService()
    {
        $tagRestrictionParser = self::imageViewInstance();
        AbstractObjectContainer::purgeAllCache();

        $tagRestrictionParser->parse();

        $ok = false;
        foreach ($tagRestrictionParser->getGenerator()->getStructs() as $struct) {
            if ($struct instanceof Struct && $struct->getIsRestriction() === false) {
                if ($struct->getName() === 'EchoRequestType') {
                    $this->assertSame('string', $struct->getInheritance());
                    $this->assertEquals(array('maxLength'=>'100'), $struct->getMeta());
                    $ok = true;
                } elseif ($struct->getName() === 'PasswordType') {
                    $this->assertSame('string', $struct->getInheritance());
                    $this->assertEquals(array('minLength'=>'5','maxLength'=>'10'), $struct->getMeta());
                    $ok = true;
                }
            }
        }
        $this->assertTrue((bool)$ok);
    }
}
