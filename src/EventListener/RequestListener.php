<?php
// src/EventListener/RequestListener.php
namespace App\EventListener;

use Symfony\Component\HttpKernel\Event\RequestEvent;

class RequestListener
{
    public function onKernelRequest(RequestEvent $event)
    {
        // The isMainRequest() method was introduced in Symfony 5.3.
        // In previous versions it was called isMasterRequest()
        if (!$event->isMainRequest()) {
            // don't do anything if it's not the main request
            return;
        }

        // ...
    }
}
