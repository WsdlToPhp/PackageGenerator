<?php

namespace WsdlToPhp\PackageGenerator\File\Validation;

use WsdlToPhp\PackageGenerator\Model\StructAttribute;
use WsdlToPhp\PhpGenerator\Element\PhpFunctionParameter;
use WsdlToPhp\PhpGenerator\Element\PhpMethod;

/**
 * Class ListRule
 * @link https://www.w3.org/TR/xmlschema-2/#union-datatypes
 */
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
        $test = '';
        if (is_array($value) && 0 < count($value)) {
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
     * @param string[] $unionValues
     */
    protected function addValidationMethod($parameterName, array $unionValues)
    {
        $method = new PhpMethod('temp');
        $rules = clone $this->getRules();
        $rules->setMethod($method);

        // gather validation rules
        foreach ($unionValues as $unionValue) {
            $attribute = new StructAttribute($this->getGenerator(), 'any', $unionValue);
            $attribute->setOwner($this->getAttribute()->getOwner());
            $rules
                ->setAttribute($attribute)
                ->applyRules('value');
            unset($attribute);
        }

        // adapt content, remove duplicated rules
        // duplicated rules is base don the fact that validation rules are composed by 4 lines so we check existing rule every 4-line block of text
        $exceptions = 0;
        $exceptionsTests = [];
        $exceptionsArray = [];
        $children = [];
        $methodChildren = $method->getChildren();
        $childrenCount = count($methodChildren);
        $existingValidationRules = [];
        for ($i = 0;$i < $childrenCount;$i += 4) {
            $validationRules = array_slice($methodChildren, ((int) $i / 4) * 4, 4);
            if (!in_array($validationRules, $existingValidationRules)) {
                foreach ($validationRules as $validationRuleIndex => $validationRule) {

                    // avoid having a validation rule that has already been applied to the attribute within the method which is calling the validate method
                    if (0 === $validationRuleIndex) {
                        $ruleParts = [];
                        preg_match(sprintf('/%s\s(\w*)(.*)?/', self::VALIDATION_RULE_COMMENT_SENTENCE), $validationRule, $ruleParts);
                        if (3 === count($ruleParts) && !empty($ruleParts[1]) && $rules->getRule($ruleParts[1]) instanceof AbstractRule && Rules::hasRuleBeenAppliedToAttribute($rules->getRule($ruleParts[1]), $ruleParts[2], $this->getAttribute())) {
                            continue(2);
                        }
                    }

                    if (is_string($validationRule) && false !== mb_strpos($validationRule, 'throw new')) {
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

    /**
     * @param string $parameterName
     * @return string
     */
    public static function getErrorMessageVariableName($parameterName)
    {
        return sprintf('$%sUnionErrorMessage', $parameterName);
    }
}
