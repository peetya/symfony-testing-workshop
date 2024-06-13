<?php

declare(strict_types=1);

namespace App\Tests\Unit\Model\Race;

use App\Model\Race\Human;
use App\Model\Race\RaceInterface;
use PHPUnit\Framework\TestCase;

class HumanTest extends TestCase
{
    private Human $subject;

    protected function setUp(): void
    {
        $this->subject = new Human();
    }

    public function testInstanceOf(): void
    {
        $this->assertInstanceOf(RaceInterface::class, $this->subject);
    }

    public function testGetName(): void
    {
        $this->assertSame('Human', $this->subject->getName());
    }

    public function testGetBaseHealth(): void
    {
        $this->assertSame(10, $this->subject->getBaseHealth());
    }

    public function testGetBaseAttack(): void
    {
        $this->assertSame(3, $this->subject->getBaseAttack());
    }

    public function testGetBaseDefense(): void
    {
        $this->assertSame(3, $this->subject->getBaseDefense());
    }
}
