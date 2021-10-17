<?php
// src/Controller/MailerController.php
namespace App\Controller;

use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Crypto\DkimSigner;
use Symfony\Component\Mime\Crypto\DkimOptions;
use Symfony\Component\Mime\Crypto\SMimeEncrypter;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;

class MailerController extends AbstractController
{
    /**
     * @Route("/email")
     */
    public function sendEmail(MailerInterface $mailer): Response
    {
        $firstEmail = (new Email())
            // ...
            ->to('jane@example.com');

        $secondEmail = (new Email())
            // ...
            ->to('john@example.com');

        $encrypter = new SMimeEncrypter([
            // key = email recipient; value = path to the certificate file
            'jane@example.com' => '/path/to/first-certificate.crt',
            'john@example.com' => '/path/to/second-certificate.crt',
        ]);

        $firstEncryptedEmail = $encrypter->encrypt($firstEmail);
        $secondEncryptedEmail = $encrypter->encrypt($secondEmail);

        // ...
    }
}
