<?php

namespace WsdlToPhp\PackageGenerator\File\Validation;

class BooleanRule extends AbstractRule
{
    /**
     * @see \WsdlToPhp\PackageGenerator\File\Validation\AbstractValidation::addRule()
     * @param string $parameterName
     * @param mixed $value
     * @param bool $itemType
     * @return BooleanRule
     */
    public function applyRule($parameterName, $value, $itemType = false)
    {
        $this->getMethod()
            ->addChild('// validation for constraint: boolean')
            ->addChild(sprintf('if (!is_null($%1$s) && !is_bool($%1$s)) {', $parameterName))
            ->addChild($this->getMethod()->getIndentedString(sprintf('throw new \InvalidArgumentException(sprintf(\'Invalid value, please provide a bool, "%%s" given\', gettype($%s)), __LINE__);', $parameterName), 1))
            ->addChild('}');
        return $this;
    }
}
