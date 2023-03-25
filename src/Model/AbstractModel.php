<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Model;

use WsdlToPhp\PackageGenerator\ConfigurationReader\AbstractReservedWord;
use WsdlToPhp\PackageGenerator\ConfigurationReader\GeneratorOptions;
use WsdlToPhp\PackageGenerator\ConfigurationReader\PhpReservedKeyword;
use WsdlToPhp\PackageGenerator\Generator\AbstractGeneratorAware;
use WsdlToPhp\PackageGenerator\Generator\Generator;
use WsdlToPhp\PackageGenerator\Generator\Utils as GeneratorUtils;

/**
 * Class AbstractModel defines the basic properties and methods to operations and structs extracted from the WSDL.
 */
abstract class AbstractModel extends AbstractGeneratorAware implements \JsonSerializable
{
    public const META_DOCUMENTATION = 'documentation';

    /**
     * Original name of the element.
     *
     * @var mixed
     */
    protected $name;

    /**
     * Values associated to the operation.
     *
     * @var string[]
     */
    protected array $meta = [];

    /**
     * Define the inheritance of a struct by the name of the parent struct or type.
     */
    protected string $inheritance = '';

    /**
     * Store the object which owns the current model.
     */
    protected ?AbstractModel $owner = null;

    /**
     * Indicates that the current element is an abstract element.
     * It allows to generated an abstract class.
     * This will happen for element/complexType that are defined with abstract="true".
     */
    protected bool $isAbstract = false;

    /**
     * Replaced keywords time in order to generate unique new keyword.
     */
    protected static array $replacedPhpReservedKeywords = [];

    /**
     * Replaced methods time in order to generate unique new method.
     */
    protected array $replacedReservedMethods = [];

    /**
     * Unique name generated in order to ensure unique naming (for struct constructor and setters/getters even for different case attribute name with same value).
     */
    protected static array $uniqueNames = [];

    public function __construct(Generator $generator, $name)
    {
        parent::__construct($generator);
        $this->setName($name);
    }

    public function getExtendsClassName(): string
    {
        $extends = '';
        if (($model = $this->getInheritedModel()) instanceof Struct && $model->isStruct()) {
            $extends = $model->getPackagedName($model->isRestriction());
        }
        if (empty($extends)) {
            $extends = $this->getExtends(true);
        }

        return $extends;
    }

    public function getInheritance(): string
    {
        return $this->inheritance;
    }

    public function setInheritance(string $inheritance = ''): self
    {
        $this->inheritance = $inheritance;

        return $this;
    }

    public function getInheritedModel(): ?Struct
    {
        return $this->getGenerator()->getStructByName($this->getInheritance());
    }

    public function getMeta(): array
    {
        return $this->meta;
    }

    public function setMeta(array $meta = []): self
    {
        $this->meta = $meta;

        return $this;
    }

    public function addMeta(string $metaName, $metaValue): self
    {
        if (!is_scalar($metaName) || (!is_scalar($metaValue) && !is_array($metaValue))) {
            throw new \InvalidArgumentException(sprintf('Invalid meta name "%s" or value "%s". Please provide scalar meta name and scalar or array meta value.', gettype($metaName), gettype($metaValue)), __LINE__);
        }
        $metaValue = is_scalar($metaValue) ? (is_numeric($metaValue) || is_bool($metaValue) ? $metaValue : trim($metaValue)) : $metaValue;
        if (is_scalar($metaValue) || is_array($metaValue)) {
            if (!array_key_exists($metaName, $this->meta)) {
                $this->meta[$metaName] = $metaValue;
            } elseif (is_array($this->meta[$metaName]) && is_array($metaValue)) {
                $this->meta[$metaName] = array_merge($this->meta[$metaName], $metaValue);
            } elseif (is_array($this->meta[$metaName])) {
                array_push($this->meta[$metaName], $metaValue);
            } elseif (array_key_exists($metaName, $this->meta) && $metaValue !== $this->meta[$metaName]) {
                $this->meta[$metaName] = [
                    $this->meta[$metaName],
                    $metaValue,
                ];
            } else {
                $this->meta[$metaName] = $metaValue;
            }
            ksort($this->meta);
        }

        return $this;
    }

    public function setDocumentation(string $documentation): self
    {
        return $this->addMeta(self::META_DOCUMENTATION, is_array($documentation) ? $documentation : [
            $documentation,
        ]);
    }

