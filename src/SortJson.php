<?php

namespace Console;

use Symfony\Component\Console\Command\Command,
    Symfony\Component\Console\Input\InputArgument,
    Symfony\Component\Console\Input\InputInterface,
    Symfony\Component\Console\Output\OutputInterface;

/**
 * Class SortJson
 * @package Console
 */
class SortJson extends Command
{

    protected function configure()
    {
        $this
            ->setName('app:sort-json')
            ->setDescription('sort json array by price or name')
            ->setHelp('This command allows you to sort given json by price or name')
            ->addArgument('string', InputArgument::REQUIRED, 'The json to sort');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return string
     * @throws \Exception
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        return $this->sortJson($input->getArgument('string') ?? '');
    }

    /**
     * @param $jsonString
     * @return string
     * @throws \Exception
     */
    public function sortJson($jsonString)
    {
        $json = $this->decodeJson($jsonString);

        usort($json, function ($arr1, $arr2){

            if ($arr1->price == $arr2->price) {
                $result = strcasecmp($arr1->title, $arr2->title);
            } else {
                $result = $arr1->price > $arr2->price;
            }

            return $result;
        });

        return json_encode($json);
    }

    /**
     * @param $jsonString
     * @return array
     * @throws \Exception
     */
    public function decodeJson($jsonString)
    {
        $json = json_decode($jsonString);
        if ($json === null) {
            throw new \Exception('Something is wrong with your JSON');
        }

        return $json;
    }

}
