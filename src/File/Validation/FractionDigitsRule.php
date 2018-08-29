<?php

namespace WsdlToPhp\PackageGenerator\File\Validation;

class FractionDigitsRule extends AbstractRule
{
    /**
     * @see \WsdlToPhp\PackageGenerator\File\Validation\AbstractValidation::addRule()
     * @param string $parameterName
     * @param mixed $value
     * @param bool $itemType
     * @return FractionDigitsRule
     */
    public function applyRule($parameterName, $value, $itemType = false)
    {
        $this->getMethod()
            ->addChild('// validation for constraint: fractionDigits')
            ->addChild(sprintf('if (is_float($%1$s) && strlen(substr($%1$s, strpos($%1$s, \'.\') + 1)) > %2$d) {', $parameterName, $value))
            ->addChild($this->getMethod()->getIndentedString(sprintf('throw new \InvalidArgumentException(sprintf(\'Invalid value, the value must at most contain %1$d fraction digits, "%%d" given\', strlen(substr($%2$s, strpos($%2$s, \'.\') + 1))), __LINE__);', $value, $parameterName), 1))
            ->addChild('}');
        return $this;
    }
}
