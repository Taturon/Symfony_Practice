<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LuckyController extends AbstractController
{

    /**
     * @Route("/lucky/number/{max}", name="app_lucky_number")
     */
    public function number(int $max, LoggerInterface $logger): Response
    {
        $number = random_int(0, $max);

        $logger->info('We are logging!');

        return $this->render('lucky/number.html.twig', [
            'number' => $number,
        ]);
    }
}

