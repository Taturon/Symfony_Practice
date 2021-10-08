<?php
// src/Controller/MailerController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class MailerController extends AbstractController
{
    /**
     * @Route("/email")
     */
    public function sendEmail(MailerInterface $mailer): Response
    {
        $toAddresses = ['foo@example.com', new Address('bar@example.com')];
        $email = (new Email())
            ->getHeaders()
            ->addTextHeader('X-Auto-Response-Suppress', 'OOF, DR, RN, NRN, AutoReply');
            ->attach(fopen('/path/to/documents/contract.doc', 'r'))
            ->embed(fopen('/path/to/images/logo.png', 'r'), 'logo')
            ->from(Address::create('Fabien Potencier <fabien@example.com>'))
            ->to($toAddresses)
            ->cc('cc@example.com')
            ->addCc('cc2@example.com')
            ->subject('Time for Symfony Mailer!')
            ->text(fopen('/path/to/emails/user_signup.txt', 'r'))
            ->html(fopen('/path/to/emails/user_signup.html', 'r'))
        $mailer->send($email);

        // ...
    }
}
