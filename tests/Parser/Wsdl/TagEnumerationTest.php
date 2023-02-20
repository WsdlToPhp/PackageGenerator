<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\Parser\Wsdl;

use WsdlToPhp\PackageGenerator\Container\Model\StructValue as StructValueContainer;
use WsdlToPhp\PackageGenerator\Model\Struct;
use WsdlToPhp\PackageGenerator\Model\StructValue;
use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagEnumeration;

/**
 * @internal
 * @coversDefaultClass
 */
final class TagEnumerationTest extends WsdlParser
{
    public static function bingInstanceParser(): TagEnumeration
    {
        return new TagEnumeration(self::generatorInstance(self::wsdlBingPath()));
    }

    public static function reformaInstanceParser(): TagEnumeration
    {
        return new TagEnumeration(self::generatorInstance(self::wsdlReformaPath()));
    }

    public function testBing(): void
    {
        $tagEnumerationParser = self::bingInstanceParser();

        $tagEnumerationParser->parse();

        $count = 0;
        foreach ($tagEnumerationParser->getGenerator()->getStructs() as $struct) {
            if ($struct instanceof Struct && true === $struct->isRestriction()) {
                if ('AdultOption' === $struct->getName()) {
                    $values = new StructValueContainer($tagEnumerationParser->getGenerator());
                    $values->add(new StructValue($tagEnumerationParser->getGenerator(), 'Off', 0, $struct));
                    $values->add(new StructValue($tagEnumerationParser->getGenerator(), 'Moderate', 1, $struct));
                    $values->add(new StructValue($tagEnumerationParser->getGenerator(), 'Strict', 2, $struct));

                    $struct->getValues()->rewind();
                    $this->assertEquals($values, $struct->getValues());
                    ++$count;
                } elseif ('SearchOption' === $struct->getName()) {
                    $values = new StructValueContainer($tagEnumerationParser->getGenerator());
                    $values->add(new StructValue($tagEnumerationParser->getGenerator(), 'DisableLocationDetection', 0, $struct));
                    $values->add(new StructValue($tagEnumerationParser->getGenerator(), 'EnableHighlighting', 1, $struct));

                    $struct->getValues()->rewind();
                    $this->assertEquals($values, $struct->getValues());
                    ++$count;
                }
            }
        }
        $this->assertSame(2, $count);
    }

    public function testReforma(): void
    {
        $tagEnumerationParser = self::reformaInstanceParser();

        $tagEnumerationParser->parse();

        $count = 0;
        foreach ($tagEnumerationParser->getGenerator()->getStructs() as $struct) {
            if ($struct instanceof Struct && true === $struct->isRestriction()) {
                if ('HouseStateEnum' === $struct->getName()) {
                    $values = new StructValueContainer($tagEnumerationParser->getGenerator());
                    $one = new StructValue($tagEnumerationParser->getGenerator(), '1', 0, $struct);
                    $one->setMeta([
                        'label' => 'normal',
                        'description' => 'Исправный',
                    ]);
                    $values->add($one);
                    $two = new StructValue($tagEnumerationParser->getGenerator(), '2', 1, $struct);
                    $two->setMeta([
                        'label' => 'warning',
                        'description' => 'Требующий капитального ремонта',
                    ]);
                    $values->add($two);
                    $three = new StructValue($tagEnumerationParser->getGenerator(), '3', 2, $struct);
                    $three->setMeta([
                        'label' => 'alarm',
                        'description' => 'Аварийный',
                    ]);
                    $values->add($three);
                    $four = new StructValue($tagEnumerationParser->getGenerator(), '4', 3, $struct);
                    $four->setMeta([
                        'label' => 'noinfo',
                        'description' => 'Нет данных',
                    ]);
                    $values->add($four);
                    $this->assertEquals($values, $struct->getValues());
                    ++$count;
                } elseif ('HouseStageEnum' === $struct->getName()) {
                    $values = new StructValueContainer($tagEnumerationParser->getGenerator());
                    $one = new StructValue($tagEnumerationParser->getGenerator(), '1', 0, $struct);
                    $one->setMeta([
                        'label' => 'exploited',
                        'description' => 'Эксплуатируемый',
                    ]);
                    $values->add($one);
                    $two = new StructValue($tagEnumerationParser->getGenerator(), '2', 1, $struct);
                    $two->setMeta([
                        'label' => 'decommissioned',
                        'description' => 'Выведенный из эксплуатации',
                    ]);
                    $values->add($two);
                    $three = new StructValue($tagEnumerationParser->getGenerator(), '3', 2, $struct);
                    $three->setMeta([
                        'label' => 'drifting',
                        'description' => 'Снесенный',
                    ]);
                    $values->add($three);

                    $struct->getValues()->rewind();
                    $this->assertEquals($values, $struct->getValues());
                    ++$count;
                }
            }
        }
        $this->assertSame(2, $count);
    }
}
