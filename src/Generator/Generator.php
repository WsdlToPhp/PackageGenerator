<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Generator;

use WsdlToPhp\PackageGenerator\ConfigurationReader\GeneratorOptions;
use WsdlToPhp\PackageGenerator\Container\Model\Service as ServiceContainer;
use WsdlToPhp\PackageGenerator\Container\Model\Struct as StructContainer;
use WsdlToPhp\PackageGenerator\Model\AbstractModel;
use WsdlToPhp\PackageGenerator\Model\EmptyModel;
use WsdlToPhp\PackageGenerator\Model\Method;
use WsdlToPhp\PackageGenerator\Model\Schema;
use WsdlToPhp\PackageGenerator\Model\Service;
use WsdlToPhp\PackageGenerator\Model\Struct;
use WsdlToPhp\PackageGenerator\Model\Wsdl;

/**
 * @method string getOptionCategory()
 * @method self   setOptionCategory(string $category)
 * @method string getOptionGatherMethods()
 * @method self   setOptionGatherMethods(string $gatherMethods)
 * @method bool   getOptionGenericConstantsNames()
 * @method self   setOptionGenericConstantsNames(bool $genericConstantsNames)
 * @method bool   getOptionGenerateTutorialFile()
 * @method self   setOptionGenerateTutorialFile(bool $generateTutorialFile)
 * @method string getOptionNamespace()
 * @method self   setOptionNamespace(string $namespace)
 * @method bool   getOptionNamespaceDictatesDirectories()
 * @method self   setOptionNamespaceDictatesDirectories(bool $namespaceDictatesDirectories)
 * @method array  getOptionAddComments()
 * @method self   setOptionAddComments(array $addComments)
 * @method bool   getOptionStandalone()
 * @method self   setOptionStandalone(bool $standalone)
 * @method bool   getOptionValidation()
 * @method self   setOptionValidation(bool $validation)
 * @method string getOptionStructClass()
 * @method self   setOptionStructClass(string $structClass)
 * @method string getOptionStructArrayClass()
 * @method self   setOptionStructArrayClass(string $structArrayClass)
 * @method string getOptionStructEnumClass()
 * @method self   setOptionStructEnumClass(string $structEnumClass)
 * @method string getOptionSoapClientClass()
 * @method self   setOptionSoapClientClass(string $soapClientClass)
 * @method self   setOptionPrefix(string $optionPrefix)
 * @method self   setOptionSuffix(string $optionSuffix)
 * @method string getOptionBasicLogin()
 * @method self   setOptionBasicLogin(string $optionBasicLogin)
 * @method string getOptionBasicPassword()
 * @method self   setOptionBasicPassword(string $optionBasicPassword)
 * @method string getOptionProxyHost()
 * @method self   setOptionProxyHost(string $optionProxyHost)
 * @method string getOptionProxyPort()
 * @method self   setOptionProxyPort(string $optionProxyPort)
 * @method string getOptionProxyLogin()
 * @method self   setOptionProxyLogin(string $optionProxyLogin)
 * @method string getOptionProxyPassword()
 * @method self   setOptionProxyPassword(string $optionProxyPassword)
 * @method string getOptionOrigin()
 * @method string getOptionSrcDirname()
 * @method self   setOptionSrcDirname(string $optionSrcDirname)
 * @method array  getOptionSoapOptions()
 * @method string getOptionComposerName()
 * @method array  getOptionComposerSettings()
 * @method self   setOptionComposerSettings(array $optionComposerSettings)
 * @method string getOptionStructsFolder()
 * @method self   setOptionStructsFolder(string $optionStructsFolder)
 * @method string getOptionArraysFolder()
 * @method self   setOptionArraysFolder(string $optionArraysFolder)
 * @method string getOptionEnumsFolder()
 * @method self   setOptionEnumsFolder(string $optionEnumsFolder)
 * @method string getOptionServicesFolder()
 * @method self   setOptionServicesFolder(string $optionServicesFolder)
 * @method bool   getOptionSchemasSave()
 * @method self   setOptionSchemasSave(bool $optionSchemasSave)
 * @method string getOptionSchemasFolder()
 * @method self   setOptionSchemasFolder(string $optionSchemasFolder)
 * @method string getOptionXsdTypesPath()
 * @method self   setOptionXsdTypesPath(string $xsdTypesPath)
 */
class Generator implements \JsonSerializable
{
    protected Wsdl $wsdl;

