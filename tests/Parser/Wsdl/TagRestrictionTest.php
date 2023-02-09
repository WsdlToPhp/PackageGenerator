<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\Model\Struct;
use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagRestriction;

/**
 * @internal
 * @coversDefaultClass
 */
final class TagRestrictionTest extends WsdlParser
{
    public static function actonInstanceParser(): TagRestriction
    {
        return new TagRestriction(self::generatorInstance(self::wsdlActonPath()));
    }

    public static function imageViewInstanceParser(): TagRestriction
    {
        return new TagRestriction(self::generatorInstance(self::wsdlImageViewServicePath()));
    }

    public static function docDataPaymentsViewInstanceParser(): TagRestriction
    {
        return new TagRestriction(self::generatorInstance(self::wsdlDocDataPaymentsPath()));
    }

    public static function whlInstanceParser(): TagRestriction
    {
        return new TagRestriction(self::generatorInstance(self::wsdlWhlPath()));
    }

    public function testParseImageViewService(): void
    {
        $tagRestrictionParser = self::imageViewInstanceParser();

        $tagRestrictionParser->parse();

        $count = 0;
        foreach ($tagRestrictionParser->getGenerator()->getStructs() as $struct) {
            if ($struct instanceof Struct && false === $struct->isRestriction()) {
                if ('EchoRequestType' === $struct->getName()) {
                    $this->assertSame('string', $struct->getInheritance());
                    $this->assertEquals([
                        'maxLength' => '100',
                        'base' => 'xsd:string',
                    ], $struct->getMeta());
                    ++$count;
                } elseif ('PasswordType' === $struct->getName()) {
                    $this->assertSame('string', $struct->getInheritance());
                    $this->assertEquals([
                        'minLength' => '5',
                        'maxLength' => '10',
                        'base' => 'xsd:string',
                    ], $struct->getMeta());
                    ++$count;
                }
            }
        }
        $this->assertEquals(2, $count);
    }

    public function testParseActonService(): void
    {
        $tagRestrictionParser = self::actonInstanceParser();

        $tagRestrictionParser->parse();

        $ok = false;
        foreach ($tagRestrictionParser->getGenerator()->getStructs() as $struct) {
            if ($struct instanceof Struct) {
                if ('ID' === $struct->getName()) {
                    $this->assertFalse($struct->isStruct());
                    $ok = true;
                }
            }
        }
        $this->assertTrue($ok);
    }

    public function testParseDocDataPayments(): void
    {
        $tagRestrictionParser = self::docDataPaymentsViewInstanceParser();

        $tagRestrictionParser->parse();

        $count = 0;
        foreach ($tagRestrictionParser->getGenerator()->getStructs() as $struct) {
            if ($struct instanceof Struct) {
                switch ($struct->getName()) {
                    case 'plainDateTime':
                        if (!$struct->isStruct()) {
                            $this->assertSame('19', $struct->getMetaValue('minLength'));
                            $this->assertSame('19', $struct->getMetaValue('maxLength'));
                            $this->assertSame('normalizedString', $struct->getInheritance());
                            ++$count;
                        }

                        break;

                    case 'emailAddress':
                        if (!$struct->isStruct()) {
                            $this->assertSame('[_a-zA-Z0-9\-\+\.]+@[a-zA-Z0-9\-]+(\.[a-zA-Z0-9\-]+)*(\.[a-zA-Z]+)', $struct->getMetaValue('pattern'));
                            $this->assertSame('string100', $struct->getInheritance());
                            ++$count;
                        }

                        break;
                }
            }
        }

        $this->assertEquals(2, $count);
    }

    public function testParseWhlMustFetchAllRestrictionPatterns(): void
    {
        $tagRestrictionParser = self::whlInstanceParser();

        $tagRestrictionParser->parse();

        $struct = $tagRestrictionParser->getGenerator()->getStructByName('OTA_CodeType');

        if ($struct) {
            $this->assertSame([
                'base' => 'xs:string',
                'pattern' => [
                    '[0-9A-Z]{1,3}(\.[A-Z]{3}(\.X){0,1}){0,1}',
                    '0AA.BBBX',
                    '',
                ],
            ], $struct->getMeta());
        } else {
            $this->fail(sprintf('Struct OTA_CodeType not found, can\'t test'));
        }
    }
}
