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
use Symfony\Component\Console\Input\ArrayInput;
use Composer\Console\Application;

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
    private $packageName;
    /**
     * Wsdl
     * @var Wsdl
     */
    private $wsdl;
    /**
     * @var GeneratorOptions
     */
    private $options;
    /**
     * Used parsers
     * @var ParserContainer
     */
    private $parsers;
    /**
     * Use classmap file object
     * @var ClassMapFile
     */
    private $classmapFile;
    /**
     * Constructor
     * @param GeneratorOptions $options
     */
    public function __construct(GeneratorOptions $options)
    {
        $this
            ->setOptions($options)
            ->initialize();
    }
    /**
     * @return Generator
     */
    protected function initialize()
    {
        return $this
            ->initContainers()
            ->initParsers()
            ->initWsdl()
            ->initSoapClient()
            ->initDirectory();
    }
    /**
     * @throws \InvalidArgumentException
     * @return Generator
     */
    protected function initSoapClient()
    {
        $pathToWsdl = trim($this->getOptionOrigin());
        /**
         * Options for WSDL
        */
        $options = array_merge($this->getOptionSoapOptions(), array(
            'trace' => true,
            'exceptions' => true,
            'cache_wsdl' => WSDL_CACHE_NONE,
            'soap_version' => SOAP_1_1,
        ));
        $login = $this->getOptionBasicLogin();
        $password = $this->getOptionBasicPassword();
        if (!empty($login) && !empty($password)) {
            $options = array_merge($options, array(
                'login' => $login,
                'password' => $password,
            ));
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
                throw new \InvalidArgumentException(sprintf('Unable to load WSDL at "%s"!', $pathToWsdl), __LINE__, $fault);
            }
        }
        return $this;
    }
    /**
     * @return Generator
     */
    protected function initContainers()
    {
        return $this
            ->setStructs(new StructContainer())
            ->setServices(new ServiceContainer())
            ->setParser(new ParserContainer());
    }
    /**
     * @return Generator
     */
    protected function initParsers()
    {
        if ($this->parsers->count() === 0) {
            $this
                ->addParser(new FunctionsParser($this))
                ->addParser(new StructsParser($this))
                ->addParser(new TagIncludeParser($this))
                ->addParser(new TagImportParser($this))
                ->addParser(new TagAttributeParser($this))
                ->addParser(new TagComplexTypeParser($this))
                ->addParser(new TagDocumentationParser($this))
                ->addParser(new TagElementParser($this))
                ->addParser(new TagEnumerationParser($this))
                ->addParser(new TagExtensionParser($this))
                ->addParser(new TagHeaderParser($this))
                ->addParser(new TagInputParser($this))
                ->addParser(new TagOutputParser($this))
                ->addParser(new TagRestrictionParser($this))
                ->addParser(new TagUnionParser($this))
                ->addParser(new TagListParser($this));
        }
        return $this;
    }
    /**
     * @throws \InvalidArgumentException
     * @return Generator
     */
    protected function initDirectory()
    {
        $this->createDirectory($this->getOptionDestination());
        if (!is_dir($this->getOptionDestination())) {
            throw new \InvalidArgumentException(sprintf('Unable to use dir "%s" as dir does not exists and its creation has been disabled', $this->getOptionDestination()), __LINE__);
        }
        return $this;
    }
    /**
     * @return Generator
     */
    protected function initWsdl()
    {
        $this->setWsdl(new Wsdl($this, $this->getOptionOrigin(), $this->getUrlContent($this->getOptionOrigin())));
        return $this;
    }
    /**
     * Generates all classes based on options
     * @return Generator
     */
    public function generateClasses()
    {
        /**
         * Begin process
         */
        foreach ($this->parsers as $parser) {
            $parser->parse();
        }
        /**
         * Generates classes files
         */
        return $this
            ->generateStructsClasses()
            ->generateServicesClasses()
            ->generateClassMap()
            ->generateTutorialFile()
            ->generateComposerFile();
    }
    /**
     * Generates structs classes based on structs collected
     * @return Generator
     */
    private function generateStructsClasses()
    {
        foreach ($this->getStructs() as $structName => $struct) {
            if (!$struct->getIsStruct()) {
                continue;
            }
            $elementFolder = $this->getOptionDestination() . $this->getDirectory($struct);
            $this->createDirectory($elementFolder);
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
        return $this;
    }
    /**
     * Generates methods by class
     * @return Generator
     */
    private function generateServicesClasses()
    {
        foreach ($this->getServices() as $service) {
            $elementFolder = $this->getOptionDestination() . $this->getDirectory($service);
            $this->createDirectory($elementFolder);
            /**
             * Generates file
             */
            $file = new ServiceFile($this, $service->getPackagedName(), $elementFolder);
            $file
                ->setModel($service)
                ->write();
        }
        return $this;
    }
    /**
     * Generates classMap class
     * @return Generator
     */
    private function generateClassMap()
    {
        $this
            ->getClassmapFile()
            ->setDestination($this->getOptionDestination())
            ->write();
        return $this;
    }
    /**
     * Generates tutorial file
     * @return Generator
     */
    private function generateTutorialFile()
    {
        if ($this->getOptionGenerateTutorialFile() === true && $this->getClassmapFile() instanceof ClassMapFile) {
            $tutorialFile = new TutorialFile($this, 'tutorial', $this->getOptionDestination());
            $tutorialFile->write();
        }
        return $this;
    }
    /**
     * @throws \InvalidArgumentException
     * @return Generator
     */
    private function generateComposerFile()
    {
        if ($this->getOptionStandalone() === true) {
            $composer = new Application();
            $composer->setAutoExit(false);

            $composer->run(new ArrayInput(array(
                'command' => 'init',
                '--verbose' => true,
                '--no-interaction' => true,
                '--name' => sprintf('wsdltophp/generated-%s', strtolower(self::getPackageName())),
                '--description' => sprintf('Package generated from %s using wsdltophp/packagegenerator', $this->getWsdl()->getName()),
                '--require' => array(
                    'php:>=5.3.3',
                    'ext-soap:*',
                    'wsdltophp/packagebase:dev-master',
                ),
                '--working-dir' => $this->getOptionDestination(),
            )));

            $composer->run(new ArrayInput(array(
                'command' => 'update',
                '--verbose' => true,
                '--optimize-autoloader' => true,
                '--no-dev' => true,
                '--working-dir' => $this->getOptionDestination(),
            )));
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
     * @param string $category
     * @return Generator
     */
    public function setOptionCategory($category)
    {
        $this->options->setCategory($category);
        return $this;
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
     * @param string $gatherMethods
     * @return Generator
     */
    public function setOptionGatherMethods($gatherMethods)
    {
        $this->options->setGatherMethods($gatherMethods);
        return $this;
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
     * @param bool $genericConstantsNames
     * @return Generator
     */
    public function setOptionGenericConstantsNames($genericConstantsNames)
    {
        $this->options->setGenericConstantsName($genericConstantsNames);
        return $this;
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
     * @param bool $generateTutorialFile
     * @return Generator
     */
    public function setOptionGenerateTutorialFile($generateTutorialFile)
    {
        $this->options->setGenerateTutorialFile($generateTutorialFile);
        return $this;
    }
    /**
     * Gets the optionNamespacePrefix value
     * @return string
     */
    public function getOptionNamespacePrefix()
    {
        return $this->options->getNamespace();
    }
    /**
     * Sets the optionGenerateTutorialFile value
     * @param string $namespace
     * @return Generator
     */
    public function setOptionNamespacePrefix($namespace)
    {
        $this->options->setNamespace($namespace);
        return $this;
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
     * @param array $addComments
     * @return Generator
     */
    public function setOptionAddComments($addComments)
    {
        $this->options->setAddComments($addComments);
        return $this;
    }
    /**
     * Gets the optionStandalone value
     * @return bool
     */
    public function getOptionStandalone()
    {
        return $this->options->getStandalone();
    }
    /**
     * Sets the optionStandalone value
     * @param bool $standalone
     * @return Generator
     */
    public function setOptionStandalone($standalone)
    {
        $this->options->setStandalone($standalone);
        return $this;
    }
    /**
     * Gets the optionStructClass value
     * @return string
     */
    public function getOptionStructClass()
    {
        return $this->options->getStructClass();
    }
    /**
     * Sets the optionStructClass value
     * @param string $structClass
     * @return Generator
     */
    public function setOptionStructClass($structClass)
    {
        $this->options->setStructClass($structClass);
        return $this;
    }
    /**
     * Gets the optionStructArrayClass value
     * @return string
     */
    public function getOptionStructArrayClass()
    {
        return $this->options->getStructArrayClass();
    }
    /**
     * Sets the optionStructArrayClass value
     * @param string $structArrayClass
     * @return Generator
     */
    public function setOptionStructArrayClass($structArrayClass)
    {
        $this->options->setStructArrayClass($structArrayClass);
        return $this;
    }
    /**
     * Gets the optionSoapClientClass value
     * @return string
     */
    public function getOptionSoapClientClass()
    {
        return $this->options->getSoapClientClass();
    }
    /**
     * Sets the optionSoapClientClass value
     * @param string $soapClientClass
     * @return Generator
     */
    public function setOptionSoapClientClass($soapClientClass)
    {
        $this->options->setSoapClientClass($soapClientClass);
        return $this;
    }
    /**
     * Gets the package name
     * @param bool $ucFirst ucfirst package name or not
     * @return string
     */
    public function getOptionPrefix($ucFirst = true)
    {
        return $ucFirst ? ucfirst($this->getOptions()->getPrefix()) : $this->getOptions()->getPrefix();
    }
    /**
     * Sets the package name
     * @param string $optionPrefix
     * @return Generator
     */
    public function setOptionPrefix($optionPrefix)
    {
        $this->options->setPrefix($optionPrefix);
        return $this;
    }
    /**
     * Gets the optionBasicLogin value
     * @return string
     */
    public function getOptionBasicLogin()
    {
        return $this->options->getBasicLogin();
    }
    /**
     * Sets the optionBasicLogin value
     * @param string $optionBasicLogin
     * @return Generator
     */
    public function setOptionBasicLogin($optionBasicLogin)
    {
        $this->options->setBasicLogin($optionBasicLogin);
        return $this;
    }
    /**
     * Gets the optionBasicPassword value
     * @return string
     */
    public function getOptionBasicPassword()
    {
        return $this->options->getBasicPassword();
    }
    /**
     * Sets the optionBasicPassword value
     * @param string $optionBasicPassword
     * @return Generator
     */
    public function setOptionBasicPassword($optionBasicPassword)
    {
        $this->options->setBasicPassword($optionBasicPassword);
        return $this;
    }
    /**
     * Gets the optionProxyHost value
     * @return string
     */
    public function getOptionProxyHost()
    {
        return $this->options->getProxyHost();
    }
    /**
     * Sets the optionProxyHost value
     * @param string $optionProxyHost
     * @return Generator
     */
    public function setOptionProxyHost($optionProxyHost)
    {
        $this->options->setProxyHost($optionProxyHost);
        return $this;
    }
    /**
     * Gets the optionProxyPort value
     * @return string
     */
    public function getOptionProxyPort()
    {
        return $this->options->getProxyPort();
    }
    /**
     * Sets the optionProxyPort value
     * @param string $optionProxyPort
     * @return Generator
     */
    public function setOptionProxyPort($optionProxyPort)
    {
        $this->options->setProxyPort($optionProxyPort);
        return $this;
    }
    /**
     * Gets the optionProxyLogin value
     * @return string
     */
    public function getOptionProxyLogin()
    {
        return $this->options->getProxyLogin();
    }
    /**
     * Sets the optionProxyLogin value
     * @param string $optionProxyLogin
     * @return Generator
     */
    public function setOptionProxyLogin($optionProxyLogin)
    {
        $this->options->setProxyLogin($optionProxyLogin);
        return $this;
    }
    /**
     * Gets the optionProxyPassword value
     * @return string
     */
    public function getOptionProxyPassword()
    {
        return $this->options->getProxyPassword();
    }
    /**
     * Sets the optionProxyPassword value
     * @param string $optionProxyPassword
     * @return Generator
     */
    public function setOptionProxyPassword($optionProxyPassword)
    {
        $this->options->setProxyPassword($optionProxyPassword);
        return $this;
    }
    /**
     * Gets the optionOrigin value
     * @return string
     */
    public function getOptionOrigin()
    {
        return $this->options->getOrigin();
    }
    /**
     * Sets the optionOrigin value
     * @param string $optionOrigin
     * @return Generator
     */
    public function setOptionOrigin($optionOrigin)
    {
        $this->options->setOrigin($optionOrigin);
        $this->initWsdl();
        return $this;
    }
    /**
     * Gets the optionDestination value
     * @return string
     */
    public function getOptionDestination()
    {
        return $this->options->getDestination();
    }
    /**
     * Sets the optionDestination value
     * @param string $optionDestination
     * @return Generator
     */
    public function setOptionDestination($optionDestination)
    {
        $this->options->setDestination($optionDestination);
        $this->initDirectory();
        return $this;
    }
    /**
     * Gets the optionSoapOptions value
     * @return string
     */
    public function getOptionSoapOptions()
    {
        return $this->options->getSoapOptions();
    }
    /**
     * Sets the optionSoapOptions value
     * @param string $optionSoapOptions
     * @return Generator
     */
    public function setOptionSoapOptions($optionSoapOptions)
    {
        $this->options->setSoapOptions($optionSoapOptions);
        return $this;
    }
    /**
     * Gets the WSDL
     * @return Wsdl|null
     */
    public function getWsdl()
    {
        return $this->wsdl;
    }
    /**
     * Sets the WSDLs
     * @param Wsdl $wsdl
     * @return Generator
     */
    protected function setWsdl(Wsdl $wsdl)
    {
        $this->wsdl = $wsdl;
        return $this;
    }
    /**
     * Adds Wsdl location
     * @param Wsdl $wsdl
     * @param string $schemaLocation
     * @return Generator
     */
    public function addSchemaToWsdl(Wsdl $wsdl, $schemaLocation)
    {
        if (!empty($schemaLocation) && $wsdl->getContent() instanceof WsdlDocument && $wsdl->getContent()->getExternalSchema($schemaLocation) === null) {
            $wsdl->getContent()->addExternalSchema(new Schema($wsdl->getGenerator(), $schemaLocation, $this->getUrlContent($schemaLocation)));
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
    private function createDirectory($directory, $permissions = 0775)
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
        return ucfirst($this->getGather(new EmptyModel($this, $methodName)));
    }
    /**
     * @param GeneratorOptions $options
     * @return Generator
     */
    protected function setOptions(GeneratorOptions $options = null)
    {
        $this->options = $options;
        return $this;
    }
    /**
     * @return GeneratorOptions
     */
    protected function getOptions()
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
     * @return ClassMapFile
     */
    public function getClassmapFile()
    {
        if (empty($this->classmapFile)) {
            $classMapModel = new EmptyModel($this, 'ClassMap');
            $classMap = new ClassMapFile($this, $classMapModel->getPackagedName(), __DIR__);
            $classMap
                ->setModel($classMapModel);
            $this->classmapFile = $classMap;
        }
        return $this->classmapFile;
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
}
