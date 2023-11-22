<?php

namespace App\DataFixtures;

use App\Entity\Actor;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ActorFixtures extends Fixture implements OrderedFixtureInterface
{
    // définir l'ordre de chargement des fixtures
    public function getOrder(): int
    {
        return 2;
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($i = 1; $i < 10; ++$i) {
            $actor = new Actor();
            $actor->setFirstName($faker->firstName);
            $actor->setLastName($faker->lastName);
            $actor->setNationalite($this->getReference('nationalite_'.rand(1, 4)));
            $manager->persist($actor);
            $this->addReference('actor_'.$i, $actor);
        }

        $manager->flush();
    }
}
