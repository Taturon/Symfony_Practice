<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Cursor;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MyCommand extends Command
{
    // ...

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $cursor = new Cursor($output);
        $cursor->moveUp(3);
        $cursor->moveDown();
        $cursor->moveRight(3);
        $cursor->moveLeft();
        $cursor->moveToPosition(7, 11);
        $position = $cursor->getCurrentPosition();
    }
}
