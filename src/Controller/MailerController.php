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

        $email = (new TemplatedEmail())
            ->from('fabien@example.com')
            ->to(new Address('ryan@example.com'))
            ->subject('Thanks for signing up!')
            ->htmlTemplate('emails/signup.html.twig')
            ->textTemplate('emails/signup.txt.twig')
            ->context([
                'expiration_date' => new \DateTime('+7 days'),
                'username' => 'foo',
            ])
        ;

        $signer = new DkimSigner('file:///path/to/private-key.key', 'example.com', 'sf');
        $signedEmail = $signer->sign($email, (new DkimOptions())
            ->bodyCanon('relaxed')
            ->headerCanon('relaxed')
            ->headersToIgnore(['Message-ID'])
            ->toArray()
        );

        $encrypter = new SMimeEncrypter('/path/to/certificate.crt');
        $encryptedEmail = $encrypter->encrypt($email);

        // ...
    }
}
