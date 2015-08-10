<?php

namespace WsdlToPhp\PackageGenerator\ConfigurationReader;

class GeneratorOptions extends AbstractYamlReader
{
    /**
     * Common values used as option's value
     */
    const VALUE_START = 'start';
    const VALUE_END = 'end';
    const VALUE_NONE = 'none';
    const VALUE_CAT = 'cat';
    const VALUE_TRUE = true;
    const VALUE_FALSE = false;
    /**
     * Possible option keys
     * @var string
     */
    const SUFFIX = 'suffix';
    const PREFIX = 'prefix';
    const ORIGIN = 'origin';
    const CATEGORY = 'category';
    const STANDALONE = 'standalone';
    const PROXY_HOST = 'proxy_host';
    const PROXY_PORT = 'proxy_port';
    const PROXY_LOGIN = 'proxy_login';
    const BASIC_LOGIN = 'basic_login';
    const DESTINATION = 'destination';
    const ADD_COMMENTS = 'add_comments';
    const STRUCT_CLASS = 'struct_class';
    const SOAP_OPTIONS = 'soap_options';
    const PROXY_PASSWORD = 'proxy_password';
    const BASIC_PASSWORD = 'basic_password';
    const GATHER_METHODS = 'gather_methods';
    const NAMESPACE_PREFIX = 'namespace_prefix';
    const SOAP_CLIENT_CLASS = 'soap_client_class';
    const STRUCT_ARRAY_CLASS = 'struct_array_class';
    const GENERATE_TUTORIAL_FILE = 'generate_tutorial_file';
    const GENERIC_CONSTANTS_NAME = 'generic_constants_names';
    /**
     * Generator's options
     * @var array
     */
    protected $options;
    /**
     * @param string $filename
     */
    protected function __construct($filename)
    {
        $this->options = array();
        $this->parseOptions($filename);
    }
    /**
     * Parse options for generator
     * @param string $filename options's file to parse
     * @return GeneratorOptions
     */
    protected function parseOptions($filename)
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
     * Returns the option value
     * @throws InvalidArgumentException
     * @param string $optionName
     * @return mixed
     */
    public function getOptionValue($optionName)
    {
        if (!isset($this->options[$optionName])) {
            throw new \InvalidArgumentException(sprintf('Invalid option name "%s", possible options: %s', $optionName, implode(', ', array_keys($this->options))), __LINE__);
        }
        return array_key_exists('value', $this->options[$optionName]) ? $this->options[$optionName]['value'] : $this->options[$optionName]['default'];
    }
    /**
     * Allows to add an option and set its value
     * @throws InvalidArgumentException
     * @param string $optionName
     * @return GeneratorOptions
     */
    public function setOptionValue($optionName, $optionValue, array $values = array())
    {
        if (!isset($this->options[$optionName])) {
            $this->options[$optionName] = array(
                'value' => $optionValue,
                'values' => $values,
            );
        } elseif (!empty($this->options[$optionName]['values']) && !in_array($optionValue, $this->options[$optionName]['values'], true)) {
            throw new \InvalidArgumentException(sprintf('Invalid value "%s" for option "%s", possible values: %s', $optionValue, $optionName, implode(', ', $this->options[$optionName]['values'])), __LINE__);
        } else {
            $this->options[$optionName]['value'] = $optionValue;
        }
        return $this;
    }
    /**
     * @param string options's file to parse
     * @return GeneratorOptions
     */
    public static function instance($filename = null)
    {
        return parent::instance(empty($filename) ? dirname(__FILE__) . '/../Resources/config/generator_options.yml' : $filename);
    }
    /**
     * Get category option value
     * @return string
     */
    public function getCategory()
    {
        return $this->getOptionValue(self::CATEGORY);
    }
    /**
     * Set current category option value
     * @throws \InvalidArgumentException
     * @param string $category
     * @return GeneratorOptions
     */
    public function setCategory($category)
    {
        return $this->setOptionValue(self::CATEGORY, $category);
    }
    /**
     * Get add comments option value
     * @return array
     */
    public function getAddComments()
    {
        return $this->getOptionValue(self::ADD_COMMENTS);
    }
    /**
     * Set current add comments option value
     * @throws \InvalidArgumentException
     * @param array $addComments
     * @return GeneratorOptions
     */
    public function setAddComments(array $addComments = array())
    {
        /**
         * If array is type array("author:john Doe","Release:1",)
         */
        $comments = array();
        foreach ($addComments as $index=>$value) {
            if (is_numeric($index) && strpos($value, ':') > 0) {
                list($tag, $val) = explode(':', $value);
                $comments[$tag] = $val;
            } else {
                $comments[$index] = $value;
            }
        }
        return $this->setOptionValue(self::ADD_COMMENTS, $comments);
    }
    /**
     * Get gather methods option value
     * @return string
     */
    public function getGatherMethods()
    {
        return $this->getOptionValue(self::GATHER_METHODS);
    }
    /**
     * Set current gather methods option value
     * @throws \InvalidArgumentException
     * @param string $gatherMethods
     * @return GeneratorOptions
     */
    public function setGatherMethods($gatherMethods)
    {
        return $this->setOptionValue(self::GATHER_METHODS, $gatherMethods);
    }
    /**
     * Get generate tutorial file option value
     * @return bool
     */
    public function getGenerateTutorialFile()
    {
        return $this->getOptionValue(self::GENERATE_TUTORIAL_FILE);
    }
    /**
     * Set current generate tutorial file option value
     * @throws \InvalidArgumentException
     * @param bool $generateTutorialFile
     * @return GeneratorOptions
     */
    public function setGenerateTutorialFile($generateTutorialFile)
    {
        return $this->setOptionValue(self::GENERATE_TUTORIAL_FILE, $generateTutorialFile);
    }
    /**
     * Get namespace option value
     * @return string
     */
    public function getNamespace()
    {
        return $this->getOptionValue(self::NAMESPACE_PREFIX);
    }
    /**
     * Set current namespace option value
     * @throws \InvalidArgumentException
     * @param string $namespace
     * @return GeneratorOptions
     */
    public function setNamespace($namespace)
    {
        return $this->setOptionValue(self::NAMESPACE_PREFIX, $namespace);
    }
    /**
     * Get generic constants name option value
     * @return bool
     */
    public function getGenericConstantsName()
    {
        return $this->getOptionValue(self::GENERIC_CONSTANTS_NAME);
    }
    /**
     * Set current generic constants name option value
     * @throws \InvalidArgumentException
     * @param bool $genericConstantsName
     * @return GeneratorOptions
     */
    public function setGenericConstantsName($genericConstantsName)
    {
        return $this->setOptionValue(self::GENERIC_CONSTANTS_NAME, $genericConstantsName);
    }
    /**
     * Get standalone option value
     * @return bool
     */
    public function getStandalone()
    {
        return $this->getOptionValue(self::STANDALONE);
    }
    /**
     * Set current standalone option value
     * @throws \InvalidArgumentException
     * @param bool $standalone
     * @return GeneratorOptions
     */
    public function setStandalone($standalone)
    {
        return $this->setOptionValue(self::STANDALONE, $standalone);
    }
    /**
     * Get struct class option value
     * @return string
     */
    public function getStructClass()
    {
        return $this->getOptionValue(self::STRUCT_CLASS);
    }
    /**
     * Set current struct class option value
     * @throws \InvalidArgumentException
     * @param string $structClass
     * @return GeneratorOptions
     */
    public function setStructClass($structClass)
    {
        return $this->setOptionValue(self::STRUCT_CLASS, $structClass);
    }
    /**
     * Get struct array class option value
     * @return string
     */
    public function getStructArrayClass()
    {
        return $this->getOptionValue(self::STRUCT_ARRAY_CLASS);
    }
    /**
     * Set current struct array class option value
     * @throws \InvalidArgumentException
     * @param string $structArrayClass
     * @return GeneratorOptions
     */
    public function setStructArrayClass($structArrayClass)
    {
        return $this->setOptionValue(self::STRUCT_ARRAY_CLASS, $structArrayClass);
    }
    /**
     * Get struct array class option value
     * @return string
     */
    public function getSoapClientClass()
    {
        return $this->getOptionValue(self::SOAP_CLIENT_CLASS);
    }
    /**
     * Set current struct array class option value
     * @throws \InvalidArgumentException
     * @param string $soapClientClass
     * @return GeneratorOptions
     */
    public function setSoapClientClass($soapClientClass)
    {
        return $this->setOptionValue(self::SOAP_CLIENT_CLASS, $soapClientClass);
    }
    /**
     * Get origin option value
     * @return string
     */
    public function getOrigin()
    {
        return $this->getOptionValue(self::ORIGIN);
    }
    /**
     * Set current origin option value
     * @throws \InvalidArgumentException
     * @param string $origin
     * @return GeneratorOptions
     */
    public function setOrigin($origin)
    {
        return $this->setOptionValue(self::ORIGIN, $origin);
    }
    /**
     * Get destination option value
     * @return string
     */
    public function getDestination()
    {
        return $this->getOptionValue(self::DESTINATION);
    }
    /**
     * Set current destination option value
     * @throws \InvalidArgumentException
     * @param string $destination
     * @return GeneratorOptions
     */
    public function setDestination($destination)
    {
        return $this->setOptionValue(self::DESTINATION, $destination);
    }
    /**
     * Get prefix option value
     * @return string
     */
    public function getPrefix()
    {
        return $this->getOptionValue(self::PREFIX);
    }
    /**
     * Set current prefix option value
     * @throws \InvalidArgumentException
     * @param string $prefix
     * @return GeneratorOptions
     */
    public function setPrefix($prefix)
    {
        return $this->setOptionValue(self::PREFIX, $prefix);
    }
    /**
     * Get suffix option value
     * @return string
     */
    public function getSuffix()
    {
        return $this->getOptionValue(self::SUFFIX);
    }
    /**
     * Set current suffix option value
     * @throws \InvalidArgumentException
     * @param string $suffix
     * @return GeneratorOptions
     */
    public function setSuffix($suffix)
    {
        return $this->setOptionValue(self::SUFFIX, $suffix);
    }
    /**
     * Get basic login option value
     * @return string
     */
    public function getBasicLogin()
    {
        return $this->getOptionValue(self::BASIC_LOGIN);
    }
    /**
     * Set current basic login option value
     * @throws \InvalidArgumentException
     * @param string $basicLogin
     * @return GeneratorOptions
     */
    public function setBasicLogin($basicLogin)
    {
        return $this->setOptionValue(self::BASIC_LOGIN, $basicLogin);
    }
    /**
     * Get basic password option value
     * @return string
     */
    public function getBasicPassword()
    {
        return $this->getOptionValue(self::BASIC_PASSWORD);
    }
    /**
     * Set current basic password option value
     * @throws \InvalidArgumentException
     * @param string $basicPassword
     * @return GeneratorOptions
     */
    public function setBasicPassword($basicPassword)
    {
        return $this->setOptionValue(self::BASIC_PASSWORD, $basicPassword);
    }
    /**
     * Get basic proxy host option value
     * @return string
     */
    public function getProxyHost()
    {
        return $this->getOptionValue(self::PROXY_HOST);
    }
    /**
     * Set current proxy host option value
     * @throws \InvalidArgumentException
     * @param string $proxyHost
     * @return GeneratorOptions
     */
    public function setProxyHost($proxyHost)
    {
        return $this->setOptionValue(self::PROXY_HOST, $proxyHost);
    }
    /**
     * Get basic proxy port option value
     * @return string
     */
    public function getProxyPort()
    {
        return $this->getOptionValue(self::PROXY_PORT);
    }
    /**
     * Set current proxy port option value
     * @throws \InvalidArgumentException
     * @param string $proxyPort
     * @return GeneratorOptions
     */
    public function setProxyPort($proxyPort)
    {
        return $this->setOptionValue(self::PROXY_PORT, $proxyPort);
    }
    /**
     * Get basic proxy login option value
     * @return string
     */
    public function getProxyLogin()
    {
        return $this->getOptionValue(self::PROXY_LOGIN);
    }
    /**
     * Set current proxy login option value
     * @throws \InvalidArgumentException
     * @param string $proxyLogin
     * @return GeneratorOptions
     */
    public function setProxyLogin($proxyLogin)
    {
        return $this->setOptionValue(self::PROXY_LOGIN, $proxyLogin);
    }
    /**
     * Get basic proxy password option value
     * @return string
     */
    public function getProxyPassword()
    {
        return $this->getOptionValue(self::PROXY_PASSWORD);
    }
    /**
     * Set current proxy password option value
     * @throws \InvalidArgumentException
     * @param string $proxyPassword
     * @return GeneratorOptions
     */
    public function setProxyPassword($proxyPassword)
    {
        return $this->setOptionValue(self::PROXY_PASSWORD, $proxyPassword);
    }
    /**
     * Get basic proxy password option value
     * @return array
     */
    public function getSoapOptions()
    {
        return $this->getOptionValue(self::SOAP_OPTIONS);
    }
    /**
     * Set current proxy password option value
     * @throws \InvalidArgumentException
     * @param array $soapOptions
     * @return GeneratorOptions
     */
    public function setSoapOptions(array $soapOptions)
    {
        return $this->setOptionValue(self::SOAP_OPTIONS, $soapOptions);
    }
    /**
     * @return string[]
     */
    public function toArray()
    {
        $options = array();
        foreach (array_keys($this->options) as $name) {
            $options[$name] = $this->getOptionValue($name);
        }
        return $options;
    }
}
