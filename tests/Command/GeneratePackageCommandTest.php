<?php

namespace WsdlToPhp\PackageGenerator\Command;

use WsdlToPhp\PackageGenerator\Tests\TestCase;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Output\OutputInterface;
use WsdlToPhp\PackageGenerator\ConfigurationReader\AbstractYamlReader;

class GeneratePackageCommandTest extends TestCase
{
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testExceptionOnDestination()
    {
        AbstractYamlReader::resetInstances();
        $command = new GeneratePackageCommand('WsdlToPhp');

        $input = new ArrayInput(array(
            '--urlorpath' => self::wsdlBingPath(),
            '--force' => true,
        ));
        $output = new ConsoleOutput(OutputInterface::VERBOSITY_QUIET);

        $command->run($input, $output);
    }
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testExceptionOnComposerName()
    {
        AbstractYamlReader::resetInstances();
        $command = new GeneratePackageCommand('WsdlToPhp');

        $input = new ArrayInput(array(
            '--urlorpath' => self::wsdlBingPath(),
            '--destination' => self::getTestDirectory(),
            '--force' => true,
        ));
        $output = new ConsoleOutput(OutputInterface::VERBOSITY_QUIET);

        $command->run($input, $output);
    }
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testExceptionOnOrigin()
    {
        AbstractYamlReader::resetInstances();
        $command = new GeneratePackageCommand('WsdlToPhp');

        $input = new ArrayInput(array(
            '--destination' => self::getTestDirectory(),
            '--composer-name' => 'wsdltophp/package',
            '--force' => true,
        ));
        $output = new ConsoleOutput(OutputInterface::VERBOSITY_QUIET);

        $command->run($input, $output);
    }
    /**
     *
     */
    public function testDebugMode()
    {
        AbstractYamlReader::resetInstances();
        $command = new GeneratePackageCommand('WsdlToPhp');

        $input = new ArrayInput(array(
            '--urlorpath' => self::wsdlBingPath(),
            '--destination' => self::getTestDirectory() . '/debug/',
            '--composer-name' => 'wsdltophp/package',
            '--gentutorial' => 'true',
            '--genericconstants' => 'false',
        ));
        $output = new ConsoleOutput(OutputInterface::VERBOSITY_QUIET);

        $command->run($input, $output);

        $this->assertFalse(is_dir(self::getTestDirectory() . '/debug/'));
    }
}
