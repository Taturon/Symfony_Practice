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
        $question = new Question('Please enter the name of the bundle', 'AcmeDemoBundle');
        $validation = Validation::createCallable(new Regex([
            'pattern' => '/^[a-zA-Z]+Bundle$',
            'message' => 'The name of the bundle should be suffixed with \'Bundle\'',
        ]));
        $question->setValidator($validation);
        $question->setMaxAttempts(2);
        $bundleName = $helper->ask($input, $output, $question);
    }
}
