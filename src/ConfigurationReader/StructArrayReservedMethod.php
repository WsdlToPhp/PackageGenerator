<?php

namespace WsdlToPhp\PackageGenerator\ConfigurationReader;

class StructArrayReservedMethod extends StructReservedMethod
{
    /**
     * @param string $filename
     */
    protected function __construct($filename)
    {
        parent::__construct($filename);
        $this->parseReservedKeywords(parent::getDefaultConfigurationPath());
    }
    /**
     * @throws \InvalidArgumentException
     * @param string $filename options's file to parse
     * @return StructArrayReservedMethod
     */
    public static function instance($filename = null)
    {
        return parent::instance(empty($filename) ? self::getDefaultArrayConfigurationPath() : $filename);
    }
    /**
     * @return string
     */
    public static function getDefaultArrayConfigurationPath()
    {
        return __DIR__ . '/../resources/config/struct_array_reserved_keywords.yml';
    }
}
