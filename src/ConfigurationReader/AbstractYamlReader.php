<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\ConfigurationReader;

use Symfony\Component\Yaml\Parser;

abstract class AbstractYamlReader
{
    protected static array $instances;

    protected string $filename;

    abstract protected function __construct(string $filename);

    abstract public static function getDefaultConfigurationPath(): string;

    public static function instance(?string $filename = null): self
    {
        $loadFilename = empty($filename) ? static::getDefaultConfigurationPath() : $filename;
        if (empty($loadFilename) || !is_file($loadFilename)) {
            throw new \InvalidArgumentException(sprintf('Unable to locate file "%s"', $loadFilename), __LINE__);
        }

        $key = sprintf('%s_%s', static::class, $loadFilename);
        if (!isset(self::$instances[$key])) {
            self::$instances[$key] = new static($loadFilename);
        }

        return self::$instances[$key];
    }

    /**
     * For tests purpose only!
     */
    public static function resetInstances(): void
    {
        self::$instances = [];
    }

    protected function loadYaml(string $filename)
    {
        $ymlParser = new Parser();

        return $ymlParser->parse(file_get_contents($filename));
    }

    protected function parseSimpleArray(string $filename, string $mainKey): array
    {
        $values = $this->loadYaml($filename);
        if (!array_key_exists($mainKey, $values)) {
            throw new \InvalidArgumentException(sprintf('Unable to find section "%s" in "%s"', $mainKey, $filename), __LINE__);
        }

        return $values[$mainKey];
    }
}
