<?php

declare(strict_types=1);

namespace App\Logger;

use App\Model\Character;
use Psr\Log\LoggerInterface as PsrLoggerInterface;

class PsrLogger implements LoggerInterface
{
    public function __construct(
        private readonly PsrLoggerInterface $logger,
    ) {
    }

    public function logStart(Character $attacker, Character $defender): void
    {
        $this->logger->info(sprintf(
            'Combat between %s and %s begins...',
            $attacker->getName(),
            $defender->getName(),
        ));
    }

    public function logAttack(Character $attacker, Character $defender): void
    {
        $this->logger->info(sprintf(
            '%s attacks %s...',
            $attacker->getName(),
            $defender->getName(),
        ));
    }

    public function logDamage(Character $attacker, Character $defender, int $damage): void
    {
        $this->logger->info(sprintf(
            '%s deals %d damage to %s. %s has %d health remaining.',
            $attacker->getName(),
            $damage,
            $defender->getName(),
            $defender->getName(),
            $defender->getHealth(),
        ));
    }

    public function logDeath(Character $character): void
    {
        $this->logger->info(sprintf(
            '%s has died',
            $character->getName(),
        ));
    }
}
