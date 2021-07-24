<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GreetCommand extends Command
{
    protected function configure(): void
    {
        $this
            ->addArgument(
                'names',
                InputArgument::IS_ARRAY,
                'Who do you want to greet (separate multiple names with a space)?'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $text = 'Hi '.$input->getArgument('name');

        $lastName = $input->getArgument('last_name');
        if ($lastName) {
            $text .= ' '.$lastName;
        }

        $output->writeln($text.'!');

        return Command::SUCCESS;
    }
}
