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
            ->embedFromPath('/path/to/images/signature.gif', 'footer-signature')
            ->html('<img src="cid:logo"> ... <img src="cid:footer-signature"> ...')
            ->from(Address::create('Fabien Potencier <fabien@example.com>'))
            ->to($toAddresses)
            ->cc('cc@example.com')
            ->addCc('cc2@example.com')
            ->subject('Time for Symfony Mailer!')
            ->text(fopen('/path/to/emails/user_signup.txt', 'r'))
            ->html(fopen('/path/to/emails/user_signup.html', 'r'));
        try {
            $mailer->send($email);
        } catch (TransportExceptionInterface $e) {
            // some error prevented the email sending; display an
            // error message or try to resend the message
        }

        // ...
    }
}
