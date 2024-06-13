<?php

declare(strict_types=1);

namespace App\Tests\Unit\Model\Simulator;

use App\Logger\LoggerInterface;
use App\Model\Character;
use App\Simulator\CombatSimulator;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class CombatSimulatorTest extends TestCase
{
    private CombatSimulator $subject;
    private LoggerInterface|MockObject $loggerMock;
    private Character|MockObject $attackerMock;
    private Character|MockObject $defenderMock;

    protected function setUp(): void
    {
        $this->loggerMock = $this->createMock(LoggerInterface::class);
        $this->attackerMock = $this->createMock(Character::class);
        $this->defenderMock = $this->createMock(Character::class);

        $this->subject = new CombatSimulator($this->loggerMock);

        $this->subject->setAttacker($this->attackerMock);
        $this->subject->setDefender($this->defenderMock);
    }

    public function testSetLogger(): void
    {
        $anotherLoggerMock = $this->createMock(LoggerInterface::class);

        $anotherLoggerMock
            ->expects($this->once())
            ->method('logStart');

        $this->subject->setLogger($anotherLoggerMock);
        $this->subject->fight();
    }

    public function testFight(): void
    {
        $this->loggerMock
            ->expects($this->exactly(3))
            ->method('logAttack');

        $this->loggerMock
            ->expects($this->exactly(3))
            ->method('logDamage');

        $this->loggerMock
            ->expects($this->once())
            ->method('logDeath');

        $this->attackerMock
            ->expects($this->exactly(2))
            ->method('getPower')
            ->willReturn(10);

        $this->attackerMock
            ->expects($this->once())
            ->method('getDefensePower')
            ->willReturn(5);

        $this->attackerMock
            ->expects($this->once())
            ->method('receiveDamage');

        $this->attackerMock
            ->expects($this->once())
            ->method('getHealth')
            ->willReturnOnConsecutiveCalls(10, 0);

        $this->defenderMock
            ->expects($this->once())
            ->method('getPower')
            ->willReturn(10);

        $this->defenderMock
            ->expects($this->exactly(2))
            ->method('getDefensePower')
            ->willReturn(5);

        $this->defenderMock
            ->expects($this->exactly(2))
            ->method('receiveDamage');

        $this->defenderMock
            ->expects($this->exactly(2))
            ->method('getHealth')
            ->willReturnOnConsecutiveCalls(10, 0);

        $this->subject->fight();
    }
}