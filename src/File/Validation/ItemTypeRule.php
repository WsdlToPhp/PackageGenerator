<?php

namespace WsdlToPhp\PackageGenerator\File\Validation;

use WsdlToPhp\PackageGenerator\Model\StructAttribute;
use WsdlToPhp\PackageGenerator\Model\Struct;
use WsdlToPhp\PackageGenerator\File\AbstractModelFile;

class ItemTypeRule extends AbstractRule
{
    /**
     * @see \WsdlToPhp\PackageGenerator\File\Validation\AbstractValidation::addRule()
     * @param string $parameterName
     * @param mixed $value
     * @param bool $itemType
     * @return ItemTypeRule
     */
    public function applyRule($parameterName, $value, $itemType = false)
    {
        $this->getMethod()
            ->addChild($this->getMethod()->getIndentedString('// validation for constraint: itemType', $itemType ? 0 : 1))
            ->addChild($this->getMethod()->getIndentedString(sprintf('if (!%s) {', $this->getItemSanityCheck($this->getAttribute(), $parameterName)), $itemType ? 0 : 1))
            ->addChild($this->getMethod()->getIndentedString(sprintf('throw new \InvalidArgumentException(sprintf(\'The %1$s property can only contain items of %2$s, "%%s" given\', is_object($%3$s) ? get_class($%3$s) : gettype($%3$s)), __LINE__);', $this->getAttribute()->getCleanName(), $this->getFile()->getStructAttributeType($this->getAttribute(), true), $parameterName), $itemType ? 1 : 2))
            ->addChild($this->getMethod()->getIndentedString('}', $itemType ? 0 : 1));
        return $this;
    }
    /**
     * The second case which used PHP native functions is volontary limited by the native functions provided by PHP,
     * and the possible types defined in xsd_types.yml
     * @param StructAttribute $attribute
     * @param string $itemName
     * @return string
     */
    protected function getItemSanityCheck(StructAttribute $attribute, $itemName)
    {
        $model = $this->getFile()->getModelFromStructAttribute($attribute);
        $sanityCheck = 'false';
        if ($model instanceof Struct && ($model->getIsStruct() || ($model->isArray() && $model->getInheritanceStruct() instanceof Struct))) {
            $sanityCheck = sprintf('$%s instanceof %s', $itemName, $this->getFile()->getStructAttributeType($attribute, true));
        } else {
            switch (AbstractModelFile::getPhpType($this->getFile()->getStructAttributeType($attribute))) {
                case 'int':
                    $sanityCheck = 'is_numeric($%s)';
                    break;
                case 'bool':
                    $sanityCheck = 'is_bool($%s)';
                    break;
                case 'float':
                    $sanityCheck = 'is_float($%s)';
                    break;
                case 'string':
                    $sanityCheck = 'is_string($%s)';
                    break;
            }
            $sanityCheck = sprintf($sanityCheck, $itemName);
        }
        return $sanityCheck;
    }
}
