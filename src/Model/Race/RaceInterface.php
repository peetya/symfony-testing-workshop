<?php

declare(strict_types=1);

namespace App\Model\Race;

interface RaceInterface
{
    public function getName(): string;
    public function getBaseHealth(): int;
    public function getBaseAttack(): int;
    public function getBaseDefense(): int;
}
