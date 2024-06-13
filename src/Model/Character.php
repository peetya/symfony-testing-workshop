<?php

declare(strict_types=1);

namespace App\Model;

use App\Model\Profession\ProfessionInterface;
use App\Model\Race\RaceInterface;

class Character
{
    private int $receivedDamage = 0;

    public function __construct(
        private string $name,
        private readonly RaceInterface $race,
        private readonly ProfessionInterface $profession,
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getRace(): RaceInterface
    {
        return $this->race;
    }

    public function getProfession(): ProfessionInterface
    {
        return $this->profession;
    }

    public function getHealth(): int
    {
        return $this->race->getBaseHealth() - $this->receivedDamage;
    }

    public function getPower(): int
    {
        return $this->race->getBaseAttack() + $this->profession->getAttackModifier();
    }

    public function getDefensePower(): int
    {
        return $this->race->getBaseDefense() + $this->profession->getDefenseModifier();
    }

    public function receiveDamage(int $damage): void
    {
        $this->receivedDamage += $damage;
    }
}
