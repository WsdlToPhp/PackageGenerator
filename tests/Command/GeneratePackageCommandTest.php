<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Tests\Command;

use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Output\OutputInterface;
use WsdlToPhp\PackageGenerator\Command\GeneratePackageCommand;
use WsdlToPhp\PackageGenerator\ConfigurationReader\AbstractYamlReader;
use WsdlToPhp\PackageGenerator\ConfigurationReader\GeneratorOptions;
use WsdlToPhp\PackageGenerator\Tests\AbstractTestCase;

/**
 * @internal
 * @coversDefaultClass
 */
final class GeneratePackageCommandTest extends AbstractTestCase
{
    public function testExceptionOnDestination(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        AbstractYamlReader::resetInstances();
        $command = new GeneratePackageCommand('WsdlToPhp');

        $input = new ArrayInput([
            '--urlorpath' => self::wsdlBingPath(),
            '--force' => true,
        ]);
        $output = new ConsoleOutput(OutputInterface::VERBOSITY_QUIET);

        $command->run($input, $output);
    }

    public function testExceptionOnComposerName(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        AbstractYamlReader::resetInstances();
        $command = new GeneratePackageCommand('WsdlToPhp');

        $input = new ArrayInput([
            '--urlorpath' => self::wsdlBingPath(),
            '--destination' => self::getTestDirectory(),
            '--force' => true,
        ]);
        $output = new ConsoleOutput(OutputInterface::VERBOSITY_QUIET);

        $command->run($input, $output);
    }

    public function testExceptionOnOrigin(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        AbstractYamlReader::resetInstances();
        $command = new GeneratePackageCommand('WsdlToPhp');

        $input = new ArrayInput([
            '--destination' => self::getTestDirectory(),
            '--composer-name' => 'wsdltophp/package',
            '--force' => true,
        ]);
        $output = new ConsoleOutput(OutputInterface::VERBOSITY_QUIET);

        $command->run($input, $output);
    }

    public function testDebugMode(): void
    {
        AbstractYamlReader::resetInstances();
        $command = new GeneratePackageCommand('WsdlToPhp');

        $input = new ArrayInput([
            '--urlorpath' => self::wsdlBingPath(),
            '--destination' => self::getTestDirectory().'/debug/',
            '--composer-name' => 'wsdltophp/package',
            '--gentutorial' => true,
            '--genericconstants' => false,
        ]);
        $output = new ConsoleOutput(OutputInterface::VERBOSITY_QUIET);

        $command->run($input, $output);

        $this->assertFalse(is_dir(self::getTestDirectory().'/debug/'));
    }

    public function testSetSrcDirname(): void
    {
        AbstractYamlReader::resetInstances();
        $command = new GeneratePackageCommand('WsdlToPhp');

        $input = new ArrayInput([
            '--urlorpath' => self::wsdlBingPath(),
            '--destination' => self::getTestDirectory().'/src/',
            '--composer-name' => 'wsdltophp/package',
            '--src-dirname' => '',
            '--gentutorial' => true,
            '--genericconstants' => false,
            '--force' => true,
        ]);
        $output = new ConsoleOutput(OutputInterface::VERBOSITY_QUIET);

        $command->run($input, $output);

        $this->assertSame('', $command->getGenerator()->getOptionSrcDirname());
    }

    public function testGetOptionValue(): void
    {
        $command = new GeneratePackageCommand('WsdlToPhp');
        $input = new ArrayInput([
            '--urlorpath' => self::wsdlBingPath(),
            '--destination' => self::getTestDirectory().'/debug/',
            '--composer-name' => 'wsdltophp/package',
            '--gentutorial' => true,
            '--genericconstants' => false,
            sprintf('--%s', GeneratePackageCommand::GENERATOR_OPTIONS_CONFIG_OPTION) => __DIR__.'/../resources/generator_options.yml',
        ]);
        $output = new ConsoleOutput(OutputInterface::VERBOSITY_QUIET);

        $command->run($input, $output);

        $this->assertSame(__DIR__.'/../resources/generator_options.yml', $command->getGeneratorOptionsConfigOption());
    }

    public function testResolveGeneratorOptionsConfigPathUsingOption(): void
    {
        $command = new GeneratePackageCommand('WsdlToPhp');
        $input = new ArrayInput([
            '--urlorpath' => self::wsdlBingPath(),
            '--destination' => self::getTestDirectory().'/debug/',
            '--composer-name' => 'wsdltophp/package',
            '--gentutorial' => true,
            '--genericconstants' => false,
            sprintf('--%s', GeneratePackageCommand::GENERATOR_OPTIONS_CONFIG_OPTION) => __DIR__.'/../resources/generator_options.yml',
        ]);
        $output = new ConsoleOutput(OutputInterface::VERBOSITY_QUIET);

        $command->run($input, $output);

        $this->assertSame(__DIR__.'/../resources/generator_options.yml', $command->resolveGeneratorOptionsConfigPath());
    }

    public function testResolveGeneratorOptionsConfigPathUsingExistingProperUserConfig(): void
    {
        $command = new GeneratePackageCommand('WsdlToPhp');
        $input = new ArrayInput([
            '--urlorpath' => self::wsdlBingPath(),
            '--destination' => self::getTestDirectory().'/debug/',
            '--composer-name' => 'wsdltophp/package',
            '--gentutorial' => true,
            '--genericconstants' => false,
        ]);
        chdir(self::getTestDirectory().'../existing_config');
        $output = new ConsoleOutput(OutputInterface::VERBOSITY_QUIET);

        $command->run($input, $output);

        $this->assertSame(realpath(self::getTestDirectory().'../existing_config/'.GeneratePackageCommand::PROPER_USER_CONFIGURATION), $command->resolveGeneratorOptionsConfigPath());
    }

    public function testResolveGeneratorOptionsConfigPathUsingExistingDistributedConfig(): void
    {
        $command = new GeneratePackageCommand('WsdlToPhp');
        $input = new ArrayInput([
            '--urlorpath' => self::wsdlBingPath(),
            '--destination' => self::getTestDirectory().'/debug/',
            '--composer-name' => 'wsdltophp/package',
            '--gentutorial' => true,
            '--genericconstants' => false,
        ]);
        chdir(self::getTestDirectory().'../../../');
        $output = new ConsoleOutput(OutputInterface::VERBOSITY_QUIET);

        $command->run($input, $output);

        $this->assertSame(realpath(self::getTestDirectory().'../../../'.GeneratePackageCommand::DEFAULT_CONFIGURATION_FILE), $command->resolveGeneratorOptionsConfigPath());
    }

    public function testResolveGeneratorOptionsConfigPathUsingDefaultConfig(): void
    {
        $command = new GeneratePackageCommand('WsdlToPhp');
        $input = new ArrayInput([
            '--urlorpath' => self::wsdlBingPath(),
            '--destination' => self::getTestDirectory().'/debug/',
            '--composer-name' => 'wsdltophp/package',
            '--gentutorial' => true,
            '--genericconstants' => false,
        ]);
        chdir(self::getTestDirectory());
        $output = new ConsoleOutput(OutputInterface::VERBOSITY_QUIET);

        $command->run($input, $output);

        $this->assertSame(GeneratorOptions::getDefaultConfigurationPath(), $command->resolveGeneratorOptionsConfigPath());
    }
}
