<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use WsdlToPhp\PackageBase\AbstractSoapClientBase;
use WsdlToPhp\PackageBase\AbstractStructArrayBase;
use WsdlToPhp\PackageBase\AbstractStructBase;
use WsdlToPhp\PackageBase\AbstractStructEnumBase;
use WsdlToPhp\PackageGenerator\ConfigurationReader\GeneratorOptions;
use WsdlToPhp\PackageGenerator\Generator\Generator;

final class GeneratePackageCommand extends AbstractCommand
{
    public const GENERATOR_OPTIONS_CONFIG_OPTION = 'config';
    public const PROPER_USER_CONFIGURATION = 'wsdltophp.yml';
    public const DEFAULT_CONFIGURATION_FILE = 'wsdltophp.yml.dist';

    protected Generator $generator;

    protected GeneratorOptions $generatorOptions;

    public function getGenerator(): Generator
    {
        return $this->generator;
    }

    public function getGeneratorOptionsConfigOption()
    {
        return $this->getOptionValue(self::GENERATOR_OPTIONS_CONFIG_OPTION);
    }

    public function resolveGeneratorOptionsConfigPath(): ?string
    {
        $path = null;
        $possibilities = $this->getGeneratorOptionsPossibilities();
        foreach ($possibilities as $possibility) {
            if (!empty($possibility) && is_file($possibility)) {
                $path = $possibility;

                break;
            }
        }

        return $path;
    }

    public function getGeneratorOptionsPossibilities(): array
    {
        return [
            $this->getGeneratorOptionsConfigOption(),
            sprintf('%s/%s', getcwd(), self::PROPER_USER_CONFIGURATION),
            sprintf('%s/%s', getcwd(), self::DEFAULT_CONFIGURATION_FILE),
            GeneratorOptions::getDefaultConfigurationPath(),
        ];
    }

    protected function setGenerator(Generator $generator): self
    {
        $this->generator = $generator;

        return $this;
    }

    protected function initGenerator(): self
    {
        return $this->setGenerator(new Generator($this->generatorOptions));
    }

