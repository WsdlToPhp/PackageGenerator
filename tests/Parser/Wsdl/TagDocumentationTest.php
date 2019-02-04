<?php

namespace WsdlToPhp\PackageGenerator\Tests\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagEnumeration;
use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagDocumentation;
use WsdlToPhp\PackageGenerator\Model\Struct;

class TagDocumentationTest extends WsdlParser
{
    /**
     * @return \WsdlToPhp\PackageGenerator\Parser\Wsdl\TagDocumentation
     */
    public static function imageViewInstanceParser()
    {
        return new TagDocumentation(self::generatorInstance(self::wsdlImageViewServicePath()));
    }
    /**
     * @return \WsdlToPhp\PackageGenerator\Parser\Wsdl\TagDocumentation
     */
    public static function whlInstanceParser()
    {
        return new TagDocumentation(self::generatorInstance(self::wsdlWhlPath()));
    }
    /**
     * @return \WsdlToPhp\PackageGenerator\Parser\Wsdl\TagDocumentation
     */
    public static function actonInstanceParser()
    {
        return new TagDocumentation(self::generatorInstance(self::wsdlActonPath(), true));
    }
    /**
     * @return \WsdlToPhp\PackageGenerator\Parser\Wsdl\TagDocumentation
     */
    public static function payPalInstanceParser()
    {
        return new TagDocumentation(self::generatorInstance(self::wsdlPayPalPath(), true));
    }
    /**
     *
     */
    public function testParseImageViewService()
    {
        $tagDocumentationParser = self::imageViewInstanceParser();
        $tagDocumentationParser->parse();
        $ok = false;
        foreach ($tagDocumentationParser->getGenerator()->getStructs() as $struct) {
            if ($struct instanceof Struct && $struct->isRestriction() === false) {
                if ($struct->getName() === 'imgRequest') {
                    $this->assertEquals([
                        'PRO is deprecated; provided for backward compatibility',
                    ], $struct->getMetaValue(Struct::META_DOCUMENTATION));
                    $ok = true;
                } elseif ($struct->getName() === 'ProType') {
                    $this->assertEquals([
                        'PRO is 10 digits or 11 digits with dash.',
                    ], $struct->getMetaValue(Struct::META_DOCUMENTATION));
                    $ok = true;
                } elseif ($struct->getName() === 'SearchCriteriaType') {
                    $this->assertEquals([
                        'Generic search criteria for image search',
                    ], $struct->getMetaValue(Struct::META_DOCUMENTATION));
                    $ok = true;
                } elseif ($struct->getName() === 'SearchItemType') {
                    $this->assertEquals([
                        'Image search item',
                    ], $struct->getMetaValue(Struct::META_DOCUMENTATION));
                    $ok = true;
                } elseif ($struct->getName() === 'DocumentType') {
                    $this->assertEquals([
                        'Document type code',
                    ], $struct->getMetaValue(Struct::META_DOCUMENTATION));
                    $ok = true;
                } elseif ($struct->getName() === 'ImagesType') {
                    $this->assertEquals([
                        'Image file name and Base64 encoded binary source data',
                    ], $struct->getMetaValue(Struct::META_DOCUMENTATION));
                    $ok = true;
                } elseif ($struct->getName() === 'availRequest') {
                    $this->assertEquals([
                        'PRO is deprecated; provided for backward compatibility',
                    ], $struct->getMetaValue(Struct::META_DOCUMENTATION));
                    $ok = true;
                }
            }
        }
        $this->assertTrue((bool) $ok);
    }
    /**
     *
     */
    public function testParseWhlPaymentCardCodeType()
    {
        $tagDocumentationParser = self::whlInstanceParser();
        $tagEnumerationParser = new TagEnumeration($tagDocumentationParser->getGenerator());
        $tagEnumerationParser->parse();
        $tagDocumentationParser->parse();
        if ($struct = $tagDocumentationParser->getGenerator()->getStructByName('PaymentCardCodeType')) {
            $this->assertSame([
                'American Express',
            ], $struct->getValue('AX')->getMetaValue(Struct::META_DOCUMENTATION));
            $this->assertSame([
                'Bank Card',
            ], $struct->getValue('BC')->getMetaValue(Struct::META_DOCUMENTATION));
            $this->assertSame([
                'Carte Bleu',
            ], $struct->getValue('BL')->getMetaValue(Struct::META_DOCUMENTATION));
            $this->assertSame([
                'Carte Blanche',
            ], $struct->getValue('CB')->getMetaValue(Struct::META_DOCUMENTATION));
            $this->assertSame([
                'Diners Club',
            ], $struct->getValue('DN')->getMetaValue(Struct::META_DOCUMENTATION));
            $this->assertSame([
                'Discover Card',
            ], $struct->getValue('DS')->getMetaValue(Struct::META_DOCUMENTATION));
            $this->assertSame([
                'Eurocard',
            ], $struct->getValue('EC')->getMetaValue(Struct::META_DOCUMENTATION));
        } else {
            $this->fail('Unabel to find PaymentCardCodeType restriction for tests');
        }
    }
    /**
     *
     */
    public function testParseActon()
    {
        $tagDocumentationParser = self::actonInstanceParser();
        $tagEnumerationParser = new TagEnumeration($tagDocumentationParser->getGenerator());
        $tagEnumerationParser->parse();
        $tagDocumentationParser->parse();
        if ($struct = $tagDocumentationParser->getGenerator()->getStructByName('ID')) {
            $this->assertSame([
                'ID for an object',
            ], $struct->getMetaValue(Struct::META_DOCUMENTATION));
        } else {
            $this->fail('Unable to find Id struct for tests');
        }
    }
    /**
     *
     */
    public function testParsePayPal()
    {
        $tagDocumentationParser = self::payPalInstanceParser();
        $tagEnumerationParser = new TagEnumeration($tagDocumentationParser->getGenerator());
        $tagEnumerationParser->parse();
        $tagDocumentationParser->parse();
        $okCount = 0;
        $struct = $tagDocumentationParser->getGenerator()->getStructByName('SetExpressCheckoutRequestDetailsType');
        $attributes = [
            'cpp-header-image' => 'A URL for the image you want to appear at the top left of the payment page. The image has a maximum size of 750 pixels wide by 90 pixels high. PayPal recommends that you provide an image that is stored on a secure (https) server. Optional Character length and limitations: 127',
            'cpp-header-border-color' => 'Sets the border color around the header of the payment page. The border is a 2-pixel perimeter around the header space, which is 750 pixels wide by 90 pixels high. Optional Character length and limitations: Six character HTML hexadecimal color code in ASCII',
            'cpp-header-back-color' => 'Sets the background color for the header of the payment page. Optional Character length and limitation: Six character HTML hexadecimal color code in ASCII',
            'cpp-payflow-color' => 'Sets the background color for the payment page. Optional Character length and limitation: Six character HTML hexadecimal color code in ASCII',
            'cpp-cart-border-color' => 'Sets the cart gradient color for the Mini Cart on 1X flow. Optional Character length and limitation: Six character HTML hexadecimal color code in ASCII',
            'cpp-logo-image' => 'A URL for the image you want to appear above the mini-cart. The image has a maximum size of 190 pixels wide by 60 pixels high. PayPal recommends that you provide an image that is stored on a secure (https) server. Optional Character length and limitations: 127',
        ];
        if ($struct instanceof Struct) {
            foreach ($attributes as $attribute => $value) {
                $header = $struct->getAttribute($attribute);
                if ($header) {
                    $doc = $header->getMetaValue('documentation');
                    $okCount += (int) ($value === $doc[0]);
                }
            }
        }
        $this->assertSame(count($attributes), $okCount);
    }
    /**
     *
     */
    public function testParseWhlTransactionActionType()
    {
        $tagDocumentationParser = self::whlInstanceParser();
        $tagEnumerationParser = new TagEnumeration($tagDocumentationParser->getGenerator());
        $tagEnumerationParser->parse();
        $tagDocumentationParser->parse();
        if ($struct = $tagDocumentationParser->getGenerator()->getStructByName('TransactionActionType')) {
            $this->assertSame([
                'Commit the transaction and override the end transaction edits.',
            ], $struct->getValue('CommitOverrideEdits')->getMetaValue(Struct::META_DOCUMENTATION));
            $this->assertSame([
                'Perform a price verification.',
            ], $struct->getValue('VerifyPrice')->getMetaValue(Struct::META_DOCUMENTATION));
            $this->assertSame([
                'A ticket for an event, such as a show or theme park.',
            ], $struct->getValue('Ticket')->getMetaValue(Struct::META_DOCUMENTATION));
        } else {
            $this->fail('Unable to find TransactionActionType restriction for tests');
        }
    }
}
