<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\Model\Struct;
use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagDocumentation;
use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagEnumeration;

/**
 * @internal
 * @coversDefaultClass
 */
final class TagDocumentationTest extends WsdlParser
{
    public static function imageViewInstanceParser(): TagDocumentation
    {
        return new TagDocumentation(self::generatorInstance(self::wsdlImageViewServicePath()));
    }

    public static function whlInstanceParser(): TagDocumentation
    {
        return new TagDocumentation(self::generatorInstance(self::wsdlWhlPath()));
    }

    public static function actonInstanceParser(): TagDocumentation
    {
        return new TagDocumentation(self::generatorInstance(self::wsdlActonPath(), true));
    }

    public static function payPalInstanceParser(): TagDocumentation
    {
        return new TagDocumentation(self::generatorInstance(self::wsdlPayPalPath(), true));
    }

    public function testParseImageViewService(): void
    {
        $tagDocumentationParser = self::imageViewInstanceParser();
        $tagDocumentationParser->parse();
        $ok = false;
        foreach ($tagDocumentationParser->getGenerator()->getStructs() as $struct) {
            if ($struct instanceof Struct && false === $struct->isRestriction()) {
                if ('imgRequest' === $struct->getName()) {
                    $this->assertEquals([
                        'PRO is deprecated; provided for backward compatibility',
                    ], $struct->getMetaValue(Struct::META_DOCUMENTATION));
                    $ok = true;
                } elseif ('ProType' === $struct->getName()) {
                    $this->assertEquals([
                        'PRO is 10 digits or 11 digits with dash.',
                    ], $struct->getMetaValue(Struct::META_DOCUMENTATION));
                    $ok = true;
                } elseif ('SearchCriteriaType' === $struct->getName()) {
                    $this->assertEquals([
                        'Generic search criteria for image search',
                    ], $struct->getMetaValue(Struct::META_DOCUMENTATION));
                    $ok = true;
                } elseif ('SearchItemType' === $struct->getName()) {
                    $this->assertEquals([
                        'Image search item',
                    ], $struct->getMetaValue(Struct::META_DOCUMENTATION));
                    $ok = true;
                } elseif ('DocumentType' === $struct->getName()) {
                    $this->assertEquals([
                        'Document type code',
                    ], $struct->getMetaValue(Struct::META_DOCUMENTATION));
                    $ok = true;
                } elseif ('ImagesType' === $struct->getName()) {
                    $this->assertEquals([
                        'Image file name and Base64 encoded binary source data',
                    ], $struct->getMetaValue(Struct::META_DOCUMENTATION));
                    $ok = true;
                } elseif ('availRequest' === $struct->getName()) {
                    $this->assertEquals([
                        'PRO is deprecated; provided for backward compatibility',
                    ], $struct->getMetaValue(Struct::META_DOCUMENTATION));
                    $ok = true;
                }
            }
        }
        $this->assertTrue((bool) $ok);
    }

    public function testParseWhlPaymentCardCodeType(): void
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

    public function testParseActon(): void
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

    public function testParsePayPal(): void
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

    public function testParseWhlTransactionActionType(): void
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
