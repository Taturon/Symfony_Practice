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
        $bundles = ['AcmeDemoBundle', 'AcmeBlogBundle', 'AcmeStoreBundle'];
        $question = new Question('Please enter the name of a bundle', 'FooBundle');
        $question->setAutocompleterValues($bundles);
        $bundleName = $helper->ask($input, $output, $question);
    }
}
