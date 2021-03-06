<?php

declare(strict_types=1);

namespace App\Tests\UI\Http\Web\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

class ProfileControllerTest extends WebTestCase
{
    /**
     * @test
     *
     * @group e2e
     */
    public function anon_user_should_be_redirected_to_sign_in()
    {
        $client = self::createClient();

        $client->request('GET', '/profile');

        /** @var Response|RedirectResponse $response */
        $response = $client->getResponse();
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertContains('/sign-in', $response->getTargetUrl());
    }
}
