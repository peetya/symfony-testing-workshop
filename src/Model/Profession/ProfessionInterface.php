<?php

declare(strict_types=1);

namespace App\Model\Profession;

interface ProfessionInterface
{
    public function getName(): string;
    public function getAttackModifier(): int;
    public function getDefenseModifier(): int;
}
