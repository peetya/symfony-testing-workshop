<?php

declare(strict_types=1);

namespace App\Tests\Unit\Model\Profession;

use App\Model\Profession\ProfessionInterface;
use App\Model\Profession\Warrior;
use PHPUnit\Framework\TestCase;

class WarriorTest extends TestCase
{
    private Warrior $subject;

    protected function setUp(): void
    {
        $this->subject = new Warrior();
    }

    public function testInstanceOfProfessionInterface(): void
    {
        $this->assertInstanceOf(ProfessionInterface::class, $this->subject);
    }

    public function testGetName(): void
    {
        $this->assertSame('Warrior', $this->subject->getName());
    }

    public function testGetAttackModifier(): void
    {
        $this->assertSame(5, $this->subject->getAttackModifier());
    }

    public function testGetDefenseModifier(): void
    {
        $this->assertSame(2, $this->subject->getDefenseModifier());
    }
}