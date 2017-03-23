<?php

namespace WsdlToPhp\PackageGenerator\Model;

use WsdlToPhp\PackageGenerator\ConfigurationReader\GeneratorOptions;
use WsdlToPhp\PackageGenerator\ConfigurationReader\PhpReservedKeyword;
use WsdlToPhp\PackageGenerator\ConfigurationReader\AbstractReservedWord;
use WsdlToPhp\PackageGenerator\Generator\Generator;
use WsdlToPhp\PackageGenerator\Generator\Utils as GeneratorUtils;
use WsdlToPhp\PackageGenerator\Generator\AbstractGeneratorAware;

/**
 * Class AbstractModel defines the basic properties and methods to operations and structs extracted from the WSDL
 */
abstract class AbstractModel extends AbstractGeneratorAware
{
    /**
     * Constant used to define the key to store documentation value in meta
     * @var string
     */
    const META_DOCUMENTATION = 'documentation';
    /**
     * Original name od the element
     * @var string
     */
    private $name = '';
    /**
     * Values associated to the operation
     * @var string[]
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
     * Replaced keywords time in order to generate unique new keyword
     * @var array
     */
    private static $replacedPhpReservedKeywords = array();
    /**
     * Replaced methods time in order to generate unique new method
     * @var array
     */
    private $replacedReservedMethods = array();
    /**
     * Unique name generated in order to ensure unique naming (for struct constructor and setters/getters even for different case attribute name whith same value)
     * @var array
     */
    private static $uniqueNames = array();
    /**
     * Main constructor
     * @uses AbstractModel::setName()
     * @param Generator $generator
     * @param string $name the original name
     */
    public function __construct(Generator $generator, $name)
    {
        parent::__construct($generator);
        $this->setName($name);
    }
    /**
     * @uses AbstractModel::getInheritedModel()
     * @uses AbstractModel::getPackagedName()
     * @uses AbstractModel::getExtends()
     * @uses Struct::getIsStruct()
     * @return string
     */
    public function getExtendsClassName()
    {
        $extends = '';
        if (($model = $this->getInheritedModel()) instanceof Struct && $model->getIsStruct()) {
            $extends = $model->getPackagedName($model->getIsRestriction());
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
     * @param string $inheritance
     * @return AbstractModel
     */
    public function setInheritance($inheritance = '')
    {
        $this->inheritance = $inheritance;
        return $this;
    }
    /**
     * @uses AbstractGeneratorAware::getGenerator()
     * @uses Generator::getStruct()
     * @uses AbstractModel::getInheritance()
     * @return Struct
     */
    public function getInheritedModel()
    {
        return $this->getGenerator()->getStruct($this->getInheritance());
    }
    /**
     * Returns the meta
     * @return string[]
     */
    public function getMeta()
    {
        return $this->meta;
    }
    /**
     * Sets the meta
     * @param string[] $meta
     * @return AbstractModel
     */
    public function setMeta(array $meta = array())
    {
        $this->meta = $meta;
        return $this;
    }
    /**
     * Add meta information to the operation
     * @uses AbstractModel::getMeta()
     * @throws \InvalidArgumentException
     * @param string $metaName
     * @param mixed $metaValue
     * @return AbstractModel
     */
    public function addMeta($metaName, $metaValue)
    {
        if (!is_scalar($metaName) || (!is_scalar($metaValue) && !is_array($metaValue))) {
            throw new \InvalidArgumentException(sprintf('Invalid meta name "%s" or value "%s". Please provide scalar meta name and scalar or array meta value.', gettype($metaName), gettype($metaValue)), __LINE__);
        }
        $metaValue = is_scalar($metaValue) ? trim($metaValue) : $metaValue;
        if ((is_scalar($metaValue) && $metaValue !== '') || is_array($metaValue)) {
            if (!array_key_exists($metaName, $this->meta)) {
                $this->meta[$metaName] = $metaValue;
            } elseif (is_array($this->meta[$metaName]) && is_array($metaValue)) {
                $this->meta[$metaName] = array_merge($this->meta[$metaName], $metaValue);
            } elseif (is_array($this->meta[$metaName])) {
                array_push($this->meta[$metaName], $metaValue);
            } else {
                $this->meta[$metaName] = $metaValue;
            }
            ksort($this->meta);
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
        return $this->addMeta(self::META_DOCUMENTATION, is_array($documentation) ? $documentation : array(
            $documentation,
        ));
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
        $meta = $this->getMeta();
        return array_key_exists($metaName, $meta) ? $meta[$metaName] : $fallback;
    }
    /**
     * Returns the value of the first meta value assigned to the name
     * @param string[] $names the meta names to check
     * @param mixed $fallback the fallback value if anyone is set
     * @return mixed the meta information value
     */
    public function getMetaValueFirstSet(array $names, $fallback = null)
    {
        $meta = $this->getMeta();
        foreach ($names as $name) {
            if (array_key_exists($name, $meta)) {
                return $meta[$name];
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
     * @return AbstractModel
     */
    public function setOwner(AbstractModel $owner)
    {
        $this->owner = $owner;
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
        return ($this->getName() !== '' && $this->getName() === $this->getCleanName());
    }
    /**
     * Returns the packaged name
     * @uses AbstractModel::getNamespace()
     * @uses AbstractModel::getCleanName()
     * @uses AbstractModel::getContextualPart()
     * @uses AbstractModel::uniqueName()
     * @uses AbstractModel::replacePhpReservedKeyword()
     * @uses AbstractGeneratorAware::getGenerator()
     * @uses Generator::getOptionPrefix()
     * @uses Generator::getOptionSuffix()
     * @uses AbstractModel::uniqueName() to ensure unique naming of struct case sensitively
     * @return string
     */
    public function getPackagedName($namespaced = false)
    {
        $nameParts = array();
        if ($namespaced && $this->getNamespace() !== '') {
            $nameParts[] = sprintf('\%s\\', $this->getNamespace());
        }
        $cleanName = $this->getCleanName();
        if ($this->getGenerator()->getOptionPrefix() !== '') {
            $nameParts[] = $this->getGenerator()->getOptionPrefix();
        } else {
            $cleanName = self::replacePhpReservedKeyword($cleanName);
        }
        $nameParts[] = ucfirst(self::uniqueName($cleanName, $this->getContextualPart()));
        if ($this->getGenerator()->getOptionSuffix() !== '') {
            $nameParts[] = $this->getGenerator()->getOptionSuffix();
        }
        return implode('', $nameParts);
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
     * @uses AbstractGeneratorAware::getGenerator()
     * @uses Generator::getOptionNamespacePrefix()
     * @uses Generator::getOptionPrefix()
     * @uses Generator::getOptionSuffix()
     * @uses AbstractModel::getSubDirectory()
     * @return string
     */
    public function getNamespace()
    {
        $namespaces = array();
        $namespace = $this->getGenerator()->getOptionNamespacePrefix();
        if (empty($namespace)) {
            if ($this->getGenerator()->getOptionPrefix() !== '') {
                $namespaces[] = $this->getGenerator()->getOptionPrefix();
            } elseif ($this->getGenerator()->getOptionSuffix() !== '') {
                $namespaces[] = $this->getGenerator()->getOptionSuffix();
            }
        } else {
            $namespaces[] = $namespace;
        }
        if ($this->getSubDirectory() !== '') {
            $namespaces[] = $this->getSubDirectory();
        }
        return implode('\\', $namespaces);
    }
    /**
     * Returns directory where to store class and create it if needed
     * @uses AbstractGeneratorAware::getGenerator()
     * @uses AbstractModel::getOptionCategory()
     * @uses AbstractGeneratorAware::getContextualPart()
     * @uses GeneratorOptions::VALUE_CAT
     * @return string
     */
    public function getSubDirectory()
    {
        $subDirectory = '';
        if ($this->getGenerator()->getOptionCategory() === GeneratorOptions::VALUE_CAT) {
            $subDirectory = $this->getContextualPart();
        }
        return $subDirectory;
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
     * @uses GeneratorUtils::cleanString()
     * @param string $string the string to clean
     * @param bool $keepMultipleUnderscores optional, allows to keep the multiple consecutive underscores
     * @return string
     */
    public static function cleanString($string, $keepMultipleUnderscores = true)
    {
        return GeneratorUtils::cleanString($string, $keepMultipleUnderscores);
    }
    /**
     * Returns a usable keyword for a original keyword
     * @uses PhpReservedKeyword::instance()
     * @uses PhpReservedKeyword::is()
     * @param string $keyword the keyword
     * @param string $context the context
     * @return string
     */
    public static function replacePhpReservedKeyword($keyword, $context = null)
    {
        if (PhpReservedKeyword::instance()->is($keyword)) {
            if ($context !== null) {
                $keywordKey = $keyword . '_' . $context;
                if (!array_key_exists($keywordKey, self::$replacedPhpReservedKeywords)) {
                    self::$replacedPhpReservedKeywords[$keywordKey] = 0;
                } else {
                    self::$replacedPhpReservedKeywords[$keywordKey]++;
                }
                return '_' . $keyword . (self::$replacedPhpReservedKeywords[$keywordKey] ? '_' . self::$replacedPhpReservedKeywords[$keywordKey] : '');
            } else {
                return '_' . $keyword;
            }
        } else {
            return $keyword;
        }
    }
    /**
     * @throws \InvalidArgumentException
     * @param $filename
     * @return AbstractReservedWord
     */
    public function getReservedMethodsInstance($filename = null)
    {
        throw new \InvalidArgumentException(sprintf('The method %s should be defined in the class %s', __FUNCTION__, get_called_class(), __LINE__));
    }
    /**
     * Returns a usable method for a original method
     * @uses PhpReservedKeywords::instance()
     * @uses PhpReservedKeywords::is()
     * @param string $methodName the method name
     * @param string $context the context
     * @return string
     */
    public function replaceReservedMethod($methodName, $context = null)
    {
        if ($this->getReservedMethodsInstance()->is($methodName)) {
            if ($context !== null) {
                $methodKey = $methodName . '_' . $context;
                if (!array_key_exists($methodKey, $this->replacedReservedMethods)) {
                    $this->replacedReservedMethods[$methodKey] = 0;
                } else {
                    $this->replacedReservedMethods[$methodKey]++;
                }
                return '_' . $methodName . ($this->replacedReservedMethods[$methodKey] ? '_' . $this->replacedReservedMethods[$methodKey] : '');
            } else {
                return '_' . $methodName;
            }
        } else {
            return $methodName;
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
     * Gives the availability for test purpose and multiple package generation to purge unique names
     * @todo see if it can be removed by reviewing how unique names are generated
     */
    public static function purgeUniqueNames()
    {
        self::$uniqueNames = array();
    }
    /**
     * Gives the availability for test purpose and multiple package generation to purge reserved keywords usage
     * @todo see if it can be removed by reviewing how reserved keywords are generated
     */
    public static function purgePhpReservedKeywords()
    {
        self::$replacedPhpReservedKeywords = array();
    }
    /**
     * Gives the availability for test purpose and multiple package generation to purge reserved methods usage
     * @todo see if it can be removed by reviewing how reserved methods are generated
     */
    public static function purgeReservedMethods()
    {
        self::$replacedReservedMethods = array();
    }
}
