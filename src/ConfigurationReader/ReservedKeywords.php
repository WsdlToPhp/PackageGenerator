<?php

namespace WsdlToPhp\PackageGenerator\ConfigurationReader;

class ReservedKeywords extends AbstractYamlReader
{
    /**
     * @var string
     */
    const MAIN_KEY = 'reserved_keywords';
    /**
     * List of PHP reserved keywords from config file
     * @var array
     */
    protected $keywords;
    /**
     * @param string $filename
     */
    protected function __construct($filename)
    {
        $this->keywords = array();
        $this->parseReservedKeywords($filename);
    }
    /**
     * @param string $filename
     * @return ReservedKeywords
     */
    protected function parseReservedKeywords($filename)
    {
        $this->keywords = $this->parseSimpleArray($filename, self::MAIN_KEY);
        return $this;
    }
    /**
     * @param string options's file to parse
     * @return ReservedKeywords
     */
    public static function instance($filename = null)
    {
        return parent::instance(empty($filename) ? dirname(__FILE__) . '/../resources/config/reserved_keywords.yml' : $filename);
    }
    /**
     * @param string $keyword
     * @return bool
     */
    public function is($keyword)
    {
        return in_array($keyword, $this->keywords, true);
    }
}
