<?php

declare(strict_types=1);

namespace App\Model\Race;

class Elf implements RaceInterface
{
    public function getName(): string
    {
        return 'Elf';
    }

    public function getBaseHealth(): int
    {
        return 15;
    }

    public function getBaseAttack(): int
    {
        return 1;
    }

    public function getBaseDefense(): int
    {
        return 1;
    }
}
