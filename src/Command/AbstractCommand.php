<?php

declare(strict_types=1);

namespace WsdlToPhp\PackageGenerator\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

abstract class AbstractCommand extends Command
{
    public const EXIT_OK = 0;

    protected InputInterface $input;

    protected OutputInterface $output;

    protected function configure(): void
    {
        $this->addOption(
            'force',
            null,
            InputOption::VALUE_NONE,
            'If true, then package is really generated otherwise debug information are displayed'
        );
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->input = $input;
        $this->output = $output;

        return self::EXIT_OK;
    }

    protected function canExecute(): bool
    {
        return true === (bool) $this->getOptionValue('force');
    }

    protected function writeLn($messages, int $type = OutputInterface::OUTPUT_NORMAL): void
    {
        $this->output->writeln($messages, $type);
    }

    protected function getOptionValue(string $name)
    {
        return $this->input->getOption($name);
    }
}
