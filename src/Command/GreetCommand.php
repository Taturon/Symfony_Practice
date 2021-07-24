<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class GreetCommand extends Command
{
    protected function configure(): void
    {
        $this
            ->addArgument(
                'names',
                InputArgument::IS_ARRAY | InputArgument::REQUIRED,
                'Who do you want to greet (separate multiple names with a space)?'
            )
            ->addOption(
                'iterations',
                null,
                InputOption::VALUE_REQUIRED,
                'How many times should the message be printed?',
                1
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $names = $input->getArgument('names');
        if (count($names) > 0) {
            $text .= ' '.implode(', ', $names);
        }

        $output->writeln($text.'!');

        return Command::SUCCESS;
    }
}
