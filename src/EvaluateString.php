<?php

namespace Console;

use Symfony\Component\Console\Command\Command,
    Symfony\Component\Console\Input\InputArgument,
    Symfony\Component\Console\Input\InputInterface,
    Symfony\Component\Console\Input\InputOption,
    Symfony\Component\Console\Output\OutputInterface;

class EvaluateString extends Command
{
    protected function configure()
    {
        $this
            ->setName('app:evaluate-string')
            ->setDescription('Counts occurencies of Mary & John in given string')
            ->setHelp('This command allows you to evaluate string')
            ->addArgument('string', InputArgument::REQUIRED, 'The string to evaluate');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $result = 1;
        return (int) $result;
    }
}
