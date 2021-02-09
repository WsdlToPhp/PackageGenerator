<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Container\PhpElement;

use WsdlToPhp\PhpGenerator\Element\PhpMethod;

final class Method extends AbstractPhpElement
{
    protected function objectClass(): string
    {
        return PhpMethod::class;
    }
}
