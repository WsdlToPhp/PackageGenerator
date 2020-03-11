<?php

namespace WsdlToPhp\PackageGenerator\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;

abstract class AbstractCommand extends Command
{
    /**
     * @var int
     */
    const EXIT_OK = 0;
    /**
     * @var int
     */
    const EXIT_NOT_OK = 1;
    /**
     * @var InputInterface
     */
    protected $input;
    /**
     * @var OutputInterface
     */
    protected $output;
    /**
     * @see \Symfony\Component\Console\Command\Command::configure()
     */
    protected function configure()
    {
        $this->addOption('force', null, InputOption::VALUE_NONE, 'If true, then package is really generated otherwise debug information are displayed');
    }
    /**
     * @see \Symfony\Component\Console\Command\Command::execute()
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->input = $input;
        $this->output = $output;
        return self::EXIT_OK;
    }
    /**
     * @return bool
     */
    protected function canExecute()
    {
        return (bool) $this->getOptionValue('force') === true;
    }
    /**
     * @param string|array $messages
     * @param int $type
     */
    protected function writeLn($messages, $type = OutputInterface::OUTPUT_NORMAL)
    {
        $this->output->writeln($messages, $type);
    }
    /**
     * @param string $name
     * @return string|string[]|bool|null
     */
    protected function getOptionValue($name)
    {
        return $this->input->getOption($name);
    }
}
