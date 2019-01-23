<?php

namespace WsdlToPhp\PackageGenerator\File\Validation;

use WsdlToPhp\PackageGenerator\Model\StructAttribute;
use WsdlToPhp\PhpGenerator\Element\PhpFunctionParameter;
use WsdlToPhp\PhpGenerator\Element\PhpMethod;

class UnionRule extends AbstractRule
{

    /**
     * @return string
     */
    public function name()
    {
        return 'union';
    }

    /**
     * @param string $parameterName
     * @param mixed $value
     * @param bool $itemType
     * @return string
     */
    public function testConditions($parameterName, $value, $itemType = false)
    {
        if (is_array($value) && 0 < count($value)) {
            $this->addValidationMethod($parameterName, $value);
            return sprintf('\'\' !== ($message = self::%s($%s))', $this->getValidationMethodName($parameterName), $parameterName);
        }
    }

    /**
     * @param string $parameterName
     * @param mixed $value
     * @param bool $itemType
     * @return string
     */
    public function exceptionMessageOnTestFailure($parameterName, $value, $itemType = false)
    {
        return '$message';
    }

    /**
     * @param $parameterName
     * @param mixed $unionValues
     */
    protected function addValidationMethod($parameterName, array $unionValues)
    {
        $method = new PhpMethod('temp');
        $rules = clone $this->getRules();
        $rules->setMethod($method);

        // gather validation rules
        foreach ($unionValues as $unionValue) {
            $rules->setAttribute(new StructAttribute($this->getGenerator(), 'any', $unionValue));
            $rules->applyRules('value');
        }

        // adapt content, remove duplicated rules
        // duplicated rules is base don the fact that validation rules are composed by 4 lines so we check existing rule every 4-line block of text
        $exceptions = 0;
        $exceptionsTests = [];
        $exceptionsArray = [];
        $children = [];
        $methodChildren = $method->getChildren();
        $chilrenCount = count($methodChildren);
        $existingValidationRules = [];
        for ($i = 0;$i < $chilrenCount;$i += 4) {
            $validationRules = array_slice($methodChildren, ((int) $i / 4) * 4, 4);
            if (!in_array($validationRules, $existingValidationRules)) {
                foreach ($validationRules as $validationRule) {
                    if (is_string($validationRule) && false !== strpos($validationRule, 'throw new')) {
                        $exceptionName = sprintf('$exception%d', $exceptions++);
                        $validationRule = str_replace('throw new', sprintf('%s = new', $exceptionName), $validationRule);
                        $exceptionsTests[] = sprintf('isset(%s)', $exceptionName);
                        $exceptionsArray[] = $exceptionName;
                    }
                    $children[] = $validationRule;
                }
            }
            $existingValidationRules[] = $validationRules;
        }

        // populate final validation method
        $method = new PhpMethod($this->getValidationMethodName($parameterName), [
            new PhpFunctionParameter('value', PhpFunctionParameter::NO_VALUE),
        ], PhpMethod::ACCESS_PUBLIC, false, true);
        $method->addChild('$message = \'\';');
        array_walk($children, [
            $method,
            'addChild',
        ]);
        $method
            ->addChild(sprintf('if (%s) {', implode(' && ', $exceptionsTests)))
            ->addChild($method->getIndentedString(sprintf('$message = sprintf("The value %%s does not match any of the union rules: %s. See following errors:\n%%s", var_export($value, true), implode("\n", array_map(function(\InvalidArgumentException $e) { return sprintf(\' - %%s\', $e->getMessage()); }, [%s])));', implode(', ', $unionValues), implode(', ', $exceptionsArray)), 1))
            ->addChild('}')
            ->addChild(sprintf('unset(%s);', implode(', ', $exceptionsArray)))
            ->addChild('return $message;');
        $this->getMethods()->add($method);
    }

    /**
     * @param string $parameterName
     * @return string
     */
    protected function getValidationMethodName($parameterName)
    {
        return sprintf('validate%sForUnionConstraintsFrom%s', ucfirst($parameterName), ucFirst($this->getMethod()->getName()));
    }
}
