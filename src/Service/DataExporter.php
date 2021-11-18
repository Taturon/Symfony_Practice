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

        // ...do things to export data...

        // reset the stopwatch to delete all the data measured so far
        // $this->stopwatch->reset();

        $this->stopwatch->stop('export-data');
    }
}
