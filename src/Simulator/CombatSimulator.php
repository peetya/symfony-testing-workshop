<?php

declare(strict_types=1);

namespace App\Simulator;

use App\Logger\LoggerInterface;
use App\Model\Character;

class CombatSimulator
{
    private Character $attacker;
    private Character $defender;

    public function __construct(
        private LoggerInterface $logger,
    ) {
    }

    public function setLogger(LoggerInterface $logger): void
    {
        $this->logger = $logger;
    }

    public function setAttacker(Character $attacker): void
    {
        $this->attacker = $attacker;
    }

    public function setDefender(Character $defender): void
    {
        $this->defender = $defender;
    }

    public function fight(): void
    {
        $this->logger->logStart($this->attacker, $this->defender);

        while (true) {
            $this->logger->logAttack($this->attacker, $this->defender);
            $attackerDamage = max(0, $this->attacker->getPower() - $this->defender->getDefensePower());
            $this->defender->receiveDamage($attackerDamage);
            $this->logger->logDamage($this->attacker, $this->defender, $attackerDamage);

            if ($this->defender->getHealth() <= 0) {
                $this->logger->logDeath($this->defender);
                break;
            }

            $this->logger->logAttack($this->defender, $this->attacker);
            $defenderDamage = max(0, $this->defender->getPower() - $this->attacker->getDefensePower());
            $this->attacker->receiveDamage($defenderDamage);
            $this->logger->logDamage($this->defender, $this->attacker, $defenderDamage);

            if ($this->attacker->getHealth() <= 0) {
                $this->logger->logDeath($this->attacker);
                break;
            }
        }
    }
}
