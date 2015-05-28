<?php

namespace WsdlToPhp\PackageGenerator\Model;

use WsdlToPhp\PackageGenerator\Generator\Generator;
use WsdlToPhp\PackageGenerator\Generator\Utils;

/**
 * Class StructValue stands for an enumeration value
 */
class StructValue extends AbstractModel
{
    /**
     * Store the constants generated per structName
     * @var array
     */
    private static $uniqueConstants = array();
    /**
     * The index of the value in the enumeration struct
     * @var int
     */
    private $index = 0;
    /**
     * Main constructor
     * @see AbstractModel::__construct()
     * @uses AbstractModel::setOwner()
     * @uses StructValue::setIndex()
     * @param string $name the original name
     * @param string $index the index of the value in the enumeration struct
     * @param Struct $struct defines the struct which owns this value
     */
    public function __construct($name, $index, Struct $struct)
    {
        parent::__construct($name);
        $this->setIndex($index);
        $this->setOwner($struct);
    }
    /**
     * Returns the name of the value as constant
     * @see AbstractModel::getCleanName()
     * @uses AbstractModel::getCleanName()
     * @uses AbstractModel::getName()
     * @uses AbstractModel::getOwner()
     * @uses StructValue::constantSuffix()
     * @uses StructValue::getIndex()
     * @uses StructValue::getOwner()
     * @uses Generator::instance()->getOptionGenericConstantsNames()
     * @param bool $keepMultipleUnderscores optional, allows to keep the multiple consecutive underscores
     * @return string
     */
    public function getCleanName($keepMultipleUnderscores = false)
    {
        if (Generator::instance()->getOptionGenericConstantsNames() && is_numeric($this->getIndex()) && $this->getIndex() >= 0) {
            return 'ENUM_VALUE_' . $this->getIndex();
        } else {
            $key = self::constantSuffix($this->getOwner()->getName(), parent::getCleanName($keepMultipleUnderscores), $this->getIndex());
            return 'VALUE_' . strtoupper(parent::getCleanName($keepMultipleUnderscores)) . ($key ? '_' . $key : '');
        }
    }
    /**
     * Returns the value with good type
     * @uses AbstractModel::getName()
     * @uses Utils::getValueWithinItsType()
     * @return mixed
     */
    public function getValue()
    {
        return Utils::getValueWithinItsType($this->getName());
    }
    /**
     * Gets the index attribute value
     * @return int
     */
    public function getIndex()
    {
        return $this->index;
    }
    /**
     * Sets the index attribute value
     * @param int $index
     * @return StructValue
     */
    public function setIndex($index)
    {
        $this->index = $index;
        return $this;
    }
    public function getClassBody(&$class)
    {
    }
    /**
     * Returns the comment lines for this value
     * @see AbstractModel::getComment()
     * @uses StructValue::getValue()
     * @uses AbstractModel::addMetaComment()
     * @return array
     */
    public function getComment()
    {
        $value = $this->getValue();
        $comments = array();
        array_push($comments, 'Constant for value ' . var_export($value, true));
        $this->addMetaComment($comments);
        array_push($comments, '@return ' . gettype($value) . ' ' . var_export($value, true));
        return $comments;
    }
    /**
     * Returns the declaration of the value
     * @see StructValue::getCleanName()
     * @see StructValue::getValue()
     * @param string $structName the name of the struct which the value belongs to
     * @param int $index the index of the constant contained by the struct class
     * @return string
     */
    public function getDeclaration($structName, $index = -1)
    {
        return 'const ' . $this->getCleanName() . ' = ' . var_export($this->getValue(), true) . ';';
    }
    /**
     * Returns the index which has to be added at the end of natural constant name defined with the value cleaned
     * Allows to avoid multiple constant name to be indentic
     * @param string $structName the struct name
     * @param string|int|float $value the value
     * @param int $index the position of the value
     * @return int
     */
    private static function constantSuffix($structName, $value, $index)
    {
        $key = strtoupper($structName . '_' . $value);
        $indexedKey = $key . '_' . $index;
        if (array_key_exists($indexedKey, self::$uniqueConstants)) {
            return self::$uniqueConstants[$indexedKey];
        } elseif (!array_key_exists($key, self::$uniqueConstants)) {
            self::$uniqueConstants[$key] = 0;
        } else {
            self::$uniqueConstants[$key]++;
        }
        self::$uniqueConstants[$indexedKey] = self::$uniqueConstants[$key];
        return self::$uniqueConstants[$key];
    }
    /**
     * Returns the owner model object, meaning a Struct object
     * @see AbstractModel::getOwner()
     * @uses AbstractModel::getOwner()
     * @return Struct
     */
    public function getOwner()
    {
        return parent::getOwner();
    }
    /**
     * Returns class name
     * @return string __CLASS__
     */
    public function __toString()
    {
        return 'StructValue';
    }
}
