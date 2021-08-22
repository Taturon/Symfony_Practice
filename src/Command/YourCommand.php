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
        ProgressBar::setFormatDefinition('minimal', '%percent%% %remaining%');
        ProgressBar::setFormatDefinition('minimal_nomax', '%percent%%');
        $progressBar = new ProgressBar($output);
        $progressBar->setFormat('minimal');
    }
}
