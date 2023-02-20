<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Model;

use WsdlToPhp\PackageGenerator\Generator\Generator;
use WsdlToPhp\PackageGenerator\Generator\Utils;

/**
 * Class StructValue stands for an enumeration value.
 */
final class StructValue extends AbstractModel
{
    public const MATCH_PATTERN = '/([[:upper:]]+[[:lower:]]*)|([[:lower:]]+)|(\d+)/';
    public const REPLACEMENT_PATTERN = '$1$2$3_';
    public const GENERIC_NAME_PREFIX = 'ENUM_VALUE_';
    public const VALUE_NAME_PREFIX = 'VALUE_';

    protected static array $uniqueConstants = [];

    protected int $index = 0;

    /**
     * Cleaned name of the element stored in order to avoid multiple call that would generate incremental name.
     */
    private ?string $cleanedName = null;

    public function __construct(Generator $generator, $name, int $index = 0, ?Struct $struct = null)
    {
        parent::__construct($generator, $name);
        $this
            ->setIndex($index)
            ->setOwner($struct)
        ;
    }

    public function getCleanName(bool $keepMultipleUnderscores = false): string
    {
        if ($this->cleanedName) {
            return $this->cleanedName;
        }

        if ($this->getGenerator()->getOptionGenericConstantsNames()) {
            return self::GENERIC_NAME_PREFIX.$this->getIndex();
        }

        $nameWithSeparatedWords = $this->getNameWithSeparatedWords($keepMultipleUnderscores);
        $key = self::constantSuffix($this->getOwner()->getName(), $nameWithSeparatedWords, $this->getIndex());

        return $this->cleanedName = self::VALUE_NAME_PREFIX.mb_strtoupper($nameWithSeparatedWords.($key ? '_'.$key : ''));
    }

    public function getNameWithSeparatedWords(bool $keepMultipleUnderscores = false): string
    {
        return trim(self::cleanString(preg_replace(self::MATCH_PATTERN, self::REPLACEMENT_PATTERN, (string) $this->getName()), $keepMultipleUnderscores), '_');
    }

    public function getValue()
    {
        return Utils::getValueWithinItsType($this->getName());
    }

    public function getIndex(): int
    {
        return $this->index;
    }

    public function setIndex(int $index): StructValue
    {
        if (0 > $index) {
            throw new \InvalidArgumentException(sprintf('The value\'s index must be a positive integer, "%s" given', var_export($index, true)));
        }
        $this->index = $index;

        return $this;
    }

    public function getOwner(): Struct
    {
        return parent::getOwner();
    }

    protected static function constantSuffix(string $structName, string $value, int $index): int
    {
        $key = mb_strtoupper($structName.'_'.$value);
        $indexedKey = $key.'_'.$index;
        if (array_key_exists($indexedKey, self::$uniqueConstants)) {
            return self::$uniqueConstants[$indexedKey];
        }
        if (!array_key_exists($key, self::$uniqueConstants)) {
            self::$uniqueConstants[$key] = 0;
        } else {
            ++self::$uniqueConstants[$key];
        }
        self::$uniqueConstants[$indexedKey] = self::$uniqueConstants[$key];

        return self::$uniqueConstants[$key];
    }

    protected function toJsonSerialize(): array
    {
        return [
            'index' => $this->index,
        ];
    }
}
