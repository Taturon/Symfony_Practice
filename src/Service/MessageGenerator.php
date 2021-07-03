<?php
// src/Service/MessageGenerator.php
namespace App\Service;

// ...

use Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface;

class MessageGenerator
{
    private $params;

    public function __construct(ContainerBagInterface $params)
    {
        $this->params = $params;
    }

    public function someMethod()
    {
        // get any container parameter from $this->params, which stores all of them
        $sender = $this->params->get('mailer_sender');
        // ...
    }
}

