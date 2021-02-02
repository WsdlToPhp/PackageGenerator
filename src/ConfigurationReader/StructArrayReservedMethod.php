<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\ConfigurationReader;

final class StructArrayReservedMethod extends AbstractReservedWord
{
    public static function getDefaultConfigurationPath(): string
    {
        return __DIR__.'/../resources/config/struct_array_reserved_keywords.yml';
    }
}
