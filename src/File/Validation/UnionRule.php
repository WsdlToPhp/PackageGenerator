<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\File\Validation;

use WsdlToPhp\PackageGenerator\File\AbstractModelFile;
use WsdlToPhp\PackageGenerator\Model\StructAttribute;
use WsdlToPhp\PhpGenerator\Element\PhpFunctionParameter;
use WsdlToPhp\PhpGenerator\Element\PhpMethod;

/**
 * @see https://www.w3.org/TR/xmlschema-2/#union-datatypes
 */
final class UnionRule extends AbstractRule
{
    public const NAME = 'union';

    public function name(): string
    {
        return self::NAME;
    }

    public function testConditions(string $parameterName, $value, bool $itemType = false): string
    {
        $test = '';
        if (is_array($value) && 0 < count($value)) {
            $this->addValidationMethod($parameterName, $value);
            $test = sprintf('\'\' !== (%s = self::%s($%s))', self::getErrorMessageVariableName($parameterName), $this->getValidationMethodName($parameterName), $parameterName);
        }

        return $test;
    }

    public function exceptionMessageOnTestFailure(string $parameterName, $value, bool $itemType = false): string
    {
        return self::getErrorMessageVariableName($parameterName);
    }

    public static function getErrorMessageVariableName(string $parameterName): string
    {
        return sprintf('$%sUnionErrorMessage', $parameterName);
    }

    protected function addValidationMethod(string $parameterName, array $unionValues): void
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
                ->applyRules('value')
            ;
            unset($attribute);
        }

        // Adapt content, remove duplicated rules
        // The duplicated rules are based on the fact that validation rules are composed by 4 lines so we check existing rule every 4-line block of text
        $exceptions = 0;
        $exceptionsTests = [];
        $exceptionsArray = [];
        $children = [];
        $methodChildren = $method->getChildren();
        $childrenCount = count($methodChildren);
        $existingValidationRules = [];
        for ($i = 0; $i < $childrenCount; $i += 4) {
            $validationRules = array_slice($methodChildren, ((int) ($i / 4)) * 4, 4);
            if (!in_array($validationRules, $existingValidationRules)) {
                foreach ($validationRules as $validationRuleIndex => $validationRule) {
                    // avoid having a validation rule that has already been applied to the attribute within the method which is calling the validate method
                    if (0 === $validationRuleIndex) {
                        $ruleParts = [];
                        preg_match(sprintf('/%s\s(\w*)(.*)?/', self::VALIDATION_RULE_COMMENT_SENTENCE), $validationRule, $ruleParts);
                        if (3 === count($ruleParts) && !empty($ruleParts[1]) && $rules->getRule($ruleParts[1]) instanceof AbstractRule && Rules::hasRuleBeenAppliedToAttribute($rules->getRule($ruleParts[1]), $ruleParts[2], $this->getAttribute())) {
                            continue 2;
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
        ], AbstractModelFile::TYPE_STRING, PhpMethod::ACCESS_PUBLIC, false, true);
        $method->addChild('$message = \'\';');
        array_walk($children, [
            $method,
            'addChild',
        ]);

        $method
            ->addChild(sprintf('if (%s) {', implode(' && ', $exceptionsTests)))
            ->addChild($method->getIndentedString(sprintf('$message = sprintf("The value %%s does not match any of the union rules: %s. See following errors:\n%%s", var_export($value, true), implode("\n", array_map(function(InvalidArgumentException $e) { return sprintf(\' - %%s\', $e->getMessage()); }, [%s])));', implode(', ', $unionValues), implode(', ', $exceptionsArray)), 1))
            ->addChild('}')
            ->addChild(sprintf('unset(%s);', implode(', ', $exceptionsArray)))
            ->addChild('')
            ->addChild('return $message;')
        ;
        $this->getMethods()->add($method);
    }
}
