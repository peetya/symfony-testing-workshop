<?php

declare(strict_types=1);

namespace App\Tests\Functional\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CombatSimulatorControllerTest extends WebTestCase
{
    public function testSimulate(): void
    {
        $client = static::createClient();
        $client->request('GET', '/combat/simulate');

        $this->assertResponseIsSuccessful();
        $this->assertResponseHeaderSame('content-type', 'application/json');

        $content = $client->getResponse()->getContent();
        $logs = json_decode($content, true);
        $lastLog = end($logs);

        $this->assertStringContainsString('has died', $lastLog);
    }
}