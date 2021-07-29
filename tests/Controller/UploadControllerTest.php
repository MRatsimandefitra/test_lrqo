<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class StatistiqueControllerTest extends WebTestCase
{
    public function testStatistiqueNotAuthenticated(): void
    {
        $client = static::createClient();
        $client->request('GET', '/api/statistique');

        $this->assertResponseStatusCodeSame(Response::HTTP_UNAUTHORIZED, $client->getResponse()->getStatusCode());
    }
}
