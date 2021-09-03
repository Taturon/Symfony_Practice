<?php
// src/Command/SomeCommand.php
namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Helper\TableSeparator;
use Symfony\Component\Console\Helper\TableStyle;
use Symfony\Component\Console\Helper\TableCell;
use Symfony\Component\Console\Helper\TableCellStyle;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
// ...

class SomeCommand extends Command
{
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $debugFormatter = $this->getHelper('debug_formatter');
    }
}
