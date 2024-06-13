<?php

declare(strict_types=1);

namespace App\Logger;

use App\Model\Character;

class InMemoryLogger implements LoggerInterface
{
    private array $logs = [];

    public function getLogs(): array
    {
        return $this->logs;
    }

    public function logStart(Character $attacker, Character $defender): void
    {
        $this->logs[] = sprintf(
            'Combat between %s and %s begins...',
            $attacker->getName(),
            $defender->getName(),
        );
    }

    public function logAttack(Character $attacker, Character $defender): void
    {
        $this->logs[] = sprintf(
            '%s attacks %s...',
            $attacker->getName(),
            $defender->getName(),
        );
    }

    public function logDamage(Character $attacker, Character $defender, int $damage): void
    {
        $this->logs[] = sprintf(
            '%s deals %d damage to %s. %s has %d health remaining.',
            $attacker->getName(),
            $damage,
            $defender->getName(),
            $defender->getName(),
            $defender->getHealth(),
        );
    }

    public function logDeath(Character $character): void
    {
        $this->logs[] = sprintf(
            '%s has died',
            $character->getName(),
        );
    }
}
