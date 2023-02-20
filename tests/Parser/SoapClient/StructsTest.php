<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\Parser\SoapClient;

use WsdlToPhp\PackageGenerator\Model\Struct;
use WsdlToPhp\PackageGenerator\Model\StructAttribute;
use WsdlToPhp\PackageGenerator\Parser\SoapClient\Structs;

/**
 * @internal
 * @coversDefaultClass
 */
final class StructsTest extends SoapClientParser
{
    public function testWcf(): void
    {
        $generator = self::getWcfInstance();

        $parser = new Structs($generator);
        $parser->parse();

        $offer = $generator->getStructByName('offer');

        if ($offer instanceof Struct) {
            $this->assertInstanceOf(StructAttribute::class, $offer->getAttribute('offerClassMember'));
            $this->assertInstanceOf(StructAttribute::class, $offer->getAttribute('offer'));
            $this->assertSame('offer', $offer->getAttribute('offer')->getType());
        } else {
            $this->fail('Unable to get offer struct');
        }

        $order = $generator->getStructByName('order');

        if ($offer instanceof Struct) {
            $this->assertInstanceOf(StructAttribute::class, $order->getAttribute('orderClassMember'));
            $this->assertInstanceOf(StructAttribute::class, $order->getAttribute('order'));
            $this->assertSame('order', $order->getAttribute('order')->getType());
        } else {
            $this->fail('Unable to get order struct');
        }
    }

    public function testLnp(): void
    {
        $generator = self::getLnpInstance();

        $parser = new Structs($generator);
        $parser->parse();

        $count = 0;
        foreach ($generator->getStructs() as $struct) {
            $count += $struct->isStruct() ? 1 : 0;
        }

        $this->assertEquals(0, $count);
    }

    public function testWhl(): void
    {
        $generator = self::getWhlInstance(true);

        $parser = new Structs($generator);
        $parser->parse();

        $unionTypes = [
            explode(',', 'anonymous25,anonymous26'),
            explode(',', 'dateTime,time'),
            explode(',', 'date,dateTime,time'),
            explode(',', 'NightDurationType,duration'),
            explode(',', 'PMS_ResStatusType,TransactionActionType,UpperCaseAlphaLength1to2'),
            explode(',', 'PMS_ResStatusType,TransactionActionType,UpperCaseAlphaLength1to2'),
        ];

        $count = 0;
        $index = 0;

        /** @var Struct $struct */
        foreach ($generator->getStructs() as $struct) {
            $count += $struct->isUnion() ? 1 : 0;
            if ($struct->isUnion()) {
                $this->assertSame($unionTypes[$index++], $struct->getTypes());
            }
        }

        $this->assertEquals(5, $count);
    }
}
