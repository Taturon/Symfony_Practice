<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class UserController extends AbstractController
{
    // ...

    public function notifications(): Response
    {
        $projectDir = $this->getParameter('kernel.project_dir');
        $adminEmail = $this->getParameter('app.admin_email');

        $userFirstName = '...';
        $userNotifications = ['...', '...'];

        return $this->render('user/notifications.html.twig', [
            'user_first_name' => $userFirstName,
            'notifications' => $userNotifications,
        ]);
    }
}
