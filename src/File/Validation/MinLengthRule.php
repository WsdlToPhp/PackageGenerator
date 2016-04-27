<?php

namespace WsdlToPhp\PackageGenerator\File\Validation;

class MinLengthRule extends AbstractRule
{
    /**
     * @see \WsdlToPhp\PackageGenerator\File\Validation\AbstractValidation::addRule()
     * @param string $parameterName
     * @param mixed $value
     * @param bool $itemType
     * @return MinLengthRule
     */
    public function applyRule($parameterName, $value, $itemType = false)
    {
        $this
            ->getMethod()
                ->addChild('// validation for constraint: minLength')
                ->addChild(sprintf('if ((is_scalar($%1$s) && strlen($%1$s) < %2$d) || (is_array($%1$s) && count($%1$s) < %2$d)) {', $parameterName, $value))
                    ->addChild($this->getMethod()->getIndentedString(sprintf('throw new \InvalidArgumentException(\'Invalid length, please provide an array with %1$d element(s) or a scalar of %1$d character(s) at least\', __LINE__);', $value), 1))
                ->addChild('}');
        return $this;
    }
}
