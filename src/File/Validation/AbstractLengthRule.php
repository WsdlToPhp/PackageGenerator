<?php

namespace WsdlToPhp\PackageGenerator\File\Validation;

use WsdlToPhp\PhpGenerator\Element\PhpFunctionParameter;
use WsdlToPhp\PhpGenerator\Element\PhpMethod;

/**
 * Class AbstractLengthRule
 * Gathers [min|max|]Length rules
 * @package WsdlToPhp\PackageGenerator\File\Validation
 */
abstract class AbstractLengthRule extends AbstractMinMaxRule
{

    /**
     * @param string $parameterName
     * @param mixed $value
     * @param bool $itemType
     * @return string
     */
    final public function testConditions($parameterName, $value, $itemType = false)
    {
        if ($itemType || !$this->getAttribute()->isArray()) {
            $test = sprintf(($itemType ? '' : '!is_null($%1$s) && ') . 'mb_strlen($%1$s) %3$s %2$d', $parameterName, $value, $this->symbol());
        } else {
            $this->addValidationMethod($parameterName, $value);
            $test = sprintf('\'\' !== (%s = self::%s($%s))', $this->getErrorMessageVariableName($parameterName), $this->getValidationMethodName($parameterName), $parameterName);
        }
        return $test;
    }

    /**
     * @param string $parameterName
     * @param mixed $value
     * @param bool $itemType
     * @return string
     */
    final public function exceptionMessageOnTestFailure($parameterName, $value, $itemType = false)
    {
        if ($itemType || !$this->getAttribute()->isArray()) {
            $message = sprintf('sprintf(\'Invalid length of %%s, the number of characters/octets contained by the literal must be %s %s\', mb_strlen($%s))', $this->comparisonString(), is_array($value) ? implode(',', array_unique($value)) : $value, $parameterName);
        } else {
            $message = $this->getErrorMessageVariableName($parameterName);
        }
        return $message;
    }

    /**
     * @param string $parameterName
     * @param mixed $value
     */
    protected function addValidationMethod($parameterName, $value)
    {
        $method = new PhpMethod($this->getValidationMethodName($parameterName), [
            new PhpFunctionParameter('values', PhpFunctionParameter::NO_VALUE),
        ], PhpMethod::ACCESS_PUBLIC, false, true);
        $itemName = sprintf('%s%sItem', lcfirst($this->getFile()->getModel()->getCleanName(false)), ucfirst($this->getAttribute()->getCleanName()));

        $method
            ->addChild('$message = \'\';')
            ->addChild('$invalidValues = [];')
            ->addChild(sprintf('foreach ($values as $%s) {', $itemName))
            ->addChild($method->getIndentedString($this->validationRuleComment($value), 1))
            ->addChild($method->getIndentedString(sprintf('if (%s) {', $this->testConditions($itemName, $value, true)), 1))
            ->addChild($method->getIndentedString(sprintf('$invalidValues[] = var_export($%s, true);', $itemName), 2))
            ->addChild($method->getIndentedString('}', 1))
            ->addChild('}')
            ->addChild('if (!empty($invalidValues)) {')
            ->addChild($method->getIndentedString(sprintf('$message = sprintf(\'Invalid length for value(s) %%s, the number of characters/octets contained by the literal must be %s %s\', implode(\', \', $invalidValues));', $this->comparisonString(), $value), 1))
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
        return sprintf('validate%sFor%sConstraintFrom%s', ucfirst($parameterName), ucfirst($this->name()), ucFirst($this->getMethod()->getName()));
    }

    /**
     * @param string $parameterName
     * @return string
     */
    public function getErrorMessageVariableName($parameterName)
    {
        return sprintf('$%s%sErrorMessage', $parameterName, ucfirst($this->name()));
    }
}
