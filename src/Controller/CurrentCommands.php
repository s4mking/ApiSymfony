<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Command;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * Class GetMeAction
 */
final class CurrentCommands extends AbstractController
{
    /**
     * @return Commands
     */
    public function __invoke(): array
    {
        /** @var Command $commands */
        $arrayResult = [];
        $user = $this->getUser();
        $commandsUser = $user->getCommands();
        foreach ($commandsUser as $comandUser) {
            if ($comandUser->getState() !== "annulée") {
                $arrayResult[] = $comandUser;
            }
        }
        return $arrayResult;
    }
}
