<?php

declare(strict_types=1);

namespace App\Tests\Unit\Model\Profession;

use App\Model\Profession\Archer;
use App\Model\Profession\ProfessionInterface;
use PHPUnit\Framework\TestCase;

class ArcherTest extends TestCase
{
    private Archer $subject;

    protected function setUp(): void
    {
        $this->subject = new Archer();
    }

    public function testInstanceOfProfessionInterface(): void
    {
        $this->assertInstanceOf(ProfessionInterface::class, $this->subject);
    }

    public function testGetName(): void
    {
        $this->assertSame('Archer', $this->subject->getName());
    }

    public function testGetAttackModifier(): void
    {
        $this->assertSame(7, $this->subject->getAttackModifier());
    }

    public function testGetDefenseModifier(): void
    {
        $this->assertSame(3, $this->subject->getDefenseModifier());
    }
}
