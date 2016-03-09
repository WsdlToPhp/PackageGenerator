<?php

namespace WsdlToPhp\PackageGenerator\File\Validation;

use WsdlToPhp\PackageGenerator\File\StructEnum;
use WsdlToPhp\PackageGenerator\Model\Struct;

class EnumerationRule extends AbstractRule
{
    /**
     * @see \WsdlToPhp\PackageGenerator\File\Validation\AbstractValidation::addRule()
     * @param string $parameterName
     * @param mixed $value
     * @param bool $itemType
     * @return EnumerationRule
     */
    public function applyRule($parameterName, $value, $itemType = false)
    {
        $attribute = $this->getAttribute();
        if (($model = $this->getFile()->getRestrictionFromStructAttribute($attribute)) instanceof Struct) {
            $this
                ->getMethod()
                    ->addChild('// validation for constraint: enumeration')
                    ->addChild(sprintf('if (!%s::%s($%s)) {', $model->getPackagedName(true), StructEnum::METHOD_VALUE_IS_VALID, $parameterName))
                        ->addChild($this->getMethod()->getIndentedString(sprintf('throw new \InvalidArgumentException(sprintf(\'Value "%%s" is invalid, please use one of: %%s\', $%s, implode(\', \', %s::%s())), __LINE__);', $parameterName, $model->getPackagedName(true), StructEnum::METHOD_GET_VALID_VALUES), 1))
                    ->addChild('}');
        }
        return $this;
    }
}
