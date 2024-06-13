<?php

declare(strict_types=1);

namespace App\Logger;

use App\Model\Character;
use Symfony\Component\Console\Style\SymfonyStyle;

class CommandLogger implements LoggerInterface
{
    private SymfonyStyle $io;
    
    public function setSymfonyStyle(SymfonyStyle $io): void
    {
        $this->io = $io;
    }
    
    public function logStart(Character $attacker, Character $defender): void
    {
        $this->io->writeln(sprintf(
            'Combat between <fg=green;options=bold>%s</> and <fg=blue;options=bold>%s</> begins...',
            $attacker->getName(),
            $defender->getName(),
        ));
    }

    public function logAttack(Character $attacker, Character $defender): void
    {
        $emoji = match ($attacker->getProfession()->getName()) {
            'Archer' => '🏹',
            'Warrior' => '⚔️',
            default => '🤺',
        };

        $this->io->writeln('');
        $this->io->writeln(sprintf(
            '<fg=green;options=bold>%s %s</> attacks %s...',
            $attacker->getName(),
            $emoji,
            $defender->getName(),
        ));
    }

    public function logDamage(Character $attacker, Character $defender, int $damage): void
    {
        $this->io->writeln(sprintf(
            '<fg=green;options=bold>%s</> <fg=red>(HP:%d)</> deals <fg=yellow>%d</> damage to <fg=blue>%s</> <fg=red>(HP:%d)</>.',
            $attacker->getName(),
            $attacker->getHealth(),
            $damage,
            $defender->getName(),
            $defender->getHealth(),
        ));
    }

    public function logDeath(Character $character): void
    {
        $this->io->writeln('');
        $this->io->writeln(sprintf(
            '<fg=red>%s</> has died ☠️ Rest in peace 🪦',
            $character->getName(),
        ));
    }
}