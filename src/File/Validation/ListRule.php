<?php

namespace WsdlToPhp\PackageGenerator\File\Validation;

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
