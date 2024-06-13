<?php

declare(strict_types=1);

namespace App\Command;

use App\Logger\CommandLogger;
use App\Model\Profession\Archer;
use App\Model\Race\Elf;
use App\Simulator\CombatSimulator;
use App\Model\Character;
use App\Model\Profession\Warrior;
use App\Model\Race\Human;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(name: 'app:combat:simulate')]
class CombatSimulatorCommand extends Command
{
    public function __construct(
        private readonly CombatSimulator $combatSimulator,
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $aragorn = new Character(
            'Aragorn',
            new Human(),
            new Warrior(),
        );
        
        $legolas = new Character(
            'Legolas',
            new Elf(),
            new Archer(),
        );

        $logger = new CommandLogger();

        $logger->setSymfonyStyle($io);

        $this->combatSimulator->setLogger($logger);
        $this->combatSimulator->setAttacker($aragorn);
        $this->combatSimulator->setDefender($legolas);

        $this->combatSimulator->fight();

        return Command::SUCCESS;
    }
}