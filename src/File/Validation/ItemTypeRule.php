<?php

namespace WsdlToPhp\PackageGenerator\File\Validation;

use WsdlToPhp\PackageGenerator\Model\Struct;
use WsdlToPhp\PackageGenerator\File\AbstractModelFile;

class ItemTypeRule extends AbstractRule
{

    /**
     * @return string
     */
    public function name()
    {
        return 'itemType';
    }

    /**
     * @param string $parameterName
     * @param mixed $value
     * @param bool $itemType
     * @return string
     */
    public function testConditions($parameterName, $value, $itemType = false)
    {
        return sprintf('%s', $this->getItemSanityCheck($parameterName));
    }

    /**
     * @param string $parameterName
     * @param mixed $value
     * @param bool $itemType
     * @return string
     */
    public function exceptionMessageOnTestFailure($parameterName, $value, $itemType = false)
    {
        return sprintf('sprintf(\'The %1$s property can only contain items of type %2$s, %%s given\', is_object($%3$s) ? get_class($%3$s) : (is_array($%3$s) ? implode(\', \', $%3$s) : gettype($%3$s)))', $this->getAttribute()->getCleanName(), $this->getFile()->getStructAttributeType($this->getAttribute(), true), $parameterName);
    }

    /**
     * The second case which used PHP native functions is voluntarily limited by the native functions provided by PHP,
     * and the possible types defined in xsd_types.yml
     * @param string $itemName
     * @return string
     */
    protected function getItemSanityCheck($itemName)
    {
        $model = $this->getFile()->getModelFromStructAttribute($this->getAttribute());
        $sanityCheck = 'false';
        if ($model instanceof Struct && !$model->isList() && ($model->isStruct() || ($model->isArray() && $model->getInheritanceStruct() instanceof Struct))) {
            $sanityCheck = sprintf('!$%s instanceof %s', $itemName, $this->getFile()->getStructAttributeType($this->getAttribute(), true));
        } else {
            $type = AbstractModelFile::getPhpType($this->getFile()->getStructAttributeType($this->getAttribute()));
            if ($rule = $this->getRules()->getRule($type)) {
                $sanityCheck = $rule->testConditions($itemName, null, true);
            }
        }
        return $sanityCheck;
    }
}
