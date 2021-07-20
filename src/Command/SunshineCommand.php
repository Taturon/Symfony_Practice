<?php

namespace App\Command;

use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SunshineCommand extends Command
{
    protected static $defaultName = 'app:sunshine';
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->setDescription('Good morning!');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->logger->info('Waking up the sun');

        return Command::SUCCESS;
    }
}
