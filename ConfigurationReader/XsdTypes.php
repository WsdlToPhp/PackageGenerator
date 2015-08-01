<?php

namespace WsdlToPhp\PackageGenerator\ConfigurationReader;

class XsdTypes extends AbstractYamlReader
{
    /**
     * @var string
     */
    const MAIN_KEY = 'xsd_types';
    /**
     * List of PHP reserved types from config file
     * @var array
     */
    protected $types;
    /**
     * @param string $filename
     */
    protected function __construct($filename)
    {
        $this->types = array();
        $this->parseXsdTypes($filename);
    }
    /**
     * @param string $filename
     * @return XsdTypes
     */
    protected function parseXsdTypes($filename)
    {
        $this->types = $this->parseSimpleArray($filename, self::MAIN_KEY);
        return $this;
    }
    /**
     * @param string options's file to parse
     * @return XsdTypes
     */
    public static function instance($filename = null)
    {
        return parent::instance(empty($filename) ? dirname(__FILE__) . '/../Resources/config/xsd_types.yml' : $filename);
    }
    /**
     * @param string $xsdType
     * @return bool
     */
    public function isXsd($xsdType)
    {
        return array_key_exists($xsdType, $this->types);
    }
    /**
     * @param string $xsdType
     * @return string
     */
    public function phpType($xsdType)
    {
        return $this->isXsd($xsdType) ? $this->types[$xsdType] : '';
    }
}
