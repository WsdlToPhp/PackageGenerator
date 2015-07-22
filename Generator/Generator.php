<?php

namespace WsdlToPhp\PackageGenerator\Generator;

use WsdlToPhp\PackageGenerator\Model\Schema;
use WsdlToPhp\PackageGenerator\Model\Wsdl;
use WsdlToPhp\PackageGenerator\Model\AbstractModel;
use WsdlToPhp\PackageGenerator\Model\EmptyModel;
use WsdlToPhp\PackageGenerator\Model\Struct;
use WsdlToPhp\PackageGenerator\Model\Service;
use WsdlToPhp\PackageGenerator\Model\Method;
use WsdlToPhp\PackageGenerator\ConfigurationReader\GeneratorOptions;
use WsdlToPhp\PackageGenerator\Container\Model\Wsdl as WsdlContainer;
use WsdlToPhp\PackageGenerator\Container\Model\Struct as StructContainer;
use WsdlToPhp\PackageGenerator\Container\Model\Service as ServiceContainer;
use WsdlToPhp\PackageGenerator\Container\Parser as ParserContainer;
use WsdlToPhp\PackageGenerator\Parser\SoapClient\Structs as StructsParser;
use WsdlToPhp\PackageGenerator\Parser\SoapClient\Functions as FunctionsParser;
use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagAttribute as TagAttributeParser;
use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagComplexType as TagComplexTypeParser;
use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagDocumentation as TagDocumentationParser;
use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagElement as TagElementParser;
use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagEnumeration as TagEnumerationParser;
use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagExtension as TagExtensionParser;
use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagHeader as TagHeaderParser;
use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagImport as TagImportParser;
use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagInclude as TagIncludeParser;
use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagInput as TagInputParser;
use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagList as TagListParser;
use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagOutput as TagOutputParser;
use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagRestriction as TagRestrictionParser;
use WsdlToPhp\PackageGenerator\Parser\Wsdl\TagUnion as TagUnionParser;
use WsdlToPhp\PackageGenerator\Parser\AbstractParser;
use WsdlToPhp\PackageGenerator\File\Struct as StructFile;
use WsdlToPhp\PackageGenerator\File\StructArray as StructArrayFile;
use WsdlToPhp\PackageGenerator\File\StructEnum as StructEnumFile;
use WsdlToPhp\PackageGenerator\File\Service as ServiceFile;
use WsdlToPhp\PackageGenerator\File\Tutorial as TutorialFile;
use WsdlToPhp\PackageGenerator\File\ClassMap as ClassMapFile;
use WsdlToPhp\PackageGenerator\DomHandler\Wsdl\Wsdl as WsdlDocument;

