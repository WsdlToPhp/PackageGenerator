<?php

namespace WsdlToPhp\PackageGenerator\File\Validation;

use WsdlToPhp\PackageGenerator\Model\Struct;

class ChoiceRule extends AbstractRule
{
    /**
     * @see \WsdlToPhp\PackageGenerator\File\Validation\AbstractValidation::addRule()
     * @param string $parameterName
     * @param mixed $value
     * @param bool $itemType
     * @return ChoiceRule
     */
    public function applyRule($parameterName, $value, $itemType = false)
    {
        if (is_array($value) && 0 < count($value)) {
            $this->getMethod()
                ->addChild('// validation(s) for constraint: choice');

            $attribute = $this->getAttribute();
            $struct = $attribute->getOwner();
            foreach ($value as $choiceName) {
                if ($choiceName !== $attribute->getName() && $choiceAttribute = $struct->getAttribute($choiceName)) {
                    $this->getMethod()
                        ->addChild(sprintf('if (isset($this->%s)) {', $choiceAttribute->getCleanName()))
                        ->addChild($this->getMethod()->getIndentedString(sprintf('throw new \InvalidArgumentException(\'The property %s can\\\'t be set as the property %s is already set. Only one property must be set among these properties: %s.\');', $attribute->getName(), $choiceAttribute->getName(), implode(', ', $value)), 1))
                        ->addChild(sprintf('}'));
                }
            }
        }
        return $this;
    }
}
