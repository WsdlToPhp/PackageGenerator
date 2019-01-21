<?php
/**
 * Created by PhpStorm.
 * User: mikael
 * Date: 21/01/19
 * Time: 12:32
 */

namespace WsdlToPhp\PackageGenerator\File\Validation;

use WsdlToPhp\PackageGenerator\File\StructEnum;
use WsdlToPhp\PackageGenerator\Model\Struct;

abstract class AbstractSetOfValuesRule extends AbstractRule
{
    /**
     * Name of the validation rule
     * @return string
     */
    abstract protected function name();

    /**
     * Must check the attribute validity according to the current rule
     * @return bool
     */
    abstract protected function mustApplyRuleOnAttribute();

    /**
     * @see \WsdlToPhp\PackageGenerator\File\Validation\AbstractValidation::applyRule()
     * @param string $parameterName
     * @param mixed $value
     * @param bool $itemType
     * @return ListRule
     */
    public function applyRule($parameterName, $value, $itemType = false)
    {
        if ($this->mustApplyRuleOnAttribute()) {
            $model = $this->getFile()->getRestrictionFromStructAttribute($this->getAttribute());
            $itemName = sprintf('%s%sItem', lcfirst($this->getFile()->getModel()->getCleanName(false)), ucfirst($this->getAttribute()->getCleanName()));
            $this->getMethod()->addChild(sprintf('// validation for constraint: %s', $this->name()));
            if ($model instanceof Struct) {
                $this->getMethod()
                    ->addChild('$invalidValues = array();')
                    ->addChild(sprintf('foreach ($%s as $%s) {', $parameterName, $itemName))
                    ->addChild($this->getMethod()->getIndentedString(sprintf('if (!%s::%s($%s)) {', $model->getPackagedName(true), StructEnum::METHOD_VALUE_IS_VALID, $itemName), 1))
                    ->addChild($this->getMethod()->getIndentedString(sprintf('$invalidValues[] = var_export($%s, true);', $itemName), 2))
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
