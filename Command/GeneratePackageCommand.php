<?php

namespace WsdlToPhp\PackageGenerator\Command;

use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputInterface;
use WsdlToPhp\PackageGenerator\Generator\Generator;

class GeneratePackageCommand extends AbstractCommand
{
    /**
     * @var Generator
     */
    protected $generator;

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
     * @param string $wsdlUrl
     * @param string $wsdlLogin
     * @param string $wsdlPassword
     * @param array $wsdlOptions
     * @return Generator
     */
    protected function getInstanceOfGenerator($wsdlUrl, $wsdlLogin = null, $wsdlPassword = null, array $wsdlOptions = array())
    {
        return Generator::instance($wsdlUrl, $wsdlLogin, $wsdlPassword, $wsdlOptions);
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
            ->addOption('wsdl-namespace', null, InputOption::VALUE_OPTIONAL, 'Package classes\' namespace')
            ->addOption('wsdl-category', null, InputOption::VALUE_OPTIONAL, 'First level directory name generation mode (start, end, cat, none)')
            ->addOption('wsdl-subcategory', null, InputOption::VALUE_OPTIONAL, 'Second level directory name generation mode (start, end, none), disabled if category=cat')
            ->addOption('wsdl-gathermethods', null, InputOption::VALUE_OPTIONAL, 'Gather methods based on operation name mode (start, end)')
            ->addOption('wsdl-genwsdlclass', null, InputOption::VALUE_OPTIONAL, 'Enable/Disable main Wsdl class generation, you should always enable this option')
            ->addOption('wsdl-gentutorial', null, InputOption::VALUE_OPTIONAL, 'Enable/Disable tutorial file, you should enable this option only on dev')
            ->addOption('wsdl-genautoload', null, InputOption::VALUE_OPTIONAL, 'Enable/Disable autoload file generation, this is useless if you use composer or your own autoloader')
            ->addOption('wsdl-sendarrayparam', null, InputOption::VALUE_OPTIONAL, 'Enable/Disable usage of an array to send the parameters, can be disabled as it will soon removed')
            ->addOption('wsdl-genericconstants', null, InputOption::VALUE_OPTIONAL, 'Enable/Disable usage of generic constants name (ex : ENUM_VALUE_0, ENUM_VALUE_1, etc) or contextual values (ex : VALUE_STRING, VALUE_YES, VALUES_NO, etc)')
            ->addOption('wsdl-reponseasobj', null, InputOption::VALUE_OPTIONAL, 'Enable/Disable usage of object to encapsulate Web Service response')
            ->addOption('wsdl-inherits', null, InputOption::VALUE_OPTIONAL, 'Astracts struct base name to identify abtract structs, can be avoided as it will be soon removed')
            ->addOption('wsdl-paramsasarray', null, InputOption::VALUE_OPTIONAL, 'Enable/Disable usage of a \'parameters\' parameter in an array to contain request parameters, disabled in most cases')
            ->addOption('wsdl-addcomments', null, InputOption::VALUE_OPTIONAL | InputOption::VALUE_IS_ARRAY, 'Set comments to be used within each generated file');
    }

