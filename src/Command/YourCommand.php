<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ConfirmationQuestion;

class YourCommand extends Command
{
    // ...

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $helper = $this->getHelper('question');
        $question = new ConfirmationQuestion(
            'Continue with this action?',
            false
            '/^(y|j)/i'
        );
        $question = new Question('Please enter the name of the bundle', 'AcmeDemoBundle');
        $bundleName = $helper->ask($input, $output, $question);

        if (!$helper->ask($input, $output, $question)) {
            return Command::SUCCESS;
        }
    }
}
