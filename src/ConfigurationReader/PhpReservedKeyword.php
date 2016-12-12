<?php

namespace WsdlToPhp\PackageGenerator\ConfigurationReader;

class PhpReservedKeyword extends AbstractReservedWord
{
    /**
     * @throws \InvalidArgumentException
     * @param string $filename options's file to parse
     * @return PhpReservedKeyword
     */
    public static function instance($filename = null)
    {
        return parent::instance(empty($filename) ? self::getDefaultConfigurationPath() : $filename);
    }
    /**
     * @return string
     */
    public static function getDefaultConfigurationPath()
    {
        return __DIR__ . '/../resources/config/php_reserved_keywords.yml';
    }
}
