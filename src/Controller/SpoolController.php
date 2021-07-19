<?php
// src/Controller/SpoolController.php
namespace App\Controller;

use SensioLabs\AnsiConverter\AnsiToHtmlConverter;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\BufferedOutput;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\KernelInterface;

class SpoolController extends AbstractController
{
    public function sendSpool(int $messages = 10, KernelInterface $kernel): Response
    {
        $application = new Application($kernel);
        $application->setAutoExit(false);

        $input = new ArrayInput([
            'command' => 'swiftmailer:spool:send',
            'fooArgument' => 'barValue',
            '--message-limit' => $messages,
        ]);

        $output = new BufferedOutput(
            OutputInterface::VERBOSITY_NORMAL,
            true
        );
        $application->run($input, $output);

        $converter = new AnsiToHtmlConverter();
        $content = $output->fetch();

        return new Response($converter->convert($content));

    }
}
