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
        ProgressBar::setFormatDefinition('minimal', 'Progress: %percent%%');
        $progressBar = new ProgressBar($output, 3);
        $progressBar->setFormat('minimal');
    }
}
