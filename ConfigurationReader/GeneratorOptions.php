<?php

namespace WsdlToPhp\PackageGenerator\ConfigurationReader;

class GeneratorOptions extends AbstractYamlReader
{
    /**
     * Common values used as option's value
     */
    const VALUE_START = 'start';
    const VALUE_END   = 'end';
    const VALUE_NONE  = 'none';
    const VALUE_CAT   = 'cat';
    const VALUE_TRUE  = true;
    const VALUE_FALSE = false;
    /**
     * Possible option keys
     * @var string
     */
    const CATEGORY                    = 'category';
    const SUB_CATEGORY                = 'sub_category';
    const ADD_COMMENTS                = 'add_comments';
    const GATHER_METHODS              = 'gather_methods';
    const GENERATE_WSDL_CLASS         = 'generate_wsdl_class';
    const GENERATE_TUTORIAL_FILE      = 'generate_tutorial_file';
    const GENERATE_AUTOLOAD_FILE      = 'generate_autoload_file';
    const SEND_ARRAY_AS_PARAMETER     = 'send_array_as_parameter';
    const GENERIC_CONSTANTS_NAME      = 'generic_constants_names';
    const GET_RESPONSE_AS_WSDL_OBJECT = 'response_as_wsdl_object';
    const INHERITS_FROM_IDENTIFIER    = 'inherits_from_identifier';
    const SEND_PARAMETERS_AS_ARRAY    = 'send_parameters_as_array';
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
     * @return string|bool
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
     * @return string|boolean
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
     * Get subcategory option value
     * @return string|boolean
     */
    public function getSubCategory()
    {
        return $this->getOptionValue(self::SUB_CATEGORY);
    }
    /**
     * Set current subcategory option value
     * @throws \InvalidArgumentException
     * @param string $subCategory
     * @return GeneratorOptions
     */
    public function setSubCategory($subCategory)
    {
        return $this->setOptionValue(self::SUB_CATEGORY, $subCategory);
    }
    /**
     * Get add comments option value
     * @return string|boolean
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
     * @return string|boolean
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
     * Get generate wsdl class option value
     * @return string|boolean
     */
    public function getGenerateWsdlClass()
    {
        return $this->getOptionValue(self::GENERATE_WSDL_CLASS);
    }
    /**
     * Set current generate wsdl class option value
     * @throws \InvalidArgumentException
     * @param bool $generateWsdlClass
     * @return GeneratorOptions
     */
    public function setGenerateWsdlClass($generateWsdlClass)
    {
        return $this->setOptionValue(self::GENERATE_WSDL_CLASS, $generateWsdlClass);
    }
    /**
     * Get generate autoload file option value
     * @return string|boolean
     */
    public function getGenerateAutoloadFile()
    {
        return $this->getOptionValue(self::GENERATE_AUTOLOAD_FILE);
    }
    /**
     * Set current generate autoload file option value
     * @throws \InvalidArgumentException
     * @param bool $generateAutoloadFile
     * @return GeneratorOptions
     */
    public function setGenerateAutoloadFile($generateAutoloadFile)
    {
        return $this->setOptionValue(self::GENERATE_AUTOLOAD_FILE, $generateAutoloadFile);
    }
    /**
     * Get generate tutorial file option value
     * @return string|boolean
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
     * Get send array as parameter option value
     * @return string|boolean
     */
    public function getSendArrayAsParameter()
    {
        return $this->getOptionValue(self::SEND_ARRAY_AS_PARAMETER);
    }
    /**
     * Set current send array as parameter option value
     * @throws \InvalidArgumentException
     * @param bool $sendParameterAsArray
     * @return GeneratorOptions
     */
    public function setSendArrayAsParameter($sendParameterAsArray)
    {
        return $this->setOptionValue(self::SEND_ARRAY_AS_PARAMETER, $sendParameterAsArray);
    }
    /**
     * Get generic constants name option value
     * @return string|boolean
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
     * Get get response as wsdl object option value
     * @return string|boolean
     */
    public function getGetResponseAsWsdlObject()
    {
        return $this->getOptionValue(self::GET_RESPONSE_AS_WSDL_OBJECT);
    }
    /**
     * Set current get response as wsdl object option value
     * @throws \InvalidArgumentException
     * @param bool $getResponseAsWsdlObject
     * @return GeneratorOptions
     */
    public function setGetResponseAsWsdlObject($getResponseAsWsdlObject)
    {
        return $this->setOptionValue(self::GET_RESPONSE_AS_WSDL_OBJECT, $getResponseAsWsdlObject);
    }
    /**
     * Get inherits from identifier option value
     * @return string|boolean
     */
    public function getInheritsFromIdentifier()
    {
        return $this->getOptionValue(self::INHERITS_FROM_IDENTIFIER);
    }
    /**
     * Set current inherits from identifier option value
     * @throws \InvalidArgumentException
     * @param string $inheritsFromIdentifier
     * @return GeneratorOptions
     */
    public function setInheritsFromIdentifier($inheritsFromIdentifier)
    {
        return $this->setOptionValue(self::INHERITS_FROM_IDENTIFIER, $inheritsFromIdentifier);
    }
    /**
     * Get send parameters as array option value
     * @return string|boolean
     */
    public function getSendParametersAsArray()
    {
        return $this->getOptionValue(self::SEND_PARAMETERS_AS_ARRAY);
    }
    /**
     * Set current send parameters as array option value
     * @throws \InvalidArgumentException
     * @param bool $sendParametersAsArray
     * @return GeneratorOptions
     */
    public function setSendParametersAsArray($sendParametersAsArray)
    {
        return $this->setOptionValue(self::SEND_PARAMETERS_AS_ARRAY, $sendParametersAsArray);
    }
}
