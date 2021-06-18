<?php
// src/Controller/BlogController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
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
        $signUpPageInDutch = $this->generateUrl('sign_up', ['_locale' => 'nl']);

        // ...
    }

    /**
     * @Route("/{_locale}", name="index")
     */
    public function index(int $page, string $title, SessionInterface $session, Request $request): Response
    {
        $session->set('foo', 'bar');
        $foobar = $session->get('foobar');
        $filters = $session->get('filters', []);

        $request->isXmlHttpRequest();
        $request->getPreferredLanguage(['en', 'fr']);
        $request->query->get('page');
        $request->request->get('page');
        $request->server->get('HTTP_HOST');
        $request->files->get('foo');
        $request->cookies->get('PHPSESSID');
        $request->headers->get('host');
        $request->headers->get('content-type');

        $response = new Response('Hello '.$name, Response::HTTP_OK);
        $response = new Response('<style> ... </style>');
        $response->headers->set('Content-Type', 'text/css');
    }

    /**
     * @Route("/{_locale}/posts/{slug}", name="show")
     */
    public function show(BlogPost $post): Response
    {
        // ...
    }

    public function update(Request $request): Response
    {
        if ($form->isSubmitted() && $form->isValid()) {
            $this->addFlash(
                'notice',
                'Your changes were saved!'
            );
            return $this->redirectToRoute(...);
        }
        return $this->render(...);
    }
}