    public function getMetaValue(string $metaName, $fallback = null)
    {
        $meta = $this->getMeta();

        return array_key_exists($metaName, $meta) ? $meta[$metaName] : $fallback;
    }

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

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCleanName(bool $keepMultipleUnderscores = true): string
    {
        return self::cleanString($this->getName(), $keepMultipleUnderscores);
    }

    public function getOwner(): ?AbstractModel
    {
        return $this->owner;
    }

    public function setOwner(?AbstractModel $owner = null): self
    {
        $this->owner = $owner;

        return $this;
    }

    public function isAbstract(): bool
    {
        return $this->isAbstract;
    }

    public function setAbstract(bool $isAbstract): self
    {
        $this->isAbstract = $isAbstract;

        return $this;
    }

    public function nameIsClean(): bool
    {
        return '' !== $this->getName() && $this->getName() === $this->getCleanName();
    }

    public function getPackagedName(bool $namespaced = false): string
    {
        $nameParts = [];
        if ($namespaced && !empty($this->getNamespace())) {
            $nameParts[] = sprintf('\%s\\', $this->getNamespace());
        }

        $cleanName = $this->getCleanName();
        if (!empty($this->getGenerator()->getOptionPrefix())) {
            $nameParts[] = $this->getGenerator()->getOptionPrefix();
        } else {
            $cleanName = self::replacePhpReservedKeyword($cleanName);
        }

        $nameParts[] = ucfirst(self::uniqueName($cleanName, $this->getContextualPart()));
        if (!empty($this->getGenerator()->getOptionSuffix())) {
            $nameParts[] = $this->getGenerator()->getOptionSuffix();
        }

        return implode('', $nameParts);
    }

    /**
     * Allows to define the contextual part of the class name for the package.
     */
    public function getContextualPart(): string
    {
        return '';
    }

    public function getExtends(bool $short = false): ?string
    {
        return '';
    }

    public function getNamespace(): string
    {
        $namespaces = [];
        $namespace = $this->getGenerator()->getOptionNamespacePrefix();

        if (!empty($namespace)) {
            $namespaces[] = $namespace;
        }

        if (!empty($this->getSubDirectory())) {
            $namespaces[] = str_replace('/', '\\', $this->getSubDirectory());
        }

        return implode('\\', $namespaces);
    }

    public function getSubDirectory(): string
    {
        $subDirectory = '';
        if (GeneratorOptions::VALUE_CAT === $this->getGenerator()->getOptionCategory()) {
            $subDirectory = $this->getContextualPart();
        }

        return $subDirectory;
    }

    /**
     * Returns the sub package name which the model belongs to
     * Must be overridden by sub classes.
     */
    public function getDocSubPackages(): array
    {
        return [];
    }

    public static function cleanString(string $string, bool $keepMultipleUnderscores = true): string
    {
        return GeneratorUtils::cleanString($string, $keepMultipleUnderscores);
    }

    public static function replacePhpReservedKeyword(string $keyword, ?string $context = null): string
    {
        if (PhpReservedKeyword::instance()->is($keyword)) {
            if (!is_null($context)) {
                $keywordKey = $keyword.'_'.$context;
                if (!array_key_exists($keywordKey, self::$replacedPhpReservedKeywords)) {
                    self::$replacedPhpReservedKeywords[$keywordKey] = 0;
                } else {
                    ++self::$replacedPhpReservedKeywords[$keywordKey];
                }

                return '_'.$keyword.(self::$replacedPhpReservedKeywords[$keywordKey] ? '_'.self::$replacedPhpReservedKeywords[$keywordKey] : '');
            }

            return '_'.$keyword;
        }

        return $keyword;
    }

    public function getReservedMethodsInstance(): AbstractReservedWord
    {
        throw new \InvalidArgumentException(sprintf('The method %s should be defined in the class %s', __FUNCTION__, static::class));
    }

    public function replaceReservedMethod(string $methodName, ?string $context = null): string
    {
        if ($this->getReservedMethodsInstance()->is($methodName)) {
            if (!is_null($context)) {
                $methodKey = $methodName.'_'.$context;
                if (!array_key_exists($methodKey, $this->replacedReservedMethods)) {
                    $this->replacedReservedMethods[$methodKey] = 0;
                } else {
                    ++$this->replacedReservedMethods[$methodKey];
                }

                return '_'.$methodName.($this->replacedReservedMethods[$methodKey] ? '_'.$this->replacedReservedMethods[$methodKey] : '');
            }

            return '_'.$methodName;
        }

        return $methodName;
    }

    /**
     * Gives the availability for test purpose and multiple package generation to purge unique names.
     */
    public static function purgeUniqueNames()
    {
        self::$uniqueNames = [];
    }

