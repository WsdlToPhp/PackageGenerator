<?php

namespace WsdlToPhp\PackageGenerator\Tests\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagRestriction;
use WsdlToPhp\PackageGenerator\Model\Struct;

class TagRestrictionTest extends WsdlParser
{
    /**
     * @return \WsdlToPhp\PackageGenerator\Parser\Wsdl\TagRestriction
     */
    public static function actonInstance()
    {
        return new TagRestriction(self::generatorInstance(self::wsdlActonPath()));
    }
    /**
     * @return \WsdlToPhp\PackageGenerator\Parser\Wsdl\TagRestriction
     */
    public static function imageViewInstance()
    {
        return new TagRestriction(self::generatorInstance(self::wsdlImageViewServicePath()));
    }
    /**
     * @return \WsdlToPhp\PackageGenerator\Parser\Wsdl\TagRestriction
     */
    public static function docDataPaymentsViewInstance()
    {
        return new TagRestriction(self::generatorInstance(self::wsdlDocDataPaymentsPath()));
    }
    /**
     *
     */
    public function testParseImageViewService()
    {
        $tagRestrictionParser = self::imageViewInstance();

        $tagRestrictionParser->parse();

        $count = 0;
        foreach ($tagRestrictionParser->getGenerator()->getStructs() as $struct) {
            if ($struct instanceof Struct && $struct->getIsRestriction() === false) {
                if ($struct->getName() === 'EchoRequestType') {
                    $this->assertSame('string', $struct->getInheritance());
                    $this->assertEquals(array('maxLength'=>'100'), $struct->getMeta());
                    $count++;
                } elseif ($struct->getName() === 'PasswordType') {
                    $this->assertSame('string', $struct->getInheritance());
                    $this->assertEquals(array('minLength'=>'5', 'maxLength'=>'10'), $struct->getMeta());
                    $count++;
                }
            }
        }
        $this->assertEquals(2, $count);
    }
    /**
     *
     */
    public function testParseActonService()
    {
        $tagRestrictionParser = self::actonInstance();

        $tagRestrictionParser->parse();

        $ok = false;
        foreach ($tagRestrictionParser->getGenerator()->getStructs() as $struct) {
            if ($struct instanceof Struct) {
                if ($struct->getName() === 'ID') {
                    $this->assertFalse($struct->getIsStruct());
                    $ok = true;
                }
            }
        }
        $this->assertTrue($ok);
    }
    /**
     *
     */
    public function testParseDocDataPayments()
    {
        $tagRestrictionParser = self::docDataPaymentsViewInstance();

        $tagRestrictionParser->parse();

        $count = 0;
        foreach ($tagRestrictionParser->getGenerator()->getStructs() as $struct) {
            if ($struct instanceof Struct) {
                switch($struct->getName()) {
                    case 'plainDateTime':
                        if (!$struct->getIsStruct()) {
                            $this->assertSame('19', $struct->getMetaValue('minLength'));
                            $this->assertSame('19', $struct->getMetaValue('maxLength'));
                            $this->assertSame('normalizedString', $struct->getInheritance());
                            $count++;
                        }
                        break;
                    case 'emailAddress':
                        if (!$struct->getIsStruct()) {
                            $this->assertSame('[_a-zA-Z0-9\-\+\.]+@[a-zA-Z0-9\-]+(\.[a-zA-Z0-9\-]+)*(\.[a-zA-Z]+)', $struct->getMetaValue('pattern'));
                            $this->assertSame('string100', $struct->getInheritance());
                            $count++;
                        }
                        break;
                }
            }
        }

        $this->assertEquals(2, $count);
    }
}
