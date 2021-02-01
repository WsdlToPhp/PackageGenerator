<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Container\PhpElement;

use WsdlToPhp\PhpGenerator\Element\PhpConstant;

class Constant extends AbstractPhpElement
{
    protected function objectClass(): string
    {
        return PhpConstant::class;
    }
}
