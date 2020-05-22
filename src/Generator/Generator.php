<?php

namespace WsdlToPhp\PackageGenerator\Generator;

use WsdlToPhp\PackageGenerator\Model\Schema;
use WsdlToPhp\PackageGenerator\Model\Wsdl;
use WsdlToPhp\PackageGenerator\Model\AbstractModel;
use WsdlToPhp\PackageGenerator\Model\EmptyModel;
use WsdlToPhp\PackageGenerator\Model\Struct;
use WsdlToPhp\PackageGenerator\Model\Service;
use WsdlToPhp\PackageGenerator\Model\Method;
use WsdlToPhp\PackageGenerator\Container\Model\Service as ServiceContainer;
use WsdlToPhp\PackageGenerator\Container\Model\Struct as StructContainer;
use WsdlToPhp\PackageGenerator\ConfigurationReader\GeneratorOptions;
use WsdlToPhp\PackageGenerator\WsdlHandler\Wsdl as WsdlDocument;

class Generator implements \JsonSerializable
{
    /**
     * Wsdl
     * @var Wsdl
     */
    protected $wsdl;
    /**
     * @var GeneratorOptions
     */
    protected $options;
    /**
     * Used parsers
     * @var GeneratorParsers
     */
    protected $parsers;
    /**
     * Used files
     * @var GeneratorFiles
     */
    protected $files;
    /**
     * Used containers
     * @var GeneratorContainers
     */
    protected $containers;
    /**
     * Used SoapClient
     * @var GeneratorSoapClient
     */
    protected $soapClient;
    /**
     * Constructor
     * @param GeneratorOptions $options
     */
    public function __construct(GeneratorOptions $options)
    {
        $this->setOptions($options)->initialize();
    }
    /**
     * @return Generator
     */
    protected function initialize()
    {
        return $this->initContainers()
            ->initParsers()
            ->initFiles()
            ->initSoapClient()
            ->initWsdl();
    }
    /**
     * @throws \InvalidArgumentException
     * @return Generator
     */
    protected function initSoapClient()
    {
        if (!isset($this->soapClient)) {
            $this->soapClient = new GeneratorSoapClient($this);
        }
        return $this;
    }
    /**
     * @return Generator
     */
    protected function initContainers()
    {
        if (!isset($this->containers)) {
            $this->containers = new GeneratorContainers($this);
        }
        return $this;
    }
    /**
     * @return Generator
     */
    protected function initParsers()
    {
        if (!isset($this->parsers)) {
            $this->parsers = new GeneratorParsers($this);
        }
        return $this;
    }
    /**
     * @return GeneratorParsers
     */
    public function getParsers()
    {
        return $this->parsers;
    }
    /**
     * @return Generator
     */
    protected function initFiles()
    {
        if (!isset($this->files)) {
            $this->files = new GeneratorFiles($this);
        }
        return $this;
    }
    /**
     * @return GeneratorFiles
     */
    public function getFiles()
    {
        return $this->files;
    }
    /**
     * @throws \InvalidArgumentException
     * @return Generator
     */
    protected function initDirectory()
    {
        Utils::createDirectory($this->getOptions()->getDestination());
        if (!is_writable($this->getOptionDestination())) {
            throw new \InvalidArgumentException(sprintf('Unable to use dir "%s" as dir does not exists, its creation has been impossible or it\'s not writable', $this->getOptionDestination()), __LINE__);
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
     * @return Generator
     */
    protected function doSanityChecks()
    {
        $destination = $this->getOptionDestination();
        if (empty($destination)) {
            throw new \InvalidArgumentException('Package\'s destination must be defined', __LINE__);
        }
        $composerName = $this->getOptionComposerName();
        if ($this->getOptionStandalone() && empty($composerName)) {
            throw new \InvalidArgumentException('Package\'s composer name must be defined', __LINE__);
        }
        return $this;
    }
    /**
     * @return Generator
     */
    protected function doParse()
    {
        $this->parsers->doParse();
        return $this;
    }
    /**
     * @return Generator
     */
    protected function doGenerate()
    {
        $this->files->doGenerate();
        return $this;
    }
    /**
     * Generates all classes based on options
     * @return Generator
     */
    public function generatePackage()
    {
        return $this
            ->doSanityChecks()
            ->parse()
            ->initDirectory()
            ->doGenerate();
    }
    /**
     * Only parses what has to be parsed, called before actually generating the package
     * @return Generator
     */
    public function parse()
    {
        return $this->doParse();
    }
    /**
     * Gets the struct by its name
     * Starting from issue #157, we know call getVirtual secondly as structs are now betterly parsed and so is their inheritance/type is detected
     * @uses Generator::getStructs()
     * @param string $structName the original struct name
     * @return Struct|null
     */
    public function getStructByName($structName)
    {
        $struct = $this->getStructs()->getStructByName($structName);
        return $struct ? $struct : $this->getStructs()->getVirtual($structName);
    }
    /**
     * Gets the struct by its name and type
     * @uses Generator::getStructs()
     * @param string $structName the original struct name
     * @param string $type the original struct type
     * @return Struct|null
     */
    public function getStructByNameAndType($structName, $type)
    {
        return $this->getStructs()->getStructByNameAndType($structName, $type);
    }
    /**
     * Gets a service by its name
     * @param string $serviceName the service name
     * @return Service|null
     */
    public function getService($serviceName)
    {
        return $this->getServices()->getServiceByName($serviceName);
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
     * @param bool $usingGatherMethods allows to gather methods within a single service if gather_methods options is set to true
     * @return ServiceContainer
     */
    public function getServices($usingGatherMethods = false)
    {
        $services = $this->containers->getServices();
        if ($usingGatherMethods && GeneratorOptions::VALUE_NONE === $this->getOptionGatherMethods()) {
            $serviceContainer = new ServiceContainer($this);
            $serviceModel = new Service($this, Service::DEFAULT_SERVICE_CLASS_NAME);
            foreach ($services as $service) {
                foreach ($service->getMethods() as $method) {
                    $serviceModel->getMethods()->add($method);
                }
            }
            $serviceContainer->add($serviceModel);
            $services = $serviceContainer;
        }
        return $services;
    }
    /**
     * @return StructContainer
     */
    public function getStructs()
    {
        return $this->containers->getStructs();
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
     * Gets the optionValidation value
     * @return bool
     */
    public function getOptionValidation()
    {
        return $this->options->getValidation();
    }
    /**
     * Sets the optionValidation value
     * @param bool $validation
     * @return Generator
     */
    public function setOptionValidation($validation)
    {
        $this->options->setValidation($validation);
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
     * Gets the optionStructEnumClass value
     * @return string
     */
    public function getOptionStructEnumClass()
    {
        return $this->options->getStructEnumClass();
    }
    /**
     * Sets the optionStructEnumClass value
     * @param string $structEnumClass
     * @return Generator
     */
    public function setOptionStructEnumClass($structEnumClass)
    {
        $this->options->setStructEnumClass($structEnumClass);
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
     * Gets the package name prefix
     * @param bool $ucFirst ucfirst package name prefix or not
     * @return string
     */
    public function getOptionPrefix($ucFirst = true)
    {
        return $ucFirst ? ucfirst($this->getOptions()->getPrefix()) : $this->getOptions()->getPrefix();
    }
    /**
     * Sets the package name prefix
     * @param string $optionPrefix
     * @return Generator
     */
    public function setOptionPrefix($optionPrefix)
    {
        $this->options->setPrefix($optionPrefix);
        return $this;
    }
    /**
     * Gets the package name suffix
     * @param bool $ucFirst ucfirst package name suffix or not
     * @return string
     */
    public function getOptionSuffix($ucFirst = true)
    {
        return $ucFirst ? ucfirst($this->getOptions()->getSuffix()) : $this->getOptions()->getSuffix();
    }
    /**
     * Sets the package name suffix
     * @param string $optionSuffix
     * @return Generator
     */
    public function setOptionSuffix($optionSuffix)
    {
        $this->options->setSuffix($optionSuffix);
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
        $destination = $this->options->getDestination();
        if (!empty($destination)) {
            $destination = rtrim($destination, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
        }
        return $destination;
    }
    /**
     * Sets the optionDestination value
     * @param string $optionDestination
     * @return Generator
     */
    public function setOptionDestination($optionDestination)
    {
        if (!empty($optionDestination)) {
            $this->options->setDestination(rtrim($optionDestination, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR);
        } else {
            throw new \InvalidArgumentException('Package\'s destination can\'t be empty', __LINE__);
        }
        return $this;
    }
    /**
     * Gets the optionSrcDirname value
     * @return string
     */
    public function getOptionSrcDirname()
    {
        return $this->options->getSrcDirname();
    }
    /**
     * Sets the optionSrcDirname value
     * @param string $optionSrcDirname
     * @return Generator
     */
    public function setOptionSrcDirname($optionSrcDirname)
    {
        $this->options->setSrcDirname($optionSrcDirname);
        return $this;
    }
    /**
     * Gets the optionSoapOptions value
     * @return array
     */
    public function getOptionSoapOptions()
    {
        return $this->options->getSoapOptions();
    }
    /**
     * Sets the optionSoapOptions value
     * @param array $optionSoapOptions
     * @return Generator
     */
    public function setOptionSoapOptions($optionSoapOptions)
    {
        $this->options->setSoapOptions($optionSoapOptions);
        if ($this->soapClient) {
            $this->soapClient->initSoapClient();
        }
        return $this;
    }
    /**
     * Gets the optionComposerName value
     * @return string
     */
    public function getOptionComposerName()
    {
        return $this->options->getComposerName();
    }
    /**
     * Sets the optionComposerName value
     * @param string $optionComposerName
     * @return Generator
     */
    public function setOptionComposerName($optionComposerName)
    {
        if (!empty($optionComposerName)) {
            $this->options->setComposerName($optionComposerName);
        } else {
            throw new \InvalidArgumentException('Package\'s composer name can\'t be empty', __LINE__);
        }
        return $this;
    }
    /**
     * Gets the optionComposerSettings value
     * @return array
     */
    public function getOptionComposerSettings()
    {
        return $this->options->getComposerSettings();
    }
    /**
     * Sets the optionComposerSettings value
     * @param array $optionComposerSettings
     * @return Generator
     */
    public function setOptionComposerSettings(array $optionComposerSettings = [])
    {
        $this->options->setComposerSettings($optionComposerSettings);
        return $this;
    }
    /**
     * Gets the optionStructsFolder value
     * @return string
     */
    public function getOptionStructsFolder()
    {
        return $this->options->getStructsFolder();
    }
    /**
     * Sets the optionStructsFolder value
     * @param string $optionStructsFolder
     * @return Generator
     */
    public function setOptionStructsFolder($optionStructsFolder)
    {
        $this->options->setStructsFolder($optionStructsFolder);
        return $this;
    }
    /**
     * Gets the optionArraysFolder value
     * @return string
     */
    public function getOptionArraysFolder()
    {
        return $this->options->getArraysFolder();
    }
    /**
     * Sets the optionArraysFolder value
     * @param string $optionArraysFolder
     * @return Generator
     */
    public function setOptionArraysFolder($optionArraysFolder)
    {
        $this->options->setArraysFolder($optionArraysFolder);
        return $this;
    }
    /**
     * Gets the optionEnumsFolder value
     * @return string
     */
    public function getOptionEnumsFolder()
    {
        return $this->options->getEnumsFolder();
    }
    /**
     * Sets the optionEnumsFolder value
     * @param string $optionEnumsFolder
     * @return Generator
     */
    public function setOptionEnumsFolder($optionEnumsFolder)
    {
        $this->options->setEnumsFolder($optionEnumsFolder);
        return $this;
    }
    /**
     * Gets the optionServicesFolder value
     * @return string
     */
    public function getOptionServicesFolder()
    {
        return $this->options->getServicesFolder();
    }
    /**
     * Sets the optionServicesFolder value
     * @param string $optionServicesFolder
     * @return Generator
     */
    public function setOptionServicesFolder($optionServicesFolder)
    {
        $this->options->setServicesFolder($optionServicesFolder);
        return $this;
    }
    /**
     * Gets the optionSchemasSave value
     * @return bool
     */
    public function getOptionSchemasSave()
    {
        return $this->options->getSchemasSave();
    }
    /**
     * Sets the optionSchemasSave value
     * @param bool $optionSchemasSave
     * @return Generator
     */
    public function setOptionSchemasSave($optionSchemasSave)
    {
        $this->options->setSchemasSave($optionSchemasSave);
        return $this;
    }
    /**
     * Gets the optionSchemasFolder value
     * @return string
     */
    public function getOptionSchemasFolder()
    {
        return $this->options->getSchemasFolder();
    }
    /**
     * Sets the optionSchemasFolder value
     * @param string $optionSchemasFolder
     * @return Generator
     */
    public function setOptionSchemasFolder($optionSchemasFolder)
    {
        $this->options->setSchemasFolder($optionSchemasFolder);
        return $this;
    }
    /**
     * Gets the optionXsdTypesPath value
     * @return string
     */
    public function getOptionXsdTypesPath()
    {
        return $this->options->getXsdTypesPath();
    }
    /**
     * Sets the optionXsdTypesPath value
     * @param string $xsdTypesPath
     * @return Generator
     */
    public function setOptionXsdTypesPath($xsdTypesPath)
    {
        $this->options->setXsdTypesPath($xsdTypesPath);
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
     * Gets gather name class
     * @param AbstractModel $model the model for which we generate the folder
     * @return string
     */
    protected function getGather(AbstractModel $model)
    {
        return Utils::getPart($this->getOptionGatherMethods(), $model->getCleanName());
    }
    /**
     * Returns the service name associated to the method/operation name in order to gather them in one service class
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
    public function getOptions()
    {
        return $this->options;
    }
    /**
     * @return GeneratorSoapClient
     */
    public function getSoapClient()
    {
        return $this->soapClient;
    }
    /**
     * @param string $url
     * @return string
     */
    public function getUrlContent($url)
    {
        if (mb_strpos($url, '://') !== false) {
            $content = Utils::getContentFromUrl($url, $this->getOptionBasicLogin(), $this->getOptionBasicPassword(), $this->getOptionProxyHost(), $this->getOptionProxyPort(), $this->getOptionProxyLogin(), $this->getOptionProxyPassword(), $this->getSoapClient()->getSoapClientStreamContextOptions());
            if ($this->getOptionSchemasSave() === true) {
                Utils::saveSchemas($this->getOptionDestination(), $this->getOptionSchemasFolder(), $url, $content);
            }
            return $content;
        } elseif (is_file($url)) {
            return file_get_contents($url);
        }
        return null;
    }
    /**
     * @return GeneratorContainers
     */
    public function getContainers()
    {
        return $this->containers;
    }
    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'containers' => $this->containers,
            'options' => $this->options,
        ];
    }
    /**
     * @param string $json
     * @throws \InvalidArgumentException
     * @return Generator
     */
    public static function instanceFromSerializedJson($json)
    {
        $decodedJson = json_decode($json, true);
        if (json_last_error() === JSON_ERROR_NONE) {
            // load options first
            $options = GeneratorOptions::instance();
            foreach ($decodedJson['options'] as $name => $value) {
                $options->setOptionValue($name, $value);
            }
            // create generator instance with options
            $instance = new static($options);
            // load services
            foreach ($decodedJson['containers']['services'] as $service) {
                $instance->getContainers()->getServices()->add(self::getModelInstanceFromJsonArrayEntry($instance, $service));
            }
            // load structs
            foreach ($decodedJson['containers']['structs'] as $struct) {
                $instance->getContainers()->getStructs()->add(self::getModelInstanceFromJsonArrayEntry($instance, $struct));
            }
        } else {
            throw new \InvalidArgumentException(sprintf('Json is invalid, please check error %s', json_last_error()));
        }
        return $instance;
    }
    /**
     * @param Generator $generator
     * @param array $jsonArrayEntry
     * @return AbstractModel
     */
    protected static function getModelInstanceFromJsonArrayEntry(Generator $generator, array $jsonArrayEntry)
    {
        return AbstractModel::instanceFromSerializedJson($generator, $jsonArrayEntry);
    }
}
