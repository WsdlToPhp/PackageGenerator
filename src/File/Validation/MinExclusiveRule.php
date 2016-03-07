<?php

namespace WsdlToPhp\PackageGenerator\File\Validation;

class MinExclusiveRule extends AbstractRule
{
    /**
     * @see \WsdlToPhp\PackageGenerator\File\Validation\AbstractValidation::addRule()
     * @param string $parameterName
     * @param mixed $value
     * @param bool $itemType
     * @return Enumeration
     */
    public function applyRule($parameterName, $value, $itemType = false)
    {
        $this
            ->getMethod()
                ->addChild(sprintf('if (%s < %d) {', $parameterName, $value))
                    ->addChild($this->getMethod()->getIndentedString(sprintf('throw new \InvalidArgumentException(sprintf(\'Invalid value, the value must be superior to %d\, "%%s" given\', %s), __LINE__);', $value, $parameterName), 1))
                ->addChild('}');
        return $this;
    }
}
