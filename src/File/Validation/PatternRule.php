<?php

namespace WsdlToPhp\PackageGenerator\File\Validation;

class PatternRule extends AbstractRule
{
    /**
     * @see \WsdlToPhp\PackageGenerator\File\Validation\AbstractValidation::addRule()
     * @param string $parameterName
     * @param mixed $value
     * @param bool $itemType
     * @return PatternRule
     */
    public function applyRule($parameterName, $value, $itemType = false)
    {
        $this
            ->getMethod()
                ->addChild('// validation for constraint: pattern')
                ->addChild(sprintf('if (!is_null($%1$s) && !preg_match(\'/%2$s/\', $%1$s)) {', $parameterName, $value))
                    ->addChild($this->getMethod()->getIndentedString(sprintf('throw new \InvalidArgumentException(sprintf(\'Invalid value, please provide an int, "%%s" given\', gettype($%s)), __LINE__);', $parameterName), 1))
                ->addChild('}');
        return $this;
    }
}
