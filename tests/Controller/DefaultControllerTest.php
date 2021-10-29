<?php
// tests/Controller/DefaultControllerTest.php
namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Messenger\Transport\InMemoryTransport;

class DefaultControllerTest extends WebTestCase
{
    public function testSomething()
    {
        $client = static::createClient();
        // ...

        $this->assertSame(200, $client->getResponse()->getStatusCode());

        /* @var InMemoryTransport $transport */
        $transport = $this->getContainer()->get('messenger.transport.async_priority_normal');
        $this->assertCount(1, $transport->getSent());
    }
}
