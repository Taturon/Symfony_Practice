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
        ProgressBar::setPlaceholderFormatterDefinition(
            'remaining_steps',
            function (ProgressBar $progressBar, OutputInterface $output) {
                return $progressBar->getMaxSteps() - $progressBar->getProgress();
            }
        );
        $progressBar->setMessage('Start');
        $progressBar->start();

        $progressBar->setRedrawFrequency(100);
        $progressBar->maxSecondsBetweenRedraws(0.2);
        $progressBar->minSecondsBetweenRedraws(0.1);

        $progressBar->setMessage('Task is in progress...');
        $i = 0;
        while ($i++ < 50000) {
            // ... do some work
            $progressBar->advance();
        }
    }
}