    /**
     * Gives the availability for test purpose and multiple package generation to purge reserved keywords usage.
     */
    public static function purgePhpReservedKeywords()
    {
        self::$replacedPhpReservedKeywords = [];
    }

    public function jsonSerialize(): array
    {
        return array_merge($this->toJsonSerialize(), [
            'inheritance' => $this->inheritance,
            'abstract' => $this->isAbstract,
            'meta' => $this->meta,
            'name' => $this->name,
            '__CLASS__' => static::class,
        ]);
    }

    public static function instanceFromSerializedJson(Generator $generator, array $args): self
    {
        self::checkSerializedJson($args);
        $class = $args['__CLASS__'];
        $instance = new $class($generator, $args['name']);
        unset($args['name'], $args['__CLASS__']);
        foreach ($args as $arg => $value) {
            $setFromSerializedJson = sprintf('set%sFromSerializedJson', ucfirst($arg));
            $set = sprintf('set%s', ucfirst($arg));
            if (method_exists($instance, $setFromSerializedJson)) {
                $instance->{$setFromSerializedJson}($value);
            } elseif (method_exists($instance, $set)) {
                $instance->{$set}($value);
            }
        }

        return $instance;
    }

    /**
     * Allows to merge meta from different sources and ensure consistency of their order
     * Must be passed as less important (at first position) to most important (last position).
     */
    protected function mergeMeta(): array
    {
        $meta = func_get_args();
        $mergedMeta = [];
        $metaDocumentation = [];
        // gather meta
        foreach ($meta as $metaItem) {
            foreach ($metaItem as $metaName => $metaValue) {
                if (self::META_DOCUMENTATION === $metaName) {
                    $metaDocumentation = array_merge($metaDocumentation, $metaValue);
                } elseif (!array_key_exists($metaName, $mergedMeta)) {
                    $mergedMeta[$metaName] = $metaValue;
                } elseif (is_array($mergedMeta[$metaName]) && is_array($metaValue)) {
                    $mergedMeta[$metaName] = array_merge($mergedMeta[$metaName], $metaValue);
                } elseif (is_array($mergedMeta[$metaName])) {
                    $mergedMeta[$metaName][] = $metaValue;
                } else {
                    $mergedMeta[$metaName] = $metaValue;
                }
            }
        }

        // sort by key
        ksort($mergedMeta);

        // add documentation if any at first position
        if (!empty($metaDocumentation)) {
            $definitiveMeta = [
                self::META_DOCUMENTATION => array_unique(array_reverse($metaDocumentation)),
            ];
            foreach ($mergedMeta as $metaName => $metaValue) {
                $definitiveMeta[$metaName] = $metaValue;
            }
            $mergedMeta = $definitiveMeta;
            unset($definitiveMeta);
        }
        unset($meta, $metaDocumentation);

        return $mergedMeta;
    }

    /**
     * Static method which returns a unique name case sensitively
     * Useful to name methods case sensitively distinct, see http://the-echoplex.net/log/php-case-sensitivity.
     *
     * @param string $name    the original name
     * @param string $context the context where the name is needed unique
     */
    protected static function uniqueName(string $name, string $context): string
    {
        $insensitiveKey = mb_strtolower($name.'_'.$context);
        $sensitiveKey = $name.'_'.$context;
        if (array_key_exists($sensitiveKey, self::$uniqueNames)) {
            return self::$uniqueNames[$sensitiveKey];
        }

        if (!array_key_exists($insensitiveKey, self::$uniqueNames)) {
            self::$uniqueNames[$insensitiveKey] = 0;
        } else {
            ++self::$uniqueNames[$insensitiveKey];
        }

        $uniqueName = $name.(self::$uniqueNames[$insensitiveKey] ? '_'.self::$uniqueNames[$insensitiveKey] : '');
        self::$uniqueNames[$sensitiveKey] = $uniqueName;

        return $uniqueName;
    }

    /**
     * Must return the properties of the inherited class.
     */
    abstract protected function toJsonSerialize(): array;

    protected static function checkSerializedJson(array $args): void
    {
        if (!array_key_exists('__CLASS__', $args)) {
            throw new \InvalidArgumentException(sprintf('__CLASS__ key is missing from "%s"', var_export($args, true)));
        }

        if (!class_exists($args['__CLASS__'])) {
            throw new \InvalidArgumentException(sprintf('Class "%s" is unknown', $args['__CLASS__']));
        }

        if (!array_key_exists('name', $args)) {
            throw new \InvalidArgumentException(sprintf('name key is missing from "%s"', var_export($args, true)));
        }
    }
}
