<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\ConfigurationReader;

final class XsdTypes extends AbstractYamlReader
{
    public const MAIN_KEY = 'xsd_types';
    public const ANONYMOUS_KEY = 'anonymous';

    /**
     * This type is returned by the \SoapClient class when
     * it does not succeed to define the type of a struct or an attribute.
     */
    public const ANONYMOUS_TYPE = '/anonymous\d+/';

    protected array $types = [];

    protected function __construct(string $filename)
    {
        $this->parseXsdTypes($filename);
    }

    public static function instance(?string $filename = null): self
    {
        return parent::instance($filename);
    }

    public static function getDefaultConfigurationPath(): string
    {
        return __DIR__.'/../resources/config/xsd_types.yml';
    }

    public function isXsd(string $xsdType): bool
    {
        return array_key_exists($xsdType, $this->types) || self::isAnonymous($xsdType);
    }

    public static function isAnonymous(string $xsdType): bool
    {
        return (bool) preg_match(self::ANONYMOUS_TYPE, $xsdType);
    }

    public function phpType(string $xsdType): string
    {
        return self::isAnonymous($xsdType) ? $this->types[self::ANONYMOUS_KEY] : ($this->isXsd($xsdType) ? $this->types[$xsdType] : '');
    }

    protected function parseXsdTypes(string $filename): self
    {
        $this->types = $this->parseSimpleArray($filename, self::MAIN_KEY);

        return $this;
    }
}
