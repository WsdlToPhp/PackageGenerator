<?php

namespace WsdlToPhp\PackageGenerator\Command;

use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputInterface;
use WsdlToPhp\PackageGenerator\Generator\Generator;
use WsdlToPhp\PackageGenerator\ConfigurationReader\GeneratorOptions;

class GeneratePackageCommand extends AbstractCommand
{
    /**
     * @var Generator
     */
    protected $generator;
    /**
     * @var GeneratorOptions
     */
    protected $generatorOptions;
    /**
     * @return Generator
     */
    public function getGenerator()
    {
        return $this->generator;
    }
    /**
     * @param Generator $generator
     * @return GeneratePackageCommand
     */
    protected function setGenerator(Generator $generator)
    {
        $this->generator = $generator;
        return $this;
    }
    /**
     * @return GeneratePackageCommand
     */
    protected function initGenerator()
    {
        return $this->setGenerator(new Generator($this->generatorOptions));
    }
    /**
     * @see \WsdlToPhp\PackageGenerator\Command\AbstractCommand::configure()
     */
    protected function configure()
    {
        parent::configure();
        $this
            ->setName('wsdltophp:generate:package')
            ->setDescription('Generate package based on options')
            ->addOption('wsdl-urlorpath', null, InputOption::VALUE_REQUIRED, 'Url or path to WSDL')
            ->addOption('wsdl-destination', null, InputOption::VALUE_REQUIRED, 'Path to destination directory, where the package will be generated')
            ->addOption('wsdl-login', null, InputOption::VALUE_OPTIONAL, 'Basic authentication login required to access the WSDL url, can be avoided mot of the time')
            ->addOption('wsdl-password', null, InputOption::VALUE_OPTIONAL, 'Basic authentication password required to access the WSDL url, can be avoided mot of the time')
            ->addOption('wsdl-proxy-host', null, InputOption::VALUE_OPTIONAL, 'Use proxy url')
            ->addOption('wsdl-proxy-port', null, InputOption::VALUE_OPTIONAL, 'Use proxy port')
            ->addOption('wsdl-proxy-login', null, InputOption::VALUE_OPTIONAL, 'Use proxy login')
            ->addOption('wsdl-proxy-password', null, InputOption::VALUE_OPTIONAL, 'Use proxy password')
            ->addOption('wsdl-prefix', null, InputOption::VALUE_REQUIRED, 'Prepend generated classes')
            ->addOption('wsdl-suffix', null, InputOption::VALUE_REQUIRED, 'Append generated classes')
            ->addOption('wsdl-namespace', null, InputOption::VALUE_OPTIONAL, 'Package classes\' namespace')
            ->addOption('wsdl-category', null, InputOption::VALUE_OPTIONAL, 'First level directory name generation mode (start, end, cat, none)')
            ->addOption('wsdl-gathermethods', null, InputOption::VALUE_OPTIONAL, 'Gather methods based on operation name mode (start, end)')
            ->addOption('wsdl-gentutorial', null, InputOption::VALUE_OPTIONAL, 'Enable/Disable tutorial file, you should enable this option only on dev')
            ->addOption('wsdl-genericconstants', null, InputOption::VALUE_OPTIONAL, 'Enable/Disable usage of generic constants name (ex : ENUM_VALUE_0, ENUM_VALUE_1, etc) or contextual values (ex : VALUE_STRING, VALUE_YES, VALUES_NO, etc)')
            ->addOption('wsdl-addcomments', null, InputOption::VALUE_OPTIONAL | InputOption::VALUE_IS_ARRAY, 'Set comments to be used within each generated file')
            ->addOption('wsdl-standalone', null, InputOption::VALUE_OPTIONAL, 'By default, the generated package can be used as a standalone. Otherwise, you must add wsdltophp/packagebase:dev-master to your main composer.json.')
            ->addOption('wsdl-struct', null, InputOption::VALUE_OPTIONAL, 'Use this class as parent class for any StructType class. Default class is \WsdlToPhp\PackageBase\AbstractStructBase from wsdltophp/packagebase package')
            ->addOption('wsdl-structarray', null, InputOption::VALUE_OPTIONAL, 'Use this class as parent class for any StructArrayType class. Default class is \WsdlToPhp\PackageBase\AbstractStructArrayBase from wsdltophp/packagebase package')
            ->addOption('wsdl-soapclient', null, InputOption::VALUE_OPTIONAL, 'Use this class as parent class for any ServiceType class. Default class is \WsdlToPhp\PackageBase\AbstractSoapClientBase from wsdltophp/packagebase package');
    }
    /**
     * @see \Sdc\AppBundle\Command\Command::execute()
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        parent::execute($input, $output);
        $start = new \DateTime();
        $this->writeLn(sprintf(" Start at %s", $start->format('Y-m-d H:i:s')));

        $this->initGeneratorOptions();

        if ($this->canExecute()) {
            $this
                ->initGenerator()
                ->getGenerator()
                    ->generateClasses();
        } else {
            $this->writeLn("  Generation not launched, use \"--force\" option to force generation");
            $this->writeLn("  Used generator's options:");
            $this->writeLn("    " . implode(PHP_EOL . '    ', $this->formatArrayForConsole($this->generatorOptions->toArray())));
        }

        $end = new \DateTime();
        $this->writeLn(sprintf(" End at %s, duration: %s", $end->format('Y-m-d H:i:s'), $start->diff($end)->format('%H:%I:%S')));
    }
    /**
     * @return array
     */
    protected function getPackageGenerationCommandLineOptions()
    {
        return array(
            'wsdl-prefix' => 'Prefix',
            'wsdl-suffix' => 'Suffix',
            'wsdl-urlorpath' => 'Origin',
            'wsdl-login' => 'BasicLogin',
            'wsdl-category' => 'Category',
            'wsdl-struct' => 'StructClass',
            'wsdl-namespace' => 'Namespace',
            'wsdl-proxy-host' => 'ProxyHost',
            'wsdl-proxy-port' => 'ProxyPort',
            'wsdl-standalone' => 'Standalone',
            'wsdl-proxy-login' => 'ProxyLogin',
            'wsdl-password' => 'BasicPassword',
            'wsdl-destination' => 'Destination',
            'wsdl-addcomments' => 'AddComments',
            'wsdl-soapclient' => 'SoapClientClass',
            'wsdl-gathermethods' => 'GatherMethods',
            'wsdl-proxy-password' => 'ProxyPassword',
            'wsdl-structarray' => 'StructArrayClass',
            'wsdl-gentutorial' => 'GenerateTutorialFile',
            'wsdl-genericconstants' => 'GenericConstantsName',
        );
    }
    /**
     * @return GeneratePackageCommand
     */
    protected function initGeneratorOptions()
    {
        $generatorOptions = GeneratorOptions::instance();
        foreach ($this->getPackageGenerationCommandLineOptions() as $optionName=>$optionMethod) {
            $optionValue = $this->formatOptionValue($this->input->getOption($optionName));
            if ($optionValue !== null) {
                $setOption = sprintf('set%s', $optionMethod);
                if (method_exists($generatorOptions, $setOption)) {
                    call_user_func_array(array(
                        $generatorOptions,
                        $setOption,
                    ), array(
                        $optionValue,
                    ));
                } else {
                    $this->writeLn(sprintf('Method "%s" not found', $setOption));
                }
            }
        }
        $this->generatorOptions = $generatorOptions;
        return $this;
    }
    /**
     * @param mixed $optionValue
     * @return boolean|mixed
     */
    protected function formatOptionValue($optionValue)
    {
        if ($optionValue === 'true' || (is_numeric($optionValue) && (int)$optionValue === 1)) {
            return true;
        } elseif ($optionValue === 'false' || (is_numeric($optionValue) && (int)$optionValue === 0)) {
            return false;
        }
        return $optionValue;
    }
    /**
     * Utility method to return readeable array based on "key: value"
     * @param array $array
     * @return array
     */
    private function formatArrayForConsole($array)
    {
        array_walk($array, function (&$value, $index) {
            $value = sprintf("%s: %s", $index, !is_array($value) ? $value : implode(', ', $value));
        });
        return $array;
    }
}
