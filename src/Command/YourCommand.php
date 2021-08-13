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

        $callback = function (string $userInput): array {
            $inputPath = preg_replace('%(/|^)[^/]*$%', '$1', $userInput);
            $inputPath = '' === $inputPath ? '.' : $inputPath;
            $foundFilesAndDirs = @scandir($inputPath) ?: [];

            return array_map(function ($dirOrFile) use ($inputPath) {
                return $inputPath.$dirOrFile;
            }, $foundFilesAndDirs);
        };

        $question = new Question('Please provide the full path of a file to parse');
        $question->setAutocompleterCallback($callback);

        $filePath = $helper->ask($input, $output, $question);
    }
}
