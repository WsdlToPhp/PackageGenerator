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
                ->addChild(sprintf('if (is_scalar($%1$s) && !preg_match(\'/%2$s/\', $%1$s)) {', $parameterName, $value))
                    ->addChild($this->getMethod()->getIndentedString(sprintf('throw new \InvalidArgumentException(sprintf(\'Invalid value, please provide a scalar value that matches "%s", "%%s" given\', var_export($%s, true)), __LINE__);', str_replace("'", "\'", $value), $parameterName), 1))
                ->addChild('}');
        return $this;
    }
}
