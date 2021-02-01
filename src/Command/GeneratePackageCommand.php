<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Command;

use DateTime;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputInterface;
use WsdlToPhp\PackageGenerator\Generator\Generator;
use WsdlToPhp\PackageGenerator\ConfigurationReader\GeneratorOptions;

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
                'Use this class as parent class for any StructType class. Default class is \WsdlToPhp\PackageBase\AbstractStructBase from wsdltophp/packagebase package'
            )
            ->addOption(
                'structarray',
                null,
                InputOption::VALUE_OPTIONAL,
                'Use this class as parent class for any StructArrayType class. Default class is \WsdlToPhp\PackageBase\AbstractStructArrayBase from wsdltophp/packagebase package'
            )
            ->addOption(
                'structenum',
                null,
                InputOption::VALUE_OPTIONAL,
                'Use this class as parent class for any StructEnumType class. Default class is \WsdlToPhp\PackageBase\AbstractStructEnumBase from wsdltophp/packagebase package'
            )
            ->addOption(
                'soapclient',
                null,
                InputOption::VALUE_OPTIONAL,
                'Use this class as parent class for any ServiceType class. Default class is \WsdlToPhp\PackageBase\AbstractSoapClientBase from wsdltophp/packagebase package'
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
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        parent::execute($input, $output);
        $start = new DateTime();
        $this->writeLn(sprintf(" Start at %s", $start->format('Y-m-d H:i:s')));
        $this->initGeneratorOptions();
        if ($this->canExecute()) {
            $this->initGenerator()->getGenerator()->generatePackage();
        } else {
            $this->writeLn("  Generation not launched, use \"--force\" option to force generation");
            $this->writeLn(sprintf("  Generator's option file used: %s", $this->resolveGeneratorOptionsConfigPath()));
            $this->writeLn("  Used generator's options:");
            $this->writeLn("    " . implode(PHP_EOL . '    ', $this->formatArrayForConsole($this->generatorOptions->toArray())));
        }
        $end = new DateTime();
        $this->writeLn(sprintf(" End at %s, duration: %s", $end->format('Y-m-d H:i:s'), $start->diff($end)->format('%H:%I:%S')));

        return self::EXIT_OK;
    }

    protected function getPackageGenerationCommandLineOptions(): array
    {
        return [
            'addcomments' => 'AddComments',
            'arrays-folder' => 'ArraysFolder',
            'composer-name' => 'ComposerName',
            'composer-settings' => 'ComposerSettings',
            'category' => 'Category',
            'destination' => 'Destination',
            'enums-folder' => 'EnumsFolder',
            'gathermethods' => 'GatherMethods',
            'genericconstants' => 'GenericConstantsName',
            'gentutorial' => 'GenerateTutorialFile',
            'login' => 'BasicLogin',
            'namespace' => 'Namespace',
            'password' => 'BasicPassword',
            'prefix' => 'Prefix',
            'proxy-host' => 'ProxyHost',
            'proxy-login' => 'ProxyLogin',
            'proxy-password' => 'ProxyPassword',
            'proxy-port' => 'ProxyPort',
            'services-folder' => 'ServicesFolder',
            'src-dirname' => 'SrcDirname',
            'structarray' => 'StructArrayClass',
            'structenum' => 'StructEnumClass',
            'structs-folder' => 'StructsFolder',
            'soapclient' => 'SoapClientClass',
            'struct' => 'StructClass',
            'standalone' => 'Standalone',
            'suffix' => 'Suffix',
            'urlorpath' => 'Origin',
            'validation' => 'Validation',
            'xsd-types-path' => 'XsdTypesPath',
        ];
    }

    protected function initGeneratorOptions(): self
    {
        $generatorOptions = GeneratorOptions::instance($this->resolveGeneratorOptionsConfigPath());

        foreach ($this->getPackageGenerationCommandLineOptions() as $optionName => $optionMethod) {
            $optionValue = $this->formatOptionValue($this->input->getOption($optionName));
            if ($optionValue !== null) {
                call_user_func_array([
                    $generatorOptions,
                    sprintf('set%s', $optionMethod),
                ], [
                    $optionValue,
                ]);
            }
        }
        $this->generatorOptions = $generatorOptions;

        return $this;
    }

    protected function formatOptionValue($optionValue)
    {
        if ('true' === $optionValue || (is_numeric($optionValue) && 1 === (int) $optionValue)) {
            return true;
        } elseif ('false' === $optionValue || (is_numeric($optionValue) && 0 === (int) $optionValue)) {
            return false;
        }

        return $optionValue;
    }

    /**
     * Utility method to return readable array based on "key: value"
     * @param array $array
     * @return array
     */
    protected function formatArrayForConsole(array $array): array
    {
        array_walk($array, function (&$value, $index) {
            $value = sprintf("%s: %s", $index, json_encode($value));
        });
        return $array;
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
}
