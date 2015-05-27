<?php

namespace WsdlToPhp\PackageGenerator\Model;

use WsdlToPhp\PackageGenerator\Container\Model\StructValue as StructValueContainer;
use WsdlToPhp\PackageGenerator\Container\Model\StructAttribute as StructAttributeContainer;
use WsdlToPhp\PackageGenerator\Generator\Generator;

/**
 * Class Struct stands for an available struct described in the WSDL
 */
class Struct extends AbstractModel
{
    const
        CONTEXTUAL_PART_STRUCT       = 'Struct',
        DOC_SUB_PACKAGE_STRUCTS      = 'Structs',
        CONTEXTUAL_PART_ENUMERATION  = 'Enum',
        DOC_SUB_PACKAGE_ENUMERATIONS = 'Enumerations';
    /**
     * Attributes of the struct
     * @var StructAttributeContainer
     */
    private $attributes;
    /**
     * Is the struct a restriction with defined values  ?
     * @var bool
     */
    private $isRestriction = false;
    /**
     * If the struct is a restriction with values, then store values
     * @var StructValueContainer
     */
    private $values;
    /**
     * Define if the urrent struct is a concrete struct or just a virtual struct to store meta informations
     * @var bool
     */
    private $isStruct = false;
    /**
     * Main constructor
     * @see AbstractModel::__construct()
     * @uses Struct::setIsStruct()
     * @param string $name the original name
     * @param bool $isStruct defines if it's a real sruct or not
     * @param bool $isRestriction defines if it's an enumeration or not
     */
    public function __construct($name, $isStruct = true, $isRestriction = false)
    {
        parent::__construct($name);
        $this->setIsStruct($isStruct);
        $this->setIsRestriction($isRestriction);
        $this->setAttributes(new StructAttributeContainer());
        $this->setValues(new StructValueContainer());
    }
    /**
     * Returns the constructor method
     * @uses AbstractModel::getName()
     * @uses AbstractModel::getModelByName()
     * @uses AbstractModel::getPackagedName()
     * @uses AbstractModel::getCleanName()
     * @uses AbstractModel::getInheritance()
     * @uses AbstractModel::getGenericWsdlClassName()
     * @uses Struct::isArray()
     * @uses Struct::getIsRestriction()
     * @uses Struct::getValues()
     * @uses Struct::getAttributes()
     * @uses Struct::getIsStruct()
     * @uses StructValue::getComment()
     * @uses StructValue::getDeclaration()
     * @uses StructValue::getCleanName()
     * @uses StructAttribute::getComment()
     * @uses StructAttribute::getDeclaration()
     * @uses StructAttribute::isRequired()
     * @uses StructAttribute::getType()
     * @uses StructAttribute::getDefaultValue()
     * @uses StructAttribute::getGetterDeclaration()
     * @uses StructAttribute::getSetterDeclaration()
     * @uses Generator::instance()->getOptionGenerateWsdlClassFile()
     * @uses Generator::getPackageName()
     * @param array $body the body which will be populated
     * @return array
     */
    public function getClassBody(&$body)
    {
        /**
         * A restriction struct with enumeration values
         */
        if ($this->getIsRestriction() && $this->getValues()->count() > 0) {
            $constantsDefined = array();
            foreach ($this->getValues() as $index => $value) {
                array_push($body, array('comment' => $value->getComment()));
                array_push($body, $value->getDeclaration($this->getName(), $index));
                array_push($constantsDefined, $this->getPackagedName() . '::' . $value->getCleanName());
            }
            /**
             * valueIsValid() method comments
             */
            $comments = array();
            array_push($comments, 'Return true if value is allowed');
            foreach ($constantsDefined as $constantName) {
                array_push($comments, '@uses ' . $constantName);
            }
            array_push($comments, '@param mixed $value value');
            array_push($comments, '@return bool true|false');
            array_push($body, array('comment' => $comments));
            /**
             * valueIsValid() method body
             */
            array_push($body, 'public static function valueIsValid($value)');
            array_push($body, '{');
            array_push($body, 'return in_array($value, array(' . implode(', ', $constantsDefined) . '));');
            array_push($body, '}');
            unset($comments);
        } elseif ($this->getAttributes()->count() > 0) {
            /**
             * A classic struct with attributes
             * Gathers informations about attributes
             */
            $bodyParameters = array();
            $bodyParams = array();
            $bodyUses = array();
            $constructParameters = array();
            $attributes = $this->getAttributes(false, true);
            foreach ($attributes as $attribute) {
                array_push($body, array('comment' => $attribute->getComment()));
                array_push($body, $attribute->getDeclaration());
                array_push($bodyParameters, '$' . lcfirst($attribute->getCleanName()) . (!$attribute->isRequired() ? ' = ' . var_export($attribute->getDefaultValue(), true) : ''));
                if (!Generator::instance()->getOptionGenerateWsdlClassFile()) {
                    array_push($bodyUses, $this->getPackagedName() . '::' . $attribute->getSetterName() . '()');
                }
                $model = self::getModelByName($attribute->getType());
                if ($model) {
                    if ($model->getIsStruct() && $model->getPackagedName() != $this->getPackagedName()) {
                        if ($model->isArray()) {
                            array_push($constructParameters, '\'' . $attribute->getUniqueName() . '\'=>($' . lcfirst($attribute->getCleanName()) . ' instanceof ' . $model->getPackagedName() . ') ? $' . lcfirst($attribute->getCleanName()) . ' : new ' . $model->getPackagedName() . '($' . lcfirst($attribute->getCleanName()) . ')');
                        } else {
                            array_push($constructParameters, '\'' . $attribute->getUniqueName() . '\'=>$' . lcfirst($attribute->getCleanName()));
                        }
                        $paramType = $model->getPackagedName();
                    } else {
                        array_push($constructParameters, '\'' . $attribute->getUniqueName() . '\'=>$' . lcfirst($attribute->getCleanName()));
                        $paramType = $model->getInheritance() ? $model->getInheritance() : $attribute->getType();
                    }
                } else {
                    array_push($constructParameters, '\'' . $attribute->getUniqueName() . '\'=>$' . lcfirst($attribute->getCleanName()));
                    $paramType = $attribute->getType();
                }
                array_push($bodyParams, $paramType . ' $' . lcfirst($attribute->getCleanName()));
                unset($paramType, $model);
            }
            /**
             * __contruct() method comments
             */
            $comments = array();
            array_push($comments, 'Constructor method for ' . $this->getCleanName());
            /**
             * Uses the parent constructor method
             */
            if (Generator::instance()->getOptionGenerateWsdlClassFile()) {
                array_push($comments, '@see parent::__construct()');
            }
            foreach ($bodyUses as $bodyUse) {
                array_push($comments, '@uses ' . $bodyUse);
            }
            foreach ($bodyParams as $bodyParam) {
                array_push($comments, '@param ' . $bodyParam);
            }
            array_push($comments, '@return ' . $this->getPackagedName());
            array_push($body, array('comment' => $comments));
            /**
             * __contruct() method body
             */
            array_push($body, 'public function __construct(' . implode(', ', $bodyParameters) . ')');
            array_push($body, '{');
            $model = self::getModelByName($this->getInheritance());
            /**
             * Uses the parent constructor method
             */
            if (Generator::instance()->getOptionGenerateWsdlClassFile()) {
                array_push($body, (($model && $model->getIsStruct()) ? self::getGenericWsdlClassName() : 'parent') . '::__construct(array(' . implode(', ', $constructParameters) . '), false);');
            }
            /**
             * Uses its own setters
             */
            else {
                foreach ($attributes as $attribute) {
                    array_push($body, '$this->' . $attribute->getSetterName() . '($' . lcfirst($attribute->getCleanName()) . ');');
                }
            }
            array_push($body, '}');
            /**
             * Setters and getters
             */
            foreach ($this->getAttributes(false, true) as $attribute) {
                $attribute->getGetterDeclaration($body, $this);
                $attribute->getSetterDeclaration($body, $this);
            }
            unset($comments, $bodyParameters, $bodyParams, $constructParameters);
            /**
             * A array struct
             */
            if ($this->isArray()) {
                $attribute = $this->getAttributes()->offsetGet(0);
                if ($attribute instanceof StructAttribute) {
                    $model = self::getModelByName($attribute->getType());
                    $return = ($model && $model->getIsStruct()) ? $model->getPackagedName() : $attribute->getType();
                    $comments = array();
                    /**
                     * current() method comments
                     */
                    array_push($comments, 'Returns the current element');
                    array_push($comments, '@see ' . self::getGenericWsdlClassName() . '::current()');
                    array_push($comments, '@return ' . $return);
                    array_push($body, array('comment' => $comments));
                    /**
                     * current() method body
                     */
                    array_push($body, 'public function current()');
                    array_push($body, '{');
                    array_push($body, 'return parent::current();');
                    array_push($body, '}');
                    $comments = array();
                    /**
                     * item() method comments
                     */
                    array_push($comments, 'Returns the indexed element');
                    array_push($comments, '@see ' . self::getGenericWsdlClassName() . '::item()');
                    array_push($comments, '@param int $index');
                    array_push($comments, '@return ' . $return);
                    array_push($body, array('comment' => $comments));
                    /**
                     * item() method body
                     */
                    array_push($body, 'public function item($index)');
                    array_push($body, '{');
                    array_push($body, 'return parent::item($index);');
                    array_push($body, '}');
                    $comments = array();
                    /**
                     * first() method comments
                     */
                    array_push($comments, 'Returns the first element');
                    array_push($comments, '@see ' . self::getGenericWsdlClassName() . '::first()');
                    array_push($comments, '@return ' . $return);
                    array_push($body, array('comment' => $comments));
                    /**
                     * first() method body
                     */
                    array_push($body, 'public function first()');
                    array_push($body, '{');
                    array_push($body, 'return parent::first();');
                    array_push($body, '}');
                    $comments = array();
                    /**
                     * last() method comments
                     */
                    array_push($comments, 'Returns the last element');
                    array_push($comments, '@see ' . self::getGenericWsdlClassName() . '::last()');
                    array_push($comments, '@return ' . $return);
                    array_push($body, array('comment' => $comments));
                    /**
                     * last() method body
                     */
                    array_push($body, 'public function last()');
                    array_push($body, '{');
                    array_push($body, 'return parent::last();');
                    array_push($body, '}');
                    $comments = array();
                    /**
                     * offsetGet() method comments
                     */
                    array_push($comments, 'Returns the element at the offset');
                    array_push($comments, '@see ' . self::getGenericWsdlClassName() . '::last()');
                    array_push($comments, '@param int $offset');
                    array_push($comments, '@return ' . $return);
                    array_push($body, array('comment' => $comments));
                    /**
                     * offsetGet() method body
                     */
                    array_push($body, 'public function offsetGet($offset)');
                    array_push($body, '{');
                    array_push($body, 'return parent::offsetGet($offset);');
                    array_push($body, '}');
                    if ($model && $model->getIsRestriction()) {
                        $comments = array();
                        /**
                         * add() method comments
                         */
                        array_push($comments, 'Add element to array');
                        array_push($comments, '@see ' . self::getGenericWsdlClassName() . '::add()');
                        array_push($comments, '@uses ' . $model->getPackagedName() . '::valueIsValid()');
                        array_push($comments, '@param ' . $model->getPackagedName() . ' $item');
                        array_push($comments, '@return ' . $return);
                        array_push($body, array('comment' => $comments));
                        /**
                         * add() method body
                         */
                        array_push($body, 'public function add($item)');
                        array_push($body, '{');
                        array_push($body, 'return ' . $model->getPackagedName() . '::valueIsValid($item) ? parent::add($item) : false;');
                        array_push($body, '}');
                    }
                    /**
                     * getAttributeName() method comments
                     */
                    $comments = array();
                    array_push($comments, 'Returns the attribute name');
                    array_push($comments, '@see ' . self::getGenericWsdlClassName() . '::getAttributeName()');
                    array_push($comments, '@return string ' . $attribute->getCleanName());
                    array_push($body, array('comment' => $comments));
                    /**
                     * getAttributeName() method body
                     */
                    array_push($body, 'public function getAttributeName()');
                    array_push($body, '{');
                    array_push($body, 'return \'' . $attribute->getCleanName() . '\';');
                    array_push($body, '}');
                    unset($comments, $model);
                }
                unset($attribute);
            }
            /**
             * __set_state method override
             */
            if (Generator::instance()->getOptionGenerateWsdlClassFile()) {
                /**
                 * __set_state() method comments
                 */
                $comments = array();
                array_push($comments, 'Method called when an object has been exported with var_export() functions');
                array_push($comments, 'It allows to return an object instantiated with the values');
                array_push($comments, '@see ' . self::getGenericWsdlClassName() . '::__set_state()');
                array_push($comments, '@uses ' . self::getGenericWsdlClassName() . '::__set_state()');
                array_push($comments, '@param array $array the exported values');
                array_push($comments, '@return ' . $this->getPackagedName());
                array_push($body, array('comment' => $comments));
                unset($comments);
                /**
                 * __set_state method body
                 */
                array_push($body, 'public static function __set_state(array $array, $className = __CLASS__)');
                array_push($body, '{');
                array_push($body, 'return parent::__set_state($array, $className);');
                array_push($body, '}');
            }
        }
    }
    /**
     * Returns the contextual part of the class name for the package
     * @see AbstractModel::getContextualPart()
     * @uses Struct::getIsRestriction()
     * @return string
     */
    public function getContextualPart()
    {
        return $this->getIsRestriction() ? self::CONTEXTUAL_PART_ENUMERATION : self::CONTEXTUAL_PART_STRUCT;
    }
    /**
     * Returns the sub package name which the model belongs to
     * Must be overridden by sub classes
     * @see AbstractModel::getDocSubPackages()
     * @uses Struct::getIsRestriction()
     * @return array
     */
    public function getDocSubPackages()
    {
        return array($this->getIsRestriction() ? self::DOC_SUB_PACKAGE_ENUMERATIONS : self::DOC_SUB_PACKAGE_STRUCTS);
    }
    /**
     * Returns true if the current struct is a collection of values (like an array)
     * @uses AbstractModel::getName()
     * @uses Struct::countOwnAttributes()
     * @return bool
     */
    public function isArray()
    {
        return ($this->countOwnAttributes() === 1 && stripos($this->getName(), 'array') !== false);
    }
    /**
     * Returns the attributes of the struct and potentially from the parent class
     * @uses AbstractModel::getInheritance()
     * @uses AbstractModel::getModelByName()
     * @uses Struct::getIsStruct()
     * @uses Struct::getAttributes()
     * @param bool $includeInheritanceAttributes include the attributes of parent class, default parent attributes are not included. If true, then the array is an associative array containing and index "attribute" for the StructAttribute object and an index "model" for the Struct object.
     * @param bool $requiredFirst places the required attributes first, then the not required in order to have the _contrust method with the required attribute at first
     * @return StructAttributeContainer
     */
    public function getAttributes($includeInheritanceAttributes = false, $requiredFirst = false)
    {
        if ($includeInheritanceAttributes === false && $requiredFirst === false) {
            $attributes = $this->attributes;
        } else {
            $allAttributes = new StructAttributeContainer();
            /**
             * Returns the inherited attributes
             */
            if ($includeInheritanceAttributes) {
                if ($this->getInheritance() != '') {
                    $model = AbstractModel::getModelByName($this->getInheritance());
                    while ($model && $model->getIsStruct()) {
                        if ($model->getAttributes()->count()) {
                            foreach ($model->getAttributes() as $attribute) {
                                $allAttributes->add($attribute);
                            }
                        }
                        $model = AbstractModel::getModelByName($model->getInheritance());
                    }
                }
            }
            if ($this->attributes->count() > 0) {
                foreach ($this->attributes as $attribute) {
                    $allAttributes->add($attribute);
                }
            }
            /**
             * Returns the required attributes at first position
             */
            if ($requiredFirst) {
                $requiredAttributes    = new StructAttributeContainer();
                $notRequiredAttributes = new StructAttributeContainer();
                foreach ($allAttributes as $attribute) {
                    if ($attribute->isRequired()) {
                        $requiredAttributes->add($attribute);
                    } else {
                        $notRequiredAttributes->add($attribute);
                    }
                }
                $attributes = new StructAttributeContainer();
                foreach ($requiredAttributes as $attribute) {
                    $attributes->add($attribute);
                }
                foreach ($notRequiredAttributes as $attribute) {
                    $attributes->add($attribute);
                }
                unset($requiredAttributes, $notRequiredAttributes);
            } else {
                $attributes = new StructAttributeContainer();
                foreach ($allAttributes as $attribute) {
                    $attributes->add($attribute);
                }
            }
        }
        return $attributes;
    }
    /**
     * Returns the number of own attributes
     * @uses Struct::getAttributes()
     * @return int
     */
    public function countOwnAttributes()
    {
        return $this->getAttributes(false, false)->count();
    }
    /**
     * Sets the attributes of the struct
     * @param StructAttributeContainer $structAttributeContainer
     * @return Struct
     */
    public function setAttributes(StructAttributeContainer $structAttributeContainer)
    {
        $this->attributes = $structAttributeContainer;
        return $this;
    }
    /**
     * Adds attribute based on its original name
     * @uses AbstractModel::updateModels()
     * @param string $attributeName the attribute name
     * @param string $attributeType the attribute type
     * @return StructAttribute
     */
    public function addAttribute($attributeName, $attributeType)
    {
        $structAttribute = new StructAttribute($attributeName, $attributeType, $this);
        $this->attributes->add($structAttribute);
        self::updateModels($this);
        return $structAttribute;
    }
    /**
     * Returns the attribute by its name, otherwise null
     * @uses Struct::getAttributes()
     * @param string $attributeName the original attribute name
     * @return StructAttribute|null
     */
    public function getAttribute($attributeName)
    {
        return $this->attributes->getStructAttributeByName($attributeName);
    }
    /**
     * Returns the isRestriction value
     * @return bool
     */
    public function getIsRestriction()
    {
        return $this->isRestriction;
    }
    /**
     * Sets the isRestriction value
     * @uses AbstractModel::updateModels()
     * @param bool $isRestriction
     * @return bool
     */
    public function setIsRestriction($isRestriction = true)
    {
        $this->isRestriction = $isRestriction;
        self::updateModels($this);
        return $isRestriction;
    }
    /**
     * Returns the isStruct value
     * @return bool
     */
    public function getIsStruct()
    {
        return $this->isStruct;
    }
    /**
     * Sets the isStruct value
     * @uses AbstractModel::updateModels()
     * @param bool $isStruct
     * @return bool
     */
    public function setIsStruct($isStruct = true)
    {
        $this->isStruct = $isStruct;
        self::updateModels($this);
        return $isStruct;
    }
    /**
     * Returns the values for an enumeration
     * @return StructValueContainer
     */
    public function getValues()
    {
        return $this->values;
    }
    /**
     * Sets the values for an enumeration
     * @uses AbstractModel::updateModels()
     * @param StructValueContainer $structValueContainer
     * @return Struct
     */
    private function setValues(StructValueContainer $structValueContainer)
    {
        $this->values = $structValueContainer;
        self::updateModels($this);
        return $this;
    }
    /**
     * Adds value to values array
     * @uses AbstractModel::updateModels()
     * @uses Struct::getValue()
     * @uses Struct::getValues()
     * @param mixed $value the original value
     * @return Struct
     */
    public function addValue($value)
    {
        if ($this->getValue($value) === null) {
            $this->values->add(new StructValue($value, $this->getValues()->count(), $this));
            $this->setIsRestriction(true);
            $this->setIsStruct(true);
        }
        self::updateModels($this);
        return $this;
    }
    /**
     * Gets the value object for the given value
     * @uses Struct::getValues()
     * @uses AbstractModel::getName()
     * @param string $value Value name
     * @return StructValue|null
     */
    public function getValue($value)
    {
        return $this->values->getStructValueByName($value);
    }
    /**
     * Returns class name
     * @return string __CLASS__
     */
    public function __toString()
    {
        return 'Struct';
    }
}
