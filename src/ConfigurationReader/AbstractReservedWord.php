<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\ConfigurationReader;

abstract class AbstractReservedWord extends AbstractYamlReader
{
    public const MAIN_KEY = 'reserved_keywords';
    public const CASE_SENSITIVE_KEY = 'case_sensitive';
    public const CASE_INSENSITIVE_KEY = 'case_insensitive';

    protected array $keywords = [];

    protected function __construct(string $filename)
    {
        $this->parseReservedKeywords($filename);
    }

    public function is(string $keyword): bool
    {
        return in_array($keyword, $this->keywords[self::CASE_SENSITIVE_KEY], true) || in_array(mb_strtolower($keyword), $this->keywords[self::CASE_INSENSITIVE_KEY], true);
    }

    protected function parseReservedKeywords(string $filename): AbstractReservedWord
    {
        $allKeywords = $this->parseSimpleArray($filename, self::MAIN_KEY);
        $caseSensitiveKeywords = $allKeywords[self::CASE_SENSITIVE_KEY];
        $caseInsensitiveKeywords = array_map('strtolower', $allKeywords[self::CASE_INSENSITIVE_KEY]);
        $this->keywords = array_merge_recursive($this->keywords, [
            self::CASE_SENSITIVE_KEY => $caseSensitiveKeywords,
            self::CASE_INSENSITIVE_KEY => $caseInsensitiveKeywords,
        ]);

        return $this;
    }
}
