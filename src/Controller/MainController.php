<?php
// src/Controller/MainController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="mobile_homepage", host="m.example.com")
     */
    public function mobileHomepage(): Response
    {
        // ...
    }

    /**
     * @Route("/", name="homepage")
     */
    public function homepage(): Response
    {
        // ...
    }
}
