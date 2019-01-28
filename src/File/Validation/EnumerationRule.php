<?php

namespace WsdlToPhp\PackageGenerator\File\Validation;

use WsdlToPhp\PackageGenerator\File\StructEnum;
use WsdlToPhp\PackageGenerator\Model\Struct;

/**
 * Class EnumerationRule
 * @link https://www.w3.org/TR/xmlschema-2/#rf-enumeration
 * Validation Rule: enumeration valid
 * A value in a ·value space· is facet-valid with respect to ·enumeration· if the value is one of the values specified in {value}
 */
class EnumerationRule extends AbstractRule
{

    /**
     * @var Struct
     */
    protected $model;

    /**
     * @return string
     */
    public function name()
    {
        return 'enumeration';
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
        if ($this->getRestrictionModel()) {
            $test = sprintf('!%s::%s($%s)', $this->getRestrictionModel()->getPackagedName(true), StructEnum::METHOD_VALUE_IS_VALID, $parameterName);
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
        $exceptionMessage = '';
        if ($this->getRestrictionModel()) {
            $exceptionMessage = sprintf('sprintf(\'Invalid value(s) %%s, please use one of: %%s from enumeration class %2$s\', is_array($%1$s) ? implode(\', \', $%1$s) : var_export($%1$s, true), implode(\', \', %2$s::%3$s()))', $parameterName, $this->getRestrictionModel()->getPackagedName(true), StructEnum::METHOD_GET_VALID_VALUES);
        }
        return $exceptionMessage;
    }

    /**
     * @return Struct|null
     */
    protected function getRestrictionModel()
    {
        if (!$this->model) {
            $this->model = $this->getFile()->getRestrictionFromStructAttribute($this->getAttribute());
        }
        return $this->model;
    }
}
