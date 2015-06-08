<?php

namespace WsdlToPhp\PackageGenerator\Tests\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagDocumentation;
use WsdlToPhp\PackageGenerator\Model\Struct;

class TagDocumentationTest extends WsdlParser
{
    /**
     * @return \WsdlToPhp\PackageGenerator\Parser\Wsdl\TagDocumentation
     */
    public static function bingInstance()
    {
        return new TagDocumentation(self::generatorInstance(self::wsdlBingPath()));
    }
    /**
     * @return \WsdlToPhp\PackageGenerator\Parser\Wsdl\TagDocumentation
     */
    public static function partnerInstance()
    {
        return new TagDocumentation(self::generatorInstance(self::wsdlPartnerPath()));
    }
    /**
     * @return \WsdlToPhp\PackageGenerator\Parser\Wsdl\TagDocumentation
     */
    public static function imageViewInstance()
    {
        return new TagDocumentation(self::generatorInstance(self::wsdlImageViewServicePath()));
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
}
