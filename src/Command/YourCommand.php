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
        $progressBar = new ProgressBar($output, 50);
        $progressBar->start();
        $i = 0;
        while ($i++ < 50) {
            $progressBar->advance(-2);
        }
        $progressBar->finish();
    }
}
