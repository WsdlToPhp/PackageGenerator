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
        $this->parseWSdlClass();
    }
    /**
     * @param string $filename
     */
    protected function parseReservedKeywords($filename)
    {
        $keywords = $this->loadYaml($filename);
        if (!isset($keywords['reserved_keywords'])) {
            throw new \InvalidArgumentException(sprintf('Unable to find section reserved_keywords in "%s"', $filename));
        }
        $this->keywords = array_merge($this->keywords, $keywords['reserved_keywords']);
    }
    /**
     * Parses generated WsdlClass to avoid generating an overridden method
     */
    protected function parseWSdlClass()
    {
        if (is_file(dirname(__FILE__) . '/../Resources/templates/Default/Class.php')) {
            require_once dirname(__FILE__) . '/../Resources/templates/Default/Class.php';
            if (class_exists('PackageNameWsdlClass')) {
                $methods = get_class_methods('PackageNameWsdlClass');
                if (!empty($methods)) {
                    $this->keywords = array_merge($this->keywords, $methods);
                }
            }
        }
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
