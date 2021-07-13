<?php

namespace WsdlToPhp\PackageGenerator\File\Validation;

class ChoiceMinOccursRule extends MinOccursRule
{
    /**
     * @return string
     */
    public function name()
    {
        return 'choiceMinOccurs';
    }
}
