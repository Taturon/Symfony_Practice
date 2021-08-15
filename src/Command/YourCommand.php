<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class YourCommand extends Command
{
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $formatter = $this->getHelper('formatter');
        $formattedLine = $formatter->formatSection(
            'SomeSection',
            'Here is some message related to that section'
        );
        $output->writeln($formattedLine);
    }
}
