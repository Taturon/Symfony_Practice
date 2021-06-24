<?php
// src/Controller/ProductController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends AbstractController
{
    public function index(): Response
    {
        $contents = $this->renderView('product/index.html.twig', [
            'category' => '...',
            'promotions' => ['...', '...'],
        ]);

        return new Response($contents);
    }
}
