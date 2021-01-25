<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\File\Validation;

use WsdlToPhp\PackageGenerator\Model\Struct;

final class ItemTypeRule extends AbstractRule
{
    public function name(): string
    {
        return 'itemType';
    }

    public function testConditions(string $parameterName, $value, bool $itemType = false): string
    {
        return sprintf('%s', $this->getItemSanityCheck($parameterName));
    }

    public function exceptionMessageOnTestFailure(string $parameterName, $value, bool $itemType = false): string
    {
        return sprintf('sprintf(\'The %1$s property can only contain items of type %2$s, %%s given\', is_object($%3$s) ? get_class($%3$s) : (is_array($%3$s) ? implode(\', \', $%3$s) : gettype($%3$s)))', $this->getAttribute()->getCleanName(), $this->getFile()->getStructAttributeTypeAsPhpType($this->getAttribute(), false), $parameterName);
    }

    /**
     * The second case which used PHP native functions is voluntarily limited by the native functions provided by PHP,
     * and the possible types defined in xsd_types.yml.
     */
    protected function getItemSanityCheck(string $itemName): string
    {
        $model = $this->getFile()->getModelFromStructAttribute($this->getAttribute());
        $sanityCheck = 'false';
        if ($model instanceof Struct && !$model->isList() && ($model->isStruct() || ($model->isArray() && $model->getInheritanceStruct() instanceof Struct))) {
            $sanityCheck = sprintf('!$%s instanceof %s', $itemName, $this->getFile()->getStructAttributeTypeAsPhpType($this->getAttribute(), false));
        } elseif ($this->getAttribute()->isXml()) {
            $sanityCheck = $this->getRules()->getXmlRule()->testConditions($itemName, null, true);
        } else {
            $type = $this->getFile()->getStructAttributeTypeAsPhpType($this->getAttribute(), false);
            if ($rule = $this->getRules()->getRule($type)) {
                $sanityCheck = $rule->testConditions($itemName, null, true);
            }
        }

        return $sanityCheck;
    }
}
