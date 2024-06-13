<?php

declare(strict_types=1);

namespace App\Tests\Integration\Model;

use App\Model\Character;
use App\Model\Profession\Archer;
use App\Model\Profession\ProfessionInterface;
use App\Model\Profession\Warrior;
use App\Model\Race\Elf;
use App\Model\Race\Human;
use App\Model\Race\RaceInterface;
use PHPUnit\Framework\TestCase;

class CharacterTest extends TestCase
{
    /**
     * @dataProvider raceProfessionProvider
     */
    public function testGetters(
        RaceInterface $race,
        ProfessionInterface $profession,
        int $expectedHealth,
        int $expectedPower,
        int $expectedDefensePower,
    ): void {
        $character = new Character(
            'name',
            $race,
            $profession,
        );

        $this->assertSame($expectedHealth, $character->getHealth());
        $this->assertSame($expectedPower, $character->getPower());
        $this->assertSame($expectedDefensePower, $character->getDefensePower());
    }

    public function raceProfessionProvider(): array
    {
        return [
            [new Human(), new Warrior(), 10, 8, 5],
            [new Human(), new Archer(), 10, 10, 6],
            [new Elf(), new Warrior(), 15, 6, 3],
            [new Elf(), new Archer(), 15, 8, 4],
        ];
    }
}
