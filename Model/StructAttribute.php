<?php

namespace WsdlToPhp\PackageGenerator\Model;

use WsdlToPhp\PackageGenerator\Generator\Utils;

/**
 * Class StructAttribute stands for an available struct attribute described in the WSDL
 */
class StructAttribute extends AbstractModel
{
    /**
     * Type of the struct attribute
     * @var string
     */
    private $type = '';
    /**
     * Main constructor
     * @see AbstractModel::__construct()
     * @uses StructAttribute::setType()
     * @uses AbstractModel::setOwner()
     * @param string $name the original name
     * @param string $type the type
     * @param Struct $struct defines the struct which owns this value
     */
    public function __construct($name, $type, Struct $struct)
    {
        parent::__construct($name);
        $this->setType($type);
        $this->setOwner($struct);
    }
    public function getClassBody(&$class)
    {
    }
    /**
     * Returns the comment lines for this attribute
     * @see AbstractModel::getComment()
     * @uses AbstractModel::getName()
     * @uses Struct::getIsStruct()
     * @uses StructAttribute::getType()
     * @uses StructAttribute::getOwner()
     * @uses AbstractModel::addMetaComment()
     * @uses AbstractModel::getModelByName()
     * @uses AbstractModel::getPackagedName()
     * @uses AbstractModel::getInheritance()
     * @return array
     */
    public function getComment()
    {
        $comments = array();
        array_push($comments, 'The ' . $this->getName());
        $this->addMetaComment($comments);
        $model = self::getModelByName($this->getType());
        $varType = $this->getVarType();
        if ($model) {
            /**
             * A virtual struct exists only to store meta informations about itself
             * A property for which the data type points to its actual owner class has to be of its native type
             * So don't add meta informations about a valid struct
             */
            if (!$model->getIsStruct() || $model->getPackagedName() == $this->getOwner()->getPackagedName()) {
                $model->addMetaComment($comments);
                array_push($comments, '@var ' . $varType);
            } else {
                array_push($comments, '@var ' . $varType);
            }
        } else {
            array_push($comments, '@var ' . $varType);
        }
        return $comments;
    }
    /**
     * @return string
     */
    public function getVarType()
    {
        $varType = $this->getType();
        $model = self::getModelByName($this->getType());
        if ($model) {
            /**
             * A virtual struct exists only to store meta informations about itself
             * A property for which the data type points to its actual owner class has to be of its native type
             * So don't add meta informations about a valid struct
             */
            if (!$model->getIsStruct() || $model->getPackagedName() == $this->getOwner()->getPackagedName() && $model->getInheritance() !== '') {
                $varType = $model->getInheritance();
            } else {
                $varType = $model->getPackagedName();
            }
        }
        return $varType;
    }
    /**
     * Returns the unique name in the current struct (for setters/getters and struct contrusctor array)
     * @uses AbstractModel::getCleanName()
     * @uses AbstractModel::getName()
     * @uses AbstractModel::uniqueName()
     * @uses StructAttribute::getOwner()
     * @return string
     */
    public function getUniqueName()
    {
        return self::uniqueName($this->getCleanName(), $this->getOwner()->getName());
    }
    /**
     * Returns the declaration of the attribute
     * @uses AbstractModel::getCleanName()
     * @return string
     */
    public function getDeclaration()
    {
        return sprintf('public $%s;', $this->getCleanName());
    }
    /**
     * Returns the getter name for this attribute
     * @uses StructAttribute::getUniqueName()
     * @return string
     */
    public function getGetterName()
    {
        return sprintf('get%s', ucfirst(self::getUniqueName()));
    }
    /**
     * Returns the getter name for this attribute
     * @uses StructAttribute::getUniqueName()
     * @return string
     */
    public function getSetterName()
    {
        return sprintf('set%s', ucfirst(self::getUniqueName()));
    }
    /**
     * Returns the array of lines to declare the getter
     * @uses AbstractModel::getModelByName()
     * @uses AbstractModel::getCleanName()
     * @uses AbstractModel::nameIsClean()
     * @uses AbstractModel::getName()
     * @uses AbstractModel::getPackagedName()
     * @uses Struct::getIsStruct()
     * @uses StructAttribute::getType()
     * @uses StructAttribute::getGetterName()
     * @uses StructAttribute::isRequired()
     * @uses StructAttribute::getOwner()
     * @param array $body
     * @param Struct $struct
     * @return void
     */
    public function getGetterDeclaration(&$body, Struct $struct)
    {
        $model = self::getModelByName($this->getType());
        $isXml = ($this->getType() == 'DOMDocument');
        /**
         * get() method comment
         */
        $comments = array();
        array_push($comments, 'Get ' . $this->getName() . ' value');
        if ($isXml) {
            array_push($comments, '@uses DOMDocument::loadXML()');
            array_push($comments, '@uses DOMDocument::hasChildNodes()');
            array_push($comments, '@uses DOMDocument::saveXML()');
            array_push($comments, '@uses DOMNode::item()');
            array_push($comments, '@uses ' . $struct->getPackagedName() . '::' . $this->getSetterName() . '()');
            array_push($comments, '@param bool true or false whether to return XML value as string or as DOMDocument');
        }
        array_push($comments, '@return ' . $this->getReturnType());
        array_push($body, array('comment' => $comments));
        /**
         * get() method body
         */
        array_push($body, 'public function ' . $this->getGetterName() . '(' . ($isXml ? '$asString = true' : '') . ')');
        array_push($body, "{");
        if ($this->nameIsClean()) {
            $thisAccess = '$this->' . $this->getName();
        } else {
            $thisAccess = '$this->{\'' . addslashes($this->getName()) . '\'}';
        }
        /**
         * format XML data
         */
        if ($isXml) {
            array_push($body, 'if(!empty(' . $thisAccess . ') && !(' . $thisAccess . ' instanceof DOMDocument))');
            array_push($body, '{');
            array_push($body, '$dom = new DOMDocument(\'1.0\', \'UTF-8\');');
            array_push($body, '$dom->formatOutput = true;');
            array_push($body, 'if($dom->loadXML(' . $thisAccess . '))');
            array_push($body, '{');
            array_push($body, '$this->' . $this->getSetterName() . '($dom);');
            array_push($body, '}');
            array_push($body, 'unset($dom);');
            array_push($body, '}');
        }
        if ($isXml) {
            array_push($body, 'return ($asString && (' . $thisAccess . ' instanceof DOMDocument) && ' . $thisAccess . '->hasChildNodes())?' . $thisAccess . '->saveXML(' . $thisAccess . '->childNodes->item(0)):' . $thisAccess . ';');
        } else {
            array_push($body, 'return ' . $thisAccess . ';');
        }
        array_push($body, "}");
        unset($model, $isXml, $comments);
    }
    /**
     * Returns the array of lines to declare the setter
     * @uses AbstractModel::getModelByName()
     * @uses AbstractModel::getCleanName()
     * @uses AbstractModel::nameIsClean()
     * @uses AbstractModel::getName()
     * @uses AbstractModel::getPackagedName()
     * @uses AbstractModel::getInheritance()
     * @uses Struct::getIsRestriction()
     * @uses Struct::isArray()
     * @uses StructAttribute::getType()
     * @uses StructAttribute::getSetterName()
     * @uses StructAttribute::getOwner()
     * @param array $body
     * @param Struct $struct
     * @return void
     */
    public function getSetterDeclaration(&$body, Struct $struct)
    {
        $model = self::getModelByName($this->getType());
        $paramType = $this->getParamType();
        /**
         * set() method comment
         */
        $comments = array();
        array_push($comments, 'Set ' . $this->getName() . ' value');
        if ($model && $model->getIsRestriction() && !$struct->isArray()) {
            array_push($comments, '@uses ' . $model->getPackagedName() . '::valueIsValid()');
        }
        if ($model) {
            if ($model->getIsStruct() && $model->getPackagedName() != $this->getOwner()->getPackagedName()) {
                array_push($comments, '@param ' . $paramType . ' $' . lcfirst($this->getCleanName()) . ' the ' . $this->getName());
                array_push($comments, '@return ' . $model->getPackagedName());
            } else {
                array_push($comments, '@param ' . $paramType . ' $' . lcfirst($this->getCleanName()) . ' the ' . $this->getName());
                array_push($comments, '@return ' . ($model->getInheritance() ? $model->getInheritance() : $this->getType()));
            }
        } else {
            array_push($comments, '@param ' . $paramType . ' $' . lcfirst($this->getCleanName()) . ' the ' . $this->getName());
            array_push($comments, '@return ' . $this->getType());
        }
        array_push($body, array('comment' => $comments));
        /**
         * set() method body
         */
        array_push($body, 'public function ' . $this->getSetterName() . '($' . lcfirst($this->getCleanName()) . ')');
        array_push($body, '{');
        if ($model && $model->getIsRestriction() && !$struct->isArray()) {
            array_push($body, 'if(!' . $model->getPackagedName() . '::valueIsValid($' . lcfirst($this->getCleanName()) . '))');
            array_push($body, '{');
            array_push($body, 'return false;');
            array_push($body, '}');
        }
        if ($this->nameIsClean()) {
            array_push($body, 'return ($this->' . $this->getName() . ' = $' . lcfirst($this->getCleanName()) . ');');
        } else {
            array_push($body, 'return ($this->' . $this->getCleanName() . ' = $this->{\'' . addslashes($this->getName()) . '\'} = $' . lcfirst($this->getCleanName()) . ');');
        }
        array_push($body, '}');
        unset($model, $comments);
    }
    /**
     * @return string
     */
    public function getParamType()
    {
        $paramType = $this->getType();
        $model = self::getModelByName($this->getType());
        if ($model instanceof AbstractModel) {
            if ($model->getIsStruct() && $model->getPackagedName() != $this->getOwner()->getPackagedName()) {
                $paramType = $model->getPackagedName();
            } elseif ($model->getInheritance() !== '') {
                $paramType = $model->getInheritance();
            }
        }
        return $paramType;
    }
    /**
     * @return string
     */
    public function getReturnType()
    {
        $returnType = $this->getType();
        $model = self::getModelByName($this->getType());
        if ($model instanceof Struct) {
            if ($model->getIsStruct() && $model->getPackagedName() != $this->getOwner()->getPackagedName()) {
                $returnType = $model->getPackagedName();
            } elseif ($model->getInheritance() !== '') {
                $returnType = $model->getInheritance();
            }
        }
        return sprintf('%s%s', $returnType, $this->isRequired() ? '' : '|null');
    }
    /**
     * Returns the type value
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
    /**
     * Sets the type value
     * @param string $type
     * @return string
     */
    public function setType($type)
    {
        return ($this->type = $type);
    }
    /**
     * Returns potential default value
     * @uses AbstractModel::getMetaValueFirstSet()
     * @uses Utils::getValueWithinItsType()
     * @uses StructAttribute::getType()
     * @return mixed
     */
    public function getDefaultValue()
    {
        return Utils::getValueWithinItsType($this->getMetaValueFirstSet(array('default', 'Default', 'DefaultValue', 'defaultValue', 'defaultvalue')), $this->getType());
    }
    /**
     * Returns true or false depending on minOccurs information associated to the attribute
     * @uses AbstractModel::getMetaValueFirstSet()
     * @uses AbstractModel::getMetaValue()
     * @return bool true|false
     */
    public function isRequired()
    {
        return ($this->getMetaValue('use', '') === 'required' || $this->getMetaValueFirstSet(array('minOccurs', 'minoccurs', 'MinOccurs', 'Minoccurs'), false));
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
        return 'StructAttribute';
    }
}
