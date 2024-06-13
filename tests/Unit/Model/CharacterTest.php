<?php

namespace App\Tests\Unit\Model;

use App\Model\Character;
use App\Model\Profession\ProfessionInterface;
use App\Model\Race\RaceInterface;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class CharacterTest extends TestCase
{
    private Character $subject;
    private RaceInterface|MockObject $raceMock;
    private ProfessionInterface|MockObject $professionMock;

    protected function setUp(): void
    {
        $this->raceMock = $this->createMock(RaceInterface::class);
        $this->professionMock = $this->createMock(ProfessionInterface::class);

        $this->subject = new Character(
            'name',
            $this->raceMock,
            $this->professionMock,
        );
    }

    public function testSetGetName(): void
    {
        $this->assertSame('name', $this->subject->getName());
        $this->subject->setName('new name');
        $this->assertSame('new name', $this->subject->getName());
    }

    public function testGetRace(): void
    {
        $this->assertSame($this->raceMock, $this->subject->getRace());
    }

    public function testGetProfession(): void
    {
        $this->assertSame($this->professionMock, $this->subject->getProfession());
    }

    public function testGetHealth(): void
    {
        $this->raceMock
            ->expects($this->once())
            ->method('getBaseHealth')
            ->willReturn(10);

        $this->assertSame(10, $this->subject->getHealth());
    }

    public function testGetHealthAfterReceiveDamage(): void
    {
        $this->raceMock
            ->expects($this->once())
            ->method('getBaseHealth')
            ->willReturn(10);

        $this->subject->receiveDamage(5);

        $this->assertSame(5, $this->subject->getHealth());
    }

    public function testGetPower(): void
    {
        $this->raceMock
            ->expects($this->once())
            ->method('getBaseAttack')
            ->willReturn(3);

        $this->professionMock
            ->expects($this->once())
            ->method('getAttackModifier')
            ->willReturn(5);

        $this->assertSame(8, $this->subject->getPower());
    }

    public function testGetDefensePower(): void
    {
        $this->raceMock
            ->expects($this->once())
            ->method('getBaseDefense')
            ->willReturn(3);

        $this->professionMock
            ->expects($this->once())
            ->method('getDefenseModifier')
            ->willReturn(2);

        $this->assertSame(5, $this->subject->getDefensePower());
    }
}
