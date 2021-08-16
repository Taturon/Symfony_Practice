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
        $message = "This is a very long message, which should be truncated";
        $truncatedMessage = $formatter->truncate($message, 7);
        $output->writeln($truncatedMessage);
    }
}
