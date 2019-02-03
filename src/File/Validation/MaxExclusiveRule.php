<?php

namespace WsdlToPhp\PackageGenerator\File\Validation;

/**
 * Class MaxExclusiveRule
 * @link https://www.w3.org/TR/xmlschema-2/#rf-maxExclusive
 * @link https://www.w3.org/TR/xmlschema-2/#d0e11648 for Examples:
 *  dateTime	            duration	        result
 *  2000-01-12T12:13:14Z	P1Y3M5DT7H10M3.3S	2001-04-17T19:23:17.3Z
 *  2000-01	                -P3M                1999-10
 *  2000-01-12	            PT33H	            2000-01-13
 * Validation Rule: maxExclusive Valid
 * A value in an ·ordered· ·value space· is facet-valid with respect to ·maxExclusive·, determined as follows:
 *  - 1 if the ·numeric· property in {fundamental facets} is true, then the value ·must· be numerically less than {value};
 *  - 2 if the ·numeric· property in {fundamental facets} is false (i.e., {base type definition} is one of the date and time related datatypes), then the value ·must· be chronologically less than {value};
 */
class MaxExclusiveRule extends AbstractBoundRule
{

    /**
     * @return string
     */
    public function name()
    {
        return 'maxExclusive';
    }

    /**
     * @return string
     */
    public function symbol()
    {
        return self::SYMBOL_MAX_EXCLUSIVE;
    }
}