    protected function configure(): void
    {
        parent::configure();
        $this
            ->setName('generate:package')
            ->setDescription('Generate package based on options')
            ->addOption(
                'urlorpath',
                null,
                InputOption::VALUE_REQUIRED,
                'Url or path to WSDL'
            )
            ->addOption(
                'destination',
                null,
                InputOption::VALUE_REQUIRED,
                'Path to destination directory, where the package will be generated'
            )
            ->addOption(
                'login',
                null,
                InputOption::VALUE_OPTIONAL,
                'Basic authentication login required to access the WSDL url, can be avoided mot of the time'
            )
            ->addOption(
                'password',
                null,
                InputOption::VALUE_OPTIONAL,
                'Basic authentication password required to access the WSDL url, can be avoided mot of the time'
            )
            ->addOption(
                'proxy-host',
                null,
                InputOption::VALUE_OPTIONAL,
                'Use proxy url'
            )
            ->addOption(
                'proxy-port',
                null,
                InputOption::VALUE_OPTIONAL,
                'Use proxy port'
            )
            ->addOption(
                'proxy-login',
                null,
                InputOption::VALUE_OPTIONAL,
                'Use proxy login'
            )
            ->addOption(
                'proxy-password',
                null,
                InputOption::VALUE_OPTIONAL,
                'Use proxy password'
            )
            ->addOption(
                'prefix',
                null,
                InputOption::VALUE_REQUIRED,
                'Prepend generated classes'
            )
            ->addOption(
                'suffix',
                null,
                InputOption::VALUE_REQUIRED,
                'Append generated classes'
            )
            ->addOption(
                'namespace',
                null,
                InputOption::VALUE_OPTIONAL,
                'Package classes\' namespace'
            )
            ->addOption(
                'namespace-directories',
                null,
                InputOption::VALUE_OPTIONAL,
                'Should the directories match the namespace path or not? True by default'
            )
            ->addOption(
                'category',
                null,
                InputOption::VALUE_OPTIONAL,
                'First level directory name generation mode (start, end, cat, none)'
            )
            ->addOption(
                'gathermethods',
                null,
                InputOption::VALUE_OPTIONAL,
                'Gather methods based on operation name mode (start, end)'
            )
            ->addOption(
                'gentutorial',
                null,
                InputOption::VALUE_OPTIONAL,
                'Enable/Disable tutorial file, you should enable this option only on dev'
            )
            ->addOption(
                'genericconstants',
                null,
                InputOption::VALUE_OPTIONAL,
                'Enable/Disable usage of generic constants name (ex : ENUM_VALUE_0, ENUM_VALUE_1, etc) or contextual values (ex : VALUE_STRING, VALUE_YES, VALUES_NO, etc)'
            )
            ->addOption(
                'addcomments',
                null,
                InputOption::VALUE_OPTIONAL | InputOption::VALUE_IS_ARRAY,
                'Set comments to be used within each generated file'
            )
            ->addOption(
                'standalone',
                null,
                InputOption::VALUE_OPTIONAL,
                'By default, the generated package can be used as a standalone. Otherwise, you must add wsdltophp/packagebase:dev-master to your main composer.json.'
            )
            ->addOption(
                'validation',
                null,
                InputOption::VALUE_OPTIONAL,
                'Enable/Disable the generation of validation rules in every generated setter.'
            )
            ->addOption(
                'struct',
                null,
                InputOption::VALUE_OPTIONAL,
                sprintf('Use this class as parent class for any StructType class. Default class is %s from wsdltophp/packagebase package', AbstractStructBase::class)
            )
            ->addOption(
                'structarray',
                null,
                InputOption::VALUE_OPTIONAL,
                sprintf('Use this class as parent class for any StructArrayType class. Default class is %s from wsdltophp/packagebase package', AbstractStructArrayBase::class)
            )
            ->addOption(
                'structenum',
                null,
                InputOption::VALUE_OPTIONAL,
                sprintf('Use this class as parent class for any StructEnumType class. Default class is %s from wsdltophp/packagebase package', AbstractStructEnumBase::class)
            )
            ->addOption(
                'soapclient',
                null,
                InputOption::VALUE_OPTIONAL,
                sprintf('Use this class as parent class for any ServiceType class. Default class is %s from wsdltophp/packagebase package', AbstractSoapClientBase::class)
            )
            ->addOption(
                'composer-name',
                null,
                InputOption::VALUE_REQUIRED,
                'Composer name of the generated package'
            )
            ->addOption(
                'composer-settings',
                null,
                InputOption::VALUE_OPTIONAL | InputOption::VALUE_IS_ARRAY,
                'Composer settings of the generated package'
            )
            ->addOption(
                'structs-folder',
                null,
                InputOption::VALUE_OPTIONAL,
                'Structs folder name (default: SructType)'
            )
            ->addOption(
                'arrays-folder',
                null,
                InputOption::VALUE_OPTIONAL,
                'Arrays folder name (default: ArrayType)'
            )
            ->addOption(
                'enums-folder',
                null,
                InputOption::VALUE_OPTIONAL,
                'Enumerations folder name (default: EnumType)'
            )
            ->addOption(
                'services-folder',
                null,
                InputOption::VALUE_OPTIONAL,
                'Services class folder name (default: ServiceType)'
            )
            ->addOption(
                'src-dirname',
                null,
                InputOption::VALUE_OPTIONAL,
                'Source directory subfolder oof destination directory (default: src)'
            )
            ->addOption(
                'xsd-types-path',
                null,
                InputOption::VALUE_OPTIONAL,
                'Path to the xsd types configuration file to load'
            )
            ->addOption(
                self::GENERATOR_OPTIONS_CONFIG_OPTION,
                null,
                InputOption::VALUE_OPTIONAL,
                'Path to the generator\'s configuration file to load'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        parent::execute($input, $output);
        $start = new \DateTime();
        $this->writeLn(sprintf(' Start at %s', $start->format('Y-m-d H:i:s')));
        $this->initGeneratorOptions();
        if ($this->canExecute()) {
            $this->initGenerator()->getGenerator()->generatePackage();
        } else {
            $this->writeLn('  Generation not launched, use "--force" option to force generation');
            $this->writeLn(sprintf("  Generator's option file used: %s", $this->resolveGeneratorOptionsConfigPath()));
            $this->writeLn("  Used generator's options:");
            $this->writeLn('    '.implode(PHP_EOL.'    ', $this->formatArrayForConsole($this->generatorOptions->toArray())));
        }
        $end = new \DateTime();
        $this->writeLn(sprintf(' End at %s, duration: %s', $end->format('Y-m-d H:i:s'), $start->diff($end)->format('%H:%I:%S')));

        return self::EXIT_OK;
    }

    protected function getPackageGenerationCommandLineOptions(): array
    {
        return [
            'addcomments' => GeneratorOptions::ADD_COMMENTS,
            'arrays-folder' => GeneratorOptions::ARRAYS_FOLDER,
            'composer-name' => GeneratorOptions::COMPOSER_NAME,
            'composer-settings' => GeneratorOptions::COMPOSER_SETTINGS,
            'category' => GeneratorOptions::CATEGORY,
            'destination' => GeneratorOptions::DESTINATION,
            'enums-folder' => GeneratorOptions::ENUMS_FOLDER,
            'gathermethods' => GeneratorOptions::GATHER_METHODS,
            'genericconstants' => GeneratorOptions::GENERIC_CONSTANTS_NAME,
            'gentutorial' => GeneratorOptions::GENERATE_TUTORIAL_FILE,
            'login' => GeneratorOptions::BASIC_LOGIN,
            'namespace' => GeneratorOptions::NAMESPACE_PREFIX,
            'namespace-directories' => GeneratorOptions::NAMESPACE_DICTATES_DIRECTORIES,
            'password' => GeneratorOptions::BASIC_PASSWORD,
            'prefix' => GeneratorOptions::PREFIX,
            'proxy-host' => GeneratorOptions::PROXY_HOST,
            'proxy-login' => GeneratorOptions::PROXY_LOGIN,
            'proxy-password' => GeneratorOptions::PROXY_PASSWORD,
            'proxy-port' => GeneratorOptions::PROXY_PORT,
            'services-folder' => GeneratorOptions::SERVICES_FOLDER,
            'src-dirname' => GeneratorOptions::SRC_DIRNAME,
            'structarray' => GeneratorOptions::STRUCT_ARRAY_CLASS,
            'structenum' => GeneratorOptions::STRUCT_ENUM_CLASS,
            'structs-folder' => GeneratorOptions::STRUCTS_FOLDER,
            'soapclient' => GeneratorOptions::SOAP_CLIENT_CLASS,
            'struct' => GeneratorOptions::STRUCT_CLASS,
            'standalone' => GeneratorOptions::STANDALONE,
            'suffix' => GeneratorOptions::SUFFIX,
            'urlorpath' => GeneratorOptions::ORIGIN,
            'validation' => GeneratorOptions::VALIDATION,
            'xsd-types-path' => GeneratorOptions::XSD_TYPES_PATH,
        ];
    }

    protected function initGeneratorOptions(): self
    {
        /** @var GeneratorOptions $generatorOptions */
        $generatorOptions = GeneratorOptions::instance($this->resolveGeneratorOptionsConfigPath());

        foreach ($this->getPackageGenerationCommandLineOptions() as $optionName => $generatorOptionName) {
            if (is_null($optionValue = $this->formatOptionValue($this->input->getOption($optionName)))) {
                continue;
            }
            $generatorOptions->setOptionValue($generatorOptionName, $optionValue);
        }
        $this->generatorOptions = $generatorOptions;

        return $this;
    }

    protected function formatOptionValue($optionValue)
    {
        if ('true' === $optionValue || (is_numeric($optionValue) && 1 === (int) $optionValue)) {
            return true;
        }
        if ('false' === $optionValue || (is_numeric($optionValue) && 0 === (int) $optionValue)) {
            return false;
        }

        return $optionValue;
    }

    /**
     * Utility method to return readable array based on "key: value".
     */
    protected function formatArrayForConsole(array $array): array
    {
        array_walk($array, function (&$value, $index) {
            $value = sprintf('%s: %s', $index, json_encode($value, JSON_THROW_ON_ERROR));
        });

        return $array;
    }
}
