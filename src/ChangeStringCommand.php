<?php

namespace App;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ChangeStringCommand extends Command
{

    protected function configure()
    {
        $this
            ->setName('change')
            ->setDescription('change transform letters of string')
            ->addArgument('string', InputArgument::REQUIRED, 'String to change')
            ->addOption('first', mode: InputOption::VALUE_OPTIONAL, description: 'Change transform letters from first letter',);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $stringArr = str_split($input->getArgument('string'));

        foreach ($stringArr as $index => &$item) {
            if ($input->getOption('first')) {
                if ($index % 2 === 0) {
                    $item = strtoupper($item);
                } else {
                    $item = strtolower($item);
                }
            } else {
                if ($index % 2 !== 0) {
                    $item = strtoupper($item);
                } else {
                    $item = strtolower($item);
                }
            }
        }

        $output->writeln(implode($stringArr));

        return Command::SUCCESS;
    }

}