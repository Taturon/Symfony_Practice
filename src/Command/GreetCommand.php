<?php

namespace App\Command;

use Symfony\Component\Console\CommandLoader\ContainerCommandLoader;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

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
        $io = new SymfonyStyle($input, $output);
        $io->title('Lorem Ipsum Dolor Sit Amet');
        $io->section('Adding a User');
        $io->section('Generating the Password');
        $io->text('Lorem ipsum dolor sit amet');
        $io->text([
            'Lorem ipsum dolor sit amet',
            'Consectetur adipiscing elit',
            'Aenean sit amet arcu vitae sem faucibus porta',
        ]);
        $io->listing([
            'Element #1 Lorem ipsum dolor sit amet',
            'Element #2 Lorem ipsum dolor sit amet',
            'Element #3 Lorem ipsum dolor sit amet',
        ]);
        $io->table(
            ['Header 1', 'Header 2'],
            [
                ['Cell 1-1', 'Cell 1-2'],
                ['Cell 2-1', 'Cell 2-2'],
                ['Cell 3-1', 'Cell 3-2'],
            ]
        );
        $io->horizontalTable(
            ['Header 1', 'Header 2'],
            [
                ['Cell 1-1', 'Cell 1-2'],
                ['Cell 2-1', 'Cell 2-2'],
                ['Cell 3-1', 'Cell 3-2'],
            ]
        );
        $io->definitionList(
            'This is a title',
            ['foo1' => 'bar1'],
            ['foo2' => 'bar2'],
            ['foo3' => 'bar3'],
            new TableSeparator(),
            'This is another title',
            ['foo4' => 'bar4']
        );
        $io->newLine(3);

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
