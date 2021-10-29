<?php
// src/MessageHandler/SmsNotificationHandler.php
namespace App\MessageHandler;

use App\Message\OtherSmsNotification;
use App\Message\SmsNotification;
use Symfony\Component\Messenger\Handler\MessageSubscriberInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class SmsNotificationHandler implements MessageHandlerInterface
{
    public function __invoke(SmsNotification $message)
    {
        // ... do some work - like sending an SMS message!
    }

    public function handleOtherSmsNotification(OtherSmsNotification $message)
    {
        // ...
    }

    public static function getHandledMessages(): iterable
    {
        // handle this message on __invoke
        yield SmsNotification::class;

        // also handle this message on handleOtherSmsNotification
        yield OtherSmsNotification::class => [
            'method' => 'handleOtherSmsNotification',
            //'priority' => 0,
            //'bus' => 'messenger.bus.default',
        ];
    }
}
