<?php
// src/MessageHandler/ThumbnailUploadedImageHandler.php
namespace App\MessageHandler;

use App\Message\UploadedImage;
use Symfony\Component\Messenger\Handler\MessageSubscriberInterface;

class ThumbnailUploadedImageHandler implements MessageSubscriberInterface
{
    public function __invoke(UploadedImage $uploadedImage)
    {
        // do some thumbnailing
    }

    public static function getHandledMessages(): iterable
    {
        yield UploadedImage::class => [
            'from_transport' => 'image_transport',
        ];
    }
}
