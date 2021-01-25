<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\ConfigurationReader;

final class ServiceReservedMethod extends AbstractReservedWord
{
    public static function getDefaultConfigurationPath(): string
    {
        return __DIR__.'/../resources/config/service_reserved_keywords.yml';
    }
}