class Generator extends \SoapClient
{
    /**
     * SoapClient undeclared native property for proxy host
     * @var string
     */
    public $_proxy_host;
    /**
     * SoapClient undeclared native property for proxy port
     * @var string
     */
    public $_proxy_port;
    /**
     * SoapClient undeclared native property for proxy login
     * @var string
     */
    public $_proxy_login;
    /**
     * SoapClient undeclared native property for proxy password
     * @var string
     */
    public $_proxy_password;
    /**
     * Structs
     * @var StructContainer
     */
    private $structs;
    /**
     * Services
     * @var ServiceContainer
     */
    private $services;
    /**
     * Name of the package to use
     * @var string
     */
    private static $packageName;
    /**
     * Wsdl lists
     * @var WsdlContainer
     */
    private $wsdls;
    /**
     * Use intern global variable instead of using the PHP $GLOBALS variable
     * @var array
     */
    private static $globals;
    /**
     * @var GeneratorOptions
     */
    private $options;
    /**
     * Current generator instance
     * @var Generator
     */
    private static $instance;
    /**
     * Used parsers
     * @var ParserContainer
     */
    private $parsers;
    /**
     * Constructor
     * @uses \SoapClient::__construct()
     * @uses Generator::setStructs()
     * @uses Generator::setServices()
     * @uses Generator::setWsdls()
     * @uses Generator::addWsdl()
     * @param string $pathToWsdl WSDL url or path
     * @param string $login login to get access to WSDL
     * @param string $password password to get access to WSDL
     * @param array $wsdlOptions options to get access to WSDL
     */
    public function __construct($pathToWsdl, $login = false, $password = false, array $wsdlOptions = array())
    {
        $pathToWsdl = trim($pathToWsdl);
        /**
         * Options for WSDL
         */
        $options = $wsdlOptions;
        $options['trace'] = true;
        $options['exceptions'] = true;
        $options['cache_wsdl'] = WSDL_CACHE_NONE;
        $options['soap_version'] = SOAP_1_1;
        if (!empty($login) && !empty($password)) {
            $options['login'] = $login;
            $options['password'] = $password;
        }
        /**
         * Construct
         */
        try {
            parent::__construct($pathToWsdl, $options);
        } catch (\SoapFault $fault) {
            $options['soap_version'] = SOAP_1_2;
            try {
                parent::__construct($pathToWsdl, $options);
            } catch (\SoapFault $fault) {
                throw new \Exception(sprintf('Unable to load WSDL at "%s"!', $pathToWsdl), null, $fault);
            }
        }
        $this->setOptions(GeneratorOptions::instance());
        /**
         * init containers
         */
        $this->setStructs(new StructContainer());
        $this->setServices(new ServiceContainer());
        $this->setWsdls(new WsdlContainer());
        $this->setParser(new ParserContainer());
        /**
         * add parsers
         */
        $this->addParser(new FunctionsParser($this));
        $this->addParser(new StructsParser($this));
        $this->addParser(new TagIncludeParser($this));
        $this->addParser(new TagImportParser($this));
        $this->addParser(new TagAttributeParser($this));
        $this->addParser(new TagComplexTypeParser($this));
        $this->addParser(new TagDocumentationParser($this));
        $this->addParser(new TagElementParser($this));
        $this->addParser(new TagEnumerationParser($this));
        $this->addParser(new TagExtensionParser($this));
        $this->addParser(new TagHeaderParser($this));
        $this->addParser(new TagInputParser($this));
        $this->addParser(new TagOutputParser($this));
        $this->addParser(new TagRestrictionParser($this));
        $this->addParser(new TagUnionParser($this));
        $this->addParser(new TagListParser($this));
        /**
         * add WSDL
         */
        $this->addWsdl($pathToWsdl);
    }
    /**
     * @param string $pathToWsdl
     * @param string $login
     * @param string $password
     * @param array $wsdlOptions
     * @throws \InvalidArgumentException
     * @return Generator
     */
    public static function instance($pathToWsdl = null, $login = null, $password = null, array $wsdlOptions = array())
    {
        if (!isset(self::$instance)) {
            if (empty($pathToWsdl)) {
                throw new \InvalidArgumentException('No Generator instance exists, you must provide the WSDL path to initiate the first instance!');
            }
            self::$instance = new static($pathToWsdl, $login, $password, $wsdlOptions);
        }
        return self::$instance;
    }
    /**
     * Reset instance for specific cases
     */
    public static function resetInstance()
    {
        self::$instance = null;
    }
    /**
     * Generates all classes based on options
     * @uses Generator::setPackageName()
     * @uses Generator::getWsdl()
     * @uses Generator::getStructs()
     * @uses Generator::getServices()
     * @uses Generator::generateStructsClasses()
     * @uses Generator::generateServicesClasses()
     * @uses Generator::generateClassMap()
     * @uses Generator::getOptionGenerateTutorialFile()
     * @uses Generator::generateTutorialFile()
     * @param string $packageName the string used to prefix all generate classes
     * @param string $rootDirectory path where classes should be generated
     * @param int $rootDirectoryRights system rights to apply on folder
     * @param bool $createRootDirectory create root directory if not exist
     * @return bool true|false depending on the well creation fot the root directory
     */
    public function generateClasses($packageName, $rootDirectory, $rootDirectoryRights = 0775, $createRootDirectory = true)
    {
        $wsdl = $this->getWsdl(0);
        $wsdlLocation = $wsdl instanceof Wsdl ? $wsdl->getName() : '';
        if (!empty($wsdlLocation)) {
            self::setPackageName($packageName);
            $rootDirectory = $rootDirectory . (substr($rootDirectory, -1) != '/' ? '/' : '');
            /**
             * Root directory
             */
            if (!is_dir($rootDirectory) && !$createRootDirectory) {
                throw new \InvalidArgumentException(sprintf('Unable to use dir "%s" as dir does not exists and its creation has been disabled', $rootDirectory));
            } elseif (!is_dir($rootDirectory) && $createRootDirectory) {
                $this->createDirectory($rootDirectory, $rootDirectoryRights);
            }
            /**
             * Begin process
             */
            if (is_dir($rootDirectory)) {
                foreach ($this->parsers as $parser) {
                    $parser->parse();
                }
                /**
                 * Generates classes files
                 */
                $this
                    ->generateStructsClasses($rootDirectory, $rootDirectoryRights)
                    ->generateServicesClasses($rootDirectory, $rootDirectoryRights)
                    ->generateClassMap($rootDirectory)
                    ->generateComposerFile($rootDirectory)
                    ->generateTutorialFile($rootDirectory);
                return true;
            } else {
                return false;
            }
        }
        return false;
    }
    /**
     * Generates structs classes based on structs collected
     * @uses Generator::getStructs()
     * @uses Generator::getDirectory()
     * @uses Generator::populateFile()
     * @uses AbstractModel::getName()
     * @uses AbstractModel::getModelByName()
     * @uses AbstractModel::getInheritance()
     * @uses AbstractModel::getCleanName()
     * @uses AbstractModel::getPackagedName()
     * @uses AbstractModel::getClassDeclaration()
     * @uses Struct::getIsStruct()
     * @param string $rootDirectory the directory
     * @param int $rootDirectoryRights the directory permissions
     * @return Generator
     */
    private function generateStructsClasses($rootDirectory, $rootDirectoryRights)
    {
        $structs = $this->getStructs();
        if (count($structs)) {
            /**
             * Ordering structs in order to generate mother class first and to put them on top in the autoload file
             */
            $structsToGenerateDone = array();
            foreach ($structs as $struct) {
                if (!array_key_exists($struct->getName(), $structsToGenerateDone)) {
                    $structsToGenerateDone[$struct->getName()] = 0;
                }
                $model = AbstractModel::getModelByName($struct->getInheritance());
                while ($model && $model->getIsStruct()) {
                    if (!array_key_exists($model->getName(), $structsToGenerateDone)) {
                        $structsToGenerateDone[$model->getName()] = 1;
                    } else {
                        $structsToGenerateDone[$model->getName()]++;
                    }
                    $model = AbstractModel::getModelByName($model->getInheritance());
                }
            }
            /**
             * Order by priority desc
             */
            arsort($structsToGenerateDone);
            $structTmp = $structs;
            $structs = array();
            foreach (array_keys($structsToGenerateDone) as $structName) {
                $structs[$structName] = $structTmp->getStructByName($structName);
            }
            unset($structTmp, $structsToGenerateDone);
            foreach ($structs as $structName => $struct) {
                if (!$struct->getIsStruct()) {
                    continue;
                }
                $elementFolder = $rootDirectory . $this->getDirectory($struct);
                $this->createDirectory($elementFolder, $rootDirectoryRights);
                /**
                 * Generates file
                 */
                if ($struct->getisRestriction()) {
                    $file = new StructEnumFile($this, $struct->getPackagedName(), $elementFolder);
                } elseif ($struct->isArray()) {
                    $file = new StructArrayFile($this, $struct->getPackagedName(), $elementFolder);
                } else {
                    $file = new StructFile($this, $struct->getPackagedName(), $elementFolder);
                }
                $file
                    ->setModel($struct)
                    ->write();
            }
        }
        return $this;
    }
    /**
     * Generates methods by class
     * @uses Generator::getServices()
     * @uses Generator::getDirectory()
     * @uses AbstractModel::getCleanName()
     * @uses AbstractModel::getPackagedName()
     * @uses AbstractModel::getClassDeclaration()
     * @param string $rootDirectory the directory
     * @param int $rootDirectoryRights the directory permissions
     * @return Generator
     */
    private function generateServicesClasses($rootDirectory, $rootDirectoryRights)
    {
        $services = $this->getServices();
        if (count($services)) {
            foreach ($services as $service) {
                $elementFolder = $rootDirectory . $this->getDirectory($service);
                $this->createDirectory($elementFolder, $rootDirectoryRights);
                /**
                 * Generates file
                 */
                $file = new ServiceFile($this, $service->getPackagedName(), $elementFolder);
                $file
                    ->setModel($service)
                    ->write();
            }
        }
        return $this;
    }
    /**
     * Generates classMap class
     * @param string $rootDirectory the directory
     * @return Generator
     */
    private function generateClassMap($rootDirectory)
    {
        $clasMap = new ClassMapFile($this, '', $rootDirectory);
        $clasMap->write();
        return $this;
    }
    /**
     * Generates tutorial file
     * @uses Generator::getOptionGenerateTutorialFile()
     * @param string $rootDirectory the direcoty
     * @return Generator
     */
    private function generateTutorialFile($rootDirectory)
    {
        if ($this->getOptionGenerateTutorialFile() === true) {
            $tutorialFile = new TutorialFile($this, 'howtos', $rootDirectory);
            $tutorialFile->write();
        }
        return $this;
    }
    /**
     * @param string $rootDirectory
     * @throws \InvalidArgumentException
     * @return Generator
     */
    private function generateComposerFile($rootDirectory)
    {
        $pathToComposerTemplate = dirname(__FILE__) . '/../Resources/templates/Default/composer.json';
        if (is_file($pathToComposerTemplate)) {
            $content = file_get_contents($pathToComposerTemplate);
            $content = str_replace(array(
                'packagename',
                'PackageName',
            ), array(
                strtolower(self::getPackageName(false)),
                self::getPackageName(false),
            ), $content);
            file_put_contents($rootDirectory . 'composer.json', $content);
            if (!is_file($rootDirectory . '/composer.json')) {
                throw new \InvalidArgumentException(sprintf('Unable to find autoload file at "%s"', $rootDirectory . '/composer.json'));
            } else {
                exec('cd ' . $rootDirectory . ';composer update;');
            }
        }
        return $this;
    }
    /**
     * Gets the struct by its name
     * @uses Generator::getStructs()
     * @param string $structName the original struct name
     * @return Struct|null
     */
    public function getStruct($structName)
    {
        return $this->structs->getStructByName($structName);
    }
    /**
     * Gets a service by its name
     * @param string $serviceName the service name
     * @return Service|null
     */
    public function getService($serviceName)
    {
        return $this->services->getServiceByName($serviceName);
    }
    /**
     * Returns the method
     * @uses Generator::getServiceName()
     * @uses Generator::getService()
     * @uses Service::getMethod()
     * @param string $methodName the original function name
     * @return Method|null
     */
    public function getServiceMethod($methodName)
    {
        return $this->getService($this->getServiceName($methodName)) instanceof Service ? $this->getService($this->getServiceName($methodName))->getMethod($methodName) : null;
    }
    /**
     * Sets the optionCategory value
     * @return string
     */
    public function getOptionCategory()
    {
        return $this->options->getCategory();
    }
    /**
     * Sets the optionCategory value
     * @param string
     * @return GeneratorOptions
     */
    public function setOptionCategory($category)
    {
        return $this->options->setCategory($category);
    }
    /**
     * Sets the optionGatherMethods value
     * @return string
     */
    public function getOptionGatherMethods()
    {
        return $this->options->getGatherMethods();
    }
    /**
     * Sets the optionGatherMethods value
     * @param string
     * @return GeneratorOptions
     */
    public function setOptionGatherMethods($gatherMethods)
    {
        return $this->options->setGatherMethods($gatherMethods);
    }
    /**
     * Gets the optionSendArrayAsParameter value
     * @return bool
     */
    public function getOptionSendArrayAsParameter()
    {
        return $this->options->getSendArrayAsParameter();
    }
    /**
     * Sets the optionSendArrayAsParameter value
     * @apram bool
     * @return GeneratorOptions
     */
    public function setOptionSendArrayAsParameter($sendArrayAsParameter)
    {
        return $this->options->setSendArrayAsParameter($sendArrayAsParameter);
    }
    /**
     * Gets the optionResponseAsWsdlObject value
     * @return bool
     */
    public function getOptionResponseAsWsdlObject()
    {
        return $this->options->getGetResponseAsWsdlObject();
    }
    /**
     * Sets the optionResponseAsWsdlObject value
     * @param bool
     * @return GeneratorOptions
     */
    public function setOptionGetResponseAsWsdlObject($responseAsWsdlObject)
    {
        return $this->options->setGetResponseAsWsdlObject($responseAsWsdlObject);
    }
    /**
     * Gets the optionResponseAsWsdlObject value
     * @return bool
     */
    public function getOptionSendParametersAsArray()
    {
        return $this->options->getSendParametersAsArray();
    }
    /**
     * Sets the optionResponseAsWsdlObject value
     * @param bool
     * @return GeneratorOptions
     */
    public function setOptionSendParametersAsArray($sendParametersAsArray)
    {
        return $this->options->setSendParametersAsArray($sendParametersAsArray);
    }
    /**
     * Gets the optionInheritsClassIdentifier value
     * @return string
     */
    public function getOptionInheritsClassIdentifier()
    {
        return $this->options->getInheritsFromIdentifier();
    }
    /**
     * Sets the optionInheritsClassIdentifier value
     * @param string
     * @return GeneratorOptions
     */
    public function setOptionInheritsClassIdentifier($inheritsFromIdentifier)
    {
        return $this->options->setInheritsFromIdentifier($inheritsFromIdentifier);
    }
    /**
     * Gets the optionGenericConstantsNames value
     * @return bool
     */
    public function getOptionGenericConstantsNames()
    {
        return $this->options->getGenericConstantsName();
    }
    /**
     * Sets the optionGenericConstantsNames value
     * @param bool
     * @return GeneratorOptions
     */
    public function setOptionGenericConstantsNames($genericConstantsNames)
    {
        return $this->options->setGenericConstantsName($genericConstantsNames);
    }
    /**
     * Gets the optionGenerateTutorialFile value
     * @return bool
     */
    public function getOptionGenerateTutorialFile()
    {
        return $this->options->getGenerateTutorialFile();
    }
    /**
     * Sets the optionGenerateTutorialFile value
     * @param bool
     * @return GeneratorOptions
     */
    public function setOptionGenerateTutorialFile($generateTutorialFile)
    {
        return $this->options->setGenerateTutorialFile($generateTutorialFile);
    }
    /**
     * Gets the optionNamespacePrefix value
     * @return bool
     */
    public function getOptionNamespacePrefix()
    {
        return $this->options->getNamespace();
    }
    /**
     * Sets the optionGenerateTutorialFile value
     * @param bool
     * @return GeneratorOptions
     */
    public function setOptionNamespacePrefix($namespace)
    {
        return $this->options->setNamespace($namespace);
    }
    /**
     * Gets the optionAddComments value
     * @return array
     */
    public function getOptionAddComments()
    {
        return $this->options->getAddComments();
    }
    /**
     * Sets the optionAddComments value
     * @param array
     * @return GeneratorOptions
     */
    public function setOptionAddComments($addComments)
    {
        return $this->options->setAddComments($addComments);
    }
    /**
     * Gets the package name
     * @param bool $ucFirst ucfirst package name or not
     * @return string
     */
    public static function getPackageName($ucFirst = true)
    {
        return $ucFirst ? ucfirst(self::$packageName) : self::$packageName;
    }
    /**
     * Sets the package name
     * @param string $packageName
     * @return string
     */
    public static function setPackageName($packageName)
    {
        return (self::$packageName = $packageName);
    }
    /**
     * Gets the WSDLs
     * @return WsdlContainer
     */
    public function getWsdls()
    {
        return $this->wsdls;
    }
    /**
     * Gets the WSDL at the index
     * @param int $index
     * @return Wsdl|null
     */
    public function getWsdl($index)
    {
        return $this->getWsdls()->offsetGet($index);
    }
    /**
     * Sets the WSDLs
     * @param WsdlContainer $wsdlContainer
     * @return Generator
     */
    public function setWsdls(WsdlContainer $wsdlContainer)
    {
        $this->wsdls = $wsdlContainer;
        return $this;
    }
    /**
     * Adds Wsdl location
     * @param string $wsdlLocation
     */
    public function addWsdl($wsdlLocation)
    {
        if (!empty($wsdlLocation) && $this->wsdls->getWsdlByName($wsdlLocation) === null) {
            $this->wsdls->add(new Wsdl($wsdlLocation, $this->getUrlContent($wsdlLocation)));
        }
        return $this;
    }
    /**
     * Adds Wsdl location
     * @param Wsdl $wsdl
     * @param string $schemaLocation
     */
    public function addSchemaToWsdl(Wsdl $wsdl, $schemaLocation)
    {
        if (!empty($schemaLocation) && $wsdl->getContent() instanceof WsdlDocument && $wsdl->getContent()->getExternalSchema($schemaLocation) === null) {
            $wsdl->getContent()->addExternalSchema(new Schema($schemaLocation, $this->getUrlContent($schemaLocation)));
        }
        return $this;
    }
    /**
     * Returns directory where to store class and create it if needed
     * @uses Generator::getCategory()
     * @param AbstractModel $model the model for which we generate the folder
     * @return string
     */
    public function getDirectory(AbstractModel $model)
    {
        $directory = '';
        $mainCat = $this->getCategory($model);
        if (!empty($mainCat)) {
            $directory .= ucfirst($mainCat) . '/';
        }
        return $directory;
    }
    /**
     * @param string $directory
     * @param int $permissions
     * @return bool
     */
    private function createDirectory($directory, $permissions)
    {
        if (!is_dir($directory)) {
            mkdir($directory, $permissions, true);
        }
        return true;
    }
    /**
     * Gets main category part
     * @param AbstractModel $model the model for which we generate the folder
     * @return string
     */
    private function getCategory(AbstractModel $model)
    {
        return Utils::getPart($this->options, $model, GeneratorOptions::CATEGORY);
    }
    /**
     * Gets gather name class
     * @param AbstractModel $model the model for which we generate the folder
     * @return string
     */
    private function getGather(AbstractModel $model)
    {
        return Utils::getPart($this->options, $model, GeneratorOptions::GATHER_METHODS);
    }
    /**
     * Returns the service name associated to the method/operation name in order to gather them in one service class
     * @uses Generator::getGather()
     * @param string $methodName original operation/method name
     * @return string
     */
    public function getServiceName($methodName)
    {
        return ucfirst($this->getGather(new EmptyModel($methodName)));
    }
    /**
     * @param GeneratorOptions $options
     * @return Generator
     */
    protected function setOptions(GeneratorOptions $options)
    {
        $this->options = $options;
        return $this;
    }
    /**
     * @return GeneratorOptions
     */
    public function getOptions()
    {
        return $this->options;
    }
    /**
     * @param StructContainer $structContainer
     * @return Generator
     */
    protected function setStructs(StructContainer $structContainer)
    {
        $this->structs = $structContainer;
        return $this;
    }
    /**
     * @return StructContainer
     */
    public function getStructs()
    {
        return $this->structs;
    }
    /**
     * @return ServiceContainer
     */
    public function getServices()
    {
        return $this->services;
    }
    /**
     * @param ServiceContainer $serviceContainer
     * @return Generator
     */
    protected function setServices(ServiceContainer $serviceContainer)
    {
        $this->services = $serviceContainer;
        return $this;
    }
    /**
     * @param ParserContainer $container
     * @return Generator
     */
    protected function setParser(ParserContainer $container)
    {
        $this->parsers = $container;
        return $this;
    }
    /**
     * @param AbstractParser $parser
     * @return Generator
     */
    protected function addParser(AbstractParser $parser)
    {
        $this->parsers->add($parser);
        return $this;
    }
    /**
     * @param string $url
     * @return string
     */
    public function getUrlContent($url)
    {
        if (strpos($url, '://') !== false) {
            return Utils::getContentFromUrl($url, isset($this->_proxy_host) ? $this->_proxy_host : null, isset($this->_proxy_port) ? $this->_proxy_port : null, isset($this->_proxy_login) ? $this->_proxy_login : null, isset($this->_proxy_password) ? $this->_proxy_password : null);
        } elseif (is_file($url)) {
            return file_get_contents($url);
        }
        return null;
    }
    /**
     * Returns current class name
     * @return string __CLASS__
     */
    public function __toString()
    {
        return __CLASS__;
    }
}
