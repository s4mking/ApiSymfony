<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i = 0; $i < 10; $i++) {
            $users[$i] = new User();
            $plainPassword = 'motdepas';
            $encoded = $this->encoder->encodePassword($users[$i], $plainPassword);
            // $encoded = $encoder->encodePassword($users[$i], $plainPassword);
            $users[$i]->setEmail($faker->email)
                ->setFirstname($faker->userName)
                ->setPassword($encoded)
                ->setRoles(['ROLE_USER'])
                ->setUsername($faker->userName);
            $manager->persist($users[$i]);
        }
        $user = new User();
        $plainPassword = 'motdepas';
        $encoded = $this->encoder->encodePassword($user, $plainPassword);
        $user
            ->setEmail('sam@sam.fr')
            ->setUsername('samuel')
            ->setFirstname($faker->userName)
            ->setRoles(['ROLE_ADMIN'])
            ->setPassword($encoded);

        $manager->persist($user);
        $manager->flush();
    }
}
