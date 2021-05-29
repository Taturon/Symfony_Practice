<?php
// src/Controller/BlogController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/blog", requirements={"_locale": "en|es|fr"}, name="blog_")
 */
class BlogController extends AbstractController
{
    /**
     * @Route("/{_locale}", name="index")
     */
    public function index(int $page, string $title): Response
    {
        // ...
    }

    /**
     * @Route("/{_locale}/posts/{slug}", name="show")
     */
    public function show(BlogPost $post): Response
    {
        // ...
    }
}
