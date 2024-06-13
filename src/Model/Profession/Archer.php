<?php

declare(strict_types=1);

namespace App\Model\Profession;

class Archer implements ProfessionInterface
{
    public function getName(): string
    {
        return 'Archer';
    }

    public function getAttackModifier(): int
    {
        return 7;
    }

    public function getDefenseModifier(): int
    {
        return 3;
    }
}
