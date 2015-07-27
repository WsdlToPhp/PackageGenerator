<?php

namespace WsdlToPhp\PackageGenerator\Tests\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagEnumeration;
use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagDocumentation;
use WsdlToPhp\PackageGenerator\Model\Struct;
use WsdlToPhp\PackageGenerator\Model\Service;

class TagDocumentationTest extends WsdlParser
{
    /**
     * @return \WsdlToPhp\PackageGenerator\Parser\Wsdl\TagDocumentation
     */
    public static function imageViewInstance()
    {
        return new TagDocumentation(self::generatorInstance(self::wsdlImageViewServicePath()));
    }
    /**
     * @return \WsdlToPhp\PackageGenerator\Parser\Wsdl\TagDocumentation
     */
    public static function whlInstance()
    {
        return new TagDocumentation(self::generatorInstance(self::wsdlWhlPath()));
    }
    /**
     * @return \WsdlToPhp\PackageGenerator\Parser\Wsdl\TagDocumentation
     */
    public static function actonInstance()
    {
        return new TagDocumentation(self::generatorInstance(self::wsdlActonPath(), true));
    }
    /**
     * @return \WsdlToPhp\PackageGenerator\Parser\Wsdl\TagDocumentation
     */
    public static function queueInstance()
    {
        return new TagDocumentation(self::generatorInstance(self::wsdlQueuePath()));
    }
    /**
     *
     */
    public function testParseImageViewService()
    {
        $tagDocumentationParser = self::imageViewInstance();

        $tagDocumentationParser->parse();

        $ok = false;
        foreach ($tagDocumentationParser->getGenerator()->getStructs() as $struct) {
            if ($struct instanceof Struct && $struct->getIsRestriction() === false) {
                if ($struct->getName() === 'imgRequest') {
                    $this->assertEquals(array(
                        'PRO is deprecated; provided for backward compatibility',
                    ), $struct->getMetaValue(Struct::META_DOCUMENTATION));
                    $ok = true;
                } elseif ($struct->getName() === 'ProType') {
                    $this->assertEquals(array(
                        'PRO is 10 digits or 11 digits with dash.',
                    ), $struct->getMetaValue(Struct::META_DOCUMENTATION));
                    $ok = true;
                } elseif ($struct->getName() === 'SearchCriteriaType') {
                    $this->assertEquals(array(
                        'Generic search criteria for image search',
                    ), $struct->getMetaValue(Struct::META_DOCUMENTATION));
                    $ok = true;
                } elseif ($struct->getName() === 'SearchItemType') {
                    $this->assertEquals(array(
                        'Image search item',
                    ), $struct->getMetaValue(Struct::META_DOCUMENTATION));
                    $ok = true;
                } elseif ($struct->getName() === 'DocumentType') {
                    $this->assertEquals(array(
                        'Document type code',
                    ), $struct->getMetaValue(Struct::META_DOCUMENTATION));
                    $ok = true;
                } elseif ($struct->getName() === 'ImagesType') {
                    $this->assertEquals(array(
                        'Image file name and Base64 encoded binary source data',
                    ), $struct->getMetaValue(Struct::META_DOCUMENTATION));
                    $ok = true;
                } elseif ($struct->getName() === 'availRequest') {
                    $this->assertEquals(array(
                        'PRO is deprecated; provided for backward compatibility',
                    ), $struct->getMetaValue(Struct::META_DOCUMENTATION));
                    $ok = true;
                }
            }
        }
        $this->assertTrue((bool)$ok);
    }
    /**
     *
     */
    public function testParseWhl()
    {
        $tagDocumentationParser = self::whlInstance();

        $tagEnumerationParser = new TagEnumeration($tagDocumentationParser->getGenerator());
        $tagEnumerationParser->parse();

        $tagDocumentationParser->parse();

        $ok = false;
        foreach ($tagDocumentationParser->getGenerator()->getStructs() as $struct) {
            if ($struct instanceof Struct && $struct->getIsRestriction() === true) {
                if ($struct->getName() === 'PaymentCardCodeType') {
                    $this->assertSame(array(
                        'American Express',
                    ), $struct->getValue('AX')->getMetaValue(Struct::META_DOCUMENTATION));
                    $this->assertSame(array(
                        'Bank Card',
                    ), $struct->getValue('BC')->getMetaValue(Struct::META_DOCUMENTATION));
                    $this->assertSame(array(
                        'Carte Bleu',
                    ), $struct->getValue('BL')->getMetaValue(Struct::META_DOCUMENTATION));
                    $this->assertSame(array(
                        'Carte Blanche',
                    ), $struct->getValue('CB')->getMetaValue(Struct::META_DOCUMENTATION));
                    $this->assertSame(array(
                        'Diners Club',
                    ), $struct->getValue('DN')->getMetaValue(Struct::META_DOCUMENTATION));
                    $this->assertSame(array(
                        'Discover Card',
                    ), $struct->getValue('DS')->getMetaValue(Struct::META_DOCUMENTATION));
                    $this->assertSame(array(
                        'Eurocard',
                    ), $struct->getValue('EC')->getMetaValue(Struct::META_DOCUMENTATION));
                    $ok = true;
                }
            }
        }
        $this->assertTrue((bool)$ok);
    }
    /**
     *
     */
    public function testParseActon()
    {
        $tagDocumentationParser = self::actonInstance();

        $tagEnumerationParser = new TagEnumeration($tagDocumentationParser->getGenerator());
        $tagEnumerationParser->parse();

        $tagDocumentationParser->parse();

        $ok = false;
        foreach ($tagDocumentationParser->getGenerator()->getStructs() as $struct) {
            if ($struct instanceof Struct && $struct->getIsStruct() === false) {
                if ($struct->getName() === 'ID') {
                    $this->assertSame(array(
                        'ID for an object',
                    ), $struct->getMetaValue(Struct::META_DOCUMENTATION));
                    $ok = true;
                }
            }
        }
        $this->assertTrue((bool)$ok);
    }
}
