<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Container\PhpElement;

use WsdlToPhp\PackageGenerator\Container\AbstractObjectContainer;

abstract class AbstractPhpElement extends AbstractObjectContainer
{
    protected function objectProperty(): string
    {
        return self::PROPERTY_NAME;
    }
}
