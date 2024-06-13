<?php

declare(strict_types=1);

namespace App\Logger;

use App\Model\Character;

interface LoggerInterface
{
    public function logStart(Character $attacker, Character $defender): void;
    public function logAttack(Character $attacker, Character $defender): void;
    public function logDamage(Character $attacker, Character $defender, int $damage): void;
    public function logDeath(Character $character): void;
}
