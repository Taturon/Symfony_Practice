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
        $question = new ChoiceQuestion(
            'Please select your favorite color (defaults to red)',
            ['red', 'blue', 'yellow'],
            0
        );
        $question->setErrorMessage('Color %s is invalid.');
        $color = $helper->ask($input, $output, $question);
        $output->writeln('You have just selected: '.$color);

    }
}
