<?php

namespace WsdlToPhp\PackageGenerator\File\Validation;

class ArrayRule extends AbstractSetOfValuesRule
{

    /**
     * @return string
     */
    public function name()
    {
        return 'array';
    }

    /**
     * @return bool
     */
    protected function mustApplyRuleOnAttribute()
    {
        return $this->getAttribute()->isArray();
    }
}
