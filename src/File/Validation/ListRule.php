<?php

namespace WsdlToPhp\PackageGenerator\File\Validation;

/**
 * Class ListRule
 * @link https://www.w3.org/TR/xmlschema-2/#list-datatypes
 */
class ListRule extends AbstractSetOfValuesRule
{

    /**
     * @return string
     */
    public function name()
    {
        return 'list';
    }

    /**
     * @return bool
     */
    protected function mustApplyRuleOnAttribute()
    {
        return $this->getAttribute()->isList();
    }
}
