<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Container;

use WsdlToPhp\PackageGenerator\Parser\AbstractParser;

class Parser extends AbstractObjectContainer
{
    protected function objectClass(): string
    {
        return AbstractParser::class;
    }

    protected function objectProperty(): string
    {
        return self::PROPERTY_NAME;
    }

    public function getParserByName(string $name): ?AbstractParser
    {
        return $this->get($name);
    }
}
