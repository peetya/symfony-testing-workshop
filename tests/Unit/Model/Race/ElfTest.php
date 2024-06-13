<?php

declare(strict_types=1);

namespace App\Tests\Unit\Model\Race;

use App\Model\Race\Elf;
use App\Model\Race\RaceInterface;
use PHPUnit\Framework\TestCase;

class ElfTest extends TestCase
{
    private Elf $subject;

    protected function setUp(): void
    {
        $this->subject = new Elf();
    }

    public function testInstanceOf(): void
    {
        $this->assertInstanceOf(RaceInterface::class, $this->subject);
    }

    public function testGetName(): void
    {
        $this->assertSame('Elf', $this->subject->getName());
    }

    public function testGetBaseHealth(): void
    {
        $this->assertSame(15, $this->subject->getBaseHealth());
    }

    public function testGetBaseAttack(): void
    {
        $this->assertSame(1, $this->subject->getBaseAttack());
    }

    public function testGetBaseDefense(): void
    {
        $this->assertSame(1, $this->subject->getBaseDefense());
    }
}
