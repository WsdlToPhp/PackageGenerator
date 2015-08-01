<?php

namespace WsdlToPhp\PackageGenerator\ConfigurationReader;

class XsdTypes extends AbstractYamlReader
{
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
        $types = $this->loadYaml($filename);
        if (!isset($types['xsd_types'])) {
            throw new \InvalidArgumentException(sprintf('Unable to find section xsd_types in "%s"', $filename), __LINE__);
        }
        $this->types = array_merge($this->types, $types['xsd_types']);
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
     * @return bool
     */
    public function isXsd($xsdType)
    {
        return array_key_exists($xsdType, $this->types);
    }
    /**
     * @return string
     */
    public function phpType($xsdType)
    {
        return $this->isXsd($xsdType) ? $this->types[$xsdType] : '';
    }
}
