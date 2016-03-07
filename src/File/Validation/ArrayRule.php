<?php

namespace WsdlToPhp\PackageGenerator\File\Validation;

use WsdlToPhp\PackageGenerator\File\StructEnum;
use WsdlToPhp\PackageGenerator\Model\Struct;

class ArrayRule extends AbstractRule
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
        if ($this->getAttribute()->isArray()) {
            $model = $this->getFile()->getRestrictionFromStructAttribute($this->getAttribute());
            $itemName = sprintf('%s%sItem', lcfirst($this->getFile()->getModel()->getCleanName(false)), ucfirst($this->getAttribute()->getCleanName()));
            if ($model instanceof Struct) {
                $this
                    ->getMethod()
                        ->addChild('$invalidValues = array();')
                        ->addChild(sprintf('foreach ($%s as $%s) {', $parameterName, $itemName))
                            ->addChild($this->getMethod()->getIndentedString(sprintf('if (!%s::%s($%s)) {', $model->getPackagedName(true), StructEnum::METHOD_VALUE_IS_VALID, $itemName), 1))
                                ->addChild($this->getMethod()->getIndentedString(sprintf('$invalidValues[] = var_export($%s);', $itemName), 2))
                            ->addChild($this->getMethod()->getIndentedString('}', 1))
                        ->addChild('}')
                        ->addChild('if (!empty($invalidValues)) {')
                            ->addChild($this->getMethod()->getIndentedString(sprintf('throw new \InvalidArgumentException(sprintf(\'Value(s) "%%s" is/are invalid, please use one of: %%s\', implode(\', \', $invalidValues), implode(\', \', %s::%s())), __LINE__);', $model->getPackagedName(true), StructEnum::METHOD_GET_VALID_VALUES), 1))
                        ->addChild('}');
            } else {
                $this->getMethod()->addChild(sprintf('foreach ($%s as $%s) {', $parameterName, $itemName));
                $this->getRules()->getItemTypeRule()->applyRule($itemName, true);
                $this->getMethod()->addChild('}');
            }
        }
        return $this;
    }
}
