<?php
namespace App\Notifier;

use Symfony\Component\Notifier\Message\ChatMessage;
use Symfony\Component\Notifier\Notification\Notification;
use Symfony\Component\Notifier\Recipient\RecipientInterface;
use Symfony\Component\Notifier\Recipient\SmsRecipientInterface;

class InvoiceNotification extends Notification
{
    private $price;

    public function __construct(int $price)
    {
        $this->price = $price;
    }

    public function getChannels(RecipientInterface $recipient)
    {
        if (
            $this->price > 10000
            && $recipient instanceof SmsRecipientInterface
        ) {
            return ['sms'];
        }

        return ['email'];
    }
}
