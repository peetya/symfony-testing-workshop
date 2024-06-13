<?php

declare(strict_types=1);

namespace App\Tests\Functional\Command;

use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Console\Tester\CommandTester;

class CombatSimulatorCommandTest extends KernelTestCase
{
    public function testExecute(): void
    {
        self::bootKernel();

        $application = new Application(self::$kernel);
        $command = $application->find('app:combat:simulate');
        $commandTester = new CommandTester($command);

        $commandTester->execute([]);

        $commandTester->assertCommandIsSuccessful();

        $output = $commandTester->getDisplay();

        $this->assertStringContainsString('has died', $output);
    }
}
