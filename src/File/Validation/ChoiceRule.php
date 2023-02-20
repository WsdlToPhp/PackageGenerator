<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\File\Validation;

use WsdlToPhp\PackageGenerator\File\AbstractModelFile;
use WsdlToPhp\PackageGenerator\File\Element\PhpFunctionParameter;
use WsdlToPhp\PackageGenerator\Model\StructAttribute;
use WsdlToPhp\PhpGenerator\Element\PhpMethod;

final class ChoiceRule extends AbstractRule
{
    public const NAME = 'choice';

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
        return sprintf('$%sChoiceErrorMessage', $parameterName);
    }

    protected function addValidationMethod(string $parameterName, array $choiceNames)
    {
        $attribute = $this->getAttribute();
        $struct = $attribute->getOwner();
        $choiceAttributes = [];
        foreach ($choiceNames as $choiceName) {
            if ($choiceName !== $attribute->getName() && $choiceAttribute = $struct->getAttribute($choiceName)) {
                $choiceAttributes[] = $choiceAttribute;
            }
        }

        $method = new PhpMethod($this->getValidationMethodName($parameterName), [
            new PhpFunctionParameter('value', PhpFunctionParameter::NO_VALUE),
        ], AbstractModelFile::TYPE_STRING);

        $method
            ->addChild('$message = \'\';')
            ->addChild('if (is_null($value)) {')
            ->addChild($method->getIndentedString('return $message;', 1))
            ->addChild('}')
            ->addChild('$properties = [')
        ;

        array_walk($choiceAttributes, function (StructAttribute $choiceAttribute) use ($method) {
            $method->addChild($method->getIndentedString(sprintf('%s,', var_export($choiceAttribute->getCleanName(), true)), 1));
        });

        $method
            ->addChild('];')
            ->addChild('try {')
            ->addChild($method->getIndentedString('foreach ($properties as $property) {', 1))
            ->addChild($method->getIndentedString('if (isset($this->{$property})) {', 2))
            ->addChild($method->getIndentedString(sprintf('throw new InvalidArgumentException(sprintf(\'The property %1$s can\\\'t be set as the property %%s is already set. Only one property must be set among these properties: %1$s, %%s.\', $property, implode(\', \', $properties)), __LINE__);', $attribute->getName()), 3))
            ->addChild($method->getIndentedString(sprintf('}'), 2))
            ->addChild($method->getIndentedString('}', 1))
            ->addChild('} catch (InvalidArgumentException $e) {')
            ->addChild($method->getIndentedString('$message = $e->getMessage();', 1))
            ->addChild('}')
            ->addChild('')
            ->addChild('return $message;')
        ;

        $this->getMethods()->add($method);
    }
}
