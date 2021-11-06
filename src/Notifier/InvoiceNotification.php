<?php
namespace App\Notifier;

use Symfony\Component\Notifier\Message\ChatMessage;
use Symfony\Component\Notifier\Notification\ChatNotificationInterface;
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

    public function asChatMessage(RecipientInterface $recipient, string $transport = null): ?ChatMessage
    {
        // Add a custom emoji if the message is sent to Slack
        if ('slack' === $transport) {
            return (new ChatMessage('You\'re invoiced '.$this->price.' EUR.'))
                ->emoji('money');
        }

        // If you return null, the Notifier will create the ChatMessage
        // based on this notification as it would without this method.
        return null;
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
