<?php
// src/Controller/DefaultController.php
namespace App\Controller;

use App\Message\SmsNotification;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Messenger\MessageBusInterface;

class DefaultController extends AbstractController
{

    public function index(MessageBusInterface $bus)
    {
        // will cause the SmsNotificationHandler to be called
        $bus->dispatch(new SmsNotification('Look! I created a message!'));

        // ...
    }

    /**
     * @Route(
     *     "/contact",
     *     name="contact",
     *     condition="context.getMethod() in ['GET', 'HEAD'] and request.headers.get('User-Agent') matches '/firefox/i'"
     * )
     *
     * expressions can also include configuration parameters:
     * condition: "request.headers.get('User-Agent') matches '%app.allowed_browsers%'"
     */
    public function contact(): Response
    {
        // ...
    }

    /**
     * @Route("/share/{token}", name="share", requirements={"token"=".+"})
     */
    public function share($token): Response
    {
        // ...
    }
}
