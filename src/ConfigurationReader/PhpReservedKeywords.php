<?php

namespace WsdlToPhp\PackageGenerator\ConfigurationReader;

class PhpReservedKeywords extends AbstractReservedKeywords
{
    /**
     * @throws \InvalidArgumentException
     * @param string options's file to parse
     * @return PhpReservedKeywords
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
        return dirname(__FILE__) . '/../resources/config/php_reserved_keywords.yml';
    }
}
