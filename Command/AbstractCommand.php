<?php

namespace WsdlToPhp\PackageGenerator\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;

abstract class AbstractCommand extends Command
{
    const EXIT_OK     = 1;
    const EXIT_NOT_OK = 0;

    protected $input;
    protected $output;

    protected function configure()
    {
        $this
            ->addOption(
                'force',
                null,
                InputOption::VALUE_NONE,
                'If true, then package is really generated otherwise debug informations are displayed'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->input  = $input;
        $this->output = $output;
        return self::EXIT_OK;
    }

    protected function canExecute()
    {
        return (bool) $this->input->getOption('force') === true;
    }

    protected function writeLn($messages, $type = OutputInterface::OUTPUT_NORMAL)
    {
        $this->output->writeln($messages, $type);
    }
}
