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
        $response = $this->render('blog/index.html.twig', []);

        // cache publicly for 3600 seconds
        $response->setPublic();
        $response->setMaxAge(3600);

        // (optional) set a custom Cache-Control directive
        $response->headers->addCacheControlDirective('must-revalidate', true);

        $response->setCache([
            'must_revalidate'  => false,
            'no_cache'         => false,
            'no_store'         => false,
            'no_transform'     => false,
            'public'           => true,
            'private'          => false,
            'proxy_revalidate' => false,
            'max_age'          => 600,
            's_maxage'         => 600,
            'immutable'        => true,
            'last_modified'    => new \DateTime(),
            'etag'             => 'abcdef'
        ]);

        return $response;
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

    public function download(): Response
    {
        $file = new File('/path/to/some_file.pdf');
        return $this->file($file, 'custom_name.pdf');
    }

    public function display(): Response
    {
        return $this->file('invoice_3241.pdf', 'my_invoice.pdf', ResponseHeaderBag::DISPOSITION_INLINE);
    }

    public function recentArticles(int $max = 3): Response
    {
        $articles = ['...', '...', '...'];

        return $this->render('blog/_recent_articles.html.twig', [
            'articles' => $articles
        ]);
    }
}
