<?php

namespace WsdlToPhp\PackageGenerator\File\Validation;

class ListRule extends AbstractSetOfValuesRule
{
    /**
     * @return string
     */
    protected function name()
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
