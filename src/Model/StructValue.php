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
     * @var string
     */
    const MATCH_PATTERN = '/([[:upper:]]+[[:lower:]]*)|([[:lower:]]+)|(\d+)/';
    /**
     * @var string
     */
    const REAPLCEMENT_PATTERN = '$1$2$3_';
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
     * @param Generator $generator
     * @param string $name the original name
     * @param string $index the index of the value in the enumeration struct
     * @param Struct $struct defines the struct which owns this value
     */
    public function __construct(Generator $generator, $name, $index, Struct $struct)
    {
        parent::__construct($generator, $name);
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
     * @uses Generator::getOptionGenericConstantsNames()
     * @param bool $keepMultipleUnderscores optional, allows to keep the multiple consecutive underscores
     * @return string
     */
    public function getCleanName($keepMultipleUnderscores = false)
    {
        if ($this->getGenerator()->getOptionGenericConstantsNames()) {
            return 'ENUM_VALUE_' . $this->getIndex();
        } else {
            $nameWithSeparatedWords = $this->getNameWithSeparatedWords($keepMultipleUnderscores);
            $key = self::constantSuffix($this->getOwner()->getName(), $nameWithSeparatedWords, $this->getIndex());
            return 'VALUE_' . strtoupper($nameWithSeparatedWords . ($key ? '_' . $key : ''));
        }
    }
    /**
     * @return string
     */
    public function getNameWithSeparatedWords($keepMultipleUnderscores)
    {
        return trim(parent::cleanString(preg_replace(self::MATCH_PATTERN, self::REAPLCEMENT_PATTERN, $this->getName()), $keepMultipleUnderscores), '_');
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
     * @throws \InvalidArgumentException
     * @param int $index
     * @return StructValue
     */
    public function setIndex($index)
    {
        if (!is_int($index) || $index < 0) {
            throw new \InvalidArgumentException(sprintf('The value\'s index must be aa positive integer, "%s" given', var_export($index, true)));
        }
        $this->index = $index;
        return $this;
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
}
