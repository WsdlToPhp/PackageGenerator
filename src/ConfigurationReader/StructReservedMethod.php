<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\ConfigurationReader;

final class StructReservedMethod extends AbstractReservedWord
{
    public static function getDefaultConfigurationPath(): string
    {
        return __DIR__.'/../resources/config/struct_reserved_keywords.yml';
    }
}
