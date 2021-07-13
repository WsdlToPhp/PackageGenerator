<?php

namespace WsdlToPhp\PackageGenerator\File\Validation;

class ChoiceMinOccursRule extends MinOccursRule
{
    public function name(): string
    {
        return 'choiceMinOccurs';
    }
}
