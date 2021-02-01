<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Container\PhpElement;

use WsdlToPhp\PhpGenerator\Element\PhpProperty;

class Property extends AbstractPhpElement
{
    protected function objectClass(): string
    {
        return PhpProperty::class;
    }
}
