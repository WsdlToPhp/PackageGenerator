<?php

namespace WsdlToPhp\PackageGenerator\File\Validation;

class TotalDigitsRule extends AbstractRule
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
                ->addChild(sprintf('if (is_float($%1$s) && strlen(str_replace(array(\' \', \'.\', \'-\', \'+\'), \'\', $%1$s)) !== %2$d) {', $parameterName, $value))
                    ->addChild($this->getMethod()->getIndentedString(sprintf('throw new \InvalidArgumentException(sprintf(\'Invalid value, the value must at most contain %1$d digits, "%%d" given\', strlen(substr($%2$s, strpos($%2$s, \'.\')))), __LINE__);', $value, $parameterName), 1))
                ->addChild('}');
        return $this;
    }
}
