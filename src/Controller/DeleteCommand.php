<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Command;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * Class GetMeAction
 */
final class DeleteCommand extends AbstractController
{
    /**
     * @return User
     */
    public function __invoke(Command $command): void
    {
        $user = $this->getUser();
        if ($command->getState() == "payée") {
            $user->deleteCommands($command);
        }
    }
}
