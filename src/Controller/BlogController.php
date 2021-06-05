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
     * @Route("/", name="blog_list")
     */
    public function list(Request $request): Response
    {
        $routeName = $request->attributes->get('_route');
        $routeParameters = $request->attributes->get('_route_params');
        $allAttributes = $request->attributes->all();

        $signUpPage = $this->generateUrl('sign_up');
        $userProfilePage = $this->generateUrl('user_profile', [
            'username' => $user->getUserIdentifier(),
        ]);
        $signUpPage = $this->generateUrl('sign_up', [], UrlGeneratorInterface::ABSOLUTE_URL);

        // ...
    }

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
