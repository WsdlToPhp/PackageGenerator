<?php

namespace WsdlToPhp\PackageGenerator\ConfigurationReader;

class XsdTypes extends AbstractYamlReader
{
    /**
     * @var string
     */
    const MAIN_KEY = 'xsd_types';
    /**
     * This type is returned by the \SoapClient class when
     * it does not succeed to define the type of a struct or an attribute
     * @var string
     */
    const ANONYMOUS_TYPE = '/anonymous\d+/';
    /**
     * @var string
     */
    const ANONYMOUS_KEY = 'anonymous';
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
        $this->types = [];
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
     * @param string $filename options's file to parse
     * @return XsdTypes
     */
    public static function instance($filename = null)
    {
        return parent::instance(empty($filename) ? __DIR__ . '/../resources/config/xsd_types.yml' : $filename);
    }
    /**
     * @param string $xsdType
     * @return bool
     */
    public function isXsd($xsdType)
    {
        return array_key_exists($xsdType, $this->types) || self::isAnonymous($xsdType);
    }
    /**
     * @param string $xsdType
     * @return bool
     */
    public static function isAnonymous($xsdType)
    {
        return (bool) preg_match(self::ANONYMOUS_TYPE, $xsdType);
    }
    /**
     * @param string $xsdType
     * @return string
     */
    public function phpType($xsdType)
    {
        return $this->isAnonymous($xsdType) ? $this->types[self::ANONYMOUS_KEY] : ($this->isXsd($xsdType) ? $this->types[$xsdType] : '');
    }
}
