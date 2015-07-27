<?php

namespace WsdlToPhp\PackageGenerator\ConfigurationReader;

class ReservedKeywords extends AbstractYamlReader
{
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
        $keywords = $this->loadYaml($filename);
        if (!isset($keywords['reserved_keywords'])) {
            throw new \InvalidArgumentException(sprintf('Unable to find section reserved_keywords in "%s"', $filename), __LINE__);
        }
        $this->keywords = array_merge($this->keywords, $keywords['reserved_keywords']);
        return $this;
    }
    /**
     * @param string options's file to parse
     * @return ReservedKeywords
     */
    public static function instance($filename = null)
    {
        return parent::instance(empty($filename) ? dirname(__FILE__) . '/../Resources/config/reserved_keywords.yml' : $filename);
    }
    /**
     * @return bool
     */
    public function is($keyword)
    {
        return in_array($keyword, $this->keywords, true);
    }
}