    /**
     * @see \Sdc\AppBundle\Command\Command::execute()
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        parent::execute($input, $output);
        $start = new \DateTime();
        $this->writeLn(sprintf(" Start at %s", $start->format('Y-m-d H:i:s')));

        $wsdlUrl            = $this->input->getOption('wsdl-urlorpath');
        $wsdlLogin          = $this->input->getOption('wsdl-login');
        $wsdlPassword       = $this->input->getOption('wsdl-password');
        $packageName        = $this->input->getOption('wsdl-prefix');
        $packageDestination = $this->input->getOption('wsdl-destination');
        $wsdlOptions        = $this->defineWsdlOptions();

        $this->setGenerator($this->getInstanceOfGenerator($wsdlUrl, $wsdlLogin, $wsdlPassword, $wsdlOptions));

        $packageGenerationOptions = $this->definePackageGenerationOptions();

        if ($this->canExecute()) {
            $this->getGenerator()->generateClasses($packageName, $packageDestination);
        } else {
            $this->writeLn("  Generation not launched, use --force to force generation");
            $this->writeLn("  Wsdl used:");
            $this->writeLn("    " . implode(PHP_EOL . '    ', $this->formatArrayForConsole(array(
                'url'          => $wsdlUrl,
                'login'        => $wsdlLogin,
                'password'     => $wsdlPassword,
                'Package name' => $packageName,
                'Package dest' => $packageDestination,
            ))));
            $this->writeLn("  Wsdl options used:");
            $this->writeLn("    " . implode(PHP_EOL . '    ', $this->formatArrayForConsole($wsdlOptions)));
            $this->writeLn("  Generator options used:");
            $this->writeLn("    " . implode(PHP_EOL . '    ', $this->formatArrayForConsole($packageGenerationOptions)));
        }

        $end = new \DateTime();
        $this->writeLn(sprintf(" End at %s, duration: %s", $end->format('Y-m-d H:i:s'), $start->diff($end)->format('%H:%I:%S')));
    }

    /**
     * @return array
     */
    protected function defineWsdlOptions()
    {
        $options        = array();
        $wsdlProxyHost  = $this->input->getOption('wsdl-proxy-host');
        $wsdlProxyPort  = $this->input->getOption('wsdl-proxy-port');
        $wsdlProxyLogin = $this->input->getOption('wsdl-proxy-login');
        $wsdlProxyPass  = $this->input->getOption('wsdl-proxy-password');

        if (!empty($wsdlProxyHost)) {
            $options['proxy_host'] = $wsdlProxyHost;
        }
        if (!empty($wsdlProxyPort)) {
            $options['proxy_port'] = $wsdlProxyPort;
        }
        if (!empty($wsdlProxyLogin)) {
            $options['proxy_login'] = $wsdlProxyLogin;
        }
        if (!empty($wsdlProxyPass)) {
            $options['proxy_password'] = $wsdlProxyPass;
        }

        return $options;
    }

    /**
     * @return array
     */
    protected function getPackageGenerationCommandLineOptions()
    {
        return array(
            'wsdl-namespace'        => 'Namespace',
            'wsdl-category'         => 'Category',
            'wsdl-subcategory'      => 'SubCategory',
            'wsdl-gathermethods'    => 'GatherMethods',
            'wsdl-genwsdlclass'     => 'GenerateWsdlClassFile',
            'wsdl-gentutorial'      => 'GenerateTutorialFile',
            'wsdl-genautoload'      => 'GenerateAutoloadFile',
            'wsdl-sendarrayparam'   => 'SendArrayAsParameter',
            'wsdl-genericconstants' => 'GenericConstantsNames',
            'wsdl-reponseasobj'     => 'GetResponseAsWsdlObject',
            'wsdl-inherits'         => 'InheritsClassIdentifier',
            'wsdl-paramsasarray'    => 'SendParametersAsArray',
            'wsdl-addcomments'      => 'AddComments',
        );
    }

    /**
     * @return array
     */
    protected function definePackageGenerationOptions()
    {
        $options = array();
        if ($this->generator instanceof Generator) {
            foreach ($this->getPackageGenerationCommandLineOptions() as $optionName=>$optionMethod) {
                $optionValue = $this->formatOptionValue($this->input->getOption($optionName));
                if ($optionValue !== null) {
                    $setOption = sprintf('setOption%s', $optionMethod);
                    if (method_exists($this->generator, $setOption)) {
                        $options[$optionName] = $optionValue;
                        call_user_func_array(array(
                            $this->generator,
                            $setOption,
                        ), array(
                            $optionValue,
                        ));
                    }
                }
            }
        }
        return $options;
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