    protected GeneratorOptions $options;

    protected GeneratorParsers $parsers;

    protected GeneratorFiles $files;

    protected GeneratorContainers $containers;

    protected ?GeneratorSoapClient $soapClient = null;

    public function __construct(GeneratorOptions $options)
    {
        $this
            ->setOptions($options)
            ->initialize()
        ;
    }

    public function __call($name, $arguments)
    {
        if (($prefix = 'getOption') === substr($name, 0, $length = strlen($prefix)) && empty($arguments)) {
            $getMethod = 'get'.substr($name, $length);

            return $this->options->{$getMethod}();
        }
        if (($prefix = 'setOption') === substr($name, 0, $length = strlen($prefix)) && 1 === (is_countable($arguments) ? count($arguments) : 0)) {
            $setMethod = 'set'.substr($name, $length);
            $this->options->{$setMethod}(array_shift($arguments));

            return $this;
        }

        throw new \BadMethodCallException(sprintf('Method %s is undefined', $name));
    }

    public function getParsers(): GeneratorParsers
    {
        return $this->parsers;
    }

    public function getFiles(): GeneratorFiles
    {
        return $this->files;
    }

    public function generatePackage(): self
    {
        return $this
            ->doSanityChecks()
            ->parse()
            ->initDirectory()
            ->doGenerate()
        ;
    }

    public function parse(): self
    {
        return $this->doParse();
    }

    /**
     * Gets the struct by its name
     * Starting from issue #157, we know call getVirtual secondly as structs are now betterly parsed and so is their inheritance/type is detected.
     *
     * @param string $structName the original struct name
     *
     * @uses Generator::getStructs()
     */
    public function getStructByName(string $structName): ?Struct
    {
        $struct = $this->getStructs()->getStructByName($structName);

        return $struct ?: $this->getStructs()->getVirtual($structName);
    }

    public function getStructByNameAndType(string $structName, string $type): ?Struct
    {
        return $this->getStructs()->getStructByNameAndType($structName, $type);
    }

    public function getService(string $serviceName): ?Service
    {
        return $this->getServices()->getServiceByName($serviceName);
    }

    public function getServiceMethod(string $methodName): ?Method
    {
        return $this->getService($this->getServiceName($methodName)) instanceof Service ? $this->getService($this->getServiceName($methodName))->getMethod($methodName) : null;
    }

    public function getServices(bool $usingGatherMethods = false): ServiceContainer
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

    public function getStructs(): StructContainer
    {
        return $this->containers->getStructs();
    }

    public function getOptionNamespacePrefix(): string
    {
        return $this->options->getNamespace();
    }

    public function setOptionNamespacePrefix(string $namespace): self
    {
        $this->options->setNamespace($namespace);

        return $this;
    }

    public function getOptionPrefix(bool $ucFirst = true): string
    {
        return $ucFirst ? ucfirst($this->getOptions()->getPrefix()) : $this->getOptions()->getPrefix();
    }

    public function getOptionSuffix(bool $ucFirst = true): string
    {
        return $ucFirst ? ucfirst($this->getOptions()->getSuffix()) : $this->getOptions()->getSuffix();
    }

    public function setOptionOrigin(string $optionOrigin): self
    {
        $this->options->setOrigin($optionOrigin);
        $this->initWsdl();

        return $this;
    }

