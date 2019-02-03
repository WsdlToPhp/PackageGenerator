<?php

namespace WsdlToPhp\PackageGenerator\File\Validation;

use WsdlToPhp\PackageGenerator\Model\Struct;
use WsdlToPhp\PhpGenerator\Element\PhpFunctionParameter;
use WsdlToPhp\PhpGenerator\Element\PhpMethod;

abstract class AbstractSetOfValuesRule extends AbstractRule
{

    /**
     * Must check the attribute validity according to the current rule
     * @return bool
     */
    abstract protected function mustApplyRuleOnAttribute();

    /**
     * @param string $parameterName
     * @param mixed $value
     * @param bool $itemType
     * @return string
     */
    public function testConditions($parameterName, $value, $itemType = false)
    {
        $test = '';
        if ($this->mustApplyRuleOnAttribute()) {
            $this->addValidationMethod($parameterName, $value);
            $test = sprintf('\'\' !== (%s = self::%s($%s))', self::getErrorMessageVariableName($parameterName), $this->getValidationMethodName($parameterName), $parameterName);
        }
        return $test;
    }

    /**
     * @param string $parameterName
     * @param mixed $value
     * @param bool $itemType
     * @return string
     */
    public function exceptionMessageOnTestFailure($parameterName, $value, $itemType = false)
    {
        return self::getErrorMessageVariableName($parameterName);
    }

    /**
     * @param string $parameterName
     * @param mixed $value
     */
    protected function addValidationMethod($parameterName, $value)
    {
        $method = new PhpMethod($this->getValidationMethodName($parameterName), [
            new PhpFunctionParameter('values', [], 'array'),
        ], PhpMethod::ACCESS_PUBLIC, false, true);
        $model = $this->getFile()->getRestrictionFromStructAttribute($this->getAttribute());
        $itemName = sprintf('%s%sItem', lcfirst($this->getFile()->getModel()->getCleanName(false)), ucfirst($this->getAttribute()->getCleanName()));
        $rules = clone $this->getRules();

        if ($model instanceof Struct) {
            $rule = $rules->getEnumerationRule();
        } else {
            $rule = $rules->setMethod($method)->getItemTypeRule();
        }

        $method
            ->addChild('$message = \'\';')
            ->addChild('$invalidValues = [];')
            ->addChild(sprintf('foreach ($values as $%s) {', $itemName))
            ->addChild($method->getIndentedString($rule->validationRuleComment($value), 1))
            ->addChild($method->getIndentedString(sprintf('if (%s) {', $rule->testConditions($itemName, null)), 1))
            ->addChild($method->getIndentedString(sprintf('$invalidValues[] = %s;', sprintf('is_object($%1$s) ? get_class($%1$s) : sprintf(\'%%s(%%s)\', gettype($%1$s), var_export($%1$s, true))', $itemName)), 2))
            ->addChild($method->getIndentedString('}', 1))
            ->addChild('}')
            ->addChild('if (!empty($invalidValues)) {')
            ->addChild($method->getIndentedString(sprintf('$message = %s;', $rule->exceptionMessageOnTestFailure('invalidValues', null)), 1))
            ->addChild('}')
            ->addChild('unset($invalidValues);')
            ->addChild('return $message;');
        $this->getMethods()->add($method);
    }

    /**
     * @param string $parameterName
     * @return string
     */
    protected function getValidationMethodName($parameterName)
    {
        return sprintf('validate%sForArrayConstraintsFrom%s', ucfirst($parameterName), ucFirst($this->getMethod()->getName()));
    }

    /**
     * @param string $parameterName
     * @return string
     */
    public static function getErrorMessageVariableName($parameterName)
    {
        return sprintf('$%sArrayErrorMessage', $parameterName);
    }
}
