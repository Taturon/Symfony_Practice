<?php
// src/Controller/InvoiceController.php
namespace App\Controller;

use Symfony\Component\Notifier\Notification\Notification;
use Symfony\Component\Notifier\NotifierInterface;
use Symfony\Component\Notifier\Recipient\Recipient;

class InvoiceController extends AbstractController
{
    /**
     * @Route("/invoice/create")
     */
    public function create(NotifierInterface $notifier)
    {
        // ...

        $notification = (new Notification('New Invoice'))
            ->content('You got a new invoice for 15 EUR.')
            ->importance(Notification::IMPORTANCE_HIGH);

        $notifier->send($notification, new Recipient('wouter@example.com'));


        // ...
    }
}
