<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Helper\ProgressBar;

class YourCommand extends Command
{
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $progressBar = new ProgressBar($output);
        // or a generator
        function iterable() { yield 1; yield 2; ... };
        foreach ($progressBar->iterate(iterable()) as $value) {
            // ... do some work
        }
    }
}
