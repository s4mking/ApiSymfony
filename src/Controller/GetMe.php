<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * Class GetMeAction
 */
final class GetMe extends AbstractController
{
    /**
     * @return User
     */
    public function __invoke(): User
    {
        /** @var User $user */
        $user = $this->getUser();

        return $user;
    }
}
