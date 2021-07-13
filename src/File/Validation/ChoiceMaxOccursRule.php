<?php

namespace WsdlToPhp\PackageGenerator\File\Validation;

class ChoiceMaxOccursRule extends MaxOccursRule
{
    /**
     * @return string
     */
    public function name()
    {
        return 'choiceMaxOccurs';
    }
}
