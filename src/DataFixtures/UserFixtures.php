<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    public function __construct(
        protected UserPasswordHasherInterface $passwordHasherInterface
    ) {
    }

    public function getOrder(): int
    {
        return 5;
    }

    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 5; ++$i) {
            $user = new User();
            $user->setUsername('user' . $i);
            $user->setPassword($this->passwordHasherInterface->hashPassword($user, 'test' . $i));

            $manager->persist($user);
        }

        $userAdmin = new User();
        $userAdmin->setUsername('admin');
        $userAdmin->setPassword($this->passwordHasherInterface->hashPassword($user, 'test'));
        $userAdmin->setRoles(['ROLE_ADMIN']);

        $manager->persist($userAdmin);

        $manager->flush();
    }
}
