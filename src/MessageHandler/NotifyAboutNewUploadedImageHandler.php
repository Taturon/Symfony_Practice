<?php
// src/MessageHandler/NotifyAboutNewUploadedImageHandler.php

class NotifyAboutNewUploadedImageHandler implements MessageSubscriberInterface
{
    // ...

    public static function getHandledMessages(): iterable
    {
        yield UploadedImage::class => [
            'from_transport' => 'async_priority_normal',
        ];
    }
}

