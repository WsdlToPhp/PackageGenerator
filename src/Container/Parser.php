<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Container;

use WsdlToPhp\PackageGenerator\Parser\AbstractParser;

final class Parser extends AbstractObjectContainer
{
    public function getParserByName(string $name): ?AbstractParser
    {
        return $this->get($name);
    }

    protected function objectClass(): string
    {
        return AbstractParser::class;
    }

    protected function objectProperty(): string
    {
        return self::PROPERTY_NAME;
    }
}
