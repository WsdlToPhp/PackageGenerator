<?php

namespace WsdlToPhp\PackageGenerator\File\Validation;

/**
 * Class MaxLengthRule
 * @link https://www.w3.org/TR/xmlschema-2/#rf-maxLength
 * Validation Rule: maxLength Valid
 * A value in a ·value space· is facet-valid with respect to ·maxLength·, determined as follows:
 *  - 1 if the {variety} is ·atomic· then
 *   - 1.1 if {primitive type definition} is string or anyURI, then the length of the value, as measured in characters ·must· be less than or equal to {value};
 *   - 1.2 if {primitive type definition} is hexBinary or base64Binary, then the length of the value, as measured in octets of the binary data, ·must· be less than or equal to {value};
 *   - 1.3 if {primitive type definition} is QName or NOTATION, then any {value} is facet-valid.
 *  - 2 if the {variety} is ·list·, then the length of the value, as measured in list items, ·must· be less than or equal to {value}
 */
class MaxLengthRule extends AbstractLengthRule
{

    /**
     * @return string
     */
    public function name()
    {
        return 'maxLength';
    }

    /**
     * @return string
     */
    public function symbol()
    {
        return self::SYMBOL_MAX_INCLUSIVE;
    }
}
