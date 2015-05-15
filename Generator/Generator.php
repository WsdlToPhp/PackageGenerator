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
use WsdlToPhp\PackageGenerator\Container\Parser as ParserContainer;
use WsdlToPhp\PackageGenerator\Parser\AbstractParser;

class Generator extends \SoapClient
{
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
     * @return Generator
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
     * @param string options's file to parse
     * @return Generator
     */
    public static function instance($pathToWsdl = null, $login = false, $password = false, array $wsdlOptions = array())
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
     * Generates all classes based on options
     * @uses Generator::setPackageName()
     * @uses Generator::getWsdl()
     * @uses Generator::getStructs()
     * @uses Generator::getServices()
     * @uses Generator::getOptionGenerateWsdlClassFile()
     * @uses Generator::generateWsdlClassFile()
     * @uses Generator::setOptionGenerateWsdlClassFile()
     * @uses Generator::generateStructsClasses()
     * @uses Generator::generateServicesClasses()
     * @uses Generator::generateClassMap()
     * @uses Generator::getOptionGenerateAutoloadFile()
     * @uses Generator::generateAutoloadFile()
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
        $wsdlLocation = $wsdl !== null ? $wsdl->getName() : '';
        if (!empty($wsdlLocation)) {
            self::setPackageName($packageName);
            $rootDirectory = $rootDirectory . (substr($rootDirectory, -1) != '/' ? '/' : '');
            /**
             * Root directory
             */
            if (!is_dir($rootDirectory) && !$createRootDirectory) {
                throw new \InvalidArgumentException(sprintf('Unable to use dir "%s" as dir does not exists and its creation has been disabled', $rootDirectory));
            } elseif (!is_dir($rootDirectory) && $createRootDirectory) {
                mkdir($rootDirectory, $rootDirectoryRights);
            }
            /**
             * Begin process
             */
            if (is_dir($rootDirectory)) {
                foreach ($this->parsers as $parser) {
                    $parser->parse();
                }
                /**
                 * Generates Wsdl Class ?
                 */
                if ($this->getOptionGenerateWsdlClassFile() === true) {
                    $wsdlClassFile = $this->generateWsdlClassFile($rootDirectory);
                } else {
                    $wsdlClassFile = array();
                }
                if (!count($wsdlClassFile)) {
                    $this->setOptionGenerateWsdlClassFile(false);
                }
                /**
                 * Generates classes files
                 */
                $structsClassesFiles = $this->generateStructsClasses($rootDirectory, $rootDirectoryRights);
                $servicesClassesFiles = $this->generateServicesClasses($rootDirectory, $rootDirectoryRights);
                $classMapFile = $this->generateClassMap($rootDirectory);
                /**
                 * Generates autoload ?
                 */
                if ($this->getOptionGenerateAutoloadFile() === true) {
                    $this->generateAutoloadFile($rootDirectory, array_merge($wsdlClassFile, $structsClassesFiles, $servicesClassesFiles, $classMapFile));
                }
                /**
                 * Generates tutorial ?
                 */
                if ($this->getOptionGenerateTutorialFile() === true) {
                    $this->generateTutorialFile($rootDirectory, $servicesClassesFiles);
                }
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
     */
    private function generateStructsClasses($rootDirectory, $rootDirectoryRights)
    {
        $structs = $this->getStructs();
        $structsClassesFiles = array();
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
            foreach (array_keys($structsToGenerateDone) as $structName)
                $structs[$structName] = $structTmp->getStructByName($structName);
            unset($structTmp, $structsToGenerateDone);
            foreach ($structs as $structName => $struct) {
                if (!$struct->getIsStruct()) {
                    continue;
                }
                $elementFolder = $this->getDirectory($rootDirectory, $rootDirectoryRights, $struct);
                array_push($structsClassesFiles, $structClassFileName = $elementFolder . $struct->getPackagedName() . '.php');
                /**
                 * Generates file
                 */
                self::populateFile($structClassFileName, $struct->getClassDeclaration());
            }
        }
        return $structsClassesFiles;
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
     * @return array the absolute paths to the generated files
     */
    private function generateServicesClasses($rootDirectory, $rootDirectoryRights)
    {
        $services = $this->getServices();
        $servicesClassesFiles = array();
        if (count($services)) {
            foreach ($services as $service) {
                $elementFolder = $this->getDirectory($rootDirectory, $rootDirectoryRights, $service);
                array_push($servicesClassesFiles, $serviceClassFileName = $elementFolder . $service->getPackagedName() . '.php');
                /**
                 * Generates file
                 */
                self::populateFile($serviceClassFileName, $service->getClassDeclaration());
            }
        }
        return $servicesClassesFiles;
    }
    /**
     * Populate the php file with the object and the declarations
     * @uses AbstractModel::cleanComment()
     * @param string $fileName the file name
     * @param array $declarations the lines of code and comments
     * @return void
     */
    private static function populateFile($fileName, array $declarations)
    {
        $content = array('<?php');
        $indentationString = "    ";
        $indentationLevel = 0;
        foreach ($declarations as $declaration) {
            if (is_array($declaration) && array_key_exists('comment', $declaration) && is_array($declaration['comment'])) {
                array_push($content, str_repeat($indentationString, $indentationLevel) . '/**');
                foreach ($declaration['comment'] as $subComment)
                    array_push($content, str_repeat($indentationString, $indentationLevel) . ' * ' . AbstractModel::cleanComment($subComment));
                array_push($content, str_repeat($indentationString, $indentationLevel) . ' */');
            } elseif (is_string($declaration)) {
                switch ($declaration) {
                    case '{':
                        array_push($content, str_repeat($indentationString, $indentationLevel) . $declaration);
                        $indentationLevel++;
                        break;
                    case '}':
                        $indentationLevel--;
                        array_push($content, str_repeat($indentationString, $indentationLevel) . $declaration);
                        break;
                    default:
                        array_push($content, str_repeat($indentationString, $indentationLevel) . $declaration);
                        break;
                }
            }
        }
        array_push($content, str_repeat($indentationString, $indentationLevel));
        file_put_contents($fileName, implode("\n", $content));
    }
    /**
     * Generates classMap class
     * @uses Generator::getStructs()
     * @uses Generator::getPackageName()
     * @uses Generator::getOptionAddComments()
     * @uses Generator::populateFile()
     * @uses AbstractModel::getName()
     * @uses AbstractModel::getCleanName()
     * @param string $rootDirectory the directory
     * @return array the absolute path to the generated file
     */
    private function generateClassMap($rootDirectory)
    {
        $classMapDeclaration = array();
        /**
         * class map comments
         */
        $comments = array();
        array_push($comments, 'File for the class which returns the class map definition');
        array_push($comments, '@package ' . self::getPackageName());
        if (count($this->getOptionAddComments())) {
            foreach ($this->getOptionAddComments() as $tagName => $tagValue) {
                array_push($comments, "@$tagName $tagValue");
            }
        }
        array_push($classMapDeclaration, array('comment' => $comments));
        $comments = array();
        array_push($comments, 'Class which returns the class map definition by the static method ' . self::getPackageName() . 'ClassMap::classMap()');
        array_push($comments, '@package ' . self::getPackageName());
        if (count($this->getOptionAddComments())) {
            foreach ($this->getOptionAddComments() as $tagName => $tagValue) {
                array_push($comments, "@$tagName $tagValue");
            }
        }
        array_push($classMapDeclaration, array('comment' => $comments));
        /**
         * class map declaration
         */
        array_push($classMapDeclaration, 'class ' . self::getPackageName() . 'ClassMap');
        array_push($classMapDeclaration, '{');
        /**
         * classMap() method comments
         */
        $comments = array();
        array_push($comments, 'This method returns the array containing the mapping between WSDL structs and generated classes');
        array_push($comments, 'This array is sent to the \SoapClient when calling the WS');
        array_push($comments, '@return array');
        array_push($classMapDeclaration, array('comment' => $comments));
        /**
         * classMap() method body
         */
        array_push($classMapDeclaration, 'final public static function classMap()');
        array_push($classMapDeclaration, '{');
        $structs = $this->getStructs();
        $classesToMap = array();
        foreach ($structs as $struct) {
            if ($struct->getIsStruct()) {
                $classesToMap[$struct->getName()] = $struct->getPackagedName();
            }
        }
        ksort($classesToMap);
        array_push($classMapDeclaration, 'return ' . var_export($classesToMap, true) . ';');
        array_push($classMapDeclaration, '}');
        array_push($classMapDeclaration, '}');
        /**
         * Generates file
         */
        self::populateFile($filename = $rootDirectory . self::getPackageName() . 'ClassMap.php', $classMapDeclaration);
        unset($comments, $classMapDeclaration, $structs, $classesToMap);
        return array($filename);
    }
    /**
     * Generates autoload file for all classes.
     * The classes are loaded automatically in order of their dependency regarding their inheritance.
     * @uses Generator::getPackageName()
     * @uses Generator::getOptionAddComments()
     * @uses Generator::populateFile()
     * @param string $rootDirectory the directory
     * @param array $classesFiles the generated classes files
     * @return void
     */
    private function generateAutoloadFile($rootDirectory, array $classesFiles = array())
    {
        if (count($classesFiles)) {
            $autoloadDeclaration = array();
            $comments = array();
            array_push($comments, 'File to load generated classes once at once time');
            array_push($comments, '@package ' . self::getPackageName());
            if (count($this->getOptionAddComments())) {
                foreach ($this->getOptionAddComments() as $tagName => $tagValue) {
                    array_push($comments, "@$tagName $tagValue");
                }
            }
            array_push($autoloadDeclaration, array('comment' => $comments));
            $comments = array();
            array_push($comments, 'Includes for all generated classes files');
            if (count($this->getOptionAddComments())) {
                foreach ($this->getOptionAddComments() as $tagName => $tagValue) {
                    array_push($comments, "@$tagName $tagValue");
                }
            }
            array_push($autoloadDeclaration, array('comment' => $comments));
            foreach ($classesFiles as $classFile) {
                if (is_file($classFile)) {
                    array_push($autoloadDeclaration, 'require_once ' . str_replace($rootDirectory, 'dirname(__FILE__) . \'/', $classFile) . '\';');
                }
            }
            self::populateFile($rootDirectory . '/' . self::getPackageName() . 'Autoload.php', $autoloadDeclaration);
            unset($autoloadDeclaration, $comments);
        }
    }
    /**
     * Generates Wsdl Class file
     * @uses Generator::getPackageName()
     * @uses AbstractModel::cleanComment()
     * @param string $rootDirectory the directory
     * @return array the absolute path to the generated file
     */
    private function generateWsdlClassFile($rootDirectory)
    {
        $pathToWsdlClassTemplate = dirname(__FILE__) . '/../Resources/templates/Default/Class.php';
        if (is_file($pathToWsdlClassTemplate)) {
            /**
             * Adds additional PHP doc block tags if needed to the two main PHP doc block
             */
            if (count($this->getOptionAddComments())) {
                $file = file($pathToWsdlClassTemplate);
                $content = array();
                $counter = 2;
                foreach ($file as $line) {
                    if (empty($line)) {
                        continue;
                    }
                    if (strpos($line, ' */') === 0 && $counter) {
                        foreach ($this->getOptionAddComments() as $tagName => $tagValue) {
                            array_push($content, " * @$tagName $tagValue\n");
                        }
                        $counter--;
                    }
                    array_push($content, $line);
                }
                $content = implode('', $content);
            } else {
                $content = file_get_contents($pathToWsdlClassTemplate);
            }
            $metaInformation = '';
            foreach ($this->getWsdls() as $wsdl) {
                foreach ($wsdl->getMeta() as $metaName => $metaValue) {
                    $metaValueCleaned = AbstractModel::cleanComment($metaValue);
                    if ($metaValueCleaned === '') {
                        continue;
                    }
                    $metaInformation .= (!empty($metaInformation) ? "\n * " : '') . ucfirst($metaName) . " : $metaValueCleaned";
                }
            }
            $content = str_replace(array(
                'packageName',
                'PackageName',
                'meta_informations',
                "'wsdl_url_value'"
            ), array(
                lcfirst(self::getPackageName(false)),
                self::getPackageName(),
                $metaInformation,
                var_export(self::getWsdl(0)->getName(), true)
            ), $content);
            file_put_contents($rootDirectory . self::getPackageName() . 'WsdlClass.php', $content);
            return array($rootDirectory . self::getPackageName() . 'WsdlClass.php');
        } else {
            return array();
        }
    }
    /**
     * Generates tutorial file
     * @uses Generator::getOptionGenerateAutoloadFile()
     * @uses Generator::getWsdls()
     * @uses Generator::getWsdl()
     * @uses Generator::getPackageName()
     * @uses ReflectionClass::getMethods()
     * @uses ReflectionMethod::getName()
     * @uses ReflectionMethod::getParameters()
     * @param string $rootDirectory the direcoty
     * @param array $methodsClassesFiles the generated class files
     * @return bool true|false
     */
    private function generateTutorialFile($rootDirectory, array $methodsClassesFiles = array())
    {
        if ($this->getOptionGenerateAutoloadFile() === true) {
            $pathToTutorialTemplate = dirname(__FILE__) . '/../Resources/templates/Default/sample.php';
            if (!is_file($pathToTutorialTemplate)) {
                throw new \InvalidArgumentException(sprintf('Unable to find tutorial template at "%s"', $pathToTutorialTemplate));
            }
            if (!is_file($rootDirectory . '/' . self::getPackageName() . 'Autoload.php')) {
                throw new \InvalidArgumentException(sprintf('Unable to find autoload file at "%s"', $rootDirectory . '/' . self::getPackageName() . 'Autoload.php'));
            } else {
                require_once $rootDirectory . '/' . self::getPackageName() . 'Autoload.php';
            }
            if (class_exists('ReflectionClass') && count($methodsClassesFiles)) {
                $content = '';
                foreach ($methodsClassesFiles as $classFilePath) {
                    $pathinfo = pathinfo($classFilePath);
                    $className = str_replace('.' . $pathinfo['extension'], '', $pathinfo['filename']);
                    if (class_exists($className)) {
                        $r = new \ReflectionClass($className);
                        $methods = $r->getMethods();
                        $classMethods = array();
                        foreach ($methods as $method) {
                            if ($method->class === $className && !in_array($method->getName(), array('__toString', '__construct', 'getResult'))) {
                                array_push($classMethods, $method);
                            }
                        }
                        if (count($classMethods)) {
                            $classNameVar = lcfirst($className);
                            $content .= "\n\n/**" . str_repeat('*', strlen("Example for $className")) . "\n * Example for $className\n */";
                            $content .= "\n\$$classNameVar = new $className();";
                            foreach ($classMethods as $classMethod) {
                                $content .= "\n// sample call for $className::" . $classMethod->getName() . '()';
                                $methodDoComment = $classMethod->getDocComment();
                                $methodParameters = $classMethod->getParameters();
                                $methodParametersCount = count($methodParameters);
                                $isSetSoapHeaderMethod = (strpos($classMethod->getName(), 'setSoapHeader') === 0 && strlen($classMethod->getName()) > strlen('setSoapHeader'));
                                $end = $isSetSoapHeaderMethod ? 1 : $methodParametersCount;
                                $parameters = array();
                                for ($i = 0; $i < $end; $i++) {
                                    $methodParameter = $methodParameters[$i];
                                    $methodParameterName = $methodParameter->getName();
                                    /**
                                     * Retrieve parameter type based on the method doc comment
                                     */
                                    $matches = array();
                                    preg_match('/\@param\s(.*)\s\$' . $methodParameterName . '\n/', $methodDoComment, $matches);
                                    $methodParameterType = (array_key_exists(1, $matches) && class_exists($matches[1])) ? ucfirst($matches[1]) : null;
                                    array_push($parameters, !empty($methodParameterType) ? "new $methodParameterType(/*** update parameters list ***/)" : "\$$methodParameterName");
                                }
                                /**
                                 * setSoapHeader call
                                 */
                                if ($isSetSoapHeaderMethod) {
                                    $content .= " in order to initialize required SoapHeader";
                                    $content .= "\n\$$classNameVar->" . $classMethod->getName() . '(' . implode(', ', $parameters) . ');';
                                } else {
                                    /**
                                     * Operation call
                                     */
                                    $content .= "\nif(\$$classNameVar->" . $classMethod->getName() . '(' . implode(', ', $parameters) . '))';
                                    $content .= "\n    " . 'print_r($' . $classNameVar . '->getResult());';
                                    $content .= "\nelse";
                                    $content .= "\n    print_r($" . $classNameVar . "->getLastError());";
                                }
                            }
                        }
                    }
                }
                if (!empty($content)) {
                    /**
                     * Adds additional PHP doc block tags if needed to the one main PHP doc block
                     */
                    if (count($this->getOptionAddComments())) {
                        $file = file($pathToTutorialTemplate);
                        $fileContent = array();
                        $counter = 1;
                        foreach ($file as $line) {
                            if (empty($line)) {
                                continue;
                            }
                            if (strpos($line, ' */') === 0 && $counter) {
                                foreach ($this->getOptionAddComments() as $tagName => $tagValue) {
                                    array_push($fileContent, " * @$tagName $tagValue\n");
                                }
                                $counter--;
                            }
                            array_push($fileContent, $line);
                        }
                        $fileContent = implode('', $fileContent);
                    } else {
                        $fileContent = file_get_contents($pathToTutorialTemplate);
                    }
                    $fileContent = str_replace(array(
                        'packageName',
                        'PackageName',
                        'PACKAGENAME',
                        'WSDL_PATH',
                        '$content;'
                    ), array(
                        lcfirst(self::getPackageName()),
                        ucfirst(self::getPackageName()),
                        strtoupper(self::getPackageName()),
                        var_export($this->getWsdl(0)->getName(), true),
                        $content
                    ), $fileContent);
                    file_put_contents($rootDirectory . 'sample.php', $fileContent);
                }
                return true;
            } elseif (!class_exists('ReflectionClass')) {
                throw new \InvalidArgumentException("Generator::generateTutorialFile() needs ReflectionClass, see http://fr2.php.net/manual/fr/class.reflectionclass.php");
            }
        }
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
     * @param mixed $methodParameter the original function paramter
     * @return Method|null
     */
    public function getServiceMethod($methodName)
    {
        return $this->getService($this->getServiceName($methodName)) !== null ? $this->getService($this->getServiceName($methodName))->getMethod($methodName) : null;
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
     * Sets the optionSubCategory value
     * @return string
     */
    public function getOptionSubCategory()
    {
        return $this->options->getSubCategory();
    }
    /**
     * Sets the optionSubCategory value
     * @param string
     * @return GeneratorOptions
     */
    public function setOptionSubCategory($subCategory)
    {
        return $this->options->setSubCategory($subCategory);
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
     * Gets the optionGenerateAutoloadFile value
     * @return bool
     */
    public function getOptionGenerateAutoloadFile()
    {
        return $this->options->getGenerateAutoloadFile();
    }
    /**
     * Sts the optionGenerateAutoloadFile value
     * @param bool
     * @return GeneratorOptions
     */
    public function setOptionGenerateAutoloadFile($generateAutoloadFile)
    {
        return $this->options->setGenerateAutoloadFile($generateAutoloadFile);
    }
    /**
     * Gets the optionGenerateWsdlClassFile value
     * @return bool
     */
    public function getOptionGenerateWsdlClassFile()
    {
        return $this->options->getGenerateWsdlClass();
    }
    /**
     * @param bool $optionGenerateWsdlClassFile
     * @return GeneratorOptions
     */
    public function setOptionGenerateWsdlClassFile($optionGenerateWsdlClassFile)
    {
        return $this->options->setGenerateWsdlClass($optionGenerateWsdlClassFile);
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
    private static function setPackageName($packageName)
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
     * @return Wsdl
     */
    public function getWsdl($index)
    {
        return $this->getWsdls()->offsetExists($index) ? $this->getWsdls()->offsetGet($index) : null;
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
        if (!empty($schemaLocation) && $wsdl->getContent() !== null && $wsdl->getContent()->getExternalSchema($schemaLocation) === null) {
            $wsdl->getContent()->addExternalSchema(new Schema($schemaLocation, $this->getUrlContent($schemaLocation)));
        }
        return $this;
    }
    /**
     * Returns directory where to store class and create it if needed
     * @uses Generator::getCategory()
     * @uses Generator::getSubCategory()
     * @param string $rootDirectory the directory
     * @param int $rootDirectoryRights the permissions to apply
     * @param AbstractModel $model the model for which we generate the folder
     * @return string
     */
    private function getDirectory($rootDirectory, $rootDirectoryRights, AbstractModel $model)
    {
        $directory = $rootDirectory;
        $mainCat = $this->getCategory($model);
        $subCat = $this->getSubCategory($model);
        if (!empty($mainCat)) {
            $directory .= ucfirst($mainCat) . '/';
            if (!is_dir($directory)) {
                mkdir($directory, $rootDirectoryRights);
            }
        }
        if (!empty($subCat)) {
            $directory .= ucfirst($subCat) . '/';
            if (!is_dir($directory)) {
                mkdir($directory, $rootDirectoryRights);
            }
        }
        return $directory;
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
     * Gets sub category part
     * @param AbstractModel $model the model for which we generate the folder
     * @return string
     */
    private function getSubCategory(AbstractModel $model)
    {
        return Utils::getPart($this->options, $model, GeneratorOptions::SUB_CATEGORY);
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
     * @return \WsdlToPhp\PackageGenerator\Generator\Generator
     */
    protected function setParser(ParserContainer $container)
    {
        $this->parsers = $container;
        return $this;
    }
    /**
     * @param AbstractParser; $parser
     * @return \WsdlToPhp\PackageGenerator\Generator\Generator
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
