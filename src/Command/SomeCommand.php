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
use Symfony\Component\Process\Process;

// ...

class SomeCommand extends Command
{
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $process = new Process(...);
        $process->run(function ($type, $buffer) use ($output, $debugFormatter, $process) {
            $output->writeln(
                $debugFormatter->progress(
                    spl_object_hash($process),
                    $buffer,
                    Process::ERR === $type
                )
            );
            $output->writeln(
                $debugFormatter->stop(
                    spl_object_hash($process),
                    'Some command description',
                    $process->isSuccessful()
                )
            );
        });
    }
}
