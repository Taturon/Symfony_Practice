<?php
// src/Service/SomeService.php
namespace App\Service;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

class SomeService
{
    private $twig;

    private $router;

    public function __construct(
        Environment $twig
        UrlGeneratorInterface $router)
    {
        $this->view = $twig;
        $this->router = $router;
    }

    public function someMethod()
    {
        // ...

        $signUpPage = $this->router->generate('sign_up');
        $userProfilePage = $this->router->generate('user_profile', [
            'username' => $user->getUserIdentifier(),
        ]);
        $signUpPage = $this->router->generate('sign_up', [], UrlGeneratorInterface::ABSOLUTE_URL);
        $signUpPageInDutch = $this->router->generate('sign_up', ['_locale' => 'nl']);

        $htmlContents = $this->twig->render('product/index.html.twig', [
            'category' => '...',
            'promotions' => ['...', '...'],
        ]);
    }
}
