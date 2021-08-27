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
        $section1 = $output->section();
        $section2 = $output->section();

        $progress1 = new ProgressBar($section1);
        $progress2 = new ProgressBar($section2);

        $progress1->start(100);
        $progress2->start(100);

        $i = 0;
        while (++$i < 100) {
            $progress1->advance();

            if ($i % 2 === 0) {
                $progress2->advance(4);
            }

            usleep(50000);
        }
    }
}
