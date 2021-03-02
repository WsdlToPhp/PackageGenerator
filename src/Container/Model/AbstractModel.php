<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Container\Model;

use WsdlToPhp\PackageGenerator\Container\AbstractObjectContainer;

abstract class AbstractModel extends AbstractObjectContainer
{
    protected function objectProperty(): string
    {
        return self::PROPERTY_NAME;
    }
}
