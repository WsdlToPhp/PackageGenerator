<?php

namespace WsdlToPhp\PackageGenerator\File\Validation;

abstract class AbstractMinMaxRule extends AbstractRule
{

    /**
     * Symbol to use for max rule
     * @var string
     */
    const SYMBOL_MAX_INCLUSIVE = '>';

    /**
     * Symbol to use for max exclusive rule
     * @var string
     */
    const SYMBOL_MAX_EXCLUSIVE = '>=';

    /**
     * Symbol to use for min rule
     * @var string
     */
    const SYMBOL_MIN_INCLUSIVE = '<';

    /**
     * Symbol to use for min exclusive rule
     * @var string
     */
    const SYMBOL_MIN_EXCLUSIVE = '<=';

    /**
     * Symbol to use for strict rule
     * @var string
     */
    const SYMBOL_STRICT = '!==';

    /**
     * Must return the comparison symbol
     * @return string
     */
    abstract public function symbol();

    /**
     * @return string
     */
    final public function comparisonString()
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
