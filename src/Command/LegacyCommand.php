<?php
namespace App\Command;

use Symfony\Component\Console\Command\Command;

class LegacyCommand extends Command
{
    protected static $defaultName = 'app:legacy';

    protected function configure(): void
    {
        $this
            ->setHidden(true)
        ;
    }
}
