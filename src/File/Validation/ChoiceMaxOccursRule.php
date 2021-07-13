<?php

namespace WsdlToPhp\PackageGenerator\File\Validation;

class ChoiceMaxOccursRule extends MaxOccursRule
{
    public function name(): string
    {
        return 'choiceMaxOccurs';
    }
}
