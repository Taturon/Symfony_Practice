<?php

namespace App\Command;

use Symfony\Component\Console\CommandLoader\ContainerCommandLoader;
use Symfony\Component\DependencyInjection\ContainerBuilder;
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
                'i',
                InputOption::VALUE_REQUIRED,
                'How many times should the message be printed?',
                1
            )
            ->addOption(
                'colors',
                null,
                InputOption::VALUE_REQUIRED | InputOption::VALUE_IS_ARRAY,
                'Which colors do you like?',
                ['blue', 'red']
            )
            ->addOption(
                'yell',
                null,
                InputOption::VALUE_OPTIONAL,
                'Should I yell while greeting?'
                false
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln([
            '<info>Lorem Ipsum Dolor Sit Amet</>',
            '<info>==========================</>',
            '',
        ]);

        $names = $input->getArgument('names');
        if (count($names) > 0) {
            $text .= ' '.implode(', ', $names);
        }

        for ($i = 0; $i < $input->getOption('iterations'); $i++) {
            $output->writeln($text);
        }

        $optionValue = $input->getOption('yell');
        $yell = ($optionValue !== false);
        $yellLouder = ($optionValue === 'louder');

        $output->writeln($text.'!');

        $containerBuilder = new ContainerBuilder();
        $containerBuilder->register(FooCommand::class, FooCommand::class);
        $containerBuilder->compile();

        $commandLoader = new ContainerCommandLoader($containerBuilder, [
            'app:foo' => FooCommand::class,
        ]);

        return Command::SUCCESS;
    }
}
