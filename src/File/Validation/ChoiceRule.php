<?php

namespace WsdlToPhp\PackageGenerator\File\Validation;

use WsdlToPhp\PackageGenerator\File\Element\PhpFunctionParameter;
use WsdlToPhp\PackageGenerator\Model\StructAttribute;
use WsdlToPhp\PhpGenerator\Element\PhpMethod;

class ChoiceRule extends AbstractRule
{

    /**
     * @return string
     */
    public function name()
    {
        return 'choice';
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
     * @param string[] $choiceNames
     */
    protected function addValidationMethod($parameterName, array $choiceNames)
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
        ]);

        $method
            ->addChild('$message = \'\';')
            ->addChild('if (is_null($value)) {')
            ->addChild($method->getIndentedString('return $message;', 1))
            ->addChild('}')
            ->addChild('$properties = [');

        array_walk($choiceAttributes, function (StructAttribute $choiceAttribute) use ($method) {
            $method->addChild($method->getIndentedString(sprintf('%s,', var_export($choiceAttribute->getCleanName(), true)), 1));
        });

        $method
            ->addChild('];')
            ->addChild('try {')
            ->addChild($method->getIndentedString('foreach ($properties as $property) {', 1))
            ->addChild($method->getIndentedString('if (isset($this->{$property})) {', 2))
            ->addChild($method->getIndentedString(sprintf('throw new \InvalidArgumentException(sprintf(\'The property %1$s can\\\'t be set as the property %%s is already set. Only one property must be set among these properties: %1$s, %%s.\', $property, implode(\', \', $properties)), __LINE__);', $attribute->getName()), 3))
            ->addChild($method->getIndentedString(sprintf('}'), 2))
            ->addChild($method->getIndentedString('}', 1))
            ->addChild('} catch (\InvalidArgumentException $e) {')
            ->addChild($method->getIndentedString('$message = $e->getMessage();', 1))
            ->addChild('}')
            ->addChild('return $message;');

        $this->getMethods()->add($method);
    }

    /**
     * @param string $parameterName
     * @return string
     */
    protected function getValidationMethodName($parameterName)
    {
        return sprintf('validate%sForChoiceConstraintsFrom%s', ucfirst($parameterName), ucFirst($this->getMethod()->getName()));
    }

    /**
     * @param string $parameterName
     * @return string
     */
    public static function getErrorMessageVariableName($parameterName)
    {
        return sprintf('$%sChoiceErrorMessage', $parameterName);
    }
}
