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
        ProgressBar::setFormatDefinition('custom', ' %current%/%max% -- %message% (%filename%)');
        $progressBar = new ProgressBar($output, 100);
        $progressBar->setFormat('custom');
        $files = ['client-001/invoices.xml', '...'];
        $progressBar->setMessage('Start');
        $progressBar->start();
        foreach ($files as $filename) {
            $progressBar->setMessage('Importing invoices...');
            $progressBar->setMessage($filename, 'filename');
            $progressBar->advance();
        }
    }
}
