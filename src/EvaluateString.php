<?php

namespace Console;

use Symfony\Component\Console\Command\Command,
    Symfony\Component\Console\Input\InputArgument,
    Symfony\Component\Console\Input\InputInterface,
    Symfony\Component\Console\Output\OutputInterface;

/**
 * Class EvaluateString
 * @package Console
 */
class EvaluateString extends Command
{
    /** @var array  */
    protected $needles = ['John', 'Mary'];

    protected function configure()
    {
        $this
            ->setName('app:evaluate-string')
            ->setDescription('Counts occurrences of Mary & John in given string')
            ->setHelp('This command allows you to evaluate string')
            ->addArgument('string', InputArgument::REQUIRED, 'The string to evaluate');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $result = (int) $this->evaluateInput($input);
        $output->writeln($result);
        return $result;
    }

    /**
     * @param InputInterface $input
     * @return bool
     */
    protected function evaluateInput(InputInterface $input)
    {
        $haystack = strtolower($input->getArgument('string'));
        $results = [];
        foreach ($this->needles as $needle) {
            $results []= $this->countOccurrences($needle, $haystack);
        }

        return $this->compareResults($results);
    }

    /**
     * @param string $needle
     * @param string $haystack
     * @return int
     */
    public function countOccurrences(string $needle, string $haystack)
    {
        return substr_count($haystack, strtolower($needle));
    }

    /**
     * @param array $results
     * @return bool
     */
    protected function compareResults(array $results)
    {
        return count(array_unique($results, SORT_NUMERIC)) == 1;
    }
}
