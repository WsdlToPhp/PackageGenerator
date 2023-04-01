<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\ConfigurationReader;

use WsdlToPhp\PackageGenerator\Model\StructValue;

/**
 * @method string getCategory()
 * @method self   setCategory(string $category)
 * @method string getGatherMethods()
 * @method self   setGatherMethods(string $gatherMethods)
 * @method bool   getGenerateTutorialFile()
 * @method self   setGenerateTutorialFile(bool $generateTutorialFile)
 * @method bool   getGenericConstantsNames()
 * @method self   setGenericConstantsNames(bool $genericConstantsNames)
 * @method bool   getNamespaceDictatesDirectories()
 * @method self   setNamespaceDictatesDirectories(bool $namespaceDictatesDirectories)
 * @method bool   getStandalone()
 * @method self   setStandalone(bool $standalone)
 * @method bool   getValidation()
 * @method self   setValidation(bool $validation)
 * @method string getStructClass()
 * @method self   setStructClass(string $structClass)
 * @method string getStructArrayClass()
 * @method self   setStructArrayClass(string $structArrayClass)
 * @method string getStructEnumClass()
 * @method self   setStructEnumClass(string $structEnumClass)
 * @method string getSoapClientClass()
 * @method self   setSoapClientClass(string $soapClientClass)
 * @method string getOptionNamespace()
 * @method self   setOptionNamespace(string $namespace)
 * @method string getOrigin()
 * @method self   setOrigin(string $origin)
 * @method string getDestination()
 * @method self   setDestination(string $destination)
 * @method string getSrcDirname()
 * @method self   setSrcDirname(string $srcDirname)
 * @method string getPrefix()
 * @method self   setPrefix(string $prefix)
 * @method string getSuffix()
 * @method self   setSuffix(string $suffix)
 * @method string getBasicLogin()
 * @method self   setBasicLogin(string $basicLogin)
 * @method string getBasicPassword()
 * @method self   setBasicPassword(string $basicPassword)
 * @method string getProxyHost()
 * @method self   setProxyHost(string $proxyHost)
 * @method string getProxyPort()
 * @method self   setProxyPort(string $proxyPort)
 * @method string getProxyLogin()
 * @method self   setProxyLogin(string $proxyLogin)
 * @method string getProxyPassword()
 * @method self   setProxyPassword(string $proxyPassword)
 * @method string getSoapOptions()
 * @method self   setSoapOptions(array $soapOptions)
 * @method string getComposerName()
 * @method self   setComposerName(string $composerName)
 * @method array  getComposerSettings()
 * @method string getStructsFolder()
 * @method self   setStructsFolder(string $structsFolder)
 * @method string getArraysFolder()
 * @method self   setArraysFolder(string $arraysFolder)
 * @method string getEnumsFolder()
 * @method self   setEnumsFolder(string $enumsFolder)
 * @method string getServicesFolder()
 * @method self   setServicesFolder(string $servicesFolder)
 * @method bool   getSchemasSave()
 * @method self   setSchemasSave(bool $saveSchemas)
 * @method string getSchemasFolder()
 * @method self   setSchemasFolder(string $schemasFolder)
 * @method string getXsdTypesPath()
 * @method self   setXsdTypesPath(string $xsdTypesPath)
 */
final class GeneratorOptions extends AbstractYamlReader implements \JsonSerializable
{
    /**
     * Common values used as option's value.
     */
    public const VALUE_CAT = 'cat';
    public const VALUE_END = 'end';
    public const VALUE_FALSE = false;
    public const VALUE_NONE = 'none';
    public const VALUE_START = 'start';
    public const VALUE_TRUE = true;

    /**
     * Possible option keys.
     */
    public const ADD_COMMENTS = 'add_comments';
    public const ARRAYS_FOLDER = 'arrays_folder';
    public const BASIC_LOGIN = 'basic_login';
    public const BASIC_PASSWORD = 'basic_password';
    public const CATEGORY = 'category';
    public const COMPOSER_NAME = 'composer_name';
    public const COMPOSER_SETTINGS = 'composer_settings';
    public const DESTINATION = 'destination';
    public const ENUMS_FOLDER = 'enums_folder';
    public const GATHER_METHODS = 'gather_methods';
    public const GENERATE_TUTORIAL_FILE = 'generate_tutorial_file';
    public const GENERIC_CONSTANTS_NAME = 'generic_constants_names';
    public const NAMESPACE_PREFIX = 'namespace_prefix';
    public const NAMESPACE_DICTATES_DIRECTORIES = 'namespace_dictates_directories';
    public const ORIGIN = 'origin';
    public const PREFIX = 'prefix';
    public const PROXY_HOST = 'proxy_host';
    public const PROXY_LOGIN = 'proxy_login';
    public const PROXY_PASSWORD = 'proxy_password';
    public const PROXY_PORT = 'proxy_port';
    public const SERVICES_FOLDER = 'services_folder';
    public const SOAP_CLIENT_CLASS = 'soap_client_class';
    public const SOAP_OPTIONS = 'soap_options';
    public const SRC_DIRNAME = 'src_dirname';
    public const STANDALONE = 'standalone';
    public const STRUCT_ARRAY_CLASS = 'struct_array_class';
    public const STRUCT_ENUM_CLASS = 'struct_enum_class';
    public const STRUCT_CLASS = 'struct_class';
    public const STRUCTS_FOLDER = 'structs_folder';
    public const SUFFIX = 'suffix';
    public const VALIDATION = 'validation';
    public const SCHEMAS_SAVE = 'schemas_save';
    public const SCHEMAS_FOLDER = 'schemas_folder';
    public const XSD_TYPES_PATH = 'xsd_types_path';

