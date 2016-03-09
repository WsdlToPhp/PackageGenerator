<?php

namespace WsdlToPhp\PackageGenerator\File\Validation;

class IntRule extends AbstractRule
{
    /**
     * @see \WsdlToPhp\PackageGenerator\File\Validation\AbstractValidation::addRule()
     * @param string $parameterName
     * @param mixed $value
     * @param bool $itemType
     * @return IntRule
     */
    public function applyRule($parameterName, $value, $itemType = false)
    {
        $this
            ->getMethod()
                ->addChild('// validation for constraint: int')
                ->addChild(sprintf('if (!is_null($%1$s) && !is_int($%1$s)) {', $parameterName))
                    ->addChild($this->getMethod()->getIndentedString(sprintf('throw new \InvalidArgumentException(sprintf(\'Invalid value, please provide an int, "%%s" given\', gettype($%s)), __LINE__);', $parameterName), 1))
                ->addChild('}');
        return $this;
    }
}
