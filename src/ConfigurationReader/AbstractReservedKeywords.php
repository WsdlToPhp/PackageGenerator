<?php

namespace WsdlToPhp\PackageGenerator\ConfigurationReader;

class AbstractReservedKeywords extends AbstractYamlReader
{
    /**
     * @var string
     */
    const MAIN_KEY = 'reserved_keywords';
    /**
     * @var string
     */
    const CASE_SENSITIVE_KEY = 'case_sensitive';
    /**
     * @var string
     */
    const CASE_INSENSITIVE_KEY = 'case_insensitive';
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
     * @return AbstractReservedKeywords
     */
    protected function parseReservedKeywords($filename)
    {
        $allKeywords = $this->parseSimpleArray($filename, self::MAIN_KEY);
        $caseSensitiveKeywords = $allKeywords[self::CASE_SENSITIVE_KEY];
        $caseInsensitiveKeywords = $allKeywords[self::CASE_INSENSITIVE_KEY];

        foreach ($caseInsensitiveKeywords as $index => $keyword) {
            $caseInsensitiveKeywords[$index] = strtolower($keyword);
        }

        $this->keywords = array(
            self::CASE_SENSITIVE_KEY => $caseSensitiveKeywords,
            self::CASE_INSENSITIVE_KEY => $caseInsensitiveKeywords
        );
        return $this;
    }
    /**
     * @throws \InvalidArgumentException
     * @param string options's file to parse
     * @return AbstractReservedKeywords
     */
    public static function instance($filename)
    {
        return parent::instance($filename);
    }
    /**
     * @param string $keyword
     * @return bool
     */
    public function is($keyword)
    {
        return in_array($keyword, $this->keywords[self::CASE_SENSITIVE_KEY], true)
            || in_array(strtolower($keyword), $this->keywords[self::CASE_INSENSITIVE_KEY], true);
    }
}
