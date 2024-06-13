<?php

declare(strict_types=1);

namespace App\Model\Race;

class Human implements RaceInterface
{
    public function getName(): string
    {
        return 'Human';
    }

    public function getBaseHealth(): int
    {
        return 10;
    }

    public function getBaseAttack(): int
    {
        return 3;
    }

    public function getBaseDefense(): int
    {
        return 3;
    }
}
