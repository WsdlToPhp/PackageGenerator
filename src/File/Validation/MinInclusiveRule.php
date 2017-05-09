<?php

namespace WsdlToPhp\PackageGenerator\File\Validation;

class MinInclusiveRule extends AbstractRule
{
    /**
     * @see \WsdlToPhp\PackageGenerator\File\Validation\AbstractValidation::addRule()
     * @param string $parameterName
     * @param mixed $value
     * @param bool $itemType
     * @return MinInclusiveRule
     */
    public function applyRule($parameterName, $value, $itemType = false)
    {
        $this->getMethod()
            ->addChild('// validation for constraint: minInclusive')
            ->addChild(sprintf('if ($%s < %d) {', $parameterName, $value))
            ->addChild($this->getMethod()->getIndentedString(sprintf('throw new \InvalidArgumentException(sprintf(\'Invalid value, the value must be superior or equal to %d\, "%%s" given\', $%s), __LINE__);', $value, $parameterName), 1))
            ->addChild('}');
        return $this;
    }
}
