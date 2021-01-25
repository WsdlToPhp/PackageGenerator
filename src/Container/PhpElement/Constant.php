<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Container\PhpElement;

use WsdlToPhp\PhpGenerator\Element\PhpConstant;

final class Constant extends AbstractPhpElement
{
    protected function objectClass(): string
    {
        return PhpConstant::class;
    }
}
