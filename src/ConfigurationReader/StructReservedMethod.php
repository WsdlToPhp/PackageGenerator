<?php

namespace WsdlToPhp\PackageGenerator\ConfigurationReader;

class StructReservedMethod extends AbstractReservedWord
{
    /**
     * @throws \InvalidArgumentException
     * @param string options's file to parse
     * @return StructReservedMethod
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
        return dirname(__FILE__) . '/../resources/config/struct_reserved_keywords.yml';
    }
}
