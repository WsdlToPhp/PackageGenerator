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
    const CATEGORY = 'category';
    const STANDALONE = 'standalone';
    const ADD_COMMENTS = 'add_comments';
    const GATHER_METHODS = 'gather_methods';
    const NAMESPACE_PREFIX = 'namespace_prefix';
    const COMPOSER_NAME = 'composer_name';
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
     */
    protected function parseOptions($filename)
    {
        $options = $this->loadYaml($filename);
        if (is_array($options)) {
            $this->options = $options;
        } else {
            throw new \InvalidArgumentException(sprintf('Settings contained by "%s" are not valid as the settings are not contained by an array: "%s"', $filename, gettype($options)));
        }
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
            throw new \InvalidArgumentException(sprintf('Invalid option name "%s", possible options: %s', $optionName, implode(', ', array_keys($this->options))));
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
                'value'  => $optionValue,
                'values' => $values,
            );
        } elseif (!empty($this->options[$optionName]['values']) && !in_array($optionValue, $this->options[$optionName]['values'], true)) {
            throw new \InvalidArgumentException(sprintf('Invalid value "%s" for option "%s", possible values: %s', $optionValue, $optionName, implode(', ', $this->options[$optionName]['values'])));
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
     * @return string|bool
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
     * @return string|bool
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
     * @return string|bool
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
     * @return string|bool
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
     * Get composer name option value
     * @return string|bool
     */
    public function getComposerName()
    {
        return $this->getOptionValue(self::COMPOSER_NAME);
    }
    /**
     * Set composer name option value
     * @throws \InvalidArgumentException
     * @param string $composerName
     * @return GeneratorOptions
     */
    public function setComposerName($composerName)
    {
        return $this->setOptionValue(self::COMPOSER_NAME, $composerName);
    }
    /**
     * Get generic constants name option value
     * @return string|bool
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
     * @return string|bool
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
}
