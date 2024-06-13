<?php

declare(strict_types=1);

namespace App\Controller;

use App\Logger\InMemoryLogger;
use App\Model\Character;
use App\Model\Profession\Archer;
use App\Model\Profession\Warrior;
use App\Model\Race\Elf;
use App\Model\Race\Human;
use App\Simulator\CombatSimulator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class CombatSimulatorController extends AbstractController
{
    public function __construct(
        private readonly CombatSimulator $combatSimulator,
        private readonly InMemoryLogger $logger,
    ) {
    }

    #[Route('/combat/simulate', name: 'combat_simulate', methods: ['GET'])]
    public function simulate(): JsonResponse
    {
        $this->combatSimulator->setLogger($this->logger);


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

        $this->combatSimulator->setAttacker($aragorn);
        $this->combatSimulator->setDefender($legolas);
        $this->combatSimulator->fight();

        return new JsonResponse($this->logger->getLogs());
    }
}