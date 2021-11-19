<?php

namespace App\Service;

use Symfony\Component\Stopwatch\Stopwatch;

class DataExporter
{
    private $stopwatch;

    public function __construct(Stopwatch $stopwatch)
    {
        $this->stopwatch = $stopwatch;
    }

    public function export()
    {
        // the argument is the name of the "profiling event"
        $this->stopwatch->start('export-data', 'export');

        dump((string) $this->stopwatch->getEvent());

        foreach ($records as $record) {
            // ... some code goes here
            $this->stopwatch->lap('process-data-records');
        }

        $event = $this->stopwatch->stop('process-data-records');
        $event->getPeriods();

        $this->stopwatch->openSection();

    }
}