    protected array $options = [];

    protected function __construct(string $filename)
    {
        $this->parseOptions($filename);
    }

    public function __call(string $name, array $arguments)
    {
        if (0 === strpos($name, 'set') && 1 === count($arguments)) {
            return $this->setOptionValue(self::methodNameToOptionName($name), array_shift($arguments));
        }
        if (empty($arguments) && 0 === strpos($name, 'get')) {
            return $this->getOptionValue(self::methodNameToOptionName($name));
        }

        throw new \BadMethodCallException(sprintf('Method %s undefined', $name));
    }

    public static function instance(?string $filename = null): self
    {
        return parent::instance($filename);
    }

    public function getOptionValue(string $optionName)
    {
        if (!array_key_exists($optionName, $this->options)) {
            throw new \InvalidArgumentException(sprintf('Invalid option name "%s", possible options: %s', $optionName, implode(', ', array_keys($this->options))), __LINE__);
        }

        return array_key_exists('value', $this->options[$optionName]) ? $this->options[$optionName]['value'] : $this->options[$optionName]['default'];
    }

    public function setOptionValue(string $optionName, $optionValue, array $values = []): self
    {
        if (!array_key_exists($optionName, $this->options)) {
            $this->options[$optionName] = [
                'value' => $optionValue,
                'values' => $values,
            ];
        } elseif (!empty($this->options[$optionName]['values']) && !in_array($optionValue, $this->options[$optionName]['values'], true)) {
            throw new \InvalidArgumentException(sprintf('Invalid value "%s" for option "%s", possible values: %s', $optionValue, $optionName, implode(', ', $this->options[$optionName]['values'])), __LINE__);
        } else {
            $this->options[$optionName]['value'] = $optionValue;
        }

        return $this;
    }

    public static function getDefaultConfigurationPath(): string
    {
        return __DIR__.'/../resources/config/generator_options.yml';
    }

    public static function methodNameToOptionName(string $name): string
    {
        return strtolower(trim(preg_replace(StructValue::MATCH_PATTERN, StructValue::REPLACEMENT_PATTERN, substr($name, 3)), '_'));
    }

    public function setAddComments(array $addComments = []): self
    {
        /**
         * If array is type array("author:john Doe","Release:1",).
         */
        $comments = [];
        foreach ($addComments as $index => $value) {
            if (is_numeric($index) && mb_strpos($value, ':') > 0) {
                [$tag, $val] = explode(':', $value);
                $comments[$tag] = $val;
            } else {
                $comments[$index] = $value;
            }
        }

        return $this->setOptionValue(self::ADD_COMMENTS, $comments);
    }

    public function getNamespace(): string
    {
        return $this->getOptionValue(self::NAMESPACE_PREFIX);
    }

    public function setNamespace(string $namespace): self
    {
        return $this->setOptionValue(self::NAMESPACE_PREFIX, $namespace);
    }

    public function setComposerSettings(array $composerSettings = []): self
    {
        /**
         * If array is type array("config.value:true","require:library/src",).
         */
        $settings = [];
        foreach ($composerSettings as $index => $value) {
            if (is_numeric($index) && mb_strpos($value, ':') > 0) {
                $path = implode('', array_slice(explode(':', $value), 0, 1));
                $val = implode(':', array_slice(explode(':', $value), 1));
                self::dotNotationToArray($path, $val, $settings);
            } else {
                $settings[$index] = $value;
            }
        }

        return $this->setOptionValue(self::COMPOSER_SETTINGS, $settings);
    }

    public function toArray(): array
    {
        $options = [];
        foreach (array_keys($this->options) as $name) {
            $options[$name] = $this->getOptionValue($name);
        }

        return $options;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }

    protected function parseOptions(string $filename): self
    {
        $options = $this->loadYaml($filename);
        if (is_array($options)) {
            $this->options = $options;
        } else {
            throw new \InvalidArgumentException(sprintf('Settings contained by "%s" are not valid as the settings are not contained by an array: "%s"', $filename, gettype($options)), __LINE__);
        }

        return $this;
    }

    /**
     * turns my.key.path to array('my' => array('key' => array('path' => $value))).
     *
     * @param mixed $value
     */
    protected static function dotNotationToArray(string $string, $value, array &$array): void
    {
        $keys = explode('.', $string);
        foreach ($keys as $key) {
            $array = &$array[$key];
        }
        $array = ('true' === $value || 'false' === $value) ? 'true' === $value : $value;
    }
}
