<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\File\Validation;

abstract class AbstractMinMaxRule extends AbstractRule
{
    public const SYMBOL_MAX_INCLUSIVE = '>';
    public const SYMBOL_MAX_EXCLUSIVE = '>=';
    public const SYMBOL_MIN_INCLUSIVE = '<';
    public const SYMBOL_MIN_EXCLUSIVE = '<=';
    public const SYMBOL_STRICT = '!==';

    /**
     * Must return the comparison symbol.
     */
    abstract public function symbol(): string;

    final public function comparisonString(): string
    {
        switch ($this->symbol()) {
            case self::SYMBOL_MAX_INCLUSIVE:
                $comparison = 'less than or equal to';

                break;

            case self::SYMBOL_MIN_INCLUSIVE:
                $comparison = 'greater than or equal to';

                break;

            case self::SYMBOL_MIN_EXCLUSIVE:
                $comparison = 'greater than';

                break;

            case self::SYMBOL_MAX_EXCLUSIVE:
                $comparison = 'less than';

                break;

            case self::SYMBOL_STRICT:
                $comparison = 'equal to';

                break;

            default:
                throw new \InvalidArgumentException(sprintf('Invalid value %s returned by symbol() method, can\'t determine comparison string', $this->symbol()));
        }

        return $comparison;
    }
}
