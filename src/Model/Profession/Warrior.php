<?php

declare(strict_types=1);

namespace App\Model\Profession;

class Warrior implements ProfessionInterface
{
    public function getName(): string
    {
        return 'Warrior';
    }

    public function getAttackModifier(): int
    {
        return 5;
    }

    public function getDefenseModifier(): int
    {
        return 2;
    }
}
