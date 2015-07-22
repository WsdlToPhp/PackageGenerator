<?php

namespace WsdlToPhp\PackageGenerator\Model;

use WsdlToPhp\PackageGenerator\ConfigurationReader\ReservedKeywords;
use WsdlToPhp\PackageGenerator\Generator\Generator;
use WsdlToPhp\PackageGenerator\Generator\Utils;

/**
 * Class AbstractModel defines the basic properties and methods to operations and structs extracted from the WSDL
 */
abstract class AbstractModel
{
    /**
     * Constant used to define the key to store documentation value in meta
     * @var string
     */
    const META_DOCUMENTATION = 'documentation';
    /**
     * Constant used to define the key to store from schema value in meta
     * @var string
     */
    const META_FROM_SCHEMA = 'from schema';
    /**
     * Original name od the element
     * @var string
     */
    private $name = '';
    /**
     * Values associated to the operation
     * @var array
     */
    private $meta = array();
    /**
     * Define the inheritance of a struct by the name of the parent struct or type
     * @var string
     */
    private $inheritance = '';
    /**
     * Store the object which owns the current model
     * @var AbstractModel
     */
    private $owner = null;
    /**
     * Indicates that the current elemen is an abstract element.
     * It allows to generated an abstract class.
     * This will happen for element/complexType that are defined with abstract="true"
     * @var bool
     */
    private $isAbstract = false;
    /**
     * Store all the models generated
     * @var array
     */
    private static $models = array();
    /**
     * Replaced keywords time in order to generate unique new keyword
     * @var array
     */
    private static $replacedReservedPhpKeywords = array();
    /**
     * Unique name generated in order to ensure unique naming (for struct constructor and setters/getters even for different case attribute name whith same value)
     * @var array
     */
    private static $uniqueNames = array();
    /**
     * Main constructor
     * @uses AbstractModel::setName()
     * @uses AbstractModel::updateModels()
     * @param string $name the original name
     */
    public function __construct($name)
    {
        $this->setName($name);
        self::updateModels($this);
    }
    /**
     * @return string
     */
    public function getExtendsClassName()
    {
        $extends = '';
        $base = Generator::instance()->getOptionInheritsClassIdentifier();
        if (!empty($base) && ($model = self::getModelByName($this->getName() . $base))) {
            if ($model->getIsStruct()) {
                $extends = $model->getPackagedName();
            }
        } elseif ($this->getInheritance() != '' && ($model = self::getModelByName($this->getInheritance()))) {
            if ($model->getIsStruct()) {
                $extends = $model->getPackagedName();
            }
        } elseif (class_exists($this->getInheritance()) && stripos($this->getInheritance(), Generator::getPackageName()) === 0) {
            $extends = $this->getInheritance();
        }
        if (empty($extends)) {
            $extends = $this->getExtends(true);
        }
        return $extends;
    }
    /**
     * Returns the name of the class the current class inherits from
     * @return string
     */
    public function getInheritance()
    {
        return $this->inheritance;
    }
    /**
     * Sets the name of the class the current class inherits from
     * @uses AbstractModel::updateModels()
     * @param string
     */
    public function setInheritance($inheritance = '')
    {
        $this->inheritance = $inheritance;
        self::updateModels($this);
        return $inheritance;
    }
    /**
     * Returns the meta
     * @return array
     */
    public function getMeta()
    {
        return $this->meta;
    }
    /**
     * Sets the meta
     * @param array $meta
     * @return array
     */
    public function setMeta(array $meta = array())
    {
        return ($this->meta = $meta);
    }
    /**
     * Add meta information to the operation
     * @uses AbstractModel::getMeta()
     * @uses AbstractModel::updateModels()
     * @throws \InvalidArgumentException
     * @param string $metaName
     * @param mixed $metaValue
     * @return AbstractModel
     */
    public function addMeta($metaName, $metaValue)
    {
        if (!is_scalar($metaName) || (!is_scalar($metaValue) && !is_array($metaValue))) {
            throw new \InvalidArgumentException(sprintf('Invalid meta name "%s" or value "%s". Please provide scalar meta name and scalar or array meta value.', gettype($metaName), gettype($metaValue)));
        }
        $metaValue = is_scalar($metaValue) ? trim($metaValue) : $metaValue;
        if ((is_scalar($metaValue) && $metaValue !== '') || is_array($metaValue)) {
            if (!array_key_exists($metaName, $this->getMeta())) {
                $this->meta[$metaName] = $metaValue;
            } elseif (is_array($this->meta[$metaName]) && is_array($metaValue)) {
                $this->meta[$metaName] = array_merge($this->meta[$metaName], $metaValue);
            } elseif (is_array($this->meta[$metaName])) {
                array_push($this->meta[$metaName], $metaValue);
            } else {
                $this->meta[$metaName] = $metaValue;
            }
            ksort($this->meta);
            self::updateModels($this);
        }
        return $this;
    }
    /**
     * Sets the documentation meta value.
     * Documentation is set as an array so if multiple documentation nodes are set for an unique element, it will gather them.
     * @uses AbstractModel::META_DOCUMENTATION
     * @uses AbstractModel::addMeta()
     * @param string $documentation the documentation from the WSDL
     * @return AbstractModel
     */
    public function setDocumentation($documentation)
    {
        return $this->addMeta(self::META_DOCUMENTATION, is_array($documentation) ? $documentation : array($documentation));
    }
    /**
     * Get the documentation meta value
     * @uses AbstractModel::META_DOCUMENTATION
     * @uses AbstractModel::getMetaValue()
     * @uses AbstractModel::cleanComment()
     * @return string the documentation from the WSDL
     */
    public function getDocumentation()
    {
        return self::cleanComment($this->getMetaValue(self::META_DOCUMENTATION, ''), ' ');
    }
    /**
     * Sets the from schema meta value.
     * @uses AbstractModel::META_FROM_SCHEMA
     * @uses AbstractModel::addMeta()
     * @param string $fromSchema the url from which the element comes from
     * @return AbstractModel
     */
    public function setFromSchema($fromSchema)
    {
        return $this->addMeta(self::META_FROM_SCHEMA, $fromSchema);
    }
    /**
     * Get the from schema meta value
     * @uses AbstractModel::META_FROM_SCHEMA
     * @uses AbstractModel::getMetaValue()
     * @return string the from schema meta value
     */
    public function getFromSchema()
    {
        return $this->getMetaValue(self::META_FROM_SCHEMA, '');
    }
    /**
     * Returns a meta value according to its name
     * @uses AbstractModel::getMeta()
     * @param string $metaName the meta information name
     * @param mixed $fallback the fallback value if unset
     * @return mixed the meta information value
     */
    public function getMetaValue($metaName, $fallback = null)
    {
        return array_key_exists($metaName, $this->getMeta()) ? $this->meta[$metaName] : $fallback;
    }
    /**
     * Returns the value of the first meta value assigned to the name
     * @param array $names the meta names to check
     * @param mixed $fallback the fallback value if anyone is set
     * @return mixed the meta information value
     */
    public function getMetaValueFirstSet(array $names, $fallback = null)
    {
        foreach ($names as $name) {
            if (array_key_exists($name, $this->getMeta())) {
                return $this->meta[$name];
            }
        }
        return $fallback;
    }
    /**
     * Returns the original name extracted from the WSDL
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * Sets the original name extracted from the WSDL
     * @param string $name
     * @return AbstractModel
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
    /**
     * Returns a valid clean name for PHP
     * @uses AbstractModel::getName()
     * @uses AbstractModel::cleanString()
     * @param bool $keepMultipleUnderscores optional, allows to keep the multiple consecutive underscores
     * @return string
     */
    public function getCleanName($keepMultipleUnderscores = true)
    {
        return self::cleanString($this->getName(), $keepMultipleUnderscores);
    }
    /**
     * Returns the owner model object
     * @return AbstractModel
     */
    public function getOwner()
    {
        return $this->owner;
    }
    /**
     * Sets the owner model object
     * @param AbstractModel $owner object the owner of the current model
     * @uses AbstractModel::updateModels()
     * @return AbstractModel
     */
    public function setOwner(AbstractModel $owner)
    {
        $this->owner = $owner;
        self::updateModels($this);
        return $this;
    }
    /**
     * @return bool
     */
    public function getIsAbstract()
    {
        return $this->isAbstract;
    }
    /**
     * @param bool $isAbstract
     * @return AbstractModel
     */
    public function setIsAbstract($isAbstract)
    {
        $this->isAbstract = $isAbstract;
        self::updateModels($this);
        return $this;
    }
    /**
     * Returns true if the original name is safe to use as a PHP property, variable name or class name
     * @uses AbstractModel::getName()
     * @uses AbstractModel::getCleanName()
     * @return bool
     */
    public function nameIsClean()
    {
        return ($this->getName() != '' && $this->getName() == $this->getCleanName());
    }
    /**
     * Returns the packaged name
     * @uses Generator::getPackageName()
     * @uses AbstractModel::getCleanName()
     * @uses AbstractModel::getContextualPart()
     * @uses AbstractModel::uniqueName() to ensure unique naming of struct case sensitively
     * @return string
     */
    public function getPackagedName($namespaced = false)
    {
        return ($namespaced ? sprintf('\%s\\', $this->getNamespace()) : '') . Generator::getPackageName() . ucfirst(self::uniqueName($this->getCleanName(), $this->getContextualPart()));
    }
    /**
     * Allows to define the contextual part of the class name for the package
     * @return string
     */
    public function getContextualPart()
    {
        return '';
    }
    /**
     * Allows to define from which class the curent model extends
     * @param bool $short
     * @return string|null
     */
    public function getExtends($short = false)
    {
        return '';
    }
    /**
     * @return string
     */
    public function getNamespace()
    {
        $generator = Generator::instance();
        $namespace = $generator->getOptionNamespacePrefix();
        $directory = $generator->getDirectory($this);
        $packageName = Generator::getPackageName();
        $namespaceEnding = implode('\\', explode('/', substr($directory, 0, -1)));
        return sprintf(empty($namespace) ? '%1$s%4$s%3$s' : '%2$s\\%1$s%4$s%3$s', $packageName, $namespace, $namespaceEnding, empty($namespaceEnding) ? '' : '\\');
    }
    /**
     * Returns the sub package name which the model belongs to
     * Must be overridden by sub classes
     * @return array
     */
    public function getDocSubPackages()
    {
        return array();
    }
    /**
     * Clean a string to make it valid as PHP variable
     * @param string $string the string to clean
     * @param bool $keepMultipleUnderscores optional, allows to keep the multiple consecutive underscores
     * @return string
     */
    public static function cleanString($string, $keepMultipleUnderscores = true)
    {
        return Utils::cleanString($string, $keepMultipleUnderscores);
    }
    /**
     * Get models
     * @return array
     */
    public static function getModels()
    {
        return self::$models;
    }
    /**
     * Returns the model by its name
     * @uses AbstractModel::getModels()
     * @param string $modelName the original Struct name
     * @return Struct|null
     */
    public static function getModelByName($modelName)
    {
        if (!is_scalar($modelName)) {
            return null;
        }
        return array_key_exists('_' . $modelName . '_', self::getModels()) ? self::$models['_' . $modelName . '_'] : null;
    }
    /**
     * Updates models with model
     * @uses AbstractModel::getName()
     * @uses AbstractModel::__toString()
     * @param AbstractModel $model a AbstractModel object
     * @return Struct|bool
     */
    protected static function updateModels(AbstractModel $model)
    {
        if ($model->__toString() != 'Struct' || !$model->getName()) {
            return false;
        }
        return (self::$models['_' . $model->getName() . '_'] = $model);
    }
    /**
     * Returns a usable keyword for a original keyword
     * @param string $keyword the keyword
     * @param string $context the context
     * @return string
     */
    public static function replaceReservedPhpKeyword($keyword, $context)
    {
        $phpReservedKeywordFound = '';
        if (ReservedKeywords::instance()->is($keyword)) {
            $keywordKey = $phpReservedKeywordFound . '_' . $context;
            if (!array_key_exists($keywordKey, self::$replacedReservedPhpKeywords)) {
                self::$replacedReservedPhpKeywords[$keywordKey] = 0;
            } else {
                self::$replacedReservedPhpKeywords[$keywordKey]++;
            }
            return '_' . $keyword . (self::$replacedReservedPhpKeywords[$keywordKey] ? '_' . self::$replacedReservedPhpKeywords[$keywordKey] : '');
        } else {
            return $keyword;
        }
    }
    /**
     * Static method wich returns a unique name case sensitively
     * Useful to name methods case sensitively distinct, see http://the-echoplex.net/log/php-case-sensitivity
     * @param string $name the original name
     * @param string $context the context where the name is needed unique
     * @return string
     */
    protected static function uniqueName($name, $context)
    {
        $insensitiveKey = strtolower($name . '_' . $context);
        $sensitiveKey = $name . '_' . $context;
        if (array_key_exists($sensitiveKey, self::$uniqueNames)) {
            return self::$uniqueNames[$sensitiveKey];
        } elseif (!array_key_exists($insensitiveKey, self::$uniqueNames)) {
            self::$uniqueNames[$insensitiveKey] = 0;
        } else {
            self::$uniqueNames[$insensitiveKey]++;
        }
        $uniqueName = $name . (self::$uniqueNames[$insensitiveKey] ? '_' . self::$uniqueNames[$insensitiveKey] : '');
        self::$uniqueNames[$sensitiveKey] = $uniqueName;
        return $uniqueName;
    }
    /**
     * Clean comment
     * @param string $comment the comment to clean
     * @param string $glueSeparator ths string to use when gathering values
     * @param bool $uniqueValues indicates if comment values must be unique or not
     * @return string
     */
    public static function cleanComment($comment, $glueSeparator = ',', $uniqueValues = true)
    {
        return Utils::cleanComment($comment, $glueSeparator, $uniqueValues);
    }
    /**
     * Returns class name
     * @return string __CLASS__
     */
    public function __toString()
    {
        return 'AbstractModel';
    }
}
