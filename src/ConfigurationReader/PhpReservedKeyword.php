<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\ConfigurationReader;

final class PhpReservedKeyword extends AbstractReservedWord
{
    public static function getDefaultConfigurationPath(): string
    {
        return __DIR__.'/../resources/config/php_reserved_keywords.yml';
    }

    public static function instance(?string $filename = null): self
    {
        return parent::instance($filename);
    }
}