    public function getOptionDestination(): string
    {
        $destination = $this->options->getDestination();
        if (!empty($destination)) {
            $destination = rtrim($destination, DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR;
        }

        return $destination;
    }

    public function setOptionDestination(string $optionDestination): self
    {
        if (!empty($optionDestination)) {
            $this->options->setDestination(rtrim($optionDestination, DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR);
        } else {
            throw new \InvalidArgumentException('Package\'s destination can\'t be empty', __LINE__);
        }

        return $this;
    }

    public function setOptionSoapOptions(array $optionSoapOptions): self
    {
        $this->options->setSoapOptions($optionSoapOptions);

        if ($this->soapClient) {
            $this->soapClient->initSoapClient();
        }

        return $this;
    }

    public function setOptionComposerName(string $optionComposerName): self
    {
        if (!empty($optionComposerName)) {
            $this->options->setComposerName($optionComposerName);
        } else {
            throw new \InvalidArgumentException('Package\'s composer name can\'t be empty', __LINE__);
        }

        return $this;
    }

    public function getWsdl(): ?Wsdl
    {
        return $this->wsdl;
    }

    public function addSchemaToWsdl(Wsdl $wsdl, string $schemaLocation): self
    {
        if (!empty($schemaLocation) && !$wsdl->hasSchema($schemaLocation)) {
            $wsdl->addSchema(new Schema($wsdl->getGenerator(), $schemaLocation, $this->getUrlContent($schemaLocation)));
        }

        return $this;
    }

    public function getServiceName(string $methodName): string
    {
        return ucfirst($this->getGather(new EmptyModel($this, $methodName)));
    }

    public function getOptions(): ?GeneratorOptions
    {
        return $this->options;
    }

    public function getSoapClient(): GeneratorSoapClient
    {
        return $this->soapClient;
    }

    public function getUrlContent(string $url): ?string
    {
        if (false !== mb_strpos($url, '://')) {
            $content = Utils::getContentFromUrl($url, $this->getOptionBasicLogin(), $this->getOptionBasicPassword(), $this->getOptionProxyHost(), $this->getOptionProxyPort(), $this->getOptionProxyLogin(), $this->getOptionProxyPassword(), $this->getSoapClient()->getSoapClientStreamContextOptions());
            if ($this->getOptionSchemasSave()) {
                Utils::saveSchemas($this->getOptionDestination(), $this->getOptionSchemasFolder(), $url, $content);
            }

            return $content;
        }
        if (is_file($url)) {
            return file_get_contents($url);
        }

        return null;
    }

    public function getContainers(): GeneratorContainers
    {
        return $this->containers;
    }

    public function jsonSerialize(): array
    {
        return [
            'containers' => $this->containers,
            'options' => $this->options,
        ];
    }

    public static function instanceFromSerializedJson(string $json): Generator
    {
        $decodedJson = json_decode($json, true);
        if (JSON_ERROR_NONE === json_last_error()) {
            // load options first
            $options = GeneratorOptions::instance();
            foreach ($decodedJson['options'] as $name => $value) {
                $options->setOptionValue($name, $value);
            }
            // create generator instance with options
            $instance = new self($options);
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

    protected function initialize(): self
    {
        return $this
            ->initContainers()
            ->initParsers()
            ->initFiles()
            ->initSoapClient()
            ->initWsdl()
        ;
    }

    protected function initSoapClient(): self
    {
        if (!isset($this->soapClient)) {
            $this->soapClient = new GeneratorSoapClient($this);
        }

        return $this;
    }

    protected function initContainers(): self
    {
        if (!isset($this->containers)) {
            $this->containers = new GeneratorContainers($this);
        }

        return $this;
    }

    protected function initParsers(): self
    {
        if (!isset($this->parsers)) {
            $this->parsers = new GeneratorParsers($this);
        }

        return $this;
    }

    protected function initFiles(): self
    {
        if (!isset($this->files)) {
            $this->files = new GeneratorFiles($this);
        }

        return $this;
    }

    protected function initDirectory(): self
    {
        Utils::createDirectory($this->getOptions()->getDestination());
        if (!is_writable($this->getOptionDestination())) {
            throw new \InvalidArgumentException(sprintf('Unable to use dir "%s" as dir does not exists, its creation has been impossible or it\'s not writable', $this->getOptionDestination()), __LINE__);
        }

        return $this;
    }

    protected function initWsdl(): self
    {
        $this->setWsdl(new Wsdl($this, $this->getOptionOrigin(), $this->getUrlContent($this->getOptionOrigin())));

        return $this;
    }

    protected function doSanityChecks(): self
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

    protected function doParse(): self
    {
        $this->parsers->doParse();

        return $this;
    }

    protected function doGenerate(): self
    {
        $this->files->doGenerate();

        return $this;
    }

    protected function setWsdl(Wsdl $wsdl): self
    {
        $this->wsdl = $wsdl;

        return $this;
    }

    protected function getGather(AbstractModel $model): string
    {
        return Utils::getPart($this->getOptionGatherMethods(), $model->getCleanName());
    }

    protected function setOptions(GeneratorOptions $options): self
    {
        $this->options = $options;

        return $this;
    }

    protected static function getModelInstanceFromJsonArrayEntry(Generator $generator, array $jsonArrayEntry): AbstractModel
    {
        return AbstractModel::instanceFromSerializedJson($generator, $jsonArrayEntry);
    }
}
